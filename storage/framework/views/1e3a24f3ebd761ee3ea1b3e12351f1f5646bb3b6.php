

<?php $__env->startSection('content'); ?>
<div class="feed-container">
    <div class="profile-card">
        <div class="comment-card">
            <?php if(Auth::user() && Auth::user()->profile && Auth::user()->profile->image): ?>
                <?php
                    $images = json_decode(Auth::user()->profile->image, true);
                    $firstImage = $images[0] ?? null;
                ?>
                <?php if($firstImage): ?>
                 <div class="d-flex flex-column" style="width: 150px;">
                    <img src="<?php echo e(asset('assets/userprofiles/' . $firstImage)); ?>"
                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                        style="width: 150px; z-index: 1">
                </div>
    
                <?php else: ?>
                    <p>No profile image available.</p>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-muted">No profile information available.</p>
            <?php endif; ?>
            <!-- <img src="<?php echo e(asset(Auth::user()->profile->image ?? 'default-avatar.png')); ?>" alt="User Avatar" class="avatar"> -->

            <div class="profile-info">
                <h2><?php echo e(Auth::user()->name); ?></h2>
                <p class="bio"><?php echo e(Auth::user()->profile->bio ?? 'No bio available.'); ?></p>
                <!-- <div class="stats">
                    <span><strong>12</strong> Posts</span>
                    <span><strong>58</strong> Followers</span>
                    <span><strong>34</strong> Following</span>
                </div> -->
            </div>
            <div class="edit-profile">
                <a href="<?php echo e(route('userprofiles.edit', Auth::id())); ?>" class="btn btn-secondary btn-sm">Edit Profile</a>
            </div>
        </div>
    </div>
        
    <!-- <div class="row my-3">
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
    </div> -->
   <div class="comment-card">
    <h4>Create Post</h4>

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
            <textarea name="content" id="editor" class="form-control" placeholder="What are your thoughts?"></textarea>
        </div>

        <div class="mb-3">
            <input type="file" name="image" accept="image/*" class="form-control">
        </div>

        <button type="submit" class="btn-purple">
            Submit Post
        </button>

    </form>
</div>


</div>
<!-- <script>
    CKEDITOR.replace('editor', {
        height: 300,
        removeButtons: 'PasteFromWord',
        filebrowserUploadMethod: 'form'
    });
</script> -->

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
<div id="particles-js"></div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/create.blade.php ENDPATH**/ ?>