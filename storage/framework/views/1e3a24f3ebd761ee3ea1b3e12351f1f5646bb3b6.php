

<?php $__env->startSection('content'); ?>
<div class="feed-container">
    <div class="profile-card">
        <img src="https://picsum.photos/100" alt="User Avatar" class="avatar">
        <div class="profile-info">
            <h2><?php echo e(Auth::user()->name); ?></h2>
            <p class="bio">Aspiring writer. Lover of words and stories.</p>
            <div class="stats">
                <span><strong>12</strong> Posts</span>
                <span><strong>58</strong> Followers</span>
                <span><strong>34</strong> Following</span>
            </div>
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
    <div class="create-post">
        <h3>Create a New Post</h3>
        <form action="<?php echo e(route('studentposts.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="text" name="title" placeholder="Post Title" required>

            <!-- Rich Textarea -->
            <textarea id="postContent" name="content" rows="5" placeholder="Write your thoughts..."></textarea>
            
            <!-- Image Upload -->
            <label for="image">Attach Image:</label>
            <input type="file" name="image" accept="image/*" class="form-control mb-2">

            <button type="submit">Publish</button>
        </form>
    </div>
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/u0ahhzkwhvgib2627sg4yah2pymmi3s46ss840kiyfssldzi/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Oct 15, 2025:
        'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        uploadcare_public_key: 'e2e35bdc3a44038bac07',
    });
    </script>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/studentposts/create.blade.php ENDPATH**/ ?>