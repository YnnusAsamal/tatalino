@extends('layouts.sample')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h4>Contact Messages</h4>
        </div>
    </div>
    <div class="row">
        @foreach ($contacts as $contact)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $contact->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $contact->email }}
                        </h6>
                        <p class="card-text">
                            {{ $contact->message }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row"><div class="col">
        {{ $contacts->links() }}
    </div></div>
</div>


@endsection
