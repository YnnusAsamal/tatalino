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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

    <!-- Custom Styles -->
    <style>
        body {
            background: #f8f9fa;
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
        }

        /* You can keep or remove these depending on whether you want feed/profile styles on the front page */
        .feed-container {
            max-width: 800px;
            margin: auto;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FBC02D; /* optional border in your theme */
        }

        /* Additional style you already had can stay here */
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-xs border-bottom navbar-light bg-white" id="navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(url('/')); ?>">
                Tinta’t Talino
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                                Welcome, <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="<?php echo e(route('studentposts.index')); ?>">Home</a>
                                <a class="dropdown-item" href="<?php echo e(route('studentposts.show', auth()->user()->id)); ?>">My Feed</a>
                                <a class="dropdown-item" href="<?php echo e(route('update-password.edit', auth()->user()->id)); ?>">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <?php if(auth()->guard()->guest()): ?>
            <div class="welcome-banner">
                <h1>Welcome to Tintatalino!</h1>
                <p class="lead">Join a learning community where students share ideas and grow together.</p>
                <div class="welcome-actions">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-light btn-lg">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-light btn-lg">Register</a>
                </div>
            </div>
        <?php endif; ?>

        <div class="container mt-3">
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\tatalino\resources\views/layouts/student.blade.php ENDPATH**/ ?>