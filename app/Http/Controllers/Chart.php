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
        $complaints_count = Complaint::all()->count();
        $filter = $request->query('filter', 'year'); // Default to 'year' if 'filter' is not set
        $document_name = Document::all();
        $demographic = $this->demographicData($filter);
        $lineChartData = $this->getMonthlyComplaintsCounts($filter);
        $pieChartData = $this->pieChart($filter);
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

        // Initialize arrays for monthly and yearly counts
        $document_request_yearly_counts = [];
        $yearly_totals = [];
        $document_request_monthly_counts = [];
        $monthly_totals = [];

        // Initialize summary variable
        $summary = "No data available for the selected period."; // Default summary

        if ($filter == 'month') {
            // Get the current year for monthly data
            $currentYear = date('Y');

            // Prepare monthly data for the current year
            foreach ($this->monthNames as $month => $month_name) {
                foreach ($document_names as $document) {
                    $count = DB::table('document_requests')
                        ->where('request_file_name', $document)
                        ->whereYear('date_requested', $currentYear) // Only current year
                        ->whereMonth('date_requested', $month)
                        ->count();

                    // Accumulate counts for each document by month for the current year
                    $document_request_monthly_counts[$document][$month_name] =
                        ($document_request_monthly_counts[$document][$month_name] ?? 0) + $count;
                    $monthly_totals[$month_name] =
                        ($monthly_totals[$month_name] ?? 0) + $count;
                }
            }

            // Generate monthly descriptive analytics for the current year's monthly data
            $summary = $this->generateMonthlySummary($monthly_totals, $document_request_monthly_counts, $document_names);
        } elseif ($filter == 'year') {
            // Initialize arrays to store counts
            $document_request_yearly_counts = [];
            $yearly_totals = [];

            // Get yearly data for the past 5 years
            for ($year = date('Y') - 5; $year <= date('Y'); $year++) {
                foreach ($document_names as $document) {
                    // Count requests for each document by year
                    $count = DB::table('document_requests')
                        ->where('request_file_name', $document)
                        ->whereYear('created_at', $year)
                        ->count();

                    // Accumulate counts for each document by year
                    if (!isset($document_request_yearly_counts[$document])) {
                        $document_request_yearly_counts[$document] = [];
                    }

                    $document_request_yearly_counts[$document][$year] =
                        ($document_request_yearly_counts[$document][$year] ?? 0) + $count;

                    $yearly_totals[$year] = ($yearly_totals[$year] ?? 0) + $count;
                }
            }

            // Prepare monthly data for the current year
            $currentYear = date('Y');
            $document_request_monthly_counts = [];
            $monthly_totals = [];

            foreach ($this->monthNames as $month => $month_name) {
                foreach ($document_names as $document) {

                    $count = DB::table('document_requests')
                        ->where('request_file_name', $document)
                        ->whereYear('created_at', $currentYear)
                        ->whereMonth('created_at', $month)
                        ->count();

                    // Accumulate counts for each document by month for the current year
                    if (!isset($document_request_monthly_counts[$document])) {
                        $document_request_monthly_counts[$document] = [];
                    }

                    $document_request_monthly_counts[$document][$month_name] =
                        ($document_request_monthly_counts[$document][$month_name] ?? 0) + $count;

                    $monthly_totals[$month_name] = ($monthly_totals[$month_name] ?? 0) + $count;
                }
            }

            // Generate yearly descriptive analytics
            $summary = $this->generateYearlySummary($yearly_totals, $document_request_yearly_counts, $document_names);
        }


        // Prepare data for the bar chart
        $barChartData = [
            'labels' => $filter === 'year' ? array_keys($yearly_totals) : array_keys($monthly_totals),
            'datasets' => []
        ];

        foreach ($document_names as $document) {
            // Initialize counts for months or years
            $counts = $filter === 'year' ? array_fill_keys(array_keys($yearly_totals), 0) : array_fill_keys(array_keys($monthly_totals), 0);

            // Populate counts based on the selected filter
            if ($filter === 'year' && isset($document_request_yearly_counts[$document])) {
                $counts = $document_request_yearly_counts[$document];
            } elseif ($filter === 'month' && isset($document_request_monthly_counts[$document])) {
                $counts = $document_request_monthly_counts[$document];
            }

            $barChartData['datasets'][] = [
                'label' => $document,
                'data' => array_values($counts),
                'backgroundColor' => $colors[$document] ?? 'rgba(0, 0, 0, 0.1)',
                'borderColor' => $colors[$document] ?? 'rgba(0, 0, 0, 0.1)',
                'borderWidth' => 1,
            ];
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
            'indigenous' => $pieChartData['indigenous'],
            'requestDocuments' => DB::table('document_requests')->count(),
            'residents' => DB::table('residents')->count(),
            'users' => DB::table('users')->count(),
        ]);
    }

    private function generateYearlySummary($yearly_totals, $document_request_yearly_counts, $document_names)
    {
        if (empty($yearly_totals)) {
            return "No data available for yearly totals.";
        }
    
        // Prepare data for K-means clustering
        $data = array_map(fn($count) => [$count], array_values($yearly_totals));
        $kmeans = new KMeans(3); // Clusters: decrease, peak, increase
        $clusters = $kmeans->cluster($data);
    
        // Organize years by trend
        $trends = ['decrease' => [], 'peak' => [], 'increase' => []];
        $years = array_keys($yearly_totals);
    
        foreach ($clusters as $index => $cluster) {
            foreach ($cluster as $dataPoint) {
                $yearIndex = array_search($dataPoint[0], array_values($yearly_totals));
                if ($yearIndex !== false) {
                    $year = $years[$yearIndex];
                    if ($index === 0) $trends['decrease'][] = $year;
                    elseif ($index === 1) $trends['peak'][] = $year; // Peak year
                    else $trends['increase'][] = $year;
                }
            }
        }
        // Highest and lowest request years
        $highestYear = array_search(max($yearly_totals), $yearly_totals);
        $lowestYear = array_search(min($yearly_totals), $yearly_totals);
        $averageRequests = round(array_sum($yearly_totals) / count($yearly_totals), 2);
    
        // Construct summary paragraph
        $summary = "From the yearly analysis of document requests, {$highestYear} recorded the peak number of requests with " . max($yearly_totals) . 
                   ", while {$lowestYear} had the lowest at " . min($yearly_totals) . ". The average annual requests over this period were {$averageRequests}. " .
                   "Trends show that document requests decreased in the years " . implode(', ', array_unique($trends['decrease'])) . 
                   ", reached a peak in " . implode(', ', array_unique($trends['peak'])) . 
                   ", and increased in " . implode(', ', array_unique($trends['increase'])) . ". ";
    
        // Document-specific requests as percentages
        $totalRequests = array_sum($yearly_totals);
        foreach ($document_names as $document) {
            $docTotal = array_sum($document_request_yearly_counts[$document] ?? []);
            $percentage = $totalRequests > 0 ? round(($docTotal / $totalRequests) * 100, 2) : 0;
            $summary .= "{$document} requests constituted {$percentage}% of the total. ";
            
            foreach (array_keys($yearly_totals) as $year) {
                $count = $document_request_yearly_counts[$document][$year] ?? 0;
                $yearPercentage = $yearly_totals[$year] > 0 ? round(($count / $yearly_totals[$year]) * 100, 2) : 0;
                if ($yearPercentage > 0) {
                    $summary .= "In {$year}, there were {$count} requests for {$document}, making up {$yearPercentage}% of that year’s total. ";
                }
            }
        }
    
        $summary .= "Overall, document requests showed notable yearly fluctuations, reflecting changing public demand.";
    
        return $summary;
    }
    
    private function generateMonthlySummary($monthly_totals, $document_request_monthly_counts, $document_names)
    {
        $currentYear = date('Y');
        $summary = "In {$currentYear}, an analysis of monthly document requests reveals intriguing trends and fluctuations in public demand. ";

        // Prepare data for clustering
        $monthlyData = array_values($monthly_totals);

        // Organize months into trends based on request counts
        $trends = ['downtrend' => [], 'stable' => [], 'uptrend' => []];

        for ($i = 0; $i < count($monthlyData); $i++) {
            if ($i > 0) {
                // Compare with the previous month
                if ($monthlyData[$i] < $monthlyData[$i - 1]) {
                    $trends['downtrend'][] = date("F", mktime(0, 0, 0, $i + 1, 1));
                } elseif ($monthlyData[$i] == $monthlyData[$i - 1]) {
                    $trends['stable'][] = date("F", mktime(0, 0, 0, $i + 1, 1));
                } else {
                    $trends['uptrend'][] = date("F", mktime(0, 0, 0, $i + 1, 1));
                }
            }
        }
        // Find the month with the highest and lowest requests
        if (count(array_filter($monthly_totals)) > 0) { 
            $highest_month = array_search(max($monthly_totals), $monthly_totals);
            $lowest_month = array_search(min($monthly_totals), $monthly_totals);
            $highest_count = max($monthly_totals);
            $lowest_count = min($monthly_totals);
        } else {
            // Handle the case where all values are zero
            $highest_month = null;
            $lowest_month = null;
            $highest_count = 0;
            $lowest_count = 0;
        }
        // Compile the summary with added details
        $summary .= "Throughout the year, significant variability was observed in document requests. ";
        $summary .= "The following trends were identified: ";
        $summary .= "Months exhibiting a downtrend include " . implode(', ', $trends['downtrend']) . ". ";
        $summary .= "Stable months were noted as " . implode(', ', $trends['stable']) . ". ";
        $summary .= "In contrast, months showing an uptrend were " . implode(', ', $trends['uptrend']) . ". ";

        $summary .= "Remarkably, the month with the highest number of requests was {$highest_month}, with a staggering total of {$highest_count} requests. ";
        $summary .= "Conversely, {$lowest_month} saw the lowest activity, with only {$lowest_count} requests logged. ";
        $summary .= "This analysis highlights the dynamic nature of public engagement and the varying needs for documentation across different months of the year.";
        
        return $summary;
    }


    public function getMonthlyComplaintsCounts($filter)
    {
        if ($filter === 'year') {
            // Get the last 5 years of complaint counts
            $yearly_complaints_counts = [];
            $current_year = date('Y');
            $years = range($current_year - 4, $current_year);

            // Count complaints for each year
            foreach ($years as $year) {
                $count = DB::table('complaints')
                    ->whereYear('created_at', $year)
                    ->count();
                $yearly_complaints_counts[$year] = $count;
            }

            // Prepare data for the line chart
            $lineChartData = [
                'title' => 'Yearly Number of Complaints',
                'labels' => array_keys($yearly_complaints_counts),
                'data' => array_values($yearly_complaints_counts),
            ];

            // Summary for yearly complaints
            $highest_complaint_count = max($yearly_complaints_counts);
            $highest_complaint_year = array_keys($yearly_complaints_counts, $highest_complaint_count)[0];
            $total_complaints = array_sum($yearly_complaints_counts);
            $average_complaints = $total_complaints / count($yearly_complaints_counts);

            // Analyze trends
            $trends = [];
            $previous_count = null;

            foreach ($yearly_complaints_counts as $year => $count) {
                if ($previous_count !== null) {
                    if ($count > $previous_count) {
                        $trends[] = "an increase in complaints in $year compared to the previous year";
                    } elseif ($count < $previous_count) {
                        $trends[] = "a decrease in complaints in $year compared to the previous year";
                    }
                }
                $previous_count = $count;
            }

            // Generate a more descriptive summary
            $summary = "The yearly analysis of complaints from " . ($current_year - 4) . " to $current_year provides insights into public concerns and complaint trends over time. Over this five-year period, there were a total of $total_complaints complaints, with an average of " . round($average_complaints, 2) . " complaints per year. The peak year for complaints was $highest_complaint_year, which saw the highest recorded count of $highest_complaint_count complaints, indicating a period of heightened public feedback or issues. Observing trends across this span, there were distinct shifts in the volume of complaints, including " . implode(", ", $trends) . ". Overall, the data reflects the varying levels of community engagement and responsiveness over these years, capturing the evolving concerns of the public.";

            return [
                'lineChartData' => $lineChartData,
                'lineChartSummary' => $summary,
                'clusteredMonths' => [],
                'trendMonths' => [],
            ];
        }




        $complaints_monthly_counts = [];
        $complaints_data = []; // Data points for clustering

        // Count complaints for each month in the current year
        foreach ($this->monthNames as $month_number => $month_name) {
            $count = DB::table('complaints')
                ->whereYear('created_at', 2024) // Adjust to the current year dynamically if necessary
                ->whereMonth('created_at', $month_number)
                ->count();

            $complaints_monthly_counts[$month_name] = $count;
            $complaints_data[] = [$count]; // Prepare for K-Means clustering
        }

        // Return message if no complaints are available
        if (array_sum($complaints_monthly_counts) === 0) {
            return [
                'lineChartData' => null,
                'lineChartSummary' => 'No complaints data available.',
                'clusteredMonths' => [],
                'trendMonths' => [],
            ];
        }

        $kmeans = new KMeans(3);
        $clusters = $kmeans->cluster($complaints_data);
        $clustered_months = [
            'downtrend' => [],
            'stable' => [],
            'uptrend' => []
        ];

        // Calculate average values for each cluster
        $cluster_means = [];
        foreach ($clusters as $index => $cluster) {
            $sum = array_sum(array_column($cluster, 0));
            $count = count($cluster);
            $cluster_means[$index] = $count > 0 ? $sum / $count : 0; // Handle empty cluster
        }

        // Sort clusters by mean values to identify trends
        asort($cluster_means);

        foreach ($clusters as $cluster_index => $cluster) {
            foreach ($cluster as $month_index => $data_point) {
                $month_name = array_keys($complaints_monthly_counts)[$month_index];

                // Assign months to clusters based on their average
                if (array_key_first($cluster_means) === $cluster_index) {
                    $clustered_months['downtrend'][] = $month_name; // Lowest average -> downtrend
                } elseif (array_key_last($cluster_means) === $cluster_index) {
                    $clustered_months['uptrend'][] = $month_name; // Highest average -> uptrend
                } else {
                    $clustered_months['stable'][] = $month_name; // Middle average -> stable
                }
            }
        }

        // Identify trends in monthly complaint counts
        $trend_months = [
            'uptrends' => [],
            'downtrends' => [],
            'stable' => []
        ];

        $previous_count = null;
        foreach ($complaints_monthly_counts as $month => $count) {
            if ($previous_count !== null) {
                if ($count > $previous_count) {
                    $trend_months['uptrends'][] = $month; // Increase indicates uptrend
                } elseif ($count < $previous_count) {
                    $trend_months['downtrends'][] = $month; // Decrease indicates downtrend
                } else {
                    $trend_months['stable'][] = $month; // No change indicates stability
                }
            }
            $previous_count = $count;
        }

        $summary = "In 2024, the analysis of monthly complaints reveals notable trends and fluctuations. ";

        // Describe clusters with clearer context
        $summary .= "Based on clustering analysis, we identified the following trends: ";
        $cluster_descriptions = [];

        foreach (['downtrend', 'stable', 'uptrend'] as $trend) {
            if (!empty($clustered_months[$trend])) {
                $cluster_descriptions[] = ucfirst($trend) . " months: " . implode(', ', $clustered_months[$trend]);
            } else {
                $cluster_descriptions[] = "No months experienced a " . $trend . ".";
            }
        }

        $summary .= implode('. ', $cluster_descriptions) . ". ";

        // Explain trends with explicit timeframes
        if (!empty($trend_months['uptrends'])) {
            $summary .= "We observed an increase in complaints during the following months: " . implode(', ', $trend_months['uptrends']) . ". ";
        }
        if (!empty($trend_months['downtrends'])) {
            $summary .= "Conversely, complaints decreased in the following months: " . implode(', ', $trend_months['downtrends']) . ". ";
        }
        if (!empty($trend_months['stable'])) {
            $summary .= "There was stability in complaint counts during the months of: " . implode(', ', $trend_months['stable']) . ". ";
        }

        // Highlight the highest complaint month for emphasis
        $highest_complaint_count = max($complaints_monthly_counts);
        $highest_complaint_month = array_keys($complaints_monthly_counts, $highest_complaint_count)[0];
        $summary .= "The month with the highest number of complaints was $highest_complaint_month, with a total of $highest_complaint_count complaints. ";

        // Discuss overall fluctuations in a concise manner
        $summary .= "Overall, the year displayed significant variability in complaint counts, reflecting diverse public concerns and varying responsiveness throughout different months. ";

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

    public function pieChart($filter)
    {
        $currentYear = now()->year;

        if ($filter == 'month') {
            // Get counts for the current year
            $senior_citizen = DB::table('residents')
                ->where('age', '>=', 60)
                ->whereYear('created_at', $currentYear)
                ->count();
            $under_age = DB::table('residents')
                ->where('age', '<', 18)
                ->whereYear('created_at', $currentYear)
                ->count();

            $adult = DB::table('residents')
                ->whereBetween('age', [18, 59])
                ->whereYear('created_at', $currentYear)
                ->count();

            $pwd = DB::table('residents')
                ->where('pwd', 'YES')
                ->whereYear('created_at', $currentYear)
                ->count();

            $indigenous = DB::table('residents')
                ->where('indigenous', 'Yes')
                ->whereYear('created_at', $currentYear)
                ->count();

            // Total residents for the current year
            $totalResidents = Resident::whereYear('created_at', $currentYear)->count();

            // Prepare the pie chart data and summary for the current year
            $pieChartData = [
                'labels' => ['Senior Citizen', 'Under Age', 'Adult', 'PWD', 'Indigenous'],
                'data' => [$senior_citizen, $under_age, $adult, $pwd, $indigenous]
            ];

            // Initialize summary
            $summary = "In our community for the year {$currentYear}, there are a total of {$totalResidents} residents. ";

            if ($totalResidents > 0) {
                $summary .= "{$senior_citizen} are senior citizens (60 years and older). ";
                $summary .= "{$under_age} individuals are under 18 years old. ";
                $summary .= "{$adult} residents fall within the age range of 18 to 59 years. ";
                $summary .= "{$pwd} persons have disabilities (PWD). ";
                $summary .= "{$indigenous} residents are indigenous.";
            } else {
                // If no residents are found
                $summary .= "Currently, there are no residents in the system.";
            }

            // Return the pie chart data and summary for the current year
            return [
                'pieChartData' => $pieChartData,
                'pie_summary' => $summary,
                'totalResidents' => $totalResidents,
                'senior_citizen' => $senior_citizen,
                'under_age' => $under_age,
                'adult' => $adult,
                'pwd' => $pwd,
                'indigenous' => $indigenous,
            ];
        } else if ($filter == 'year') {
            // Calculate for the last 5 years
            $startDate = now()->subYears(5);
            $endDate = now();

            // Get counts for the last 5 years
            $senior_citizen = DB::table('residents')
                ->where('age', '>=', 60)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
            $under_age = DB::table('residents')
                ->where('age', '<', 18)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $adult = DB::table('residents')
                ->whereBetween('age', [18, 59])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $pwd = DB::table('residents')
                ->where('pwd', 'YES')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            $indigenous = DB::table('residents')
                ->where('indigenous', 'Yes')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();

            // Total residents for the last 5 years
            $totalResidents = Resident::whereBetween('created_at', [$startDate, $endDate])->count();

            // Prepare the pie chart data and summary for the past 5 years
            $pieChartData = [
                'labels' => ['Senior Citizen', 'Under Age', 'Adult', 'PWD', 'Indigenous'],
                'data' => [$senior_citizen, $under_age, $adult, $pwd, $indigenous]
            ];

            // Initialize summary
            $summary = "In our community for the past 5 years (from {$startDate->format('Y')} to {$endDate->format('Y')}), there are a total of {$totalResidents} residents.";

            if ($totalResidents > 0) {
                $summary .= "{$senior_citizen} are senior citizens (60 years and older). ";
                $summary .= "{$under_age} individuals are under 18 years old. ";
                $summary .= "{$adult} residents fall within the age range of 18 to 59 years. ";
                $summary .= "{$pwd} persons have disabilities (PWD). ";
                $summary .= "{$indigenous} residents are indigenous.";
            } else {
                // If no residents are found
                $summary .= "Currently, there are no residents in the system.";
            }

            // Return the pie chart data and summary for the past 5 years
            return [
                'pieChartData' => $pieChartData,
                'pie_summary' => $summary,
                'totalResidents' => $totalResidents,
                'senior_citizen' => $senior_citizen,
                'under_age' => $under_age,
                'adult' => $adult,
                'pwd' => $pwd,
                'indigenous' => $indigenous,
            ];
        }

        // Default return if no filter matches
        return [];
    }

    public function ageDistribution($filter): array
    {
        // Determine the current year
        $currentYear = date('Y');

        // Initialize counts for age groups
        $under18 = 0;
        $age18To34 = 0;
        $age35To49 = 0;
        $age50To64 = 0;
        $age65AndAbove = 0;

        // Count total residents
        $totalResidents = 0;

        // Determine the time context based on the filter
        if ($filter === 'year') {
            // Get counts for the past 5 years including the current year
            $totalResidents = DB::table('residents')
                ->whereBetween(DB::raw('YEAR(created_at)'), [$currentYear - 5, $currentYear])
                ->count();

            $under18 = DB::table('residents')->where('age', '<', 18)
                ->whereBetween(DB::raw('YEAR(created_at)'), [$currentYear - 5, $currentYear])
                ->count();
            $age18To34 = DB::table('residents')->whereBetween('age', [18, 34])
                ->whereBetween(DB::raw('YEAR(created_at)'), [$currentYear - 5, $currentYear])
                ->count();
            $age35To49 = DB::table('residents')->whereBetween('age', [35, 49])
                ->whereBetween(DB::raw('YEAR(created_at)'), [$currentYear - 5, $currentYear])
                ->count();
            $age50To64 = DB::table('residents')->whereBetween('age', [50, 64])
                ->whereBetween(DB::raw('YEAR(created_at)'), [$currentYear - 5, $currentYear])
                ->count();
            $age65AndAbove = DB::table('residents')->where('age', '>=', 65)
                ->whereBetween(DB::raw('YEAR(created_at)'), [$currentYear - 5, $currentYear])
                ->count();

        } elseif ($filter === 'month') {
            // Get counts for the current year only
            $totalResidents = DB::table('residents')
                ->whereYear('created_at', $currentYear)
                ->count();

            $under18 = DB::table('residents')->where('age', '<', 18)
                ->whereYear('created_at', $currentYear)
                ->count();
            $age18To34 = DB::table('residents')->whereBetween('age', [18, 34])
                ->whereYear('created_at', $currentYear)
                ->count();
            $age35To49 = DB::table('residents')->whereBetween('age', [35, 49])
                ->whereYear('created_at', $currentYear)
                ->count();
            $age50To64 = DB::table('residents')->whereBetween('age', [50, 64])
                ->whereYear('created_at', $currentYear)
                ->count();
            $age65AndAbove = DB::table('residents')->where('age', '>=', 65)
                ->whereYear('created_at', $currentYear)
                ->count();
        }

        // Initialize the summary
        $ageDistributionSummary = "In our community, we have a total of {$totalResidents} residents. ";

        // Add filter context to summary
        if ($filter === 'year') {
            $ageDistributionSummary .= "for the last 5 years up to {$currentYear}, ";
        } elseif ($filter === 'month') {
            $ageDistributionSummary .= "for the year {$currentYear}, ";
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

        // Build the summary report
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
            'totalResidents' => $totalResidents,
        ];
    }


    public function demographicData($filter)
    {
        $currentYear = now()->year;

        if ($filter == 'month') {
            // Get counts for the current year
            $unemployed = Resident::where('occupation', '=', null)
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $employed = Resident::where('occupation', '!=', '')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $single = Resident::where('maritalStatus', '=', 'single')
                ->whereYear('created_at', $currentYear)
                ->count();
            $married = Resident::where('maritalStatus', '=', 'married')
                ->whereYear('created_at', $currentYear)
                ->count();
            $divorced = Resident::where('maritalStatus', '=', 'divorced')
                ->whereYear('created_at', $currentYear)
                ->count();
            $separated = Resident::where('maritalStatus', '=', 'separated')
                ->whereYear('created_at', $currentYear)
                ->count();
            $indigenous = Resident::where('indigenous', '=', 'Yes')
                ->whereYear('created_at', $currentYear)
                ->count();
            $non_indigenous = Resident::where('indigenous', '=', 'No')
                ->whereYear('created_at', $currentYear)
                ->count();
            $averageIncome = Resident::where('MonthlyIncome', '!=', 'No')
                ->whereYear('created_at', $currentYear)
                ->avg('MonthlyIncome');
        } else if ($filter == 'year') {
            // Get counts for the past 5 years
            $unemployed = Resident::where('occupation', '=', null)
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $employed = Resident::where('occupation', '!=', '')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $single = Resident::where('maritalStatus', '=', 'single')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $married = Resident::where('maritalStatus', '=', 'married')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $divorced = Resident::where('maritalStatus', '=', 'divorced')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $separated = Resident::where('maritalStatus', '=', 'separated')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $indigenous = Resident::where('indigenous', '=', 'Yes')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $non_indigenous = Resident::where('indigenous', '=', 'No')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->count();
            $averageIncome = Resident::where('MonthlyIncome', '!=', 'No')
                ->whereBetween('created_at', [now()->subYears(5), now()])
                ->avg('MonthlyIncome');
        } else {

            return [];
        }
        return [
            'unemployed' => $unemployed,
            'employed' => $employed,
            'single' => $single,
            'married' => $married,
            'divorced' => $divorced,
            'separated' => $separated,
            'indigenous' => $indigenous,
            'non_indigenous' => $non_indigenous,
            'averageIncome' => $averageIncome,
        ];
    }

}
