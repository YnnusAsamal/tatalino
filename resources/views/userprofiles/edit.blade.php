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

<div class="container mt-5">
    <h2 class="mb-4 text-center">Update Your Profile</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="profile-card text-center">
        @if($userId && $userId->profile)
            {{-- Profile Image --}}
            @if($userId->profile->image)
                <img src="{{ asset($userId->profile->image) }}" alt="Profile Image" class="rounded-profile mb-3 shadow">
            @else
                <p>No profile image available.</p>
            @endif

            <div class="card-body mt-3">
                <h5 class="card-title">Current Profile Info</h5>
                <p><strong>Description:</strong> {{ $userId->profile->user_description }}</p>
                <p><strong>Bio:</strong> {{ $userId->profile->bio }}</p>
                <p><strong>Hobby:</strong> {{ $userId->profile->hobby }}</p>
            </div>
        @else
            <p class="text-muted">No profile information available.</p>
        @endif
    </div>

    <form action="{{ route('userprofiles.update', Auth::id()) }}" method="POST" enctype="multipart/form-data" class="profile-card">
        @csrf
        @method('PUT')

        <h5 class="card-title">Edit Your Profile</h5>

        <div class="mb-4 text-center">
            <label for="image" class="form-label">Change Profile Image</label>
            @if($userId && $userId->profile && $userId->profile->image)
                <img src="{{ asset($userId->profile->image) }}" alt="Current Image" class="rounded-profile mb-2">
            @else
                <p>No profile image available.</p>
            @endif
            <input type="file" name="image" id="image" class="form-control mt-2" accept="image/*">
        </div>

        <div class="mb-4">
            <label for="user_description" class="form-label">Description</label>
            <input type="text" name="user_description" id="user_description" class="form-control"value="{{ $userId->profile->user_description ?? '' }}">
            @error('user_description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio', $userId->profile->bio ?? '') }}</textarea>
            @error('bio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="hobby" class="form-label">Hobby</label>
            <input type="text" name="hobby" id="hobby" class="form-control"value="{{ old('hobby', $userId->profile->hobby ?? '') }}">
            @error('hobby')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">Update Profile</button>
        </div>
    </form>
</div>
@endsection
