@extends('layouts.student')

@section('content')
<div class="feed-container">

    <!-- User Profile Section -->
    <div class="profile-card">
        <img src="https://picsum.photos/100" alt="User Avatar" class="avatar">
        <div class="profile-info">
            <h2>{{ Auth::user()->name }}</h2>
            <p class="bio">Aspiring writer. Lover of words and stories.</p>
            <div class="stats">
                <span><strong>12</strong> Posts</span>
                <span><strong>58</strong> Followers</span>
                <span><strong>34</strong> Following</span>
            </div>
        </div>
    </div>

    <!-- Create Post Section -->
    <div class="create-post">
        <h3>Create a New Post</h3>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post Title" required>
            <textarea name="content" rows="5" placeholder="Write your thoughts..." required></textarea>
            <button type="submit">Publish</button>
        </form>
    </div>

    <!-- Feed Section -->
    <div class="feed-posts">
        <h3>Latest Posts</h3>

        @foreach($posts as $post)
            <div class="post-card">
                <div class="post-header">
                    <img src="https://picsum.photos/50" class="post-avatar" alt="">
                    <div>
                        <strong>{{ $post->user->name }}</strong>
                        <p class="date">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="post-body">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ Str::limit($post->content, 200) }}</p>
                </div>
                <div class="post-footer">
                    <button>👍 Like</button>
                    <button>💬 Comment</button>
                    <button>↪ Share</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
