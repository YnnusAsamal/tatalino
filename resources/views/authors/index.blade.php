@extends('layouts.sample')
@section('content')
<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
@import url("https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700");

body {
   font-family: "Open Sans", sans-serif;
}

*:hover {
   -webkit-transition: all 1s ease;
   transition: all 1s ease;
}

section {
   float: left;
   width: 100%;
   background: #fff;
   /* fallback for old browsers */
   padding: 30px 0;
}

h1 {
   float: left;
   width: 100%;
   color: #232323;
   margin-bottom: 30px;
   font-size: 14px;
}

h1 span {
   font-family: "Libre Baskerville", serif;
   display: block;
   font-size: 45px;
   text-transform: none;
   margin-bottom: 20px;
   margin-top: 30px;
   font-weight: 700;
}

h1 a {
   color: #131313;
   font-weight: bold;
}

.profile-card-3 {
   font-family: "Open Sans", Arial, sans-serif;
   position: relative;
   float: left;
   overflow: hidden;
   width: 100%;
   text-align: center;
   height: 368px;
   border: none;
}

.profile-card-3 .background-block {
   float: left;
   width: 100%;
   height: 200px;
   overflow: hidden;
}

.profile-card-3 .background-block .background {
   width: 100%;
   vertical-align: top;
   opacity: 0.9;
   -webkit-filter: blur(0.5px);
   filter: blur(0.5px);
   -webkit-transform: scale(1.8);
   transform: scale(2.8);
}

.profile-card-3 .card-content {
   width: 100%;
   padding: 15px 25px;
   color: #232323;
   float: left;
   background: #efefef;
   height: 50%;
   border-radius: 0 0 5px 5px;
   position: relative;
   z-index: 9999;
}

.profile-card-3 .card-content::before {
   content: "";
   background: #efefef;
   width: 120%;
   height: 100%;
   left: 11px;
   bottom: 51px;
   position: absolute;
   z-index: -1;
   transform: rotate(-13deg);
}

.profile-card-3 .profile {
   border-radius: 50%;
   position: absolute;
   bottom: 50%;
   left: 50%;
   max-width: 100px;
   opacity: 1;
   box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
   border: 2px solid rgba(255, 255, 255, 1);
   -webkit-transform: translate(-50%, 0%);
   transform: translate(-50%, 0%);
   z-index: 99999;
}

.profile-card-3 h2 {
   margin: 0 0 5px;
   font-weight: 600;
   font-size: 25px;
}

.profile-card-3 h2 small {
   display: block;
   font-size: 15px;
   margin-top: 10px;
}

.profile-card-3 i {
   display: inline-block;
   font-size: 16px;
   color: #232323;
   text-align: center;
   border: 1px solid #232323;
   width: 30px;
   height: 30px;
   line-height: 30px;
   border-radius: 50%;
   margin: 0 5px;
}

.profile-card-3 .icon-block {
   float: left;
   width: 100%;
   margin-top: 15px;
}

.profile-card-3 .icon-block a {
   text-decoration: none;
}

.profile-card-3 i:hover {
   background-color: #232323;
   color: #fff;
   text-decoration: none;
}


    .card.profile-card-3 {
        position: relative;
        overflow: hidden;
        height: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card-content h2 {
        font-size: 1.2rem;
        margin: 0;
        padding: 0.5rem;
        max-height: 70px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .card-content small {
        display: block;
        color: #666;
        font-size: 0.9rem;
        max-height: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .profile-thumb-block .profile {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #FBC02D;
    }

    .author-description {
        max-height: 60px;
        overflow: auto;
        font-size: 0.95rem;
        padding: 0 0.5rem;
        text-align: center;
    }

    /* Optional scrollbar styling */
    .author-description::-webkit-scrollbar {
        width: 6px;
    }
    .author-description::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 3px;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col">
            <h3 class="float-left">Authors</h3>
        </div>
    </div>
    <hr>
<div class="row mb-4">
    <div class="col-md-6">
        <form action="{{ route('authors.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search authors..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    @foreach($authors as $author)
    <div class="col-md-4 mb-4">
        <div class="card profile-card-3">
            <div class="background-block">
                @php
                    $images = json_decode($author->profile->image, true);
                    $firstImage = $images[0] ?? null;
                @endphp
                @if($firstImage)
                    <img src="{{ asset('public/assets/userprofiles/' . $firstImage) }}" alt="Profile Image" class="rounded-profile mb-3 shadow">
                @else
                    <p>No profile image available.</p>
                @endif
            </div>

            <div class="profile-thumb-block text-center mt-2">
                @if($firstImage)
                    <img src="{{ asset('public/assets/userprofiles/' . $firstImage) }}" alt="profile-image" class="profile" />
                @else
                    <p>No profile image available.</p>
                @endif
            </div>

            <div class="card-content text-center px-2">
                <h2>{{ $author->name }}<small>{{ $author->profile->bio }}</small></h2>
            </div>

            <div class="author-description mt-2 text-center">
                <strong>{{ $author->profile->user_description }}</strong>
            </div>

            <!-- Featured Button -->
            <div class="text-center mt-2">
                <form action="{{ route('authors.featured', $author->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-outline-warning">
                        ⭐ Feature
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @if($authors->isEmpty())
        <div class="col-12 text-center">
            <p class="text-muted">No authors found.</p>
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{ $authors->appends(['search' => request('search')])->links() }}
    </div>
</div>
@endsection