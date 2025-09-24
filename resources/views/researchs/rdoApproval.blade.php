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
                <strong class="lead d-inline">List of Research for Approval</strong>
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
                                <th>File</th>
                                <th>Created At</th>
                                <th>RIU Appoved At</th>
                                <th width="360px">Action</th>
                            </thead>
                        </tr>
                        @forelse($researchs as $file)
                        <tr>
                            <td>{{$file->researchTitle}}</td>
                            <td>{{$file->researchDescription}}</td>
                            <td>{{$file->author}}</td>
                            <td><span class="badge badge-pill badge-danger">{{$file->researchStatus}}</s[an></td>
                            <td>{{$file->file}}</td>
                            <td>{{$file->created_at}}</td>
                            <td>{{$file->approved_at}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ asset('/laraview/#../assets/'.$file->file) }}" class="btn btn-warning ">Preview</a>
                                <a href="{{ route('researchs.researchApproved', $file->id) }}" class="btn btn-info ">Approve</a>
                                <a href="{{ route('researchs.researchDisapproved', $file->id)}}" class="btn btn-danger">Disapproved</a>    
                            </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No research found.</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection