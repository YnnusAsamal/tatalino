@extends('layouts.sample')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3>All Posts</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100" style="height: 400px;"> {{-- fixed height --}}
                @if($post->image)
                    <img src="{{ asset('public/assets/posts/' . $post->image) }}" 
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
                        {{$post->status}}
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

                    @if($post->status == ['draft','Unpublished'])
                        <form action="{{route('posts.published')}}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Publish</button>
                        </form>
                    @else
                        <form action="{{route('posts.unpublished')}}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secondary btn-sm">Unpublish</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection