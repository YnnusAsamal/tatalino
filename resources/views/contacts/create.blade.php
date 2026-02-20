@extends('layouts.student')

@section('content')
<style>
    body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    }
     header {
    text-align: center;
    padding: 2rem 1rem 1rem;
  }

  header h1 {
    font-size: 2.5rem;
    margin: 0;
    color: #2E7D32;
  }

  header p {
    font-size: 0.9rem;
    margin-top: 0.5rem;
    color: #444;
    letter-spacing: 1px;
  }

    h2, h5, label {
        font-family: 'Oswald', sans-serif;
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
    #particles-js {
        pointer-events: none;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 0;
        top: 0;
        left: 0;
    }

    h2, h5, label {
    font-family: 'Oswald', sans-serif;
    color: #2E7D32;
    }

    .feed-scroll {
        height: 100vh;
        overflow-y: auto;
        padding-right: 15px;
    }
    .sticky-sidebar {
        position: sticky;
        top: 80px; /* distance from top */
        height: fit-content;
    }

    @media (max-width: 768px) {
    main.container {
      grid-template-columns: 1fr;
    }

    header h1 {
      font-size: 2rem;
    }

    .featured h2 {
      font-size: 1.5rem;
    }
    
  }
  .post-content {
    max-height: 120px;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.post-content.expanded {
    max-height: none;
}

    
</style>
<div id="particles-js"></div>
<div class="container-fluid">
    <header>
        <h1>Tinta’t Talino</h1>
        <p>THE CCNHS PORTAL FOR WORDS AND WONDER</p>
    </header>
    <div class="row">
        <div class="col">
            <section class="navigation">
            @auth
                <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
                
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('studentposts.index') }}">Home</a>
                    </li>
                    |
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('essays.index') }}">Essays</a>
                    </li>
                    |
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('collections.index') }}">Collections</a>
                    </li>
                    |
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="">Explore</a>
                    </li>
                    |
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('publish.index') }}">Publish</a>
                    </li>
                    |
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="">About</a>
                    </li>
                    |
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="">Contact</a>
                    </li>
                </ul>
            @else
                <!-- <ul class="navbar-nav d-flex flex-row gap-3 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('register') }}">Register</a>
                    </li>
                </ul> -->
            @endauth
        </section>
        </div>
    </div>
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <h3 class="mb-0">Contact Us</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p>
                        We value your feedback and inquiries! Please fill out the form below to get in touch with us. Whether you have questions about our services, want to share your thoughts, or need assistance, we're here to help. We look forward to hearing from you!
                    </p>
                    <div class="form-group">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="email" class="mt-3">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="message" class="mt-3">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mt-3">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".post-content").forEach(function(content) {
        const postId = content.id.split("-").pop();
        const button = document.getElementById("toggle-btn-" + postId);

        if (content.scrollHeight > 120) {
            button.classList.remove("d-none");
        }
    });
});

function toggleContent(postId) {
    const content = document.getElementById("post-content-" + postId);
    const button = document.getElementById("toggle-btn-" + postId);

    content.classList.toggle("expanded");

    if (content.classList.contains("expanded")) {
        button.innerText = "See Less";
    } else {
        button.innerText = "See More";
    }
}
</script>
@endsection
