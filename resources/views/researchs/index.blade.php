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
    <div class="mt-2 py-2">
        @if($errors->any())
        <div class="alert alert-danger">
            <strong>Wwhoops</strong> There were som problems in the inputs!
            <ul>
                @foreach($errors->all as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="card">
            <div class="card-header">
                <strong class="lead d-inline">List of Research</strong>
                <!-- @can('research-create')
                <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal"><span class="bi bi-plus-circle-dotted">&nbsp Add new research</span></button>
                @endcan -->
                <br><br>
                <form method="GET">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            name="search"
                            value="{{ request()->get('search') }}"
                            class="form-control"
                            placeholder="Search..."
                            aria-label="Search"
                            aria-describedby="button-addon2">
                        <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                        <a href="{{ route('researchs.index')}}" class="btn btn-info">Refresh</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-condense table-bordered table-hover text-center">
                        <tr>
                            <thead>
                                <th>Research Name</th>
                                <th>Description</th>
                                <th>Author/s</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>File</th>
                                <th>Created Date</th>
                                <th>Approved Date</th>
                                <th>Action</th>
                            </thead>
                        </tr>
                        @foreach($researchs as $file)
                        <tr>
                            <td>{{$file->researchTitle}}</td>
                            <td>{{$file->researchDescription}}</td>
                            <td>{{$file->author}}</td>
                            <td><span class="badge badge-success">{{$file->researchStatus}}</span></td>
                            <td><span class="badge badge-warning">{{$file->remarks}}</span></td>

                            <td>{{$file->file}}</td>
                            <td>{{$file->created_at}}</td>
                            <td>{{$file->approved_at}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    @can('research-download')
                                    <a href="{{ route('download',$file->file) }}" class="btn btn-info btn-action">Download</a>
                                    @endcan
                                    @can('research-prev')
                                    <a href="{{ asset('/laraview/#../assets/'.$file->file) }}" class="btn btn-warning btn-action">Preview</a>
                                    @endcan
                                    @can('research-edit')
                                    <a href="{{route('researchs.edit', $file->id)}}" class="btn btn-success btn-action btn-lock">Edit</a>
                                    @endcan
                                    @can('researcht-del')
                                    <a href="{{route('researchs.destroy', $file->id)}}" class="btn btn-danger btn-action btn-lock">Delete</a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </table>

                    <div class="d-flex">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection