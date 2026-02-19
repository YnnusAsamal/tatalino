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
    
    <div class="row mt-2" style="overflow-y: auto; position: relative; max-height: 80vh;">
        <div class="col-md-8">
            <div class="feed-posts">
                <h3>Published Literary Works</h3>
                <hr>
                @foreach($posts as $post)
                <div class="card mb-3 shadow">
                    <div class="card-header d-flex align-items-center">
                        @php
                            $images = json_decode($post->users->profile->image ?? '[]', true);
                            $profileImage = $images[0] ?? null;
                        @endphp
                        @if($profileImage)
                            <img src="{{ asset('public/assets/userprofiles/' . $profileImage) }}" alt="Profile Image" class="rounded-profile me-3" style="width: 50px; height: 50px; border: 2px solid #FBC02D;">
                        @else
                            <div class="rounded-profile me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
                        @endif

                        <div>
                            <strong>{{ $post->users->name ?? 'NA' }}</strong><br>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() ?? 'NA' }}</small><br>
                            <small class="text-muted"><span class="badge bg-secondary ">{{ optional($post->category)->name ?? 'Uncategorized' }}</span></small>
                        </div>
                        <div class="float-right ms-auto">
                            @if($post->status === 'Published')
                                <span class="badge bg-success">Published</span>
                            @else
                                    <span class="badge bg-warning text-dark">Draft</span>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <div class="position-relative">
                            <div class="post-content text-dark" id="post-content-{{ $post->id }}">
                                {!! $post->content !!}
                            </div>

                            <button 
                                class="btn btn-link p-0 see-more-btn d-none" 
                                id="toggle-btn-{{ $post->id }}"
                                onclick="toggleContent({{ $post->id }})">
                                See More
                            </button>
                        </div>

                        @if($post->image)
                            <img src="{{ asset('public/assets/posts/' . $post->image) }}" alt="Post Image" class="img-fluid rounded mt-3" style="max-width: 100%; height: auto;">
                        @endif
                    </div>

                    <div class="card-footer d-flex gap-2">
                        @php
                            $likedUsers = $post->likes->map(function($like) {
                                return $like->user->name ?? '';
                            })->implode(', ');
                        @endphp

                        <form action="{{ route('post.like', $post->id) }}" method="POST">
                            @csrf
                            <button 
                                class="btn btn-sm btn-outline-danger"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="{{ $likedUsers ?: 'No likes yet' }}">
                                ❤️ {{ $post->likes->count() }}
                            </button>
                        </form>
                        <button class="btn btn-outline-primary btn-sm flex-grow-1">💬 Comment</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4 sticky-sidebar">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Suggested Friends</h5>
                    <p class="card-text">Connect with fellow writers and readers!</p>
                    <ul class="list-group">
                        <li class="list-group-item d-flex align-items-center">
                            <img src="{{ asset('public/assets/userprofiles/default.png') }}" alt="User 1" class="rounded-profile me-3" style="width: 40px; height: 40px; border: 2px solid #FBC02D;">
                            <div>
                                <strong>Jane Doe</strong><br>
                                <small class="text-muted">5 mutual friends</small>
                            </div>
                            <button class="btn btn-sm btn-outline-primary ms-auto">Follow</button>
                        </li>
                    </ul>
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
