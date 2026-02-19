@extends('layouts.sample')
@section('content')
<style>
    body{
    background:#DCDCDC;
    /* margin-top:20px; */
}
</style>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>All Posts</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <input type="text" class="form-control" placeholder="Search Authors...">
                <button class="btn btn-outline-secondary">Search</button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary">Refresh</a>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-6 mb-4">
            <div class="card h-100" style="height: 400px;">
                @if($post->image)
                    <img src="{{ asset('assets/posts/' . $post->image) }}" 
                        class="card-img-top" 
                        alt="Post Image" 
                        style="height:200px; object-fit:cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>

                    <div class="card-text flex-grow-1" 
                        style="max-height: 100px; overflow-y: auto; padding-right:5px;">
                        {!! $post->content !!}
                    </div>

                    <div class="status">
                        @if(in_array($post->status, ['draft', 'Unpublished']))
                        <span class="badge badge-danger">
                            {{$post->status}}
                        </span>
                        @else

                        <span class="badge badge-success">
                            {{$post->status}}
                        </span>
                        @endif
                    </div>

                    <div class="author mt-2">
                        <label class="fw-bold">Author:</label> {{$post->users->name}}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-warning btn-sm">Edit</a>

                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>

                    @if(in_array($post->status, ['draft','Unpublished']))
                        <form action="{{ route('posts.published', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm"
                                onclick="return confirm('Are you sure you want to publish this post?')">
                                Publish
                            </button>
                        </form>
                    @else
                        <form action="{{ route('posts.unpublished', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secondary btn-sm"
                                onclick="return confirm('Are you sure you want to unpublish this post?')">
                                Unpublish
                            </button>
                        </form>
                    @endif


                    @if($post->featured == '1')
                        <form action="{{ route('posts.unfeatured', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm"
                                onclick="return confirm('Are you sure you want to unfeature this post?')">
                                Unfeature
                            </button>
                        </form>
                    @else
                        <form action="{{ route('posts.featured', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm"
                                onclick="return confirm('Are you sure you want to feature this post?')">
                                Feature
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection