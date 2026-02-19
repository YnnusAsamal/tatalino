
<?php $__env->startSection('content'); ?>
<style>
    body{
    background:#DCDCDC;
    /* margin-top:20px; */
}
</style>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>All Posts</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <input type="text" class="form-control" placeholder="Search Authors...">
                <button class="btn btn-outline-secondary">Search</button>
                <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-outline-primary">Refresh</a>
            </div>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 mb-4">
            <div class="card h-100" style="height: 400px;">
                <?php if($post->image): ?>
                    <img src="<?php echo e(asset('assets/posts/' . $post->image)); ?>" 
                        class="card-img-top" 
                        alt="Post Image" 
                        style="height:200px; object-fit:cover;">
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo e($post->title); ?></h5>

                    <div class="card-text flex-grow-1" 
                        style="max-height: 100px; overflow-y: auto; padding-right:5px;">
                        <?php echo $post->content; ?>

                    </div>

                    <div class="status">
                        <?php if(in_array($post->status, ['draft', 'Unpublished'])): ?>
                        <span class="badge badge-danger">
                            <?php echo e($post->status); ?>

                        </span>
                        <?php else: ?>

                        <span class="badge badge-success">
                            <?php echo e($post->status); ?>

                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="author mt-2">
                        <label class="fw-bold">Author:</label> <?php echo e($post->users->name); ?>

                    </div>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-warning btn-sm">Edit</a>

                    <form action="" method="POST" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                    <?php if(in_array($post->status, ['draft','Unpublished'])): ?>
                        <form action="<?php echo e(route('posts.published', $post->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-success btn-sm"
                                onclick="return confirm('Are you sure you want to publish this post?')">
                                Publish
                            </button>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('posts.unpublished', $post->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-secondary btn-sm"
                                onclick="return confirm('Are you sure you want to unpublish this post?')">
                                Unpublish
                            </button>
                        </form>
                    <?php endif; ?>


                    <?php if($post->featured == '1'): ?>
                        <form action="<?php echo e(route('posts.unfeatured', $post->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-info btn-sm"
                                onclick="return confirm('Are you sure you want to unfeature this post?')">
                                Unfeature
                            </button>
                        </form>
                    <?php else: ?>
                        <form action="<?php echo e(route('posts.featured', $post->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-primary btn-sm"
                                onclick="return confirm('Are you sure you want to feature this post?')">
                                Feature
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sample', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/posts/index.blade.php ENDPATH**/ ?>