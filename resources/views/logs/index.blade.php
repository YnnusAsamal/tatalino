@extends('layouts.sample')

@section('content')


<div class ="py-12 m-4">
    <div class ="card">
        <div class ="card-header">
            <h5>User Activity</h5>
        </div>

        <div class="card-body">
            <div class ="py-15 col-md-4">
                <form action="" method="get">
                    <div class ="form-group">
                        <div class ="row">
                            <div class ="col">
                                <input type ="search" name ="search" class="form-control" placeholder="Search Here ...">
                            </div>

                            <div class ="col">
                                <button type ="submit" class="btn btn-primary"><span class="bi bi-search"></span></button>
                                <a href = "#" ><button type = "" class="btn btn-danger"><span class="bi bi-arrow-repeat"></span></button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class ="table table-striped table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="10%">Name </th>
                            <th scope="col" width="15%">Date</th>
                            <th scope="col" width="50%">Activity</th>
                            <!-- <th scope="col" width=" ">Actions</th> -->
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($audit_trails as $audit)
                            <tr>
                                    
                                <td>{{++$i}}</td>              
                                <td scope="row">{{ $audit->name}}</td>
                                <td scope="row">{{ $audit->date}}</td>
                                <td scope="row">{{ $audit->activity}}</td>
                                <!-- <td>
                                    <a href="" class="btn btn-warning btn-sm"><span class="bi-eye-fill"></a>
                                    <a href="" class="btn btn-info btn-sm"><span class="bi-plus"></a>
                                    
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $audit_trails->render() !!}
            </div>
        </div>
    </div>
</div>


@endsection