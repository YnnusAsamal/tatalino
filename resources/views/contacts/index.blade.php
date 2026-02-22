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
            <table class="table table-striped table-hover table-condense text-center">
                <tr>
                    <thead class="thead-dark text-center">
                        <th width="280px">No</th>
                        <th width="280px">Name</th>
                        <th width="280px">Email</th>
                        <th width="280px">Message</th>
                        <!-- <th width="280px">Action</th> -->
                    </thead>
                </tr>
                @foreach ($contacts as $key => $contact)
                    <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        {{$contact->message}}
                    </td>
                    <!-- <td>
                    </td> -->
                    </tr>
                @endforeach
            </table>
        </div>
            <div class="card-footer">
                {!! $data->render() !!}
            </div>
    </div>
</div>

@endsection
