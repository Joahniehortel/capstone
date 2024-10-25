@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
@endpush
@section('content')
    <div class="table-header row" style="margin-bottom: 25px; margin-top: 25px">
        <div class="title-header col">
            <x-admin-components.admin-page-title>Dashboard</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="col d-flex justify-content-end align-items-center">
            <div class="col d-flex justify-content-end align-items-center">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <label for="dropdown">Filter by:</label>
                    <div class="dropdown d-flex align-items-center justify-content-center">
                        <select id="filterDropdown" class="form-select form-select-sm" aria-label=".form-select-sm example" style="font-size: 14px; border-radius: 0px">
                            <option value="year">This Year</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                    <button class="btn btn-info" id="filterBtn">Export PDF</button>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="box-container mb-4">
        <div class="col box box1">
            <div class="icon-container">
                <i class='bx bx-folder' style="color: #4F46E5"></i>
            </div>
            <div>
                <p class="box-title">Request</p>
                <h1>{{ $requestDocuments ? $requestDocuments : 0}}</h1>
                <p>Total number of Request</p>
            </div>
        </div>
        <div class="col box box2">
            <div class="icon-container">
                <i class='bx bx-error-circle' style="color: #EF4444"></i>
            </div>
            <div>
                <p class="box-title">Complaints</p>
                <h1>{{ $complaints_count ? $complaints_count : 0}}</h1>
                <p>Total number of Complaints</p>
            </div>
        </div>
        <div class="col box box3">
            <div class="icon-container">
                <i class='bx bx-male-female' style="color: #F43F5E"></i>
            </div>
            <div>
                <p class="box-title">Residents</p>
                <h1>{{ $residents ? $residents : 0 }}</h1>
                <p>Total number of Residents</p>
            </div>
        </div>
        <div class="col box box4">
            <div class="icon-container">
                <i class='bx bxs-user-detail' style="color: #6D28D9"></i>
            </div>
            <div>
                <p class="box-title">Users</p>
                <h1>{{ $users ? $users : 0 }}</h1>
                <p>Total number of Users</p>
            </div>
        </div>
        <div class="col box box5">
            <div class="icon-container">
                <i class='bx bx-accessibility' style="color: #EC4899"></i>
            </div>
            <div>
                <p class="box-title">Senior Citizen</p>
                <h1>{{ $senior_citizen ? $senior_citizen : 0 }}</h1>
                <p>Total number of Senior Citizen</p>
            </div>
        </div>
        <div class="col box box6">
            <div class="icon-container">
                <i class='bx bx-child' style="color: #A855F7"></i>
            </div>
            <div>
                <p class="box-title">Under Age</p>
                <h1>{{ $under_age ? $under_age : 0 }}</h1>
                <p>Total number of Under Age</p>
            </div>
        </div>
        <div class="col box box7">
            <div class="icon-container">
                <i class='bx bx-body' style="color: #7C3AED"></i>
            </div>
            <div>
                <p class="box-title">Adult</p>
                <h1>{{ $adult ? $adult : 0 }}</h1>
                <p>Total number of Adult</p>
            </div>
        </div>
        <div class="col box box8">
            <div class="icon-container">
                <i class='bx bx-handicap' style="color: #3B82F6"></i>
            </div>
            <div>
                <p class="box-title">PWD</p>
                <h1>{{ $pwd ? $pwd : 0}}</h1>
                <p>Total number of PWD</p>
            </div>
        </div>
        <div class="col box box9">
            <div class="icon-container">
                <i class='bx bxs-user-x' style="color: #4f46e5"></i>
            </div>
            <div>
                <p class="box-title">Unemployed</p>
                <h1>{{$demographic['unemployed'] ? $demographic['unemployed']: 0 }}</h1>
                <p>Total number of Unemployed</p>
            </div>
        </div>
        <div class="col box box10">
            <div class="icon-container">
                <i class='bx bx-briefcase-alt' style="color: #3b82f6"></i>
            </div>
            <div>
                <p class="box-title">Employed</p>
                <h1>{{$demographic['employed'] ? $demographic['employed']: 0 }}</h1>
                <p>Total number of Employed</p>
            </div>
        </div>
        <div class="col box box11">
            <div class="icon-container">
                <i class='bx bx-male' style="color: #6D28D9"></i>
            </div>
            <div>
                <p class="box-title">Single</p>
                <h1>{{ $demographic['single'] ? $demographic['single'] : 0}}</h1>
                <p>Total number of Single</p>
            </div>
        </div>
        <div class="col box box12">
            <div class="icon-container">
                <i class='bx bx-male-female' style="color: #a855f7"></i>
            </div>
            <div>
                <p class="box-title">Married</p>
                <h1>{{ $demographic['married'] ? $demographic['married'] : 0}}</h1>
                <p>Total number of Married</p>
            </div>
        </div>
        <div class="col box box13">
            <div class="icon-container">
                <i class='bx bx-angry' style="color: #3b82f6"></i>
            </div>
            <div>
                <p class="box-title">Divorced</p>
                <h1>{{ $demographic['divorced'] ? $demographic['divorced'] : 0}}</h1>
                <p>Total number of Divorced</p>
            </div>
        </div>
        <div class="col box box15">
            <div class="icon-container">
                <i class='bx bx-body'  style="color: #06b6d4"></i>
            </div>
            <div>
                <p class="box-title">Indigenous</p>
                <h1>{{ $demographic['indigenous'] ? $demographic['indigenous'] : 0}}</h1>
                <p>Total number of Indigenous</p>
            </div>
        </div>

    </div>
    <div class="charts">
        <div class="row bar-chart" style="width: 100%">
            <canvas id="barChart"></canvas>
            <p>{!! $summary !!} </p>
        </div>
    </div>
    <div class="charts mt-3">
        <div class="row">
            <div class="col" style="width: 90%">
                <canvas id="lineChart" style="height: 400px;"></canvas> <!-- Set a height for the canvas -->
                <p class="chart-summary">{!! $lineChartData['lineChartSummary'] ?? '' !!}</p> <!-- Use a class for styling -->
            </div>
        </div>
    </div>
    
    <div class="residentChart mt-3 mb-3 row d-flex" style="padding: 25px; background-color: white; margin-left: 0px; margin-right:0px;">
        <div class="col" style="width: 60%">
            <canvas id="ageGroupHorizontalBarChart" width="800" height="600"></canvas>
        </div>
        <div class="col" style="width: 40%">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Age Group</th>
                        <th>Number of Residents</th>
                        <th>Percentage (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <tr>
                            <td>Under 18</td>
                            <td>{{ $ageDistribution['under18'] }}</td>
                            <td>
                                @if($ageDistribution['totalResidents'] > 0)
                                    {{ round(($ageDistribution['under18'] / $ageDistribution['totalResidents']) * 100, 2) }}%
                                @else
                                    0%
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>18 to 34</td>
                            <td>{{ $ageDistribution['age18To34'] }}</td>
                            <td>
                                @if($ageDistribution['totalResidents'] > 0)
                                    {{ round(($ageDistribution['age18To34'] / $ageDistribution['totalResidents']) * 100, 2) }}%
                                @else
                                    0%
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>35 to 49</td>
                            <td>{{ $ageDistribution['age35To49'] }}</td>
                            <td>
                                @if($ageDistribution['totalResidents'] > 0)
                                    {{ round(($ageDistribution['age35To49'] / $ageDistribution['totalResidents']) * 100, 2) }}%
                                @else
                                    0%
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>50 to 64</td>
                            <td>{{ $ageDistribution['age50To64'] }}</td>
                            <td>
                                @if($ageDistribution['totalResidents'] > 0)
                                    {{ round(($ageDistribution['age50To64'] / $ageDistribution['totalResidents']) * 100, 2) }}%
                                @else
                                    0%
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>65 and Above</td>
                            <td>{{ $ageDistribution['age65AndAbove'] }}</td>
                            <td>
                                @if($ageDistribution['totalResidents'] > 0)
                                    {{ round(($ageDistribution['age65AndAbove'] / $ageDistribution['totalResidents']) * 100, 2) }}%
                                @else
                                    0%
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    
            </table>
        </div>
        <p>{{  $ageDistribution['ageDistributionSummary'] ?? '' }}</p>
    </div>
    <div class="residentChart row" style="background-color: #fff; padding:25px; margin:5px">
        <div class="col" style="width: 40%">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="col" style="width: 60%">
            <div class="container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Count</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalResidents = $totalResidents; // Already passed from the controller
                        @endphp
            
                        <tr>
                            <td>Senior Citizens (60+ years)</td>
                            <td>{{ $senior_citizen }}</td>
                            <td>{{ $totalResidents > 0 ? round(($senior_citizen / $totalResidents) * 100, 2) . '%' : '0%' }}</td>
                        </tr>
                        <tr>
                            <td>Under Age (under 18 years)</td>
                            <td>{{ $under_age }}</td>
                            <td>{{ $totalResidents > 0 ? round(($under_age / $totalResidents) * 100, 2) . '%' : '0%' }}</td>
                        </tr>
                        <tr>
                            <td>Adults (18 to 59 years)</td>
                            <td>{{ $adult }}</td>
                            <td>{{ $totalResidents > 0 ? round(($adult / $totalResidents) * 100, 2) . '%' : '0%' }}</td>
                        </tr>
                        <tr>
                            <td>Persons with Disabilities (PWD)</td>
                            <td>{{ $pwd }}</td>
                            <td>{{ $totalResidents > 0 ? round(($pwd / $totalResidents) * 100, 2) . '%' : '0%' }}</td>
                        </tr>
                        <tr>
                            <td>Indigenous Residents</td>
                            <td>{{ $indigenous }}</td>
                            <td>{{ $totalResidents > 0 ? round(($indigenous / $totalResidents) * 100, 2) . '%' : '0%' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>                   
        </div>
        <p>{{ $pieChartDataSummary}}</p>
    </div>
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush

@push('scripts')

<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var barChartData = @json($barChartData); // Get data from PHP
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: barChartData.labels,
            datasets: barChartData.datasets
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                },
                x: {
                    stacked: false, 
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Monthly Requested Documents',
                    font: {
                        size: 16
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>
    <script>
            document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChartData = @json($lineChartData['lineChartData']); 

        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: lineChartData.labels,
                datasets: [{
                    label: 'Complaints', 
                    data: lineChartData.data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true, 
                    tension: 0.1, 
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'No. of complaints',
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Months'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Complaints',
                        font: {
                            size: 16
                        }
                    }
                }
            }
        });
    });
</script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
            const ctxPie = document.getElementById('pieChart').getContext('2d');
            const pieChartData = @json($pieChartData);

            if (pieChartData.data.length > 0) {
                const pieChart = new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: pieChartData.labels,
                        datasets: [{
                            label: 'Demographic Data',
                            data: pieChartData.data,
                            backgroundColor: pieChartData.data.map((_, index) => {
                                const colors = [
                                    'rgba(255, 99, 132, 1)', // Existing color (Red)
                                    'rgba(54, 162, 235, 1)', // Existing color (Blue)
                                    'rgba(255, 206, 86, 1)', // Existing color (Yellow)
                                    'rgba(75, 192, 192, 1)', // Existing color (Teal)
                                    'rgba(153, 102, 255, 1)'
                                ];
                                return colors[index % colors.length]; // Loop through colors
                            }),
                            borderColor: pieChartData.data.map((_, index) => {
                                const colors = [
                                    'rgba(255, 99, 132, 1)', // Existing color (Red)
                                    'rgba(54, 162, 235, 1)', // Existing color (Blue)
                                    'rgba(255, 206, 86, 1)', // Existing color (Yellow)
                                    'rgba(75, 192, 192, 1)', // Existing color (Teal)
                                    'rgba(153, 102, 255, 1)' 
                                ];

                                return colors[index % colors.length]; // Loop through colors
                            }),
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Demographic Distribution',
                                font: {
                                    size: 16
                                }
                            },
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                console.warn('No data available for the pie chart.');   
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('ageGroupHorizontalBarChart').getContext('2d');

    const ageGroupData = {
        labels: ['0-18', '19-35', '36-50', '51-65', '66+'],
    datasets: [{
        label: 'Number of Residents',  // Label for the dataset
        data: [@json($ageDistribution['under18']), @json($ageDistribution['age18To34']), @json($ageDistribution['age35To49']), @json($ageDistribution['age50To64']), @json($ageDistribution['age65AndAbove'])],

        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']  // Colors for each age group
        }]
    };


    const ageGroupHorizontalBarChart = new Chart(ctx, {
        type: 'bar',  
        data: ageGroupData,
        options: {
            indexAxis: 'y',  // Horizontal bar chart
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Residents',
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: 'Age Groups',  
                    },
                },
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Age Group Distribution', 
                    font: {
                        size: 16,
                    },
                },
                legend: {
                    display: true,
                },
            },
        }
    });
});

    </script>
    <script>
        document.getElementById('exportBtn').addEventListener('click', () => {
            html2canvas(document.getElementById('barChart')).then(canvas => {
                const pdf = new jsPDF();
                const imgData = canvas.toDataURL('image/png');
                pdf.addImage(imgData, 'PNG', 10, 10);
                pdf.save('chart.pdf'); // Save the PDF
            });
        });
        
    </script>
    <script>
        // Get the current filter value from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const filter = urlParams.get('filter') || 'year'; // Default to 'year' if no filter in the URL

        // Set the selected option in the dropdown based on the filter value
        document.getElementById('filterDropdown').value = filter;

        // Handle filter change event
        document.getElementById('filterDropdown').addEventListener('change', function() {
            const selectedFilter = this.value;
            window.location.href = `{{ route('admin.dashboard') }}?filter=${selectedFilter}`;
        });
    </script>
@endpush
