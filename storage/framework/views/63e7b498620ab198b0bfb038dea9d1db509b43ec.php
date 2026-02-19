

<?php $__env->startSection('content'); ?>
<style>
       body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    }
    h2, h5, label {
        font-family: 'Oswald', sans-serif;
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
    #particles-js {
            pointer-events: none;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
            top: 0;
            left: 0;
        }

        h2, h5, label {
        font-family: 'Oswald', sans-serif;
        color: #2E7D32;
    }

    .feed-scroll {
        height: 100vh;
        overflow-y: auto;
        padding-right: 15px;
    }
    .sticky-sidebar {
        position: sticky;
        top: 80px; /* distance from top */
        height: fit-content;
    }
</style>
<div id="particles-js"></div>
<div class="container">
    <div class="row" style="height: 100vh;">
        <div class="col-md-4 sticky-sidebar">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center text-center">
                    <?php if(Auth::user() && Auth::user()->profile && Auth::user()->profile->image): ?>
                        <?php
                            $images = json_decode(Auth::user()->profile->image, true);
                            $firstImage = $images[0] ?? null;
                        ?>
                        <?php if($firstImage): ?>
                            <img src="<?php echo e(asset('assets/userprofiles/' . $firstImage)); ?>" alt="Profile Image" class="rounded-profile mb-3 shadow">
                        <?php else: ?>
                            <p>No profile image available.</p>
                        <?php endif; ?>
                    <?php else: ?>
                        <p class="text-muted">No profile information available.</p>
                    <?php endif; ?>

                    <div class="profile-info mb-2">
                        <h2><?php echo e(Auth::user()->name); ?></h2>
                        <p class="bio"><?php echo e(Auth::user()->profile->bio ?? 'No bio available.'); ?></p>
                        <div class="stats">
                            <span><strong><?php echo e(Auth::user()->posts()->count()); ?></strong> Posts</span>
                            <span><strong>58</strong> Followers</span>
                            <span><strong>34</strong> Following</span>
                        </div>
                    </div>
                    <div class="edit-profile">
                        <a href="<?php echo e(route('userprofiles.edit', Auth::id())); ?>" class="btn btn-secondary btn-sm">Edit Profile</a>
                    </div>
                    <div class="row my-3">
                        <div class="col-auto">
                            <a href="<?php echo e(route('studentposts.show', Auth::id())); ?>" class="btn btn-warning">
                                📄 My Post
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo e(route('studentposts.create')); ?>" class="btn btn-warning">
                                ➕ Create Post
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 feed-scroll">
            <div class="feed-posts">
                <h3>My Latest Works</h3>
                <hr>
                <?php $__currentLoopData = $myfeeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card mb-3 shadow">
                    <div class="card-header d-flex align-items-center">
                        <?php
                            $images = json_decode($post->users->profile->image ?? '[]', true);
                            $profileImage = $images[0] ?? null;
                        ?>
                        <?php if($profileImage): ?>
                            <img src="<?php echo e(asset('assets/userprofiles/' . $profileImage)); ?>" alt="Profile Image" class="rounded-profile me-3" style="width: 50px; height: 50px; border: 2px solid #FBC02D;">
                        <?php else: ?>
                            <div class="rounded-profile me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
                        <?php endif; ?>

                        <div>
                            <strong><?php echo e($post->users->name ?? 'NA'); ?></strong><br>
                            <small class="text-muted"><?php echo e($post->created_at->diffForHumans() ?? 'NA'); ?></small><br>
                            <small class="text-muted"><span class="badge bg-secondary "><?php echo e($post->category->name ?? 'Uncategorized'); ?></span></small>
                        </div>
                        <div class="float-right ms-auto">
                            <?php if($post->status === 'Published'): ?>
                                <span class="badge bg-success">Published</span>
                            <?php else: ?>
                                    <span class="badge bg-warning text-dark">Draft</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($post->title); ?></h5>
                        <p class="card-text"><?php echo $post->content; ?></p>

                        <?php if($post->image): ?>
                            <img src="<?php echo e(asset('assets/posts/' . $post->image)); ?>" alt="Post Image" class="img-fluid rounded mt-3">
                        <?php endif; ?>
                    </div>

                    <div class="card-footer d-flex gap-2">
                        <?php
                            $likedUsers = $post->likes->map(function($like) {
                                return $like->user->name ?? '';
                            })->implode(', ');
                        ?>

                        <form action="<?php echo e(route('post.like', $post->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button 
                                class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="<?php echo e($likedUsers ?: 'No likes yet'); ?>">
                                ❤️ <?php echo e($post->likes->count()); ?>

                            </button>
                        </form>
                        <button class="btn btn-outline-primary btn-sm flex-grow-1">💬 Comment</button>
                    </div>
                </div>
                </div>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    
    
    
</div>
<script>
particlesJS("particles-js", {
  "particles": {
    "number": { "value": 70 },
    "size": { "value": 3 },
    "color": { "value": "#a855f7" },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#c084fc",
      "opacity": 0.4
    },
    "move": { "speed": 2 }
  }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/show.blade.php ENDPATH**/ ?>