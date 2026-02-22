@extends('layouts.sample')


@section('content')
<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
@import url("https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700");

body{
    background:#DCDCDC;
    /* margin-top:20px; */
}
.card-box {
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 30px;
    background-color: #fff;
}

.social-links li a {
    border-radius: 50%;
    color: rgba(121, 121, 121, .8);
    display: inline-block;
    height: 30px;
    line-height: 27px;
    border: 2px solid rgba(121, 121, 121, .5);
    text-align: center;
    width: 30px
}

.social-links li a:hover {
    color: #797979;
    border: 2px solid #797979
}
.thumb-lg {
    height: 88px;
    width: 88px;
}
.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;
}
.text-pink {
    color: #ff679b!important;
}
.btn-rounded {
    border-radius: 2em;
}
.text-muted {
    color: #98a6ad!important;
}
h4 {
    line-height: 22px;
    font-size: 18px;
}
</style>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h4>Contact Messages</h4>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach ($contacts as $contact)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $contact->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Email: {{ $contact->email }}
                        </h6>
                        <p class="card-text">
                            Message
                            <br>
                            <hr>
                            {{ $contact->message }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row"><div class="col">
        {{ $contacts->links() }}
    </div></div>
</div>


@endsection
