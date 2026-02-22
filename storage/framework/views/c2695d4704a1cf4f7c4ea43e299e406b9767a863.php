
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

        <div class="row">
            <div class="col">
                <div class="card border-warning shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Authors</h5>
                        <p class="card-text display-4"><?php echo e($totalAuthors); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-info shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text display-4"><?php echo e($totalPosts); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-success shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Published Posts</h5>
                        <p class="card-text display-4"><?php echo e($totalPublishedPosts); ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-secondary shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Draft Posts</h5>
                        <p class="card-text display-4"><?php echo e($totalDraftPosts); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <p class="card-text display-4"><?php echo e($totalCategories); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/dashboard.blade.php ENDPATH**/ ?>