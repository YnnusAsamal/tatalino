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
    <div class="create-post">
        <h3>Create a New Post</h3>
        <hr>
        <form action="{{ route('studentposts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Post Title" class="form-control mb-2" required>
            <select name="category" class="form-select mb-2">
                <option value="No selected Category">Choose Category</option>
                @foreach($category as $data)
                <option value="{{$data->id}}">
                    {{$data->name}} | {{$data->subcategory}}
                </option>
                @endforeach
            </select>
            <textarea id="postContent" name="content" rows="5" placeholder="Write your thoughts..."></textarea>
            
            <!-- Image Upload -->
            <label for="image">Attach Image:</label>
            <input type="file" name="image" accept="image/*" class="form-control mb-2">

            <button type="submit">Publish</button>
        </form>
    </div>
    <script src="https://cdn.tiny.cloud/1/u0ahhzkwhvgib2627sg4yah2pymmi3s46ss840kiyfssldzi/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Oct 15, 2025:
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
