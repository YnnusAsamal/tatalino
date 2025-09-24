@extends('layouts.sample')
@section('content')
<div class="py-12 mx-3 m-4">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
</div>

<div class="container-fluid">
    <div class="mt-2 py-2">
        <div class="card">
            <div class="card-header">
                Edit Research Details
            </div>
            <div class="card-body">
            <form action ="{{route('researchs.update', $researchs->id)}}" method="Post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-2">
                        <label for="researchTitle" class="col-form-label">Research Title:</label>
                        <input type="text" name="researchTitle" class="form-control" value="{{$researchs->researchTitle}}">
                    </div>
                    <div class="mb-2">
                        <label for="researchDescription" class="col-form-label">Research Description:</label>
                        <textarea name="researchDescription" id="" cols="30" rows="3" class="form-control">{{$researchs->researchDescription}}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="author" class="col-form-label">Author:</label>
                        <input type="text" name="author" class="form-control" value="{{$researchs->author}}">
                    </div>

                    <div class="mb-2">
                        <label for="file" class="col-form-label">File:</label>
                        <input type="file" class="form-control" name="file">
                        {{$researchs->file}}
                    </div>
                    <div class="mb-2">
                        <label for="status" class="col-form-label">Status:</label>
                        <select name="researchStatus" id="" class="form-select">
                            <option>{{$researchs->researchStatus}}</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="status" class="col-form-label">Department:</label>
                        <select name="department" id="" class="form-select">
                            <option>{{$researchs->department}}</option>
                                <option value="College of Engineering">College of Engineering</option>
                                <option value="College of Administration and Accountancy">College of Administration and Accountancy</option>
                                <option value="College of Hospitality Management Tourism">College of Hospitality Management Tourism</option>
                                <option value="College of Teacher Education">College of Teacher Education</option>
                                <option value="College of Industrial Technology">College of Industrial Technology</option>
                                <option value="College of Computer Studies">College of Computer Studies</option>
                                <option value="College of Criminal Justice Education">College of Criminal Justice Education</option>
                                <option value="College of Art and Sciences">College of Art and Sciences</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="meta_title" class="col-form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$researchs->meta_title}}">
                    </div>
                    <div class="mb-2">
                        <label for="" class="col-form-label">Meta Keywords</label>
                        <textarea name="meta_keywords" id="" cols="30" rows="2" class="form-control">{{$researchs->meta_keywords}}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="" class="col-form-label">Meta Description</label>
                        <textarea name="meta_description" id="" cols="30" rows="2" class="form-control">{{$researchs->meta_description}}</textarea>
                    </div>
                    
                        
                        <a href="{{route('researchs.index')}}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new research</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>


@endsection