@extends('layouts.sample')
@section('content')
<!-- <div class="container-fluid">
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
</div> -->

<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="card">
            <div class="card-header">
                <strong class="lead d-inline">Report - List of Research</strong>
                <a href="{{ route('researchs.export') }}" class="float-right btn btn-success btn-sm">
                    <span class="bi bi-filetype-xls"> Excel</span>
                </a>
                &nbsp
                <!-- <a href="{{ route('pdf.index')}}" class="float-right btn btn-danger btn-sm">
                    <span class="bi bi-file-pdf"> Pdf</span>
                </a> -->
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
                                <th>Created at</th>
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
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('download',$file->file) }}" class="btn btn-info btn-action">Download</a>
                                    <a href="{{ asset('/laraview/#../assets/'.$file->file) }}" class="btn btn-warning btn-action">Preview</a>
                                    <a href="{{route('researchs.edit', $file->id)}}" class="btn btn-success btn-action btn-lock">Edit</a>
                                    <a href="{{route('researchs.destroy', $file->id)}}" class="btn btn-danger btn-action btn-lock">Delete</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection