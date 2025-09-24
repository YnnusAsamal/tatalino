<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Statement</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         
         @media  print {
            @page  {
                size: landscape;
            }
                
                html, body {
                    width: 100%;
                    height: 100%;
                    margin: 0;
                    padding: 0;
                }
                
                .dontPrint {
                    display: none;
                }
            }
        
        body {
                /* background-color: #50a9e3;
                background-image: 
                    radial-gradient(at 47% 33%, hsl(240.28, 77%, 40%) 0, transparent 59%), 
                    radial-gradient(at 82% 65%, hsl(198.00, 100%, 50%) 0, transparent 55%); */

            }
        h3, h5, p {
            text-align: center;
            }
        .main-sec {
            width: 80%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            backdrop-filter: blur(12px) saturate(97%);
            -webkit-backdrop-filter: blur(12px) saturate(97%);
            background-color: rgba(238, 214, 214, 0.78);
            border-radius: 0px;
            border: 1px solid rgba(209, 213, 219, 0.3);
            }
        
    </style>
</head>
<body>
    <div class="row mt-2">
        <div class="col">
            <div class="btn-group">
                <button onclick="window.print();" class="dontPrint btn btn-info">
                Download
                </button>
                <a href="<?php echo e(route('consumptions.index')); ?>" class="dontPrint btn btn-danger">Back</a>
            </div>
        </div>
    </div>
    <div class="main-sec mt-3">
        <main>
            <section class="header-sec">
                <h3>Water Billing System</h3>
                <h5>Billing Statement</h5>
            </section>
            <br>
            <hr>
            <section class="container-fluid">
                <div class="row">
                    <div class="col">
                        <label for="">REFERENCE NUMBER:</label> <?php echo e($consumptions->referenceNum); ?>

                    </div>
                    <div class="col">
                        <label for="">Date Printed:</label> <?php echo e(date('Y-m-d')); ?>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                    <h4>Customer Details</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Customer Name:</label> <?php echo e($consumptions->customer->firstname); ?> <?php echo e($consumptions->customer->lastname); ?>

                    </div>
                    <div class="col">
                       <label for="">Address:</label> <?php echo e($consumptions->customer->address); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Meter Number:</label> <?php echo e($consumptions->customer->meterNumber); ?> 
                    </div>
                    <div class="col">
                       <label for="">Contact Number:</label> <?php echo e($consumptions->customer->contactNumber); ?>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for=""><strong>PREVIOUS CONSUMPTION</strong></label>
                        <div class="table table-responsive">
                            <table class="table table-bordered table-condense">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>    
                                        <th>Date</th>
                                        <th>Total Consumption</th>
                                        <th>Amount(Php)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $prevCons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($prev->dateCons); ?></td>
                                        <td><?php echo e($prev->totalCons); ?> cubic meter</td>
                                        <td>Php <?php echo e(number_format($prev->amountCons,2)); ?></td>
                                        <td><?php echo e($prev->statusCons); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                            <h3>Consumption Details</h3>
                            <!-- Display consumption details here -->

                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    
                        <div class="card mb-2">
                            <div class="row">
                                <div class="col">
                                <label for=""><h4> CURRENT READING: <?php echo e($consumptions->totalCons); ?> cubic meter</h4></label>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4 class="bg-red">TOTAL AMOUNT: Php <?php echo e(number_format($consumptions->amountCons,2)); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script>
        var ctx = document.getElementById('monthlyChart').getContext('2d');
        var labels = <?php echo json_encode($monthlyConsumption->keys()); ?>;
        var data = <?php echo json_encode($monthlyConsumption->values()); ?>;

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Consumption',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- <script>
        // Assuming you have passed the $monthlyConsumption data to the view
        var monthlyData = <?php echo json_encode($monthlyConsumption); ?>;

        var ctx = document.getElementById('monthlyChart').getContext('2d');
        var labels = Object.keys(monthlyData);
        var values = Object.values(monthlyData);

        var chart = new Chart(ctx, {
            type: 'bar', // Use 'bar' for a bar chart, or 'line' for a line chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Consumption',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Adjust colors as needed
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> -->
</body>
</html><?php /**PATH C:\wamp64\www\waterbilling\resources\views/consumptions/show.blade.php ENDPATH**/ ?>