<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tintatalino</title>
        <link href="<?php echo e(asset('public/images/logo.JPG')); ?>" rel="website icon">
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
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>

        <script>
            window.onscroll = function() {myFunction()};

                var navbar = document.getElementById("navbar");
                var sticky = navbar.offsetTop;

            function myFunction() 
            {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        </script>


        <style>
            body {
        overflow-x: hidden;
        }

        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        background-color: #F7C701 !important;
        position:sticky;
        top:0;
        
        }

        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        position:sticky;
        top:0;
        }


        #sidebar-wrapper .list-group .list-group-item{
        width: 15rem;
        position:sticky;
        top:0;
        background-color: #F7C701 !important;
        
        }
        #sidebar-wrapper .accordion-body{
        width: 15rem;
        position:sticky;
        top:0;
        background-color: #F7C701 !important;
        
        
        }
        #sidebar-wrapper .accordion-button{
        width: 15rem;
        position:sticky;
        top:0;
        background-color: #F7C701 !important;
        
        
        }
        #flush-collapseOne{
        width: 15rem;
        background-color: #F7C701 !important;
        
        
        }
        #flush-collapseTwo{
        width: 15rem;
        background-color: #F7C701 !important;
        
        
        }
        #flush-collapseThree
        {
        width: 15rem;
        background-color: #F7C701 !important;
        
        
        }
        .accordion-button{
            width: 15rem;
        background-color: #F7C701 !important;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }
        .navbar{
        background-color: #F7C701 !important;
        }

        .nav-button{
        background-color: #F7C701 !important;
        }
        
        {
            background-color: #F7C701 !important; 
        }
        /* .content {
            background-image: url('/assets/logo.JPG'); 
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 600px;
            
            height: 100vh; 
            color: #000000; 
            position: relative;
            overflow: hidden;
        } */


        .blur-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(2.5px); 
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }

        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
           
        
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        
        }
        .btn-action {
            padding: 10px 15px;
            font-size: 15px;
            border-radius: 10px;
            width:50%;
        }
        
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="sidebar border-right sticky-top" id="sidebar-wrapper">
            <div class="sidebar-heading text-white"><img src="<?php echo e(asset('public/assets/logo.JPG')); ?>" width="75px"> TINTATALINO</div>
                <div class="list-group list-group-flush">
                    <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item text-white mb-2"><span class="bi bi-speedometer"></span>&nbspDashboard</a>
                    <a href="<?php echo e(route('authors.index')); ?>" class="dropdown-item text-white mb-2"><span class="bi bi-person-lines-fill"></span>&nbspManage Authors</a>
                    <a href="<?php echo e(route('posts.index')); ?>" class="dropdown-item text-white mb-2"><span class="bi bi-file-earmark-post"></span>&nbspManage Post</a>
                    <a href="<?php echo e(route('category.index')); ?>" class="dropdown-item text-white mb-2"><span class="bi bi-tags"></span>&nbspManage Category</a>
                    <a href="<?php echo e(route('contacts.index')); ?>" class="dropdown-item text-white mb-2"><span class="bi bi-envelope-exclamation"></span>&nbspManage Contacts</a>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'Admin')): ?>    
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Account Management
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                
                                <div class="accordion-body">
                                    <a class="dropdown-item text-white" href="<?php echo e(route('roles.index')); ?>"><span class="bi bi-person"> Manage Roles</span></a>
                                    <a class="dropdown-item text-white" href="<?php echo e(route('permissions.index')); ?>"><span class="bi bi-shield-lock"> Manage Permissions</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-white" href="<?php echo e(route('users.index')); ?>"><span class="bi bi-people"> Manage Users</span></a>
                                    <a class="dropdown-item text-white" href="<?php echo e(route('logs.index')); ?>"><span class="bi bi-gear"> User Activity</span></a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?> 
                    </div>
                    <a href="<?php echo e(route('studentposts.index')); ?>" class="dropdown-item text-white"><span class="bi bi-house-door"></span>&nbspGo to Website</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar sticky-top navbar-expand-lg text-dark border-bottom" id="navbar">
                <button class="nav-button btn btn-light" id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg></button> <!--Toggle button-->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Welcome, <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>


                                </a>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>">Account Setting</a> -->
                                <a class="dropdown-item" href="<?php echo e(route('update-password.edit', auth()->user()->id)); ?>">Change Password</a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
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
        </div>
    </body>
</html><?php /**PATH C:\laragon\www\tatalino\resources\views/layouts/sample.blade.php ENDPATH**/ ?>