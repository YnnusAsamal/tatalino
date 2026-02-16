
<?php $__env->startSection('content'); ?>

<style>
    body{
    /* margin-top:20px; */
    background:#ebeef0;
    font-family: 'Lato', sans-serif;
    }

    .img-sm {
        width: 46px;
        height: 46px;
    }

    .panel {
        box-shadow: 0 2px 0 rgba(0,0,0,0.075);
        border-radius: 0;
        border: 0;
        margin-bottom: 15px;
    }

    .panel .panel-footer, .panel>:last-child {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .panel .panel-heading, .panel>:first-child {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .panel-body {
        padding: 25px 20px;
    }


    .media-block .media-left {
        display: block;
        float: left
    }

    .media-block .media-right {
        float: right
    }

    .media-block .media-body {
        display: block;
        overflow: hidden;
        width: auto
    }

    .middle .media-left,
    .middle .media-right,
    .middle .media-body {
        vertical-align: middle
    }

    .thumbnail {
        border-radius: 0;
        border-color: #e9e9e9
    }

    .tag.tag-sm, .btn-group-sm>.tag {
        padding: 5px 10px;
    }

    .tag:not(.label) {
        background-color: #fff;
        padding: 6px 12px;
        border-radius: 2px;
        border: 1px solid #cdd6e1;
        font-size: 12px;
        line-height: 1.42857;
        vertical-align: middle;
        -webkit-transition: all .15s;
        transition: all .15s;
    }
    .text-muted, a.text-muted:hover, a.text-muted:focus {
        color: #acacac;
    }
    .text-sm {
        font-size: 0.9em;
    }
    .text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
        line-height: 1.25;
    }

    .btn-trans {
        background-color: transparent;
        border-color: transparent;
        color: #929292;
    }

    .btn-icon {
        padding-left: 9px;
        padding-right: 9px;
    }

    .btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
        padding: 5px 10px !important;
    }

    .mar-top {
        margin-top: 15px;
    }
</style>

<div class="feed-container">
    <div class="row mt-2">
        <div class="col">
            <h1>Student Forum</h1>
        </div>
    </div>
    <hr>
    <div class="comment-card">
        <h4>Create New Topic</h4>
        <form action="<?php echo e(route('forum.post')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="title" class="form-control mb-2" placeholder="Title">
            <textarea name="content" class="form-control mb-2" placeholder="Write something..."></textarea>
            <button class="btn btn-primary btn-purple">Submit</button>
        </form>
    </div>
    <hr>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment-card">
        <div class="card mb-3">
            <div class="card-body">
                <h5><?php echo e($post->title); ?></h5>
                <p><?php echo e($post->content); ?></p>
                <small>Posted by: <?php echo e($post->user->name); ?></small>

                <hr>
                <?php $__currentLoopData = $post->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border p-2 mb-2">
                        <?php echo e($reply->content); ?>

                        <br>
                        <small>Reply by: <?php echo e($reply->user->name); ?></small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <form action="<?php echo e(route('forum.reply')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                    <input type="hidden" name="forum_id" value="<?php echo e($post->id); ?>">
                    <textarea name="content" class="form-control mb-2" placeholder="Write a reply..."></textarea>
                    <button class="btn btn-sm btn-success">Reply</button>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($posts->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/forum/index.blade.php ENDPATH**/ ?>