@extends('layouts.sample')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div class ="py-12 mx-3 m-4">
    <div class="card">
        <div class ="card-header">
            <div class="pull-left">
                <h4>Contact/Inquiry Management</h4>
            </div>
                <div class="pull-right">
                    <a class="btn btn-success btn-sm" href="{{ route('contacts.create') }}"> Create New Contact</a>
                </div>
        </div>
        <div class="card-body">
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
        </div>
        <div class="card-footer">
            {!! $contacts->links() !!}
        </div>
    </div>
</div>

@endsection
