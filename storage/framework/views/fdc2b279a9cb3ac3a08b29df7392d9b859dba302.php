

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow p-4 text-center">

        <?php
            $images = json_decode($user->profile->image ?? '[]', true);
            $profileImage = $images[0] ?? null;
        ?>

        <?php if($profileImage): ?>
            <img src="<?php echo e(asset('public/assets/userprofiles/' . $profileImage)); ?>"
                 class="rounded-circle mb-3 align-self-center"
                 style="width:150px;height:150px;border:4px solid #FBC02D;">
        <?php endif; ?>

        <h3><?php echo e($user->name); ?></h3>
        <p class="text-muted"><?php echo e($user->email); ?></p>
        <div class="d-flex justify-content-center gap-4 mt-3">
            <div>
                <strong><?php echo e($user->followers->count()); ?></strong><br>
                <small>Followers</small>
            </div>
            <div>
                <strong><?php echo e($user->following->count()); ?></strong><br>
                <small>Following</small>
            </div>
        </div>
        <?php if(auth()->id() !== $user->id): ?>

            <?php
                $isFollowing = auth()->user()
                                ->following()
                                ->where('following_id', $user->id)
                                ->exists();
            ?>

            <form action="<?php echo e(route('follow.toggle', $user->id)); ?>" method="POST" class="mt-3">
                <?php echo csrf_field(); ?>
                <button class="btn <?php echo e($isFollowing ? 'btn-secondary' : 'btn-success'); ?>">
                    <?php echo e($isFollowing ? 'Following' : 'Follow'); ?>

                </button>
            </form>

        <?php endif; ?>

        <hr>

        <h5>Published Posts</h5>
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($post->status === 'Published'): ?>
                <div class="mb-2">
                    <a href="#">
                        <?php echo e($post->title); ?>

                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/userprofiles/show.blade.php ENDPATH**/ ?>