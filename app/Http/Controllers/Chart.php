<?php

namespace App\Http\Controllers;

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
    public function barChart()
    {
        $lineChartData = $this->lineChart();
        $pieChartData = $this->pieChart();
        
        $colors = [
            'Barangay Certificate' => 'rgba(255, 99, 132, 0.6)', 
            'Certificate of Indigency' => 'rgba(54, 162, 235, 0.6)', 
            'Special Permits' => 'rgba(255, 206, 86, 0.6)', 
            'Barangay Clearance' => 'rgba(75, 192, 192, 0.6)' 
        ];
        $document_request_monthly_counts = [];

        $weeklyBarChartData = [
            'labels' => [
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // January
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // February
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // March
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // April
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // May
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // June
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // July
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // August
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // September
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // October
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // November
                'Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', // December
            ],
            'data' => [
                1, 1, 1, 1, 1, // January
                1, 1, 1, 1, 1, // February
                1, 1, 1, 1, 1, // March
                1, 1, 1, 1, 1, // April
                1, 1, 1, 1, 1, // May
                1, 1, 1, 1, 1, // June
                1, 1, 1, 1, 1, // July
                1, 1, 1, 1, 1, // August
                1, 1, 1, 1, 1, // September
                1, 1, 1, 1, 1, // October
                1, 1, 1, 1, 1, // November
                1, 1, 1, 1, 1, // December
            ],
        ];
        foreach($this->monthNames as $month => $month_name){
            $document_request_monthly_counts['Barangay Certificate'][$month_name] = DB::table('document_requests')
                                    ->where('document_requests.request_file_name', 'Barangay Certificate')
                                    ->whereYear('date_requested', 2024)
                                    ->whereMonth('date_requested', $month)
                                    ->count();
            $document_request_monthly_counts['Certificate of Indigency'][$month_name] = DB::table('document_requests')
                                    ->where('document_requests.request_file_name', 'Certificate of Indigency')
                                    ->whereYear('date_requested', 2024)
                                    ->whereMonth('date_requested', $month)
                                    ->count();                         
            $document_request_monthly_counts['Special Permits'][$month_name] = DB::table('document_requests')
                                    ->where('document_requests.request_file_name', 'Special Permits')
                                    ->whereYear('date_requested', 2024)
                                    ->whereMonth('date_requested', $month)
                                    ->count();
            $document_request_monthly_counts['Barangay Clearance'][$month_name] = DB::table('document_requests')
                                    ->where('document_requests.request_file_name', 'Barangay Clearance')
                                    ->whereYear('date_requested', 2024)
                                    ->whereMonth('date_requested', $month)
                                    ->count();
        }                 
        $barChartData = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'datasets' => []
        ];
        foreach ($document_request_monthly_counts as $document => $counts) {
            $barChartData['datasets'][] = [
                'label' => $document,
                'data' => $counts, // Counts for each month
                'backgroundColor' => $colors[$document], 
                'borderColor' => $colors[$document],
                'borderWidth' => 1,
            ];
        }
        $requestDocuments = DB::table('document_requests')->count();
        $residents = DB::table('residents')->count();
        $users  = DB::table('users')->count();
        $complaints_count = DB::table('complaints')->count();

        return view('admin.dashboard', [
            'lineChartData' => $lineChartData,
            'pieChartData' => $pieChartData['pieChartData'],
            'barChartData' => $barChartData,
            'senior_citizen' => $pieChartData['senior_citizen'],
            'adult' => $pieChartData['adult'],
            'pwd' => $pieChartData['pwd'],
            'under_age' => $pieChartData['under_age'],
            'requestDocuments' => $requestDocuments,
            'residents' => $residents,
            'users' => $users,
            'complaints_count' => $complaints_count,
        ]);
    }

    public function lineChart(){
        $complaints_monthly_counts = [];
        foreach ($this->monthNames as $month_number => $month_name) {
            $complaints_monthly_counts[$month_name] = DB::table('complaints')
                ->whereYear('created_at', 2024)
                ->whereMonth('created_at', $month_number) 
                ->count();
        }
        $lineChartData = [
            'title' => 'Monthly Number of Complaints',
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            'data' => array_values($complaints_monthly_counts), 
        ];
    
        return $lineChartData;
    }
    public function pieChart(){
        $senior_citizen = DB::table('residents')
            ->where('age', '>=', 60)
            ->count();
        $under_age = DB::table('residents')
            ->where('age', '<', 18)
            ->count();
        $adult = DB::table('residents')
            ->whereBetween('age', [18, 59])
            ->count();

        $pwd = DB::table('residents')->where('pwd', 'YES')->count();
        $pieChartData = [
            'labels' => ['Senior Citizen', 'Under Age', 'Adult', 'PWD'],
            'data' => [ $senior_citizen, $under_age, $adult, $pwd]
        ];

        return [
            'pieChartData' => $pieChartData,
            'senior_citizen' => $senior_citizen,
            'under_age' => $under_age,
            'pwd'=> $pwd,
            'adult' => $adult
        ];
    }
}
