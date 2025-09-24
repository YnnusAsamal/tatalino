
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            <h3>Edit Consumption</h3>
        </div>
        <form action="<?php echo e(route('consumptions.update', $consumptions->id)); ?>" method="post">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label>Reference Number</label>
                        <input type="text" name="" id="" class="form-control" value="<?php echo e($consumptions->referenceNum); ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Customer Name</label>
                        <input type="text" name="" id="" class="form-control" value="<?php echo e($consumptions->customer->firstname); ?> <?php echo e($consumptions->customer->lastname); ?>" readonly>
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <label>Meter Number</label>
                        <input type="text" name="" id="" class="form-control" value="<?php echo e($consumptions->customer->meterNumber); ?>" readonly>
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <label>Consumption Reading</label>
                        <input type="text" name="totalCons" id="" class="form-control" value="<?php echo e($consumptions->totalCons); ?>">
                    </div>  
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\waterbilling\resources\views/consumptions/edit.blade.php ENDPATH**/ ?>