
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            Edit Customer Details
        </div>
        <form action="<?php echo e(route('customers.update', $customers->id)); ?>" method="post">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="" class="form-control" value="<?php echo e($customers->lastname); ?>">
                </div>
                <div class="col">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="" class="form-control" value="<?php echo e($customers->firstname); ?>">
                </div>
                <div class="col">
                    <label for="">Middle Name</label>
                    <input type="text" name="middlename" id="" class="form-control" value="<?php echo e($customers->middlename); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Date of Birth</label>
                    <input type="date" name="dob" id="" class="form-control" value="<?php echo e($customers->dob); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Purok</label>
                    <select name="address2" class="form-select">
                        <option value="Purok 4">Purok 4</option>
                        <option value="Purok 5">Purok 5</option>
                        <option value="Purok 6">Purok 6</option>
                        <option value="Purok 7">Purok 7</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Address</label>
                    <input type="text" name="address" id="" class="form-control" value="<?php echo e($customers->address); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Contact Number</label>
                    <input type="text" name="contactNumber" id="" class="form-control" value="<?php echo e($customers->contactNumber); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Meter Number</label>
                    <input type="text" name="meterNumber" id="" class="form-control" value="<?php echo e($customers->meterNumber); ?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-select">
                        <option><?php echo e($customers->status); ?></option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
        <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-sm btn-secondary">Back</a>
        </div>
        
        </form>
        
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\waterbilling\resources\views/customers/edit.blade.php ENDPATH**/ ?>