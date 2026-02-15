

<?php $__env->startSection('content'); ?>
<style>
    body {
        font-family: 'Lato', sans-serif;
        background-color: #fff;
    }
    h2, h5, label {
        font-family: 'Playfair Display', serif;
        color: #2E7D32;
    }
    .profile-card {
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
    }
    .profile-card p {
        font-size: 1.05rem;
        margin-bottom: 0.6rem;
        color: #333;
    }
    .form-label {
        color: #2E7D32;
        font-weight: 600;
    }
    .btn-primary {
        background-color: #2E7D32;
        border-color: #2E7D32;
    }
    .btn-primary:hover {
        background-color: #27642A;
        border-color: #27642A;
    }
    .rounded-profile {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #FBC02D;
    }
    .card-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
</style>
<div class="feed-container">

    <div class="profile-card">
        <?php if(Auth::user() && Auth::user()->profile && Auth::user()->profile->image): ?>
            <?php
                $images = json_decode(Auth::user()->profile->image, true);
                $firstImage = $images[0] ?? null;
            ?>
            <?php if($firstImage): ?>
                <img src="<?php echo e(asset('public/assets/userprofiles/' . $firstImage)); ?>" alt="Profile Image" class="rounded-profile mb-3 shadow">
            <?php else: ?>
                <p>No profile image available.</p>
            <?php endif; ?>
        <?php else: ?>
            <p class="text-muted">No profile information available.</p>
        <?php endif; ?>

        <div class="profile-info">
            <h2><?php echo e(Auth::user()->name); ?></h2>
            <p class="bio"><?php echo e(Auth::user()->profile->bio ?? 'No bio available.'); ?></p>
            <div class="stats">
                <span><strong>12</strong> Posts</span>
                <span><strong>58</strong> Followers</span>
                <span><strong>34</strong> Following</span>
            </div>
        </div>
        <div class="edit-profile">
            <a href="<?php echo e(route('userprofiles.edit', Auth::id())); ?>" class="btn btn-secondary btn-sm">Edit Profile</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-auto">
            <a href="<?php echo e(route('studentposts.show', Auth::id())); ?>" class="btn btn-primary">
                📄 My Post
            </a>
        </div>
        <div class="col-auto">
            <a href="<?php echo e(route('studentposts.create')); ?>" class="btn btn-primary">
                ➕ Create Post
            </a>
        </div>
    </div>
    <div class="feed-posts">
        <h3>Latest Posts</h3>

        <?php $__currentLoopData = $myfeeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="comment-card">
            <div class="card-header d-flex align-items-center">
                <?php
                    $images = json_decode($post->users->profile->image ?? '[]', true);
                    $profileImage = $images[0] ?? null;
                ?>
                <?php if($profileImage): ?>
                    <img src="<?php echo e(asset('public/assets/userprofiles/' . $profileImage)); ?>" alt="Profile Image" class="rounded-profile me-3" style="width: 50px; height: 50px; border: 2px solid #FBC02D;">
                <?php else: ?>
                    <div class="rounded-profile me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
                <?php endif; ?>

                <div>
                    <strong><?php echo e($post->users->name ?? 'NA'); ?></strong><br>
                    <small class="text-muted"><?php echo e($post->created_at->diffForHumans() ?? 'NA'); ?></small><br>
                    <small class="text-muted"><span class="badge bg-secondary "><?php echo e($post->subcategory->name ?? 'Uncategorized'); ?></span></small>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title"><?php echo e($post->title); ?></h5>
                <p class="card-text"><?php echo $post->content; ?></p>

                <?php if($post->image): ?>
                    <img src="<?php echo e(asset('public/assets/posts/' . $post->image)); ?>" alt="Post Image" class="img-fluid rounded mt-3">
                <?php endif; ?>
            </div>

            <div class="card-footer d-flex gap-2">
                <button class="btn btn-outline-success btn-sm flex-grow-1">👍 Like</button>
                <button class="btn btn-outline-primary btn-sm flex-grow-1">💬 Comment</button>
                <!-- <button class="btn btn-outline-secondary btn-sm flex-grow-1">↪ Share</button> -->
            </div>
        </div>
        </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/show.blade.php ENDPATH**/ ?>