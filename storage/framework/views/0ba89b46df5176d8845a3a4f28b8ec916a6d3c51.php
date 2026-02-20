<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

<style>
body{
    margin-top:20px;
    background: #fff5e1;
    font-family: 'Poppins', sans-serif;
}

.text-theme {
    color: #c48B28 !important;
}

.btn-theme {
    background-color: #c48B28;
    border-color: #c48B28;
    color: #fff;
}

.btn-theme:hover {
    background-color: #a8741f;
    border-color: #a8741f;
}

/* Labels */
.form-group label {
    color: #c48B28;
    font-weight: 600;
}

/* Inputs */
.form-control {
    border-radius: 8px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #c48B28;
    box-shadow: 0 0 0 0.2rem rgba(196, 139, 40, 0.25);
}

 .header-animate {
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeSlideDown 1s ease forwards;
        }

        @keyframes  fadeSlideDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
</style>

<div class="container">
    <div class="row mb-2 align-items-center justify-content-center text-center text-md-start header-animate">
    
            <div class="col-auto">
                <img src="<?php echo e(asset('public/assets/logo.png')); ?>" 
                    alt="Logo" 
                    class="img-fluid" 
                    style="max-width: 120px;">
            </div>

            <div class="col-auto">
                <h4 class="mb-0 fw-bold school-name">
                    CALBAYOG CITY NATIONAL HIGH SCHOOL
                </h4>
            </div>

        </div>
    <div class="row justify-content-center mb-3">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">

                        <!-- LEFT SIDE FORM -->
                        <div class="col-lg-6">
                            <div class="p-5">

                                <div class="mb-4">
                                    <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                    <p class="text-muted">Create your student account</p>
                                </div>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-3 text-danger','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-3 text-danger','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                <form method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="<?php echo e(old('name')); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="<?php echo e(old('email')); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" name="image"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Bio</label>
                                        <textarea name="bio" class="form-control"
                                            rows="2"><?php echo e(old('bio')); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Hobby</label>
                                        <input type="text" name="hobby"
                                            class="form-control"
                                            value="<?php echo e(old('hobby')); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="user_description"
                                            class="form-control"
                                            value="<?php echo e(old('user_description')); ?>">
                                    </div>

                                    <button type="submit" class="btn btn-theme btn-block mt-3">
                                        Register
                                    </button>
                                </form>

                                <p class="text-muted text-center mt-3">
                                    Already registered?
                                    <a href="<?php echo e(route('login')); ?>" class="text-theme">Login</a>
                                </p>

                            </div>
                        </div>

                        <!-- RIGHT SIDE IMAGE -->
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right"
                                 style="background-image: url(https://bootdey.com/img/Content/bg1.jpg);
                                        background-size: cover;
                                        position: relative;
                                        height: 100%;">

                                <div style="position:absolute;
                                            top:0; bottom:0; left:0; right:0;
                                            background-color: rgba(0,0,0,0.4);">
                                </div>

                                <div style="position:absolute;
                                            bottom:3rem;
                                            left:0; right:0;
                                            text-align:center;
                                            color:white;
                                            padding:0 20px;">
                                    <h4 class="mb-3">Join Our School Community</h4>
                                    <p>Create your account and connect with fellow students.</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\tatalino\resources\views/auth/register.blade.php ENDPATH**/ ?>