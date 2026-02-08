<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tintatalino</title>
    <link href="{{ asset('images/logo.png') }}" rel="website icon">

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
    <script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link rel="stylesheet" media="screen" href="css/style.css">

    <style>
        /* body {
            background: #f8f9fa;
            margin: 0;
        } */

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

    </style>
</head>
<body>

    <div id="particles-js"></div>
        <nav class="navbar sticky-top navbar-expand-xs border-bottom navbar-light bg-white" id="navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Tinta’t Talino
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                                Welcome, {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                @hasrole('Admin')
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Admin Dashboard</a>
                                @endhasrole
                                <a class="dropdown-item" href="{{ route('studentposts.index') }}">Home</a>
                                <a class="dropdown-item" href="{{ route('studentposts.show', auth()->user()->id) }}">My Feed</a>
                                <a class="dropdown-item" href="{{ route('update-password.edit', auth()->user()->id) }}">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
   
    <div class="content" style="position: relative; z-index: 1;">
        @guest
            <div class="welcome-banner">
                <h1>Welcome to Tinta't Talino!</h1>
                <p class="lead">Join a learning community where students share ideas and grow together.</p>
                <div class="welcome-actions">
                    <a href="{{ route('login') }}" class="btn btn-light btn-lg">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Register</a>
                </div>
            </div>
        @endguest
        <div class="container mt-3">
            @yield('content')
            @include('sweetalert::alert')
        </div>
    </div>
</body>
</html>
