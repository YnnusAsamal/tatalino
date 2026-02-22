@extends('layouts.student')
@section('content')

<div class="container-fluid mt-2 py-2">
    @if(Session::has('message'))
        <div class="alert alert-success{{Session::get('class')}} alert-dismissible fade show alert-custom"
                role="alert">
            {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
</div>
     @if (count($errors))
      @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
      @endforeach
     @endif 
<div class="mt-2 py-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-body">
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ route('userprofiles.update-password', $users->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                            <div class="form-group">
                                <input type="password" id="first-name" class="form-control col-md-7 col-xs-12"  placeholder="Enter old password" name="oldpassword"> 
                            </div>

                            <div class="form-group">
                                <input type="password" id="first-name" placeholder="Enter new password" class="form-control col-md-7 col-xs-12" name="newpassword"> 
                            </div>

                            <div class="form-group">
                                <input type="password" id="first-name"  class="form-control col-md-7 col-xs-12"placeholder="Enter password confirmation"  name="password_confirmation"> 
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>                
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection 