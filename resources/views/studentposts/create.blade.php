@extends('layouts.student')

@section('content')
<head>
    <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>

    <style>
    body {
        font-family: 'Lato', sans-serif;
        background-color: #fff;
    }
    h2, h5, label {
        font-family: 'Playfair Display', serif;
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
</head>

<div class="feed-container">
    <div class="profile-card">

        @if(Auth::user() && Auth::user()->profile && Auth::user()->profile->image)
            @php
                $images = json_decode(Auth::user()->profile->image, true);
                $firstImage = $images[0] ?? null;
            @endphp
            @if($firstImage)
                <img src="{{ asset('public/assets/userprofiles/' . $firstImage) }}" alt="Profile Image" class="rounded-profile mb-3 shadow">
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
            <div class="stats">
                <span><strong>12</strong> Posts</span>
                <span><strong>58</strong> Followers</span>
                <span><strong>34</strong> Following</span>
            </div>
        </div>
        <div class="edit-profile">
            <a href="{{ route('userprofiles.edit', Auth::id()) }}" class="btn btn-secondary btn-sm">Edit Profile</a>
        </div>
    </div>
    <div class="row my-3">
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
    </div>
    <div class="create-post">
    <h3>Create a New Post</h3>
    <hr>
    <form action="{{ route('studentposts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Post Title" class="form-control mb-2" required>

        <select name="category" class="form-select mb-2">
            <option value="No selected Category">Choose Category</option>
            @foreach($category as $data)
                <option value="{{ $data->id }}">{{ $data->name }} | {{ $data->subcategory }}</option>
            @endforeach
        </select>

        <textarea name="content" id="editor" class="form-control mb-3" cols="30" rows="10"></textarea>

        <label for="image">Attach Image:</label>
        <input type="file" name="image" accept="image/*" class="form-control mb-2">

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div>

</div>
<script>
    CKEDITOR.replace('editor', {
        height: 300,
        removeButtons: 'PasteFromWord',
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
