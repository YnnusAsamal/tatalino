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
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.0.0/trix.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link rel="stylesheet" media="screen" href="css/style.css">

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

   

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* 💫 Particles layer */
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

    /* 🚀 Neon Gradient Button */
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

    @keyframes gradientBtn {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .btn-purple:hover {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(236,72,153,0.8);
    }
    </style>
</head>
<body>

    <div id="particles-js"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
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
                        <li class="nav-item">
                            <span class="nav-link text-dark">
                                Welcome, {{ Auth::user()->name }}
                            </span>
                        </li>

                        @hasrole('Admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Admin Dashboard</a>
                            </li>
                        @endhasrole

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('studentposts.index') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('studentposts.show', auth()->user()->id) }}">My Feed</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('update-password.edit', auth()->user()->id) }}">Change Password</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
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

    <div id="particles-js"></div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

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
</body>
</html>
