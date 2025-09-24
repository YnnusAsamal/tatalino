@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            <h3>Edit Consumption</h3>
        </div>
        <form action="{{route('consumptions.update', $consumptions->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label>Reference Number</label>
                        <input type="text" name="" id="" class="form-control" value="{{$consumptions->referenceNum}}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Customer Name</label>
                        <input type="text" name="" id="" class="form-control" value="{{$consumptions->customer->firstname}} {{$consumptions->customer->lastname}}" readonly>
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <label>Meter Number</label>
                        <input type="text" name="" id="" class="form-control" value="{{$consumptions->customer->meterNumber}}" readonly>
                    </div>  
                </div>
                <div class="row">
                    <div class="col">
                        <label>Consumption Reading</label>
                        <input type="text" name="totalCons" id="" class="form-control" value="{{$consumptions->totalCons}}">
                    </div>  
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection