

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

<div class="container mt-5">
    <h2 class="mb-4 text-center">Update Your Profile</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="profile-card text-center">
        <?php if($userId && $userId->profile && $userId->profile->image): ?>
            <?php
                $images = json_decode($userId->profile->image, true);
                $firstImage = $images[0] ?? null;
             ?>
            <?php if($firstImage): ?>
                
                <img src="<?php echo e(asset('assets/userprofiles/' . $firstImage)); ?>" alt="Profile Image" class="rounded-profile mb-3 shadow">
            <?php else: ?>
                <p>No profile image available.</p>
            <?php endif; ?>

            <div class="card-body mt-3">
                <h5 class="card-title">Current Profile Info</h5>
                <p><strong>Description:</strong> <?php echo e($userId->profile->user_description); ?></p>
                <p><strong>Bio:</strong> <?php echo e($userId->profile->bio); ?></p>
                <p><strong>Hobby:</strong> <?php echo e($userId->profile->hobby); ?></p>
            </div>
        <?php else: ?>
            <p class="text-muted">No profile information available.</p>
        <?php endif; ?>
    </div>

    <form action="<?php echo e(route('userprofiles.update', Auth::id())); ?>" method="POST" enctype="multipart/form-data" class="profile-card">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <h5 class="card-title">Edit Your Profile</h5>

        <div class="mb-4 text-center">
            <label for="image" class="form-label">Change Profile Image</label>

            <?php if($userId && $userId->profile && $userId->profile->image): ?>
                <?php
                    $images = json_decode($userId->profile->image, true);
                    $firstImage = $images[0] ?? null;
                ?>

                <?php if($firstImage): ?>
                    <img src="<?php echo e(asset('public/assets/userprofiles/' . $firstImage)); ?>" alt="Current Image" class="rounded-profile mb-2">
                <?php else: ?>
                    <p>No profile image available.</p>
                <?php endif; ?>

                
                <input type="hidden" name="existing_image" value="<?php echo e($firstImage); ?>">
            <?php else: ?>
                <p>No profile image available.</p>
            <?php endif; ?>
            <input type="file" name="image" id="image" class="form-control mt-2">
        </div>

        <div class="mb-4">
            <label for="user_description" class="form-label">Description</label>
            <input 
                type="text" 
                name="user_description" 
                id="user_description" 
                class="form-control" 
                value="<?php echo e(old('user_description', $userId->profile->user_description ?? '')); ?>"
            >
            <?php $__errorArgs = ['user_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-danger"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label for="bio" class="form-label">Bio</label>
            <textarea 
                name="bio" 
                id="bio" 
                class="form-control" 
                rows="4"
            ><?php echo e(old('bio', $userId->profile->bio ?? '')); ?></textarea>
            <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-danger"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label for="hobby" class="form-label">Hobby</label>
            <input 
                type="text" 
                name="hobby" 
                id="hobby" 
                class="form-control" 
                value="<?php echo e(old('hobby', $userId->profile->hobby ?? '')); ?>"
            >
            <?php $__errorArgs = ['hobby'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-danger"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">Update Profile</button>
        </div>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\tatalino\resources\views/userprofiles/edit.blade.php ENDPATH**/ ?>