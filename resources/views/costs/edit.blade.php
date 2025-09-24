@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            Edit Cost Details
        </div>
        <form action="{{route('costs.update', $costs->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="card-body">
                <label for="">Cost<i> (per cubic meter)</i></label>
                <input type="text" name="cost" id="" class="form-control" value="{{number_format($costs->cost, '2')}}">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection