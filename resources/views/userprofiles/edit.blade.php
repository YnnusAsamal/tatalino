@extends('layouts.student')

@section('content')
<style>
      body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    }
    #particles-js {
        pointer-events: none;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 0;
        top: 0;
        left: 0;
    }

    h2, h5, label {
        font-family: 'Oswald', sans-serif;
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
<div id="particles-js"></div>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Update Your Profile</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="profile-card text-center">
        @if($userId && $userId->profile && $userId->profile->image)
            @php
                $images = json_decode($userId->profile->image, true);
                $firstImage = $images[0] ?? null;
             @endphp
            @if($firstImage)
                
                <img src="{{ asset('assets/userprofiles/' . $firstImage) }}" alt="Profile Image" class="rounded-profile mb-3 shadow">
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
                @php
                    $images = json_decode($userId->profile->image, true);
                    $firstImage = $images[0] ?? null;
                @endphp

                @if($firstImage)
                    <img src="{{ asset('assets/userprofiles/' . $firstImage) }}" alt="Current Image" class="rounded-profile mb-2">
                @else
                    <p>No profile image available.</p>
                @endif

                {{-- Hidden input to retain current image --}}
                <input type="hidden" name="existing_image" value="{{ $firstImage }}">
            @else
                <p>No profile image available.</p>
            @endif
            <input type="file" name="image" id="image" class="form-control mt-2">
        </div>

        <div class="mb-4">
            <label for="user_description" class="form-label">Description</label>
            <input 
                type="text" 
                name="user_description" 
                id="user_description" 
                class="form-control" 
                value="{{ old('user_description', $userId->profile->user_description ?? '') }}"
            >
            @error('user_description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bio" class="form-label">Bio</label>
            <textarea 
                name="bio" 
                id="bio" 
                class="form-control" 
                rows="4"
            >{{ old('bio', $userId->profile->bio ?? '') }}</textarea>
            @error('bio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="hobby" class="form-label">Hobby</label>
            <input 
                type="text" 
                name="hobby" 
                id="hobby" 
                class="form-control" 
                value="{{ old('hobby', $userId->profile->hobby ?? '') }}"
            >
            @error('hobby')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5 py-2">Update Profile</button>
        </div>
    </form>

</div>

<script>
particlesJS("particles-js", {
  "particles": {
    "number": { "value": 70 },
    "size": { "value": 3 },
    "color": { "value": "#a855f7" },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#c084fc",
      "opacity": 0.4
    },
    "move": { "speed": 2 }
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
@endsection
