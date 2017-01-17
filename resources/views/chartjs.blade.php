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

                    var data_omega = <?php echo $omega; ?>;
                    var data_rolex = <?php echo $rolex; ?>;


                    var barChartData = {



                        datasets: [
                          {

                              label: 'omega',

                              backgroundColor: "rgba(151,187,205,0.5)",

                              data: data_omega

                          },

                        {

                            label: 'rolex',

                            backgroundColor: "rgba(151,187,205,0.5)",

                            data: data_rolex

                        }]

                    };

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
