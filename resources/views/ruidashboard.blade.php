@extends('layouts.sample')

@section('content')

<body>
    <div class="py-12 m-4">
        <div class="row">
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL NUMBER OF RESEARCH
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>{{$research}}</h2></p>
                        
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        ON-GOING RESEARCH
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>{{$ongoing}}</h2></p>
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        COMPLETED RESEARCH
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>{{$complete}}</h2></p>
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
            <div class ="col-md-3">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        TOTAL NUMBER OF USER
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><h2>{{$users}}</h2></p>
                        
                    </div>
                    <div class="card-footer">
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Engineering</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Administration and Accountancy</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Management Tourism</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Teacher Education</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Industrial Technology</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Computer Studies</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Criminal Justice Education</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left">Arts and Sciences</i></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>0</h3>
                                <span>Research</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <!-- <div class ="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        CHART
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><div id="top_x_div" style="width: 900px; height: 500px;"></div></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div> -->
            <div class="col">
                <div class="card border-info mb-3">
                    <div class="card-header border-info">
                        <span class="bi bi-bell-fill">&nbspNOTIFICATIONS</span>
                    </div>
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @forelse($notifications as $notification)
                                <div class="alert alert-success" role="alert">
                                        User {{ $notification->data['researchTitle'] }} has been uploded
                                    <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                                        Mark as read
                                    </a>
                                </div>
                                @if($loop->last)
                                    <a href="#" id="mark-all">
                                        Mark all as read
                                    </a>
                                @endif
                            @empty
                                There are no new notifications
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        
        
</body>

<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id,
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));

            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
</script>

@endsection
