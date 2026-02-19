

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

    header {
    text-align: center;
    padding: 2rem 1rem 1rem;
  }

  header h1 {
    font-size: 2.5rem;
    margin: 0;
    color: #2E7D32;
  }

  header p {
    font-size: 0.9rem;
    margin-top: 0.5rem;
    color: #444;
    letter-spacing: 1px;
  }
    h2,h3,h5, label {
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
    <header>
    <h1>Tinta’t Talino</h1>
    <p>THE CCNHS PORTAL FOR WORDS AND WONDER</p>
  </header>
  <section class="navigation">
      <?php if(auth()->guard()->check()): ?>
        <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?php echo e(route('studentposts.index')); ?>">Home</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Essays</a>
            </li>
            |
             <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo e(route('collections.index')); ?>">Collections</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Explore</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo e(route('publish.index')); ?>">Publish</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">About</a>
            </li>
            |
            <li class="nav-item">
              <a class="nav-link text-dark" href="">Contact</a>
            </li>
        </ul>
    <?php else: ?>
        <!-- <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?php echo e(route('login')); ?>">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="<?php echo e(route('register')); ?>">Register</a>
            </li>
        </ul> -->
    <?php endif; ?>

  </section>
    <div class="row">
        <div class="col">
            <div class="title">
                <h3>Create Your Works Here!</h3>
            </div>
        </div>
    </div>
    <hr>
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

                    <div class="profile-info">
                        <h2><?php echo e(Auth::user()->name); ?></h2>
                        <p class="bio"><?php echo e(Auth::user()->profile->bio ?? 'No bio available.'); ?></p>
                        <div class="stats mb-3">
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
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    
                    <hr>
                    <form action="<?php echo e(route('studentposts.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input type="text" name="title" placeholder="Enter Post Title" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <select name="category" class="form-select">
                                    <option value="">Choose Category</option>
                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>">
                                            <?php echo e($data->name); ?> | <?php echo e($data->subcategory); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>
                        <div class="mb-3">
                            <textarea name="content" id="editor" class="form-control input-lg p-text-area" placeholder="What are your thoughts?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning text-white">
                            Submit Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
    CKEDITOR.replace('editor', {
        height: 300,
        removeButtons: 'PasteFromWord',
        filebrowserUploadMethod: 'form',
        extraPlugins: 'font',
        toolbar: [
            { name: 'styles', items: ['Font', 'FontSize'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] }
        ]
    });
</script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/create.blade.php ENDPATH**/ ?>