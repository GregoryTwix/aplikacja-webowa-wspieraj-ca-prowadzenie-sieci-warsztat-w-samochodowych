@extends('layouts.staff')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Statystyki wizyt</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-body">
                            <h2>{{$lastMonth['month']}}</h2>
                            <p>Faktury: {{$lastMonth['invoices']}}</p>
                            <p>Wartość faktur netto: {{$lastMonth['invoices_netto']}} zł</p>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-lg-6">
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-body">
                        <h2>{{$currentMonth['month']}}</h2>
                        <p>Faktury: {{$currentMonth['invoices']}}</p>
                        <p>Wartość faktur netto: {{$currentMonth['invoices_netto']}} zł</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }],
                    yAxes: [{
                        gridLines : {
                            display : false,
                        }
                    }]
                }
            }
            var areaChartData = {
                labels  : [@foreach($stats as $key => $stat) '@php $date = new \Carbon\Carbon();$date->setISODate(2021,$key); echo $date->startOfWeek();echo ' - '; echo $date->endOfWeek();@endphp', @endforeach],
                datasets: [
                    {
                        label               : 'Digital Goods',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [@foreach($stats as $key => $stat) {{$stat}}, @endforeach]
                    },
                    {
                        label               : 'Electronics',
                        backgroundColor     : 'rgba(210, 214, 222, 1)',
                        borderColor         : 'rgba(210, 214, 222, 1)',
                        pointRadius         : false,
                        pointColor          : 'rgba(210, 214, 222, 1)',
                        pointStrokeColor    : '#c1c7d1',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data                : [0]
                    },
                ]
            }
            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })
        })
    </script>
@endsection
