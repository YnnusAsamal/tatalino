
<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>All Posts</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-4">
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

                    <?php if(!$post->is_published): ?>
                        <form action="" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-success btn-sm">Publish</button>
                        </form>
                    <?php else: ?>
                        <form action="" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" class="btn btn-secondary btn-sm">Unpublish</button>
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