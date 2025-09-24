@extends('layouts.sample')
@section('content')
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header">
            Encode Current Reading
             Month of {{date('M')}}
        </div>
        <!-- <form action="{{route('consumptions.store')}}" method="post">
            @csrf
        
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="table table-responsive text-center">
                        <table class="table table-condensed table-hover table-bordered">
                            <thead class="">
                                <tr>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Meter Number</th>
                                    <th>Contact Number</th>
                                    <th>Current Reading</th>
                                    <th>Remarks</th> 
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($customers as $customer)
                                <tr>
                                    <td><input type="text" name="dateCons[{{$customer->id}}]" id="" value="{{date('Y-m-d')}}" class="form-control" readonly></td>
                                    <td>{{$customer->lastname}}, {{$customer->firstname}}, {{$customer->middlename}} <input type="hidden" name="[{{$customer->id}}]"value=""></td>
                                    
                                    <td><input type="text" name="meterNumber[{{$customer->id}}]" id="" value="{{$customer->meterNumber}}" class="form-control" readonly></td>
                                    <td><input type="text" name="contactNumber[{{$customer->id}}]" id="" value="{{$customer->contactNumber}}" class="form-control" readonly></td>
                                    <td><input type="text" name="totalCons[{{$customer->id}}]" class="form-control" autofocus></td>
                                    <td><input type="text" name="remarks[{{$customer->id}}]" class="form-control"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>      
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form> -->
        <form id="validate" action="{{route('consumptions.store')}}" method="post">
        @csrf   
        <div class="card-body">
            <table id="sampletbl" class="table table-bordered text-center data-table">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Customer Name</th> 
                        <th>Customer Meter Number</th>
                        <th>Customer Number</th>
                        <th>Customer Reading</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $cus)
                    <tr>
                        <td>
                            <input type="text" name="dateCons[{{ $cus->id }}]" value="{{date('Y-m-d')}}" class="form-control" readonly>
                        </td>
                        <td>
                                {{$cus->firstname}} {{$cus->lastname}}<input type="hidden" name="customer_id" value="{{$cus->id}}" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="meterNumber[{{ $cus->id }}]" value="{{$cus->meterNumber}}" class="form-control" readonly>
                        </td>
                        <td>
                            <input type="text" name="contactNumber[{{ $cus->id }}]" value="{{$cus->contactNumber}}" class="form-control" readonly>
                        </td>
                        <td>
                            <input type="text" name="totalCons[{{ $cus->id }}]" value="" class="form-control">
                        </td>
                    </tr>
                    @endforeach
                    <!-- <tr> 
                        <td id="col0"> 
                        <input type="dateTime" class="form-control" name="dateCons[]" value="{{date('Y-m-d h:i:s')}} "placeholder="" required>
                        </td>
                        <td id="col1">
                            <select name="customer_id[]" id="customerId" class="form-select">
                                <option>--SELECT--</option>
                                @foreach($customers as $cus)
                                <option value="{{$cus->id}}">{{$cus->lastname}}, {{$cus->firstname}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td id="col2"> 
                        <input type="text" name="meterNumber[]" id="" class="form-control">
                        </td>
                        <td id="col3"> 
                        <input type="text" name="contactNumber[]" id="" class="form-control">
                        </td>
                        <td id="col4">
                        <input type="text" name="totalCons[]" id="" class="form-control">
                        </td>
                    </tr> -->
                </tbody>  
            </table> 
        </div>
        <div class="card-footer">
            <div class="btn-group" role="group" aria-label="">
                <!-- <button type="button" class="btn btn-sm btn-info " onclick="addRows()">ADD ROW</button>
                <button type="button" class="btn btn-sm btn-danger text-dark" onclick="deleteRows()">REMOVE LAST ROW</button> -->
                <button type="submit" class="btn btn-sm btn-success text-white">SAVE RECORDS</button>
            </div>
        </div>
              
        </form>
       
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const customerSelects = document.querySelectorAll(".form-select[name='customer_id[]']");
        
        customerSelects.forEach(select => {
            select.addEventListener("change", function() {
                const selectedCustomerId = parseInt(this.value);
                
                if (selectedCustomerId) {
                    fetch(`/get-customer-info/${selectedCustomerId}`)
                        .then(response => response.json())
                        .then(data => {
                            
                            const row = this.closest("tr");
                            const meterNumberInput = row.querySelector(".form-control[name='meterNumber[]']");
                            const contactNumberInput = row.querySelector(".form-control[name='contactNumber[]']");
                            
                            meterNumberInput.value = data.meterNumber;
                            contactNumberInput.value = data.contactNumber;
                        })
                        .catch(error => {
                            console.error('Error fetching customer info:', error);
                        });
                }
            });
        });
    });
</script>
<script>
        function addRows()
        { 
            var table = document.getElementById('sampletbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;     
            var row = table.insertRow(rowCount);
            for(var i =0; i <= cellCount; i++)
            {
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
                if(i == 4)
                { 
                    var radioinput = document.getElementById('col').getElementsByTagName('input'); 
                    for(var j = 0; j <= radioinput.length; j++)
                    { 
                        if(radioinput[j].type == 'radio')
                        { 
                            var rownum = rowCount;
                            radioinput[j].name = 'gender['+rownum+']';
                        }
                    }
                }
            }
        }

        function deleteRows()
        {
            var table = document.getElementById('sampletbl');
            var rowCount = table.rows.length;
            if(rowCount > '2')
            {
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }else{
                alert('There should be atleast one row');
            }
        }
    </script>


@endsection