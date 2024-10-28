

<?php $__env->startPush('assets'); ?>
    <link rel="stylesheet" href="/css/admin-css/admin-dashboard.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="table-header row" style="margin-bottom: 25px; margin-top: 25px">
        <div class="title-header col">
            <?php if (isset($component)) { $__componentOriginal5406e8d7771770e2730decca9aaff420 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5406e8d7771770e2730decca9aaff420 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-page-title','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Dashboard <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5406e8d7771770e2730decca9aaff420)): ?>
<?php $attributes = $__attributesOriginal5406e8d7771770e2730decca9aaff420; ?>
<?php unset($__attributesOriginal5406e8d7771770e2730decca9aaff420); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5406e8d7771770e2730decca9aaff420)): ?>
<?php $component = $__componentOriginal5406e8d7771770e2730decca9aaff420; ?>
<?php unset($__componentOriginal5406e8d7771770e2730decca9aaff420); ?>
<?php endif; ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center gap-3">
                <label for="filterDropdown" class="mb-0">Filter by:</label>
                <div class="dropdown">
                    <select id="filterDropdown" class="form-select form-select-sm" aria-label="Filter selection" style="font-size: 14px; border-radius: 0;">
                        <option value="month" selected>Monthly</option>
                        <option value="year">Yearly</option>
                    </select>
                </div>
                
            </div>
        </div>        
        
    </div>
    <div class="box-container mb-4">
        <div class="col box box1">
            <div class="icon-container">
                <i class='bx bx-folder' style="color: #4F46E5"></i>
            </div>
            <div>
                <p class="box-title">Request</p>
                <h1><?php echo e($requestDocuments ? $requestDocuments : 0); ?></h1>
                <p>Total number of Request</p>
            </div>
        </div>
        <div class="col box box2">
            <div class="icon-container">
                <i class='bx bx-error-circle' style="color: #EF4444"></i>
            </div>
            <div>
                <p class="box-title">Complaints</p>
                <h1><?php echo e($complaints_count ? $complaints_count : 0); ?></h1>
                <p>Total number of Complaints</p>
            </div>
        </div>
        <div class="col box box3">
            <div class="icon-container">
                <i class='bx bx-male-female' style="color: #F43F5E"></i>
            </div>
            <div>
                <p class="box-title">Residents</p>
                <h1><?php echo e($residents ? $residents : 0); ?></h1>
                <p>Total number of Residents</p>
            </div>
        </div>
        <div class="col box box4">
            <div class="icon-container">
                <i class='bx bxs-user-detail' style="color: #6D28D9"></i>
            </div>
            <div>
                <p class="box-title">Users</p>
                <h1><?php echo e($users ? $users : 0); ?></h1>
                <p>Total number of Users</p>
            </div>
        </div>
        <div class="col box box5">
            <div class="icon-container">
                <i class='bx bx-accessibility' style="color: #EC4899"></i>
            </div>
            <div>
                <p class="box-title">Senior Citizen</p>
                <h1><?php echo e($senior_citizen ? $senior_citizen : 0); ?></h1>
                <p>Total number of Senior Citizen</p>
            </div>
        </div>
        <div class="col box box6">
            <div class="icon-container">
                <i class='bx bx-child' style="color: #A855F7"></i>
            </div>
            <div>
                <p class="box-title">Under Age</p>
                <h1><?php echo e($under_age ? $under_age : 0); ?></h1>
                <p>Total number of Under Age</p>
            </div>
        </div>
        <div class="col box box7">
            <div class="icon-container">
                <i class='bx bx-body' style="color: #7C3AED"></i>
            </div>
            <div>
                <p class="box-title">Adult</p>
                <h1><?php echo e($adult ? $adult : 0); ?></h1>
                <p>Total number of Adult</p>
            </div>
        </div>
        <div class="col box box8">
            <div class="icon-container">
                <i class='bx bx-handicap' style="color: #3B82F6"></i>
            </div>
            <div>
                <p class="box-title">PWD</p>
                <h1><?php echo e($pwd ? $pwd : 0); ?></h1>
                <p>Total number of PWD</p>
            </div>
        </div>
        <div class="col box box9">
            <div class="icon-container">
                <i class='bx bxs-user-x' style="color: #4f46e5"></i>
            </div>
            <div>
                <p class="box-title">Unemployed</p>
                <h1><?php echo e($demographic['unemployed'] ? $demographic['unemployed']: 0); ?></h1>
                <p>Total number of Unemployed</p>
            </div>
        </div>
        <div class="col box box10">
            <div class="icon-container">
                <i class='bx bx-briefcase-alt' style="color: #3b82f6"></i>
            </div>
            <div>
                <p class="box-title">Employed</p>
                <h1><?php echo e($demographic['employed'] ? $demographic['employed']: 0); ?></h1>
                <p>Total number of Employed</p>
            </div>
        </div>
        <div class="col box box11">
            <div class="icon-container">
                <i class='bx bx-male' style="color: #6D28D9"></i>
            </div>
            <div>
                <p class="box-title">Single</p>
                <h1><?php echo e($demographic['single'] ? $demographic['single'] : 0); ?></h1>
                <p>Total number of Single</p>
            </div>
        </div>
        <div class="col box box12">
            <div class="icon-container">
                <i class='bx bx-male-female' style="color: #a855f7"></i>
            </div>
            <div>
                <p class="box-title">Married</p>
                <h1><?php echo e($demographic['married'] ? $demographic['married'] : 0); ?></h1>
                <p>Total number of Married</p>
            </div>
        </div>
        <div class="col box box13">
            <div class="icon-container">
                <i class='bx bx-angry' style="color: #3b82f6"></i>
            </div>
            <div>
                <p class="box-title">Divorced</p>
                <h1><?php echo e($demographic['divorced'] ? $demographic['divorced'] : 0); ?></h1>
                <p>Total number of Divorced</p>
            </div>
        </div>
        <div class="col box box15">
            <div class="icon-container">
                <i class='bx bx-body'  style="color: #06b6d4"></i>
            </div>
            <div>
                <p class="box-title">Indigenous</p>
                <h1><?php echo e($demographic['indigenous'] ? $demographic['indigenous'] : 0); ?></h1>
                <p>Total number of Indigenous</p>
            </div>
        </div>

    </div>
    <div class="charts">
        <div class="row bar-chart" style="width: 100%">
            <canvas id="barChart"></canvas>
            <p><?php echo $summary; ?> </p>
        </div>
    </div>
    <div class="charts mt-3">
        <div class="row">
            <div class="col" style="width: 90%">
                <canvas id="lineChart" style="height: 400px;"></canvas> <!-- Set a height for the canvas -->
                <p class="chart-summary"><?php echo $lineChartData['lineChartSummary'] ?? ''; ?></p> <!-- Use a class for styling -->
            </div>
        </div>
    </div>
    
    <div class="residentChart mt-3 mb-3 row d-flex" style="padding: 25px; background-color: white; margin-left: 0px; margin-right:0px;">
        <div class="col" style="width: 60%">
            <canvas id="ageGroupHorizontalBarChart" width="800" height="600"></canvas>
        </div>
        <div class="col d-flex justify-cotent-center align-items-center flex-column" style="width: 40%">
            <h3 style="font-size: 16px">Distribution Table</h3>
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
                            <td><?php echo e($ageDistribution['under18']); ?></td>
                            <td>
                                <?php if($ageDistribution['totalResidents'] > 0): ?>
                                    <?php echo e(round(($ageDistribution['under18'] / $ageDistribution['totalResidents']) * 100, 2)); ?>%
                                <?php else: ?>
                                    0%
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>18 to 34</td>
                            <td><?php echo e($ageDistribution['age18To34']); ?></td>
                            <td>
                                <?php if($ageDistribution['totalResidents'] > 0): ?>
                                    <?php echo e(round(($ageDistribution['age18To34'] / $ageDistribution['totalResidents']) * 100, 2)); ?>%
                                <?php else: ?>
                                    0%
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>35 to 49</td>
                            <td><?php echo e($ageDistribution['age35To49']); ?></td>
                            <td>
                                <?php if($ageDistribution['totalResidents'] > 0): ?>
                                    <?php echo e(round(($ageDistribution['age35To49'] / $ageDistribution['totalResidents']) * 100, 2)); ?>%
                                <?php else: ?>
                                    0%
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>50 to 64</td>
                            <td><?php echo e($ageDistribution['age50To64']); ?></td>
                            <td>
                                <?php if($ageDistribution['totalResidents'] > 0): ?>
                                    <?php echo e(round(($ageDistribution['age50To64'] / $ageDistribution['totalResidents']) * 100, 2)); ?>%
                                <?php else: ?>
                                    0%
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>65 and Above</td>
                            <td><?php echo e($ageDistribution['age65AndAbove']); ?></td>
                            <td>
                                <?php if($ageDistribution['totalResidents'] > 0): ?>
                                    <?php echo e(round(($ageDistribution['age65AndAbove'] / $ageDistribution['totalResidents']) * 100, 2)); ?>%
                                <?php else: ?>
                                    0%
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <p><?php echo e($ageDistribution['ageDistributionSummary'] ?? ''); ?></p>
    </div>
    <div class="residentChart row" style="background-color: #fff; padding:25px; margin:5px">
        <div class="col" style="width: 40%">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="col d-flex justify-content-center align-items-center flex-column" style="width: 60%">
            <h3 style="font-size: 16px">Distribution Table</h3>
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
                        <?php
                            $totalResidents = $totalResidents; // Already passed from the controller
                        ?>
            
                        <tr>
                            <td>Senior Citizens (60+ years)</td>
                            <td><?php echo e($senior_citizen); ?></td>
                            <td><?php echo e($totalResidents > 0 ? round(($senior_citizen / $totalResidents) * 100, 2) . '%' : '0%'); ?></td>
                        </tr>
                        <tr>
                            <td>Under Age (under 18 years)</td>
                            <td><?php echo e($under_age); ?></td>
                            <td><?php echo e($totalResidents > 0 ? round(($under_age / $totalResidents) * 100, 2) . '%' : '0%'); ?></td>
                        </tr>
                        <tr>
                            <td>Adults (18 to 59 years)</td>
                            <td><?php echo e($adult); ?></td>
                            <td><?php echo e($totalResidents > 0 ? round(($adult / $totalResidents) * 100, 2) . '%' : '0%'); ?></td>
                        </tr>
                        <tr>
                            <td>Persons with Disabilities (PWD)</td>
                            <td><?php echo e($pwd); ?></td>
                            <td><?php echo e($totalResidents > 0 ? round(($pwd / $totalResidents) * 100, 2) . '%' : '0%'); ?></td>
                        </tr>
                        <tr>
                            <td>Indigenous Residents</td>
                            <td><?php echo e($indigenous); ?></td>
                            <td><?php echo e($totalResidents > 0 ? round(($indigenous / $totalResidents) * 100, 2) . '%' : '0%'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>                   
        </div>
        <p><?php echo e($pieChartDataSummary); ?></p>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer'); ?>
    <?php if (isset($component)) { $__componentOriginal77270b1c95fd7742f390c98b291675dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal77270b1c95fd7742f390c98b291675dd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-components.admin-footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-components.admin-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal77270b1c95fd7742f390c98b291675dd)): ?>
<?php $attributes = $__attributesOriginal77270b1c95fd7742f390c98b291675dd; ?>
<?php unset($__attributesOriginal77270b1c95fd7742f390c98b291675dd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal77270b1c95fd7742f390c98b291675dd)): ?>
<?php $component = $__componentOriginal77270b1c95fd7742f390c98b291675dd; ?>
<?php unset($__componentOriginal77270b1c95fd7742f390c98b291675dd); ?>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var barChartData = <?php echo json_encode($barChartData, 15, 512) ?>; // Get data from PHP
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
                    text: 'Requested Documents',
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
        const lineChartData = <?php echo json_encode($lineChartData['lineChartData'], 15, 512) ?>; 

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
                        text: 'Complaints',
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
            const pieChartData = <?php echo json_encode($pieChartData, 15, 512) ?>;

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
        data: [<?php echo json_encode($ageDistribution['under18'], 15, 512) ?>, <?php echo json_encode($ageDistribution['age18To34'], 15, 512) ?>, <?php echo json_encode($ageDistribution['age35To49'], 15, 512) ?>, <?php echo json_encode($ageDistribution['age50To64'], 15, 512) ?>, <?php echo json_encode($ageDistribution['age65AndAbove'], 15, 512) ?>],

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
            window.location.href = `<?php echo e(route('admin.dashboard')); ?>?filter=${selectedFilter}`;
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.admin-components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\bms\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>