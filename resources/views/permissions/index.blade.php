@extends('layouts.sample')


@section('content')


<div class="container-fluid">
    <div class="mt-2 py-2">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
</div>

<div class="py-12 mx-3 m-4">
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
            @can('permission-create')
                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create Permission</a>
            @endcan
            </div>
                <form action="{{ route('permissions.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Permissions">
                                <span class="fa fa-search-plus"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Search permissions" id="term">
                        <a href="{{ route('permissions.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fa fa-undo"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover table-condense">
                <tr>
                    <thead class="thead-dark">
                        <th width="280px">No</th>
                        <th width="280px">Permission</th>
                        <th width="280px">Guard Name</th>
                        <th width="280px">Action</th>
                    </thead>
                </tr>
                @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
                        <!-- <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a> -->
                        @can('permission-edit')
                        <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                        @endcan
                        @can('permission-destroy')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $permissions->render() !!}
        </div>
    </div>
</div>







@endsection