<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Document;
use App\Models\Resident;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Phpml\Clustering\KMeans;
use Phpml\Math\Statistic\Mean;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class Chart extends Controller
{
    public $monthNames = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];
    public function barChart(Request $request)
    {
        $demographic = $this->demographicData();
        $complaints_count = Complaint::all()->count();

        $filter = $request->query('filter', 'year');
        $filter = 'year';
        $document_name = Document::all();
        $lineChartData = $this->getMonthlyComplaintsCounts();
        $pieChartData = $this->pieChart();
        $ageDistribution = $this->ageDistribution($filter);
        $document_names = DB::table('document_requests')
            ->select('request_file_name')
            ->distinct()
            ->pluck('request_file_name')
            ->toArray();

        function randomColor()
        {
            return 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', 0.6)';
        }

        $colors = [];
        foreach ($document_names as $document) {
            $colors[$document] = randomColor();
        }

        $document_request_monthly_counts = [];
        $monthly_totals = [];
        $clustering_data = [];

        if ($filter == 'year') {
            foreach ($this->monthNames as $month => $month_name) {
                foreach ($document_names as $document) {
                    $count = DB::table('document_requests')
                        ->where('request_file_name', $document)
                        ->whereYear('date_requested', 2024)
                        ->whereMonth('date_requested', $month)
                        ->count();

                    $document_request_monthly_counts[$document][$month_name] = $count;
                    $monthly_totals[$month_name] = ($monthly_totals[$month_name] ?? 0) + $count;

                    $clustering_data[$document][] = $count;
                }
            }
        } elseif ($filter == 'month') {
            $month = $request->query('month', date('m'));

            foreach ($document_names as $document) {
                $days_in_month = Carbon::create(2024, $month)->daysInMonth;

                for ($week = 1; $week <= ceil($days_in_month / 7); $week++) {
                    $start_of_week = Carbon::create(2024, $month, 1)->addWeeks($week - 1)->startOfWeek();
                    $end_of_week = Carbon::create(2024, $month, 1)->addWeeks($week - 1)->endOfWeek();

                    if ($end_of_week->month != $month) {
                        $end_of_week = Carbon::create(2024, $month, $days_in_month)->endOfDay();
                    }

                    $count = DB::table('document_requests')
                        ->where('request_file_name', $document)
                        ->whereYear('date_requested', 2024)
                        ->whereMonth('date_requested', $month)
                        ->whereBetween('date_requested', [$start_of_week, $end_of_week])
                        ->count();

                    $document_request_counts[$document]["Week $week"] = $count;
                    $totals["Week $week"] = ($totals["Week $week"] ?? 0) + $count;

                    $clustering_data[$document][] = $count;
                }
            }
        }

        // Prepare data for the bar chart
        $barChartData = [
            'labels' => array_keys($monthly_totals),
            'datasets' => []
        ];

        foreach ($document_names as $document) {
            // Initialize counts for months
            $counts = array_fill_keys(array_keys($monthly_totals), 0);

            // Populate counts if they exist
            if (isset($document_request_monthly_counts[$document])) {
                $counts = $document_request_monthly_counts[$document];
            }

            $barChartData['datasets'][] = [
                'label' => $document,
                'data' => array_values($counts),
                'backgroundColor' => $colors[$document] ?? 'rgba(0, 0, 0, 0.1)', // Default color if not found
                'borderColor' => $colors[$document] ?? 'rgba(0, 0, 0, 0.1)', // Default border color if not found
                'borderWidth' => 1,
            ];
        }

        // Calculate overall monthly totals for trend analysis
        $overall_monthly_totals = array_fill_keys($this->monthNames, 0);
        foreach ($document_request_monthly_counts as $counts) {
            foreach ($counts as $month_name => $count) {
                $overall_monthly_totals[$month_name] += $count;
            }
        }

        // Prepare summary based on data availability
        $summary = "No data available for the selected period."; // Default message

        if (array_sum($overall_monthly_totals) > 0) {
            // Detect increasing and decreasing trends
            $trend_months = [
                'increases' => [],
                'decreases' => [],
            ];

            $previous_count = null;
            $current_trend = null;

            foreach ($overall_monthly_totals as $month => $count) {
                if ($previous_count !== null) {
                    if ($count > $previous_count) {
                        if ($current_trend !== 'up') {
                            $current_trend = 'up';
                            $trend_months['increases'][] = $month;
                        }
                    } elseif ($count < $previous_count) {
                        if ($current_trend !== 'down') {
                            $current_trend = 'down';
                            $trend_months['decreases'][] = $month;
                        }
                    } else {
                        $current_trend = null; // No trend if the count is unchanged
                    }
                }
                $previous_count = $count;
            }

            // Create a summary of findings based strictly on data
            $summary = "The monthly analysis of document requests in 2024 reveals significant trends in activity. ";

            // Highlight significant months for summary
            $highest_month = array_search(max($overall_monthly_totals), $overall_monthly_totals);
            $lowest_month = array_search(min($overall_monthly_totals), $overall_monthly_totals);
            $summary .= "The month with the highest volume of requests was $highest_month with " . max($overall_monthly_totals) . " requests, while the lowest was $lowest_month with " . min($overall_monthly_totals) . " requests. ";

            // Analyze the average number of requests
            $average_requests = array_sum($overall_monthly_totals) / count($overall_monthly_totals);
            $summary .= "On average, there were " . round($average_requests, 2) . " requests per month. ";

            // Average requests per document
            $average_requests_per_document = [];
            foreach ($document_request_monthly_counts as $document => $counts) {
                $total_requests = array_sum($counts);
                $average_requests_per_document[$document] = round($total_requests / count($counts), 2);
                $summary .= "The average requests for '$document' was " . $average_requests_per_document[$document] . " requests per month. ";
            }

            if (!empty($trend_months['increases'])) {
                $summary .= "During the months of " . implode(', ', $trend_months['increases']) . ", there was an observed increase in requests, suggesting potential heightened activity or awareness among residents. ";
            }

            if (!empty($trend_months['decreases'])) {
                $summary .= "Conversely, requests decreased during the months of " . implode(', ', $trend_months['decreases']) . ", which may indicate seasonal trends or external factors affecting resident engagement. ";
            }
        }

        return view('admin.dashboard', [
            'totalResidents' => $pieChartData['totalResidents'],
            'ageDistribution' => $ageDistribution,
            'complaints_count' => $complaints_count,
            'demographic' => $demographic,
            'pieChartDataSummary' => $pieChartData['pie_summary'],
            'filter' => $filter,
            'month' => $request->query('month', date('m')),
            'lineChartData' => $lineChartData,
            'pieChartData' => $pieChartData['pieChartData'],
            'barChartData' => $barChartData,
            'summary' => $summary,
            'senior_citizen' => $pieChartData['senior_citizen'],
            'under_age' => $pieChartData['under_age'],
            'adult' => $pieChartData['adult'],
            'pwd' => $pieChartData['pwd'],
            'indigenous' => $pieChartData['indigenous'] ,
            'requestDocuments' => DB::table('document_requests')->count(),
            'residents' => DB::table('residents')->count(),
            'users' => DB::table('users')->count(),
        ]);
    }


    public function getMonthlyComplaintsCounts()
    {
        $complaints_monthly_counts = [];
        $complaints_data = []; // Collect data points for clustering

        // Collect counts for each month
        foreach ($this->monthNames as $month_number => $month_name) {
            $count = DB::table('complaints')
                ->whereYear('created_at', 2024)
                ->whereMonth('created_at', $month_number)
                ->count();

            $complaints_monthly_counts[$month_name] = $count;
            $complaints_data[] = [$count]; // Prepare data for K-Means clustering
        }
        // Check if there are any complaints
        if (array_sum($complaints_monthly_counts) === 0) {
            return [
                'lineChartData' => null,
                'lineChartSummary' => 'No complaints data available.',
                'clusteredMonths' => [],
                'trendMonths' => [],
            ];
        }

        // K-Means Clustering (3 clusters: downtrend, stable, uptrend)
        $kmeans = new KMeans(3);
        $clusters = $kmeans->cluster($complaints_data);

        // Process clusters and assign labels (downtrend, stable, uptrend)
        $clustered_months = [
            'downtrend' => [],
            'stable' => [],
            'uptrend' => []
        ];

        // Identify clusters by their average values
        $cluster_means = [];
        foreach ($clusters as $index => $cluster) {
            $sum = 0;
            $count = count($cluster); // Count the number of data points in the cluster

            foreach ($cluster as $data_point) {
                $sum += $data_point[0]; // Assuming 1D data point
            }

            // Only calculate the mean if the count is greater than zero
            $cluster_means[$index] = $count > 0 ? $sum / $count : 0; // Handle empty cluster
        }

        // Sort clusters by mean values to determine downtrend, stable, and uptrend
        asort($cluster_means); // Sort in ascending order

        foreach ($clusters as $cluster_index => $cluster) {
            foreach ($cluster as $month_index => $data_point) {
                $month_name = array_keys($complaints_monthly_counts)[$month_index]; // Get corresponding month name

                // Assign to clusters based on sorted means
                if (array_key_first($cluster_means) === $cluster_index) {
                    $clustered_months['downtrend'][] = $month_name; // Lowest average -> downtrend
                } elseif (array_key_last($cluster_means) === $cluster_index) {
                    $clustered_months['uptrend'][] = $month_name; // Highest average -> uptrend
                } else {
                    $clustered_months['stable'][] = $month_name; // Middle average -> stable
                }
            }
        }

        // Trend identification
        $trend_months = [
            'uptrends' => [],
            'downtrends' => [],
            'stable' => []
        ];

        $previous_count = null;
        foreach ($complaints_monthly_counts as $month => $count) {
            if ($previous_count !== null) {
                if ($count > $previous_count) {
                    $trend_months['uptrends'][] = $month; // Increased count indicates uptrend
                } elseif ($count < $previous_count) {
                    $trend_months['downtrends'][] = $month; // Decreased count indicates downtrend
                } else {
                    $trend_months['stable'][] = $month; // No change indicates stability
                }
            }
            $previous_count = $count;
        }

        // Create a detailed summary of trends and clusters
        $summary = "The chart illustrates the monthly trends in complaint counts from January to December 2024. ";

        if (!empty($clustered_months['downtrend'])) {
            $summary .= "Months with a downtrend included: " . implode(', ', $clustered_months['downtrend']) . ". ";
        } else {
            $summary .= "No months experienced a downtrend. ";
        }

        if (!empty($clustered_months['stable'])) {
            $summary .= "Stable complaint counts were observed in: " . implode(', ', $clustered_months['stable']) . ". ";
        } else {
            $summary .= "All months exhibited significant fluctuations. ";
        }

        if (!empty($clustered_months['uptrend'])) {
            $summary .= "The months demonstrating an uptrend were: " . implode(', ', $clustered_months['uptrend']) . ". ";
        } else {
            $summary .= "There were no months with significant increases in complaints. ";
        }

        // Explain uptrends, downtrends, and stability
        if (!empty($trend_months['uptrends'])) {
            $summary .= "The following months experienced an increase in complaints: " . implode(', ', $trend_months['uptrends']) . ". ";
        }

        if (!empty($trend_months['downtrends'])) {
            $summary .= "Conversely, the following months saw a decrease in complaints: " . implode(', ', $trend_months['downtrends']) . ". ";
        }

        if (!empty($trend_months['stable'])) {
            $summary .= "The months of " . implode(', ', $trend_months['stable']) . " showed stable complaint counts, indicating no change in the number of complaints. ";
        }

        // Identify significant spikes or stability
        $highest_complaint_count = max($complaints_monthly_counts);
        $highest_complaint_month = array_keys($complaints_monthly_counts, $highest_complaint_count)[0];
        $summary .= "The most significant spike occurred in $highest_complaint_month, with a record of $highest_complaint_count complaints. ";

        // Discuss seasonal or periodic patterns
        $summary .= "Overall, complaint counts exhibited notable fluctuations throughout the year. The identified uptrends and downtrends suggest varying levels of public concern or responsiveness to issues during specific months.";

        // Prepare data for line chart
        $lineChartData = [
            'title' => 'Monthly Number of Complaints',
            'labels' => array_keys($complaints_monthly_counts),
            'data' => array_values($complaints_monthly_counts),
        ];

        return [
            'lineChartData' => $lineChartData,
            'lineChartSummary' => $summary,
            'clusteredMonths' => $clustered_months,
            'trendMonths' => $trend_months,
        ];
    }


    public function pieChart()
    {
        // Count the number of residents in different categories
        $senior_citizen = DB::table('residents')->where('age', '>=', 60)->count();
        $under_age = DB::table('residents')->where('age', '<', 18)->count();
        $adult = DB::table('residents')->whereBetween('age', [18, 59])->count();
        $pwd = DB::table('residents')->where('pwd', 'YES')->count();
        $indigenous = DB::table('residents')->where('indigenous', 'Yes')->count();

        $totalResidents = Resident::all()->count();

        $pieChartData = [
            'labels' => ['Senior Citizen', 'Under Age', 'Adult', 'PWD', 'Idigenous'],
            'data' => [$senior_citizen, $under_age, $adult, $pwd, $indigenous]
        ];

        // Initialize summary
        $summary = "In our community, there are a total of {$totalResidents} residents. ";

        if ($totalResidents > 0) {
            $summary .= "{$senior_citizen} are senior citizens (60 years and older), accounting for " . round(($senior_citizen / $totalResidents) * 100, 2) . "% of the population. ";
            $summary .= "{$under_age} individuals are under 18 years old, representing " . round(($under_age / $totalResidents) * 100, 2) . "% of the total. ";
            $summary .= "{$adult} residents fall within the age range of 18 to 59 years, making up " . round(($adult / $totalResidents) * 100, 2) . "% of the community. ";
            $summary .= "Additionally, there are {$pwd} persons with disabilities (PWD), which constitutes " . round(($pwd / $totalResidents) * 100, 2) . "% of the total population.";
            $summary .= "{$indigenous} residents are indigenous, representing " . round(($indigenous / $totalResidents) * 100, 2) . "% of the population.";
        } else {
            // If no residents are found
            $summary .= "Currently, there are no residents in the system.";
        }

        // Return the pie chart data and summary
        return [
            'pieChartData' => $pieChartData,
            'pie_summary' => $summary,
            'senior_citizen' => $senior_citizen,
            'under_age' => $under_age,
            'pwd' => $pwd,
            'adult' => $adult,
            'indigenous' => $indigenous,
            'totalResidents' => $totalResidents,
        ];
    }


    public function ageDistribution($filter)
    {
        $filter = 'year';
        // Retrieve resident counts based on age groups
        $under18 = DB::table('residents')->where('age', '<', 18)->count();
        $age18To34 = DB::table('residents')->whereBetween('age', [18, 34])->count();
        $age35To49 = DB::table('residents')->whereBetween('age', [35, 49])->count();
        $age50To64 = DB::table('residents')->whereBetween('age', [50, 64])->count();
        $age65AndAbove = DB::table('residents')->where('age', '>=', 65)->count();

        // Count total residents
        $totalResidents = DB::table('residents')->count();

        // Initialize the summary
        $ageDistributionSummary = "In our community, we have a total of {$totalResidents} residents. Among them, ";

        // Determine the time context based on the filter
        if ($filter === 'this year') {
            $year = date('Y');
            $ageDistributionSummary .= "for the year {$year}, ";
        } elseif ($filter === 'month') {
            $month = date('F');
            $ageDistributionSummary .= "for the month of {$month}, ";
        }

        $percentages = [];

        if ($totalResidents > 0) {
            $percentages['under18'] = round(($under18 / $totalResidents) * 100, 2);
            $percentages['age18To34'] = round(($age18To34 / $totalResidents) * 100, 2);
            $percentages['age35To49'] = round(($age35To49 / $totalResidents) * 100, 2);
            $percentages['age50To64'] = round(($age50To64 / $totalResidents) * 100, 2);
            $percentages['age65AndAbove'] = round(($age65AndAbove / $totalResidents) * 100, 2);
        } else {
            $percentages = [
                'under18' => 0,
                'age18To34' => 0,
                'age35To49' => 0,
                'age50To64' => 0,
                'age65AndAbove' => 0,
            ];
        }

        $ageDistributionSummary .= "{$under18} individuals, accounting for {$percentages['under18']}%, are under the age of 18. ";
        $ageDistributionSummary .= "The age group of 18 to 34 years comprises {$age18To34} residents, making up {$percentages['age18To34']}% of the population. ";
        $ageDistributionSummary .= "Meanwhile, there are {$age35To49} individuals aged between 35 and 49, representing {$percentages['age35To49']}% of our community. ";
        $ageDistributionSummary .= "The 50 to 64 age group consists of {$age50To64} residents, which is {$percentages['age50To64']}%, while those aged 65 and above number {$age65AndAbove}, making up {$percentages['age65AndAbove']}% of our community.";
        return [
            'under18' => $under18,
            'age18To34' => $age18To34,
            'age35To49' => $age35To49,
            'age50To64' => $age50To64,
            'age65AndAbove' => $age65AndAbove,
            'ageDistributionSummary' => $ageDistributionSummary,
            'totalResidents' => $totalResidents
        ];
    }

    public function demographicData()
    {
        $unemployed = Resident::where('occupation', '=', 'No')->count();
        $employed = Resident::where('occupation', '=', 'Yes')->count();
        $single = Resident::where('maritalStatus', '=', 'single')->count();
        $married = Resident::where('maritalStatus', '=', 'married')->count();
        $divorced = Resident::where('maritalStatus', '=', 'divorced')->count();
        $separated = Resident::where('maritalStatus', '=', 'separated')->count();
        $indigenous = Resident::where('indigenous', '=', 'Yes')->count();
        $un_indigenous = Resident::where('indigenous', '=', 'No')->count();
        $averageIncome = Resident::where('MonthlyIncome', '!=', 'No')->avg('MonthlyIncome');

        return [
            'unemployed' => $unemployed,
            'employed' => $employed,
            'single' => $single,
            'married' => $married,
            'divorced' => $divorced,
            'separated' => $separated,
            'indigenous' => $indigenous,
            'non_indigenous' => $un_indigenous,
            'averageIncome' => $averageIncome
        ];
    }

}
