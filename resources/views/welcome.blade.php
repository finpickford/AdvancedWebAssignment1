@extends('layout') {{-- Reference the layout file which includes the sites HTML. --}}

@section('content') {{-- Reference the content section within the layout file, to make anything within this section follow its template. --}}

<div class="heading">
      <h1>Welcome<h1>
</div>

<div class="container">
    @include ('flash')
</div>

<div class="content">
    Welcome to WristWatch. A website built to allow you to search for watch brands and see their models, past and present. Click on 'Brands' in the navigation bar above, or use the search bar to search for a brand of your choosing.
</div>
  <div class="content"> {{-- Create a div within the content div that shows some info. --}}
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

                                  backgroundColor: "rgba(46, 204, 113, 0.5)",

                                  data: data_omega

                              },

                            {

                                label: 'rolex',

                                backgroundColor: "rgba(217, 30, 24, 0.5)",

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
                                             borderColor: 'rgb(34, 49, 63)',
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

@section('footer')

@stop
