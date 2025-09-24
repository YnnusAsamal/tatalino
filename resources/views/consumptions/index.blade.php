@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card shadow">
        <div class="card-header">
            <h4 class="float-start">Consumption List</h4>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Consumption
            </button>
            <!-- <div class="button-modal float-end">
                <a href="{{route('consumptions.create')}}" class="btn btn-primary">
                    Add Consumption
                </a>
            </div> -->
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <form action="{{ route('consumptions.index') }}" method="GET">
                        <div class="form-group">
                            <label for="customer">Filter by Customer:</label>
                            <select name="customer" id="customer" class="form-select">
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $selectedCustomer == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->firstname }}  {{ $customer->lastname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </form>
                </div>
                <div class="col">
                    <form action="{{ route('consumptions.index') }}" method="GET">
                        <label for="year">Year:</label>
                        <input type="number" name="year" value="{{ $selectedYear }}" min="2000" max="{{ date('Y') }}" class="form-control">
                            
                        <label for="month">Month:</label>
                        <!-- <input type="number" name="month" value="{{ $selectedMonth }}" min="1" max="12" class="form-control"> -->
                        <select name="month" class="form-control">
                            <option value="1" {{ $selectedMonth == 1 ? 'selected' : '' }}>January</option>
                            <option value="2" {{ $selectedMonth == 2 ? 'selected' : '' }}>February</option>
                            <option value="3" {{ $selectedMonth == 3 ? 'selected' : '' }}>March</option>
                            <option value="4" {{ $selectedMonth == 4 ? 'selected' : '' }}>April</option>
                            <option value="5" {{ $selectedMonth == 5 ? 'selected' : '' }}>May</option>
                            <option value="6" {{ $selectedMonth == 6 ? 'selected' : '' }}>June</option>
                            <option value="7" {{ $selectedMonth == 7 ? 'selected' : '' }}>July</option>
                            <option value="8" {{ $selectedMonth == 8 ? 'selected' : '' }}>August</option>
                            <option value="9" {{ $selectedMonth == 9 ? 'selected' : '' }}>September</option>
                            <option value="10" {{ $selectedMonth == 10 ? 'selected' : '' }}>October</option>
                            <option value="11" {{ $selectedMonth == 11 ? 'selected' : '' }}>November</option>
                            <option value="12" {{ $selectedMonth == 12 ? 'selected' : '' }}>December</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-sm btn-warning">Filter</button>
                        <a href="{{route('consumptions.index')}}" class="btn btn-sm btn-primary">Refresh</a>
                    </form>
                </div>
            
            </div>
            <hr>
        
                <div class="table table-responsive">
                    <table class="table table-condense table-bordered text-center">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Reference Number</th>
                                <th>Meter Number</th>
                                <th>Customer Name</th>
                                <th>Current Reading</th>
                                <th>Payment</th>
                                <th>Total Balance</th>
                                <th>Total Amount Due</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <h3>ALL RECORDS</h3>
                        @foreach($filteredConsumptions  as $key => $cons)
                        <tr>
                            <input type="hidden" name="customer_id" value="{{$cons->customer_id}}" id="">
                            <td>{{$key+1}}</td>
                            <td>{{$cons->dateCons}}</td>
                            <td>{{$cons->referenceNum}}</td>
                            <td>{{$cons->meterNumber}}</td>
                            <td>
                            @if ($cons->customer) <!-- Check if the customer relationship is loaded -->
                                {{$cons->customer->firstname}} {{$cons->customer->lastname}}
                            @else
                                Customer not available
                            @endif
                            </td>
                           
                            <td>{{$cons->totalCons}}</td>
                            <td>{{$cons->paidCons}}</td>
                            <td>
                                {{-- Display the result of the operation amountCons - paidCons --}}
                                Php {{ number_format($cons->amountCons - $cons->paidCons, 2) }}
                            </td>
                            <td>Php {{number_format($cons->amountCons,2)}}</td>
                            <td>
                                @if($cons->paidCons == $cons->amountCons)
                                <span class="badge badge-success">Paid</span>
                                @elseif($cons->paidCons < $cons->amountCons)
                                <span class="badge badge-danger">Not Fully Paid</span>
                                @else
                                <span class="badge badge-danger">Unpaid</span>
                                @endif
                              
                            </td>
                            <td class="text-center">
                                <a href="{{route('consumptions.edit', $cons->id)}}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="{{route('consumptions.show', $cons->id)}}" class="btn btn-info btn-sm">Print</a>
                                <a href="{{route('consumptions.paymentShow', $cons->id)}}" class="btn btn-warning btn-sm">Payment</a>
                                <!-- <a href="{{route('consumptions.destroy', $cons->id)}}" class="btn btn-danger btn-sm" data-confirm-delete="true">Remove</a> -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Consumption</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('consumptions.storeSingle')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="">Choose Customer</label>
                            <select name="customer_id" id="customerSelect" class="form-select">
                                <option>--SELECT--</option>
                                @foreach($customers as $cons)
                                <option value="{{$cons->id}}">{{$cons->firstname}} {{$cons->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Date</label>
                            <input type="text" name="dateCons" id="" class="form-control" value="{{date('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Meter Number</label>
                            <input type="text" name="meterNumber" id="meterNumberInput" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Contact Number</label>
                            <input type="text" name="contactNumber" id="contactNumberInput" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Current Reading</label>
                            <input type="text" name="totalCons" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>  

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const customerSelect = document.getElementById("customerSelect");
        const meterNumberInput = document.getElementById("meterNumberInput");
        const contactNumberInput = document.getElementById("contactNumberInput");

        customerSelect.addEventListener("change", function() {
            const selectedCustomerId = parseInt(this.value);

            if (selectedCustomerId) {
                fetch(`/get-customer-info/${selectedCustomerId}`)
                    .then(response => response.json())
                    .then(data => {
                        meterNumberInput.value = data.meterNumber;
                        contactNumberInput.value = data.contactNumber;
                    })
                    .catch(error => {
                        console.error('Error fetching customer info:', error);
                    });
            }
        });
    });
</script>
@endsection