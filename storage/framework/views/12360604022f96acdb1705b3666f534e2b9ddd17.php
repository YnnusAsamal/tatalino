
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            Edit Cost Details
        </div>
        <form action="<?php echo e(route('costs.update', $costs->id)); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <label for="">Cost<i> (per cubic meter)</i></label>
                <input type="text" name="cost" id="" class="form-control" value="<?php echo e(number_format($costs->cost, '2')); ?>">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\waterbilling\resources\views/costs/edit.blade.php ENDPATH**/ ?>