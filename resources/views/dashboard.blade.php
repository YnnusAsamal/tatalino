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
    </div>

</body>

@endsection
