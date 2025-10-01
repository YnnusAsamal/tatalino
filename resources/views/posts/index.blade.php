@extends('layouts.sample')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3>All Post</h3>

        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($post->image)
                <img src="{{ asset('assets/posts/' . $post->image) }}" class="card-img-top" alt="Post Image" style="height:200px; object-fit:cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="" class="btn btn-warning">Edit</a>
                <form action="" method="POST" class="d-inline"></form>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <form action="" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Published</button>
                </form>
                <form action="" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Unpublish</button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection