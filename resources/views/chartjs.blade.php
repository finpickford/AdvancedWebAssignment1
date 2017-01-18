@extends('layout')


@section('content')

<div class="content">

<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <canvas id="canvas" height="280" width="600"></canvas>

<script type="text/javascript" src="https://github.com/chartjs/Chart.js/releases/download/v2.4.0/Chart.bundle.js"></script>
                    <script>

                    var data_brands = <?php echo $brands; ?>;

                        var barChartData = {
                          	labels : data_brands,
                          	datasets : [
                          		{
                          			fillColor : "rgba(46, 204, 113, 1)",
                          			strokeColor : "rgba(82,75,25,1)",
                          			pointColor : "rgba(166,152,51,1)",
                          			pointStrokeColor : "#fff",
                          			data : data_brands
                          		}
                          	]
                          }

                    window.onload = function() {
                         var ctx = document.getElementById("canvas").getContext("2d");
                         window.myBar = new Chart(ctx, {
                             type: 'bar',
                             data: barChartData,
                             options: {
                                 elements: {
                                     rectangle: {
                                         borderWidth: 2,
                                         borderColor: 'rgb(0, 255, 0)',
                                         borderSkipped: 'bottom'
                                     }
                                 },
                                 responsive: true,
                                 title: {
                                     display: true,
                                     text: 'Brands and their models'
                                 },
                                 scales: {
                                    yAxes: [{
                                        display: true,
                                        ticks: {
                                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                            // OR //
                                            beginAtZero: true   // minimum value will be 0.
                                        }
                                    }]
                                }
                             }
                         });
                     };

                    </script>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
