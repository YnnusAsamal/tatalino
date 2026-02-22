@extends('layouts.student')

@section('content')
<div class="container mt-4">
    <div class="card shadow p-4 text-center">

        @php
            $images = json_decode($user->profile->image ?? '[]', true);
            $profileImage = $images[0] ?? null;
        @endphp

        @if($profileImage)
            <img src="{{ asset('public/assets/userprofiles/' . $profileImage) }}"
                 class="rounded-circle mb-3 align-self-center"
                 style="width:150px;height:150px;border:4px solid #FBC02D;">
        @endif

        <h3>{{ $user->name }}</h3>
        <p class="text-muted">{{ $user->email }}</p>
        <div class="d-flex justify-content-center gap-4 mt-3">
            <div>
                <strong>{{ $user->followers->count() }}</strong><br>
                <small>Followers</small>
            </div>
            <div>
                <strong>{{ $user->following->count() }}</strong><br>
                <small>Following</small>
            </div>
        </div>
        @if(auth()->id() !== $user->id)

            @php
                $isFollowing = auth()->user()
                                ->following()
                                ->where('following_id', $user->id)
                                ->exists();
            @endphp

            <form action="{{ route('follow.toggle', $user->id) }}" method="POST" class="mt-3">
                @csrf
                <button class="btn {{ $isFollowing ? 'btn-secondary' : 'btn-success' }}">
                    {{ $isFollowing ? 'Following' : 'Follow' }}
                </button>
            </form>

        @endif

        <hr>

        <h5>Published Posts</h5>
        @foreach($user->posts as $post)
            @if($post->status === 'Published')
                <div class="mb-2">
                    <a href="#">
                        {{ $post->title }}
                    </a>
                </div>
            @endif
        @endforeach

    </div>
</div>
@endsection