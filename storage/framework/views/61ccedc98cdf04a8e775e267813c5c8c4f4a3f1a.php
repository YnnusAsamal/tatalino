<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tintatalino</title>
        <link href="<?php echo e(asset('images/logo.png')); ?>" rel="website icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!--style-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
  
        <style>
        .feed-container {
            max-width: 800px;
            margin: auto;
            padding: 2rem;
            font-family: Arial, sans-serif;
            }

            .profile-card {
            display: flex;
            align-items: center;
            background: #fdfaf3;
            border: 1px solid #ddd;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            }
            .profile-card .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 1rem;
            }
            .profile-info h2 {
            margin: 0;
            color: #1d3928;
            }
            .profile-info .bio {
            font-size: 0.9rem;
            color: #666;
            }
            .profile-info .stats {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            display: flex;
            gap: 1rem;
            }

            .create-post {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 2rem;
            }
            .create-post h3 {
            margin-bottom: 1rem;
            }
            .create-post input, .create-post textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 0.7rem;
            margin-bottom: 1rem;
            }
            .create-post button {
            background: #c8962d;
            color: white;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            }

            .feed-posts h3 {
            margin-bottom: 1rem;
            }
            .post-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            }
            .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            }
            .post-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 1rem;
            }
            .post-body h4 {
            margin: 0 0 0.5rem 0;
            }
            .post-body p {
            margin: 0;
            color: #333;
            }
            .post-footer {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            }
            .post-footer button {
            background: transparent;
            border: none;
            cursor: pointer;
            color: #555;
            }

       </style>
        <body>

        <nav class="navbar sticky-top navbar-expand-lg border-bottom navbar-light" id="navbar">
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Welcome, <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>


                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(route('update-password.edit', auth()->user()->id)); ?>">Change Password</a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                            <a href ="<?php echo e(route('studentposts.index')); ?>" class="dropdown-item">Home</a>
                            <a href="<?php echo e(route('studentposts.show', auth()->user()->id)); ?>" class="dropdown-item">My Feed</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <div class="content">
            <div class="blur-overlay"></div>
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\laragon\www\tatalino\resources\views/layouts/student.blade.php ENDPATH**/ ?>