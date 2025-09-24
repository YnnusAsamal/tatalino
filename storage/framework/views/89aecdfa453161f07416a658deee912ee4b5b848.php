
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header"><h3>Payment Form</h3></div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="">REFERENCE NUMBER:</label> <?php echo e($consumptions->referenceNum); ?>

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
                    <label for="">Customer Name:</label> <?php echo e($consumptions->firstname); ?> <?php echo e($consumptions->lastname); ?>

                </div>
                <div class="col">
                    <label for="">Address:</label> <?php echo e($consumptions->address); ?>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Meter Number:</label> <?php echo e($consumptions->meterNumber); ?> 
                </div>
                <div class="col">
                    <label for="">Contact Number:</label> <?php echo e($consumptions->contactNumber); ?>

                </div>
            </div>
            <hr>
             <div class="row">
                <div class="col">
                    <h4>Payment Details</h4>
                </div>
             </div>
             <div class="row">
                <div class="col">
                    <form action="<?php echo e(route('consumptions.payment', $consumptions->id)); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="datePayment" id="" value="<?php echo e(date('Y-m-d')); ?>">
                        <div class="table table-responsive text-center">
                            <table class="table table-condense table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date Consumption</th>
                                        <th>Total Consumption(cubic meter)</th>
                                        <th>Status</th>
                                        <th>Amount (Php)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo e($consumptions->dateCons); ?></td>
                                        <td><?php echo e($consumptions->totalCons); ?></td>
                                        <td>
                                            <?php if($consumptions->statusCons =='Paid'): ?>
                                            <span class="badge bg-success">Paid</span>
                                            <?php else: ?>
                                            <span class="badge bg-danger">Unpaid</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>Php<?php echo e(number_format($consumptions->amountCons,2)); ?></td>
                                        <td>
                                            <?php if($consumptions->statusCons =='Unpaid'): ?>
                                                PAID ALREADY
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-sm btn-warning"><i class="bi bi-cash"></i> Pay</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    
                </div>
             </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\waterbilling\resources\views/consumptions/payment.blade.php ENDPATH**/ ?>