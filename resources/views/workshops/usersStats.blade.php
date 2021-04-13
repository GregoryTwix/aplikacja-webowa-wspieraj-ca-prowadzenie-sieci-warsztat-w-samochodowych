@extends('layouts.staff')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Przyrost klientów</h3>
        </div>
        <div class="card-body">
            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </div>
    <!-- /.card -->
@endsection
@section('script')
    <script>
        $(function () {
            //-------------
            //- DONUT CHART -
            //-------------

            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            var donutData        = {
                labels: [
                    @foreach($monthNames as $month)
                    '{{$month}}',
                    @endforeach
                ],
                datasets: [
                    {
                        data: [@foreach($users as $key => $number) {{$number}}, @endforeach],
                        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    }
                ]
            }
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        });

    </script>
@endsection
