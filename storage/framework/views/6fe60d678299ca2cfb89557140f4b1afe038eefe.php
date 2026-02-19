
<?php $__env->startSection('content'); ?>

<style>
    body{
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

    #particles-js {
        pointer-events: none;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: -1; /* IMPORTANT */
        top: 0;
        left: 0;
        background: #ffffff; /* white background */
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
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Oswald', sans-serif;
        color: #2E7D32;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .reply-text {
    padding: 12px; /* adjust as needed */
    background-color: #f8f9fa; /* optional light background */
    border-radius: 6px; /* optional rounded edges */
    }
    .content-post {
        padding: 12px; /* adjust as needed */
        background-color: #f8f9fa; /* optional light background */
        border-radius: 6px; /* optional rounded edges */
    }

    .title-post {
        padding: 12px; /* adjust as needed */
        background-color: #f8f9fa; /* optional light background */
        border-radius: 6px; /* optional rounded edges */
    }

    
</style>
<div id="particles-js"></div>

<div class="feed-container">
    <div class="row mt-3">
        <div class="col">
            <h4 class="card-title">Welcome to the Student Forum!</h4>
            <p class="card-text">This is a place for students to share their thoughts, ask questions, and engage in discussions. Feel free to create new topics or reply to existing ones. Let's keep the conversation respectful and constructive!</p>
        </div>
    </div>
    <hr>
    <div class="comment-card">
        <div class="card mb-3 shadow">
            <div class="card-body">
                <h4 class="">Create New Topic</h4>
                <hr>
                <form action="<?php echo e(route('forum.post')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="title" class="form-control mb-2" placeholder="Title/Subject">
                    <textarea name="content" class="form-control mb-2" placeholder="Write something..."></textarea>
                    <button class="btn btn-warning text-white">Submit</button>
                </form>
            </div>
        </div>
        
    </div>
    <hr>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment-card">
        <div class="card mb-3 shadow">
            <div class="card-body">

                <div class="card mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <?php
                                $images = json_decode($post->user->profile->image ?? '[]', true);
                                $firstImage = $images[0] ?? null;
                            ?>

                            <?php if($firstImage): ?>
                                <img src="<?php echo e(asset('assets/userprofiles/' . $firstImage)); ?>"
                                    class="img-sm rounded-circle me-2 border border-2 border-dark"
                                    alt="Profile Image">
                            <?php else: ?>
                                No Available Image
                            <?php endif; ?>

                            <div><strong><?php echo e($post->user->name); ?></strong></div>
                            <div class="ms-auto">
                                <small class="text-muted">Posted: <?php echo e($post->created_at->diffForHumans() ?? 'NA'); ?></small><br>
                            </div>
                        </div>

                        <h5 class="title-post"><?php echo e($post->title); ?></h5>

                        <!-- Post Content with max height -->
                        <div class="post-content" style="max-height:150px; overflow:hidden;">
                            <p class="content-post"><?php echo e($post->content); ?></p>
                        </div>

                        <!-- See More Button -->
                        <button class="btn btn-sm btn-link see-more-btn" style="display:none;">See More</button>
                    </div>
                </div>

                <hr>
                <strong class="mb-2">Replies:</strong>

                <?php $__currentLoopData = $post->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border p-2 mb-2 mt-2 reply-card">
                    <div class="d-flex align-items-center mb-2">
                        <?php
                            $images = json_decode($reply->user->profile->image ?? '[]', true);
                            $firstImage = $images[0] ?? null;
                        ?>

                        <?php if($firstImage): ?>
                            <img src="<?php echo e(asset('assets/userprofiles/' . $firstImage)); ?>"
                                class="img-sm rounded-circle me-2 border border-2 border-dark"
                                alt="Profile Image">
                        <?php else: ?>
                            No Available Image
                        <?php endif; ?>

                        <div><strong><?php echo e($reply->user->name); ?></strong></div>
                    </div>

                    <div class="reply-content" style="max-height:100px; overflow:hidden;">
                        <p class="reply-text"><?php echo e($reply->content); ?></p>
                    </div>
                    <button class="btn btn-sm btn-link see-more-btn" style="display:none;">See More</button>
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.see-more-btn');

    buttons.forEach(btn => {
        const contentDiv = btn.previousElementSibling;
        const maxHeight = contentDiv.classList.contains('post-content') ? 100 : 50;

        // Show button only if content exceeds max-height
        if (contentDiv.scrollHeight > maxHeight) {
            btn.style.display = 'inline-block';
        }

        btn.addEventListener('click', function() {
            if (contentDiv.style.maxHeight && contentDiv.style.maxHeight !== 'none') {
                // Expand
                contentDiv.style.maxHeight = 'none';
                contentDiv.style.overflow = 'visible';
                this.textContent = 'See Less';
            } else {
                // Collapse
                contentDiv.style.maxHeight = maxHeight + 'px';
                contentDiv.style.overflow = 'hidden';
                this.textContent = 'See More';
            }
        });
    });
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

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/forum/index.blade.php ENDPATH**/ ?>