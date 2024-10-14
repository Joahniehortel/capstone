@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-dashboard.css">
@endpush
@section('content')
    <div class="table-header row" style="margin-bottom: 25px; margin-top: 25px">
        <div class="col">
            <x-admin-components.admin-page-title>Dashboard</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <div class="d-flex justify-content-end align-items-center gap-3">
                <label for="dropdown">Filter by:</label>
                <div class="dropdown d-flex align-items-center justify-content-center">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="font-size: 14px; border-radius: 0px">
                        <option value="1">Months</option>
                        <option value="2">Year</option>
                    </select>
                </div>
                <button class="btn btn-primary"><i class='bx bx-export'></i> Export Data</button>
            </div>
        </div>
    </div>
    <div class="box-container mb-4">
        <div class="col box box1">
            <i class='bx bx-folder'></i>
            <div>
                <p>Request</p>
                <h1>{{ $requestDocuments }}</h1>
            </div>
        </div>
        <div class="col box box2">
            <i class='bx bx-error-circle'></i>
            <div>
                <p>Complaints</p>
                <h1>{{ $complaints_count }}</h1>
            </div>
        </div>
        <div class="col box box3">
            <i class='bx bx-male-female'></i>
            <div>
                <p>Residents</p>
                <h1>{{ $residents }}</h1>
            </div>
        </div>
        <div class="col box box4">
            <i class='bx bxs-user-detail'></i>
            <div>
                <p>Users</p>
                <h1>{{ $users }}</h1>
            </div>
        </div>
        <div class="col box box5">
            <i class='bx bx-accessibility'></i>
            <div>
                <p>Senior Citizen</p>
                <h1>0</h1>
            </div>
        </div>
        <div class="col box box6">
            <i class='bx bx-child'></i>
            <div>
                <p>Under Age</p>
                <h1>{{ $under_age }}</h1>
            </div>
        </div>
        <div class="col box box7">
            <i class='bx bx-body'></i>
            <div>
                <p>Adult</p>
                <h1>{{ $adult }}</h1>
            </div>
        </div>
        <div class="col box box8">
            <i class='bx bx-handicap'></i>
            <div>
                <p>PWD</p>
                <h1>{{ $pwd }}</h1>
            </div>
        </div>
        <div class="col box box9">
            <i class='bx bxs-user-x'></i>
            <div>
                <p>Unemployed</p>
                <h1>15</h1>
            </div>
        </div>
        <div class="col box box10">
            <i class='bx bx-briefcase-alt'></i>
            <div>
                <p>Employed</p>
                <h1>35</h1>
            </div>
        </div>
        <div class="col box box11">
            <i class='bx bx-male'></i>
            <div>
                <p>Single</p>
                <h1>12</h1>
            </div>
        </div>
        <div class="col box box12">
            <i class='bx bx-male-female'></i>
            <div>
                <p>Married</p>
                <h1>38</h1>
            </div>
        </div>
        <div class="col box box13">
            <i class='bx bx-angry'></i>
            <div>
                <p>Divorced</p>
                <h1>50</h1>
            </div>
        </div>
        <div class="col box box14">
            <i class='bx bx-user-voice'></i>
            <div>
                <p>Bisaya</p>
                <h1>{{ $pwd }}</h1>
            </div>
        </div>
        <div class="col box box15">
            <i class='bx bx-body'></i>
            <div>
                <p>Indigenous</p>
                <h1>{{ $pwd }}</h1>
            </div>
        </div>
        <div class="col box box16">
            <i class='bx bx-dollar-circle'></i>
            <div>
                <p>Avg. Income</p>
                <h1>{{ $pwd }}</h1>
            </div>
        </div>
    </div>
    <div class="charts">
        <div class="row bar-chart" style="width: 100%">
            <canvas id="barChart"></canvas>
            <p>The highest number of complaints occurred in February, with 11 complaints, while October, November, and December had no complaints at all. On average, there were about 4.42 complaints per month.</p>
        </div>
    </div>
    <div class="charts mt-3">
        <div class="row">
            <div class="col">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
    <div class="mt-3 mb-3" style="background-color: #fff; padding:25px">
        <div class="row">
            <div class="col pieChart" style="width: 40%">
                <div class="col">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
            <div class="col" style="width: 60%;">
                <canvas id="ageGroupHorizontalBarChart" width="800" height="600"></canvas>  <!-- Set width and height -->
            </div>
        </div>        
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
                    stacked: true 
                },
                x: {
                    stacked: true 
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
        const lineChartData = @json($lineChartData); // Make sure this variable is set correctly in your controller

        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: lineChartData.labels,
                datasets: [{
                    data: lineChartData.data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
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
        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChartData = @json($pieChartData);
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: pieChartData.labels,
                datasets: [{
                    label: 'Demographic Data',
                    data: pieChartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
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
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('ageGroupHorizontalBarChart').getContext('2d');

        const ageGroupData = {
            labels: ['0-18', '19-35', '36-50', '51-65', '66+'], 
            datasets: [{
                label: 'Number of Residents',  
                data: [50, 70, 30, 20, 10],  
                backgroundColor: 'rgba(75, 192, 192, 0.6)',  
                borderColor: 'rgba(75, 192, 192, 1)',  
                borderWidth: 1,
            }]
        };
        const ageGroupHorizontalBarChart = new Chart(ctx, {
            type: 'bar',  
            data: ageGroupData,
            options: {
            indexAxis: 'y',  
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
@endpush
