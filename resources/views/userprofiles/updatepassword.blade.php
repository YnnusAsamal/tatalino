@extends('layouts.student')
@section('content')
<style>
      body {
    color: #797979;
    background: #f1f2f7;
    font-family: 'Oswald', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size: 13px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
    }
    #particles-js {
        pointer-events: none;
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: 0;
        top: 0;
        left: 0;
    }

    h2, h5, label {
        font-family: 'Oswald', sans-serif;
        color: #2E7D32;
    }
    .profile-card {
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
    }
    .profile-card p {
        font-size: 1.05rem;
        margin-bottom: 0.6rem;
        color: #333;
    }
    .form-label {
        color: #2E7D32;
        font-weight: 600;
    }
    .btn-primary {
        background-color: #2E7D32;
        border-color: #2E7D32;
    }
    .btn-primary:hover {
        background-color: #27642A;
        border-color: #27642A;
    }
    .rounded-profile {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #FBC02D;
    }
    .card-title {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
</style>
<div id="particles-js"></div>
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
<script>
particlesJS("particles-js", {
  "particles": {
    "number": { "value": 70 },
    "size": { "value": 3 },
    "color": { "value": "#a855f7" },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#c084fc",
      "opacity": 0.4
    },
    "move": { "speed": 2 }
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
@endsection 