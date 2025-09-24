<?php $__env->startSection('content'); ?>

<body>
    <div class="container-fluid">
        <div class="mt-2 py-2">
            <div class="card shadow">
                <div class="card-body">
                    Welcome to Water Billing System, <?php echo e(Auth::user()->name); ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"><i class="bi bi-coin"></i> Cost</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h3>Php <?php echo e($cost->cost); ?></h3>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <span>/cubic meter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"><i class="bi bi-graph-up-arrow"></i> Sales</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?php echo e(number_format($sumPaidAmount,2)); ?></h3>
                                <span>Php</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"><i class="bi bi-people"></i> Total Customer </i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?php echo e($customers); ?></h3>
                                <span>Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"><i class="bi bi-person"></i> User </i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3><?php echo e($users); ?></h3>
                                <span>Admins</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="py-12 m-4">
        <div class="row">
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        COST PER CUBIC METER
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2></h2></p>
                        
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                       
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2></h2></p>
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                       
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2></h2></p>
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL NUMBER OF USER
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2><?php echo e($users); ?></h2></p>
                        
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
        </div> -->
</body>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\waterbilling\resources\views/dashboard.blade.php ENDPATH**/ ?>