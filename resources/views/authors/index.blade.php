@extends('layouts.sample')
@section('content')
<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
@import url("https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700");

body{
    background:#DCDCDC;
    /* margin-top:20px; */
}
.card-box {
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 30px;
    background-color: #fff;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}
</style>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="float-left">Authors</h3>
        </div>
    </div>
    <hr>
    <div class="row mb-3">
        <div class="col">
            <form action="{{ route('authors.index') }}" method="GET">
                <div class="d-flex justify-content-start align-items-center mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search authors..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                    <a href="{{ route('authors.index') }}" class="btn btn-outline-info">Refresh</a>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <div class="d-flex justify-content-center mt-4">
                {{ $authors->links() }}
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-sm-4"><a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus"></i> Add Member</a></div>
    </div> -->
    <div class="row">
        @forelse($authors as $author)
        <div class="col-lg-4">
            <div class="text-center card-box">
                <div class="member-card pt-2 pb-2">
                    @php
                        $images = json_decode($author->profile->image, true);
                        $firstImage = $images[0] ?? null;
                    @endphp
                        @if($firstImage)
                            <div class="thumb-lg member-thumb mx-auto"><img src="{{ asset('assets/userprofiles/' . $firstImage) }}" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        @else
                            <p>No profile image available.</p>
                        @endif
                    
                    <div class="">
                        <h4>{{ $author->name }}</h4>
                        <p class="text-muted">{{ $author->profile->bio }}</p>
                    </div>
                    <div class="text-center mt-2 mb-2">
                        @
                        <form action="{{ route('authors.featured', $author->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                                Feature
                            </button>
                        </form>
                        
                    </div>
                    <!-- <div class="mt-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>2563</h4>
                                    <p class="mb-0 text-muted">Wallets Balance</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>6952</h4>
                                    <p class="mb-0 text-muted">Income amounts</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>1125</h4>
                                    <p class="mb-0 text-muted">Total Transactions</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        @empty
            <p class="text-center">No authors found.</p>
        @endforelse
    </div>
</div>

@endsection