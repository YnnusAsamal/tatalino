@extends('layouts.student')

@section('content')
<style>
    body {
        font-family: 'Lato', sans-serif;
        background-size: 400% 400%;
        animation: gradientMove 12s ease infinite;
        color: #fff;
        overflow-x: hidden;
    }
      @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
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
    comment-card {
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
<div id="particles-js"></div>
<div class="feed-container">
    <div class="profile-card">
        <div class="comment-card">
            @if(Auth::user() && Auth::user()->profile && Auth::user()->profile->image)
                @php
                    $images = json_decode(Auth::user()->profile->image, true);
                    $firstImage = $images[0] ?? null;
                @endphp
                @if($firstImage)
                 <div class="d-flex flex-column" style="width: 150px;">
                    <img src="{{ asset('public/assets/userprofiles/' . $firstImage) }}"
                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                        style="width: 150px; z-index: 1">
                </div>
    
                @else
                    <p>No profile image available.</p>
                @endif
            @else
                <p class="text-muted">No profile information available.</p>
            @endif
            <div class="profile-info">
                <h2>{{ Auth::user()->name }}</h2>
                <p class="bio">{{ Auth::user()->profile->bio ?? 'No bio available.' }}</p>
            </div>
            <div class="edit-profile">
                <a href="{{ route('userprofiles.edit', Auth::id()) }}" class="btn btn-secondary btn-sm">Edit Profile</a>
            </div>
        </div>
    </div>
        
   <div class="comment-card">
    <h4>Create Post</h4>

    <form action="{{ route('studentposts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="title" placeholder="Enter Post Title" class="form-control" required>
            </div>

            <div class="col-md-6">
                <select name="category" class="form-select">
                    <option value="">Choose Category</option>
                    @foreach($category as $data)
                        <option value="{{ $data->id }}">
                            {{ $data->name }} | {{ $data->subcategory }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <textarea name="content" id="editor" class="form-control" placeholder="What are your thoughts?"></textarea>
        </div>
        <div class="mb-3">
            <input type="file" name="image" accept="image/*" class="form-control">
        </div>
        <button type="submit" class="btn-purple">
            Submit Post
        </button>

    </form>
</div>


</div>
<script>
    CKEDITOR.replace('editor', {
        height: 300,
        removeButtons: 'PasteFromWord',
        filebrowserUploadMethod: 'form',
        extraPlugins: 'font',
        toolbar: [
            { name: 'styles', items: ['Font', 'FontSize'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] }
        ]
    });
</script>

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
<div id="particles-js"></div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
@endsection
