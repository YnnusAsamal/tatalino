@extends('layouts.sample')
@section('content')

<body>
    <div class="container-fluid">
        <div class="mt-2 py-2">
            <div class="card shadow">
                <div class="card-body">
                    Welcome to Admin Dashboard, {{Auth::user()->name}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card border-warning shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Authors</h5>
                        <p class="card-text display-4">{{ $totalAuthors }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-info shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <p class="card-text display-4">{{ $totalPosts }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-success shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Published Posts</h5>
                        <p class="card-text display-4">{{ $totalPublishedPosts }}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-secondary shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Draft Posts</h5>
                        <p class="card-text display-4">{{ $totalDraftPosts }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <p class="card-text display-4">{{ $totalCategories }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection
