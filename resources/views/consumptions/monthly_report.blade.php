<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Statement</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
         
         @media print {
            @page {
                size: landscape;
            }
                
                html, body {
                    width: 100%;
                    height: 100%;
                    margin: 0;
                    padding: 0;
                }
                
                .dontPrint {
                    display: none;
                }
            }
        
        body {
                /* background-color: #50a9e3;
                background-image: 
                    radial-gradient(at 47% 33%, hsl(240.28, 77%, 40%) 0, transparent 59%), 
                    radial-gradient(at 82% 65%, hsl(198.00, 100%, 50%) 0, transparent 55%); */

            }
        h3, h5, p {
            text-align: center;
            }
        .main-sec {
            width: 80%;
            height: 100%;
            margin-left: auto;
            margin-right: auto;
            backdrop-filter: blur(12px) saturate(97%);
            -webkit-backdrop-filter: blur(12px) saturate(97%);
            background-color: rgba(238, 214, 214, 0.78);
            border-radius: 0px;
            border: 1px solid rgba(209, 213, 219, 0.3);
            }
        
    </style>
</head>
<body>
<div class="container-fluid">
<div class="row mt-2 mb-3">
        <div class="col">
            <div class="btn-group">
                <button onclick="window.print();" class="dontPrint btn btn-info">
                Download
                </button>
                <a href="{{ route('dashboard')}}" class="dontPrint btn btn-danger">Back</a>
            </div>
        </div>
    </div>
<div class="card shadow">
    <div class="card-body">
        <div class="input-group dontPrint">
            <form method="GET" action="{{ route('monthly.report') }}" class="d-flex">
                <label for="year" class="me-2">Select Year:</label>
                <select name="year" id="year" class="form-select me-2">
                    @foreach($years as $year)
                        <option value="{{ $year }}" @if($year == $selectedYear) selected @endif>{{ $year }}</option>
                    @endforeach
                </select>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
        
        <div>
            <h3>Top Selling Month: {{ $topMonthName }}</h3>
            <p>Total Sales: {{ $topMonth }}</p>
        </div>

        <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 400px;">
        <canvas id="monthly-consumption-chart"></canvas>
        </div>


        <div>
            <h3>Total Consumption for {{ $selectedYear }}</h3>
            <p>{{ $totalConsumptionYearly }}</p>
        </div>
    </div>
    

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Get data from PHP variables
    var labels = @json($labels);
    var data = @json($data);

    // Chart configuration
    var ctx = document.getElementById('monthly-consumption-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Monthly Consumption',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



</body>
</html>

