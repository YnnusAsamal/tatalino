<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tintatalino</title>
    <link href="<?php echo e(asset('images/logo.png')); ?>" rel="website icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles & Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <!-- <link rel="stylesheet" media="screen" href="css/style.css"> -->
<!-- 
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e1b4b, #312e81, #4c1d95);
        background-size: 400% 400%;
        animation: gradientMove 12s ease infinite;
        color: #fff;
        overflow-x: hidden;
    }
        .welcome-banner {
            background: #c8962d;
            color: white;
            padding: 1rem;
            text-align: center;
            border-radius: 0 0 20px 20px;
        }

        .welcome-banner h1 {
            font-weight: bold;
        }

        .welcome-actions {
            margin-top: 2rem;
        }

        .welcome-actions a {
            margin: 0 0.5rem;
        }

        .content {
        padding: 2rem;
        position: relative;
        z-index: 1;
        }
        .feed-container {
            max-width: 800px;
            margin: auto;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FBC02D;
        }
   
    #particles-js {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 0;
        top: 0;
        left: 0;
    }

    .comment-card {
        position: relative;
        z-index: 2;
        backdrop-filter: blur(15px);
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.2);
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        max-width: 900px;
        margin: 60px auto;
        transition: 0.4s ease;
    }

    .comment-card:hover {
        transform: translateY(-5px);
    }

    /* ✨ Inputs */
    .form-control, .form-select {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff;
        border-radius: 12px;
        padding: 14px;
    }

    .form-control::placeholder {
        color: #ddd;
    }

    .form-control:focus, .form-select:focus {
        border-color: #a855f7;
        box-shadow: 0 0 20px rgba(168,85,247,0.5);
        background: rgba(255,255,255,0.15);
        color: #fff;
    }

    .btn-purple {
        background: linear-gradient(90deg, #a855f7, #ec4899, #6366f1);
        background-size: 300% 300%;
        animation: gradientBtn 5s ease infinite;
        border: none;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 600;
        letter-spacing: 1px;
        transition: 0.3s ease;
        box-shadow: 0 0 20px rgba(168,85,247,0.5);
    }

    @keyframes  gradientBtn {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .btn-purple:hover {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(236,72,153,0.8);
    }
    </style> -->

   <style>
    
        .navbar-brand {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2E7D32 !important;
            text-align: center;
            display: block;
            margin: 0 auto;          
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-3">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand fw-bold fs-4" href="<?php echo e(url('/')); ?>">
                Tinta’t Talino
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Push items to right -->
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                    <?php if(auth()->guard()->check()): ?>

                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold" href="<?php echo e(route('dashboard')); ?>">
                                    Admin Dashboard
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?php echo e(route('studentposts.index')); ?>">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?php echo e(route('studentposts.create')); ?>">
                                Submit your Work
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?php echo e(route('forum.index')); ?>">
                                Forum
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?php echo e(route('studentposts.show', auth()->user()->id)); ?>">
                                My Profile
                            </a>
                        </li>

                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold" href="#" 
                            role="button" data-bs-toggle="dropdown">
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li>
                                    <a class="dropdown-item" 
                                    href="<?php echo e(route('update-password.edit', auth()->user()->id)); ?>">
                                        Change Password
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" 
                                    href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" 
                                method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>

                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="<?php echo e(route('login')); ?>">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-primary ms-lg-2 px-4" 
                            href="<?php echo e(route('register')); ?>">
                                Register
                            </a>
                        </li>

                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

   
    <div class="content" style="position: relative; z-index: 1;">
        <!-- <?php if(auth()->guard()->guest()): ?>
            <div class="welcome-banner">
                <h1>Welcome to Tinta't Talino!</h1>
                <p class="lead">Join a learning community where students share ideas and grow together.</p>
                <div class="welcome-actions">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-light btn-lg">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-light btn-lg">Register</a>
                </div>
            </div>
        <?php endif; ?> -->
        <div class="container mt-3">
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\tatalino\resources\views/layouts/student.blade.php ENDPATH**/ ?>