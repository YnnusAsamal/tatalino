<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Water Billing System</title>
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
        background-color: #6DB4FA !important;
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
        background-color: #6DB4FA !important;
        
        }
        #sidebar-wrapper .accordion-body{
        width: 15rem;
        position:sticky;
        top:0;
        background-color: #6DB4FA !important;
        
        
        }
        #sidebar-wrapper .accordion-button{
        width: 15rem;
        position:sticky;
        top:0;
        background-color: #6DB4FA !important;
        
        
        }
        #flush-collapseOne{
        width: 15rem;
        background-color: #6DB4FA !important;
        
        
        }
        #flush-collapseTwo{
        width: 15rem;
        background-color: #6DB4FA !important;
        
        
        }
        #flush-collapseThree
        {
        width: 15rem;
        background-color: #6DB4FA !important;
        
        
        }
        .accordion-button{
            width: 15rem;
        background-color: #6DB4FA !important;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }
        .navbar{
        background-color: #6DB4FA !important;
        }

        .nav-button{
        background-color: #6DB4FA !important;
        }
        
        {
            background-color: #6DB4FA !important;
        }
        .content {
            /* Add your background image URL and other properties */
            background-image: url('/assets/Picture2.png'); 
            background-size: cover; /* Adjust as needed */
            background-position: center; /* Adjust as needed */
            height: 100vh; /* Adjust to cover the full viewport height */
            color: #000000; /* Adjust text color for better visibility */
            position: relative;
            overflow: hidden;
        }

        .blur-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(10px); /* Adjust the blur intensity */
        }
        /* .content {
        padding: 16px;
        }

        .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        }

        .sticky + .content {
        padding-top: 60px;
        }
        .navbar {
        overflow: hidden;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        
        } */


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


        /* .scrollbar-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-deep-purple::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-deep-purple::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #512da8;
        }

        .scrollbar-deep-purple {
            scrollbar-color: #512da8 #F5F5F5;
        }

        .scrollbar-cyan::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-cyan::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-cyan::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #00bcd4;
        }

        .scrollbar-cyan {
            scrollbar-color: #00bcd4 #F5F5F5;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-dusty-grass::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #F5F5F5;
            border-radius: 10px;
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
            background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);
        }

        .bordered-deep-purple::-webkit-scrollbar-track {
            -webkit-box-shadow: none;
            border: 1px solid #512da8;
        }

        .bordered-deep-purple::-webkit-scrollbar-thumb {
            -webkit-box-shadow: none;
        }

        .bordered-cyan::-webkit-scrollbar-track {
            -webkit-box-shadow: none;
            border: 1px solid #00bcd4;
        }

        .bordered-cyan::-webkit-scrollbar-thumb {
            -webkit-box-shadow: none;
        }

        .square::-webkit-scrollbar-track {
            border-radius: 0 !important;
        }

        .square::-webkit-scrollbar-thumb {
            border-radius: 0 !important;
        }

        .thin::-webkit-scrollbar {
            width: 6px;
        } */

        /* .example-1 {
            position: relative;
            overflow-y: scroll;
            height: 200px;
        }
        .table-receive{
            position: relative;
            min-width: 0;
            width: 100%;
        } */

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
            <div class="sidebar-heading text-white"><img src="<?php echo e(asset('assets/droplogo.png')); ?>" width="75px"> WBS</div>
                <div class="list-group list-group-flush">
                    <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item text-white"><span class="bi bi-speedometer"></span>&nbspDashboard</a>
                    <a href="<?php echo e(route('costs.index')); ?>" class="dropdown-item text-white"><span class="bi bi-coin"> Costs</span></a>
                    <a href="<?php echo e(route('customers.index')); ?>" class="dropdown-item text-white"><span class="bi bi-people"> Customer List</span></a>
                    <a href="<?php echo e(route('consumptions.index')); ?>" class="dropdown-item text-white"><span class="bi bi-speedometer2"> Customer Reading</span></a>
                    <a href="<?php echo e(route('consumptions.monthlyReport')); ?>" class="dropdown-item text-white"><span class="bi bi-journals"> Report</span></a>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne2">
                            <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne2">
                                Costs
                            </button>
                            </h2>
                            <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <a href="<?php echo e(route('costs.index')); ?>" class="dropdown-item text-white"><span class="bi bi-journals"> Costs</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Customers
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <a href="<?php echo e(route('customers.index')); ?>" class="dropdown-item text-white"><span class="bi bi-journals"> Customer List</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne_3">
                            <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_2" aria-expanded="false" aria-controls="flush-collapseOne">
                                Consumption
                            </button>
                            </h2>
                            <div id="flush-collapseOne_2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <a href="<?php echo e(route('consumptions.index')); ?>" class="dropdown-item text-white"><span class="bi bi-journals"> Customer Reading</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne_2">
                            <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne_6" aria-expanded="false" aria-controls="flush-collapseOne">
                                Reports
                            </button>
                            </h2>
                            <div id="flush-collapseOne_6" class="accordion-collapse collapse" aria-labelledby="flush-headingOne_2" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <a href="" class="dropdown-item text-white"><span class="bi bi-journals"> Report</span></a>
                                </div>
                            </div>
                        </div> -->


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
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                            </div>
                        </div> -->
                    </div>

                    
<!--                     
                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasAnyRole', 'Admin|RDO')): ?>
                        <a class="nav-link link-dark dropdown-toggle bg-light" href="#" id="navbarDropdown" role="button " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Account Management</a>
                            <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('roles.index')); ?>">Manage Roles</a>
                                <a class="dropdown-item" href="<?php echo e(route('permissions.index')); ?>">Manage Permissions</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('users.index')); ?>">Manage Users</a>
                                <a class="dropdown-item" href="<?php echo e(route('logs.index')); ?>">User Activity</a>
                            </div>
                        <?php endif; ?> -->
                   
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
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
                <!--<li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>-->

                <li class="nav-item dropdown">
                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|RIU')): ?>
                <li class="nav-item dropdown">
                    <a id="navbarDropdowwn" class="nav-link  text-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="bi bi-bell-fill"></span><span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   
                    
                    <a class="dropdown-item"></a>
                   
                    <a class="dropdown-item">No record found</a>
                  
                    
                    </div>

                </li>
                <?php endif; ?>
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
        <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>

</html><?php /**PATH C:\wamp64\www\waterbilling\resources\views/layouts/sample.blade.php ENDPATH**/ ?>