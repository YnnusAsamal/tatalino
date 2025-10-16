@extends('layouts.student')

@section('content')
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

    <!-- Feed Section -->
    <div class="feed-posts">
        <h3>Latest Posts</h3>

        @foreach($myfeeds as $post)
        <div class="post-card">
            <div class="post-header">
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

                <div>
                    <strong>{{ $post->users->name ?? 'NA'}}</strong>
                    <p class="date">{{ $post->created_at->diffForHumans() ?? 'NA' }}</p>
                </div>
            </div>

            <div class="post-body">
                <h4>{{ $post->title }}</h4>
                <div class="post-content">{{$post->content}}</div>

                @if($post->image)
                    <div class="post-image">
                        <img src="{{ asset('assets/posts/' . $post->image) }}" alt="Post Image" style="max-width:100%; border-radius:8px; margin-top:10px;">
                    </div>
                @endif
            </div>

            <div class="post-footer">
                <button class="submit">👍 Like</button>
                <button class="submit">💬 Comment</button>
                <button class="submit">↪ Share</button>
            </div>
        </div>
    @endforeach


    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
            // Core editing features
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
            uploadcare_public_key: 'e2e35bdc3a44038bac07',
        });
    </script>
</div>
@endsection
