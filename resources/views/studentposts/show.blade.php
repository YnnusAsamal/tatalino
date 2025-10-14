@extends('layouts.student')

@section('content')
<div class="feed-container">

    <div class="profile-card">
        <img src="{{ asset(Auth::user()->profile->image ?? 'default-avatar.png') }}" alt="User Avatar" class="avatar">

        <div class="profile-info">
            <h2>{{ Auth::user()->name }}</h2>
            <p class="bio">Aspiring writer. Lover of words and stories.</p>
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
                    <img src="{{ Auth::user()->profile && Auth::user()->profile->image
                        ? asset('asset/userprofiles/' . Auth::user()->profile->image)
                        : asset('default-avatar.png') }}"
                        alt="User Avatar" class="post-avatar">

                    <div>
                        <strong>{{ $post->users->name ?? 'NA'}}</strong>
                        <p class="date">{{ $post->created_at->diffForHumans() ?? 'NA' }}</p>
                    </div>
                </div>
                <div class="post-body">
                    <h4>{{ $post->title }}</h4>
                    <div>{!! Str::limit($post->content, 200) !!}</div>

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
    </div>


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
