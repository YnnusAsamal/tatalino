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
                <h4>Users Management</h4>
            </div>
                <div class="pull-right">
                    <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Create New User</a>
                </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-condense text-center">
                <tr>
                    <thead class="thead-dark text-center">
                        <th width="280px">No</th>
                        <th width="280px">Name</th>
                        <th width="280px">Email</th>
                        <th width="280px">Roles</th>
                        <th width="280px">Department</th>
                        <th width="280px">Action</th>
                    </thead>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                        @endif
                    </td>
                    <td>{{ $user->department }}</td>
                    <td>
                        <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> -->
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
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
