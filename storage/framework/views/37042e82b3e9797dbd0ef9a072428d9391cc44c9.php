
<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GuestLayout::class, []); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    </head>
        <style>
        body{
            margin-top:100px;
            background: #fff5e1;
            font-family: 'Poppins', sans-serif;
        }
        .account-block {
            padding: 0;
            background-image: url(https://bootdey.com/img/Content/bg1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
        }
        .account-block .overlay {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .account-block .account-testimonial {
            text-align: center;
            color: #fff;
            position: absolute;
            margin: 0 auto;
            padding: 0 1.75rem;
            bottom: 3rem;
            left: 0;
            right: 0;
        }

        .text-theme {
            color: #c48B28 !important;
        }

        .btn-theme {
            background-color: #c48B28;
            border-color: #c48B28;
            color: #fff;
        }
        .school-name{
            /* background-color: #c48B28;
            border-color: #c48B28; */
                color: #c48B28;
                padding: 5px 15px;
                border-radius: 5px;
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

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }

        /* Focus effect */
        .form-control:focus {
            border-color: #c48B28;
            box-shadow: 0 0 0 0.2rem rgba(196, 139, 40, 0.25);
        }
        .form-group label {
        color: #c48B28;
        font-weight: 600;
            }

            .forgot-link {
    color: #c48B28 !important;
    font-weight: 500;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }
        </style>
    </head> 


    <div id="main-wrapper" class="container">
        <div class="row mb-3 align-items-center justify-content-center text-center text-md-start header-animate">
    
            <div class="col-auto">
                <img src="<?php echo e(asset('assets/logo.png')); ?>" 
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
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                    </div>

                                    <h6 class="h5 mb-0">Welcome Students!</h6>
                                    <p class="text-muted mt-2 mb-5">Enter your email address and password to access website</p>

                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required autocomplete="current-password">
                                        </div>
                                        <button type="submit" class="btn btn-theme">Login</button>
                                        <?php if(Route::has('password.request')): ?>
                                        <a href="<?php echo e(route('password.request')); ?>" class="forgot-link float-right text-primary">Forgot password?</a>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">There is no greater agony than bearing an untold story inside you</h4>
                                        <!-- <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p> -->
                                        <p>- Maya Angelou</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="<?php echo e(route('register')); ?>" class="forgot-link ml-1">register</a></p>

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>
  

    <?php if(session('status')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?php echo e(session('status')); ?>',
                confirmButtonColor: '#3085d6'
            })
        </script>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                html: `<?php echo implode('<br>', $errors->all()); ?>`,
                confirmButtonColor: '#d33'
            })
        </script>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\tatalino\resources\views/auth/login.blade.php ENDPATH**/ ?>