
<?php $__env->startSection('content'); ?>

<body>
    <div class="container-fluid">
        <div class="mt-2 py-2">
            <div class="card shadow">
                <div class="card-body">
                    Welcome to Admin Dashboard, <?php echo e(Auth::user()->name); ?>

                </div>
            </div>
        </div>
    </div>

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/dashboard.blade.php ENDPATH**/ ?>