@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="float-start">Customer List</h3>
            <div class="button-modal float-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Customer
                </button>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row">
                <div class="col">
                <form action="{{ route('customers.index') }}" method="GET">
                <label for="">Search Here:</label>
                    <div class="input-group">
                    
                    <input type="text" name="search" class="form-control" placeholder="Search by name or contact number" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-sm btn-warning">Search</button>
                    <a href="{{route('customers.index')}}" class="btn btn-sm btn-primary">Refresh</a>
                    </div>
                    
                </form>
                </div>
                <div class="col">
                <form action="{{ route('filter') }}" method="get">
                <label for="address2">Filter by Purok</label>
                <div class="input-group">
                    
                    <select name="address2" class="form-select">
                        <option value="">Select Purok</option>
                        <option value="Purok 4">Purok 4</option>
                        <option value="Purok 5">Purok 5</option>
                        <option value="Purok 6">Purok 6</option>
                        <option value="Purok 7">Purok 7</option>
                    </select>
                    <button type="submit"class="btn btn-sm btn btn-warning float-end">Filter</button>
                </div>
                
            </form>
                </div>
            </div>
            <hr>
            <div class="table table-responsive">
                <table class="table table-condense table-bordered">
                    <thead class="text-center thead-dark text-center">
                        <tr>
                            <th>No.</th>
                            <th>Last Name</th>
                            <th>Fist Name</th>
                            <th>Middle Name</th>
                            <!-- <th>Date Of Birth</th> -->
                            <th>Address</th>
                            <th>Purok</th>
                            <th>Contact Number</th>
                            <th>Meter Number</th>
                            <th>Status</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$customer->lastname}}</td>
                            <td>{{$customer->firstname}}</td>
                            <td>{{$customer->middlename}}</td>
                            <!-- <td>{{$customer->dob}}</td> -->
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->address2}}</td>
                            <td>{{$customer->contactNumber}}</td>
                            <td>{{$customer->meterNumber}}</td>
                            <td>
                                @if($customer->status =='Active')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            <td>
                                <a href="{{route('customers.edit', $customer->id)}}" class="btn btn-warning btn-sm">Update</a>
                                <!-- <a href="{{route('customers.destroy', $customer->id)}}" class="btn btn-danger btn-sm" data-confirm-delete="true">Remove</a> -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="" class="form-control">
                </div>
                <div class="col">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="" class="form-control">
                </div>
                <div class="col">
                    <label for="">Middle Name</label>
                    <input type="text" name="middlename" id="" class="form-control">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col">
                <label for="">Date of Birth</label>
                    <input type="date" name="dob" id="" class="form-control">
                </div>
            </div> -->
            <div class="row">
                <div class="col">
                <label for="">Address</label>
                    <input type="text" name="address" id="" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <select name="address2" class="form-select">
                        <option value="Purok 4">Purok 4</option>
                        <option value="Purok 5">Purok 5</option>
                        <option value="Purok 6">Purok 6</option>
                        <option value="Purok 7">Purok 7</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Contact Number <i class="text-danger">*follow this number format</i></label>
                    <div class="input-group mb-3">
                    <!-- <br> -->
                        <span class="input-group-text" id="basic-addon1">+63</span>
                        <input type="text" class="form-control" name="contactNumber" placeholder="123456789" aria-label="contactnumber" aria-describedby="basic-addon1" maxlength="10">
                    </div>
                    <!-- <input type="text"  id="" class="form-control" placeholder="+63"> -->
                </div>
            </div>
            <div class="row">
                <div class="col">
                <label for="">Meter Number</label>
                    <input type="text" name="meterNumber" id="" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="hidden" name="status" id="" class="form-control" value="Active">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

      </form>
      
    </div>
  </div>
</div>

@endsection