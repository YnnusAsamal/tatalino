@extends('layouts.student')

@section('content')
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
            <!-- <img src="{{ asset(Auth::user()->profile->image ?? 'default-avatar.png') }}" alt="User Avatar" class="avatar"> -->

            <div class="profile-info">
                <h2>{{ Auth::user()->name }}</h2>
                <p class="bio">{{ Auth::user()->profile->bio ?? 'No bio available.' }}</p>
                <!-- <div class="stats">
                    <span><strong>12</strong> Posts</span>
                    <span><strong>58</strong> Followers</span>
                    <span><strong>34</strong> Following</span>
                </div> -->
            </div>
            <div class="edit-profile">
                <a href="{{ route('userprofiles.edit', Auth::id()) }}" class="btn btn-secondary btn-sm">Edit Profile</a>
            </div>
        </div>
    </div>
        
    <!-- <div class="row my-3">
        <div class="col-auto">
            <a href="{{ route('studentposts.show', Auth::id()) }}" class="btn btn-primary">
                📄 My Post
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('studentposts.create') }}" class="btn btn-primary">
                ➕ Create Post
            </a>
        </div>
    </div> -->
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
