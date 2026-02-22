@extends('layouts.student')

@section('content')
<style>
      body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 16px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
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
</style>
<div id="particles-js"></div>
<div class="container mt-4">
    <div class="card shadow p-4 text-center">

        @php
            $images = json_decode($user->profile->image ?? '[]', true);
            $profileImage = $images[0] ?? null;
        @endphp

        @if($profileImage)
            <img src="{{ asset('public/assets/userprofiles/' . $profileImage) }}"
                 class="rounded-circle mb-3 align-self-center"
                 style="width:150px;height:150px;border:4px solid #FBC02D;">
        @endif

        <h3>{{ $user->name }}</h3>
        <p class="text-muted">{{ $user->email }}</p>
        <div class="d-flex justify-content-center gap-4 mt-3">
            <div>
                <strong>{{ $user->followers->count() }}</strong><br>
                <small>Followers</small>
            </div>
            <div>
                <strong>{{ $user->following->count() }}</strong><br>
                <small>Following</small>
            </div>
        </div>
        @if(auth()->id() !== $user->id)

            @php
                $isFollowing = auth()->user()
                                ->following()
                                ->where('following_id', $user->id)
                                ->exists();
            @endphp

            <form action="{{ route('follow.toggle', $user->id) }}" method="POST" class="mt-3">
                @csrf
                <button class="btn {{ $isFollowing ? 'btn-secondary' : 'btn-success' }}">
                    {{ $isFollowing ? 'Following' : 'Follow' }}
                </button>
            </form>

        @endif

        <hr>

        <h5>Published Posts</h5>
        @foreach($user->posts as $post)
            @if($post->status === 'Published')
                <div class="mb-2">
                    <a href="#">
                        {{ $post->title }}
                    </a>
                </div>
            @endif
        @endforeach

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
@endsection