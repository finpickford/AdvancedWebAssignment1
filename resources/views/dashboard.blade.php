@extends('layout')


@section('content')

  <div class="charts">
    <h3>Brands with the most models</h3>
    <canvas id="canvasBrands" height="280" width="600"></canvas>
  </div>

  <div class="charts">
    <h3>Users with the most comments</h3>
    <canvas id="canvasComments" height="280" width="600"></canvas>
  </div>

  <div class="charts">
    <h3>Users who've added the most models</h3>
    <canvas id="canvasUserModels" height="280" width="600"></canvas>
  </div>

  <script type="text/javascript" src="https://github.com/chartjs/Chart.js/releases/download/v2.4.0/Chart.bundle.js"></script>
  <script>
      var dataBrands = <?php echo $counter; ?>;
      var labelBrands = <?php echo $label; ?>;
      var dataComments = <?php echo $counterUserComments; ?>;
      var labelComments = <?php echo $labelUserComments; ?>;
      var dataUserModels = <?php echo $counterUserModels; ?>;
      var labelUserModels = <?php echo $labelUserModels; ?>;

      var barChartData = {
        labels : labelBrands,
        datasets : [{
          fillColor : "rgba(242, 38, 19, 1)",
          strokeColor : "rgba(82,75,25,1)",
          pointColor : "rgba(166,152,51,1)",
          pointStrokeColor : "#fff",
          data : dataBrands
        }]
      }

      var pieChartData = {
        labels : labelComments,
        datasets :[{
          fillColor : "rgba(46, 204, 113, 1)",
          strokeColor : "rgba(82,75,25,1)",
          pointColor : "rgba(166,152,51,1)",
          pointStrokeColor : "#fff",
          data : dataComments
        }]
      }

      var lineChartData = {
        labels : labelUserModels,
        datasets : [{
          fillColor : "rgba(46, 204, 113, 1)",
          strokeColor : "rgba(82,75,25,1)",
          pointColor : "rgba(166,152,51,1)",
          pointStrokeColor : "#fff",
          data : dataUserModels
        }]
      }

      window.onload = function() {
        var brandsChart = document.getElementById("canvasBrands").getContext("2d");
        window.bar = new Chart(brandsChart, {
          type: 'bar',
          data: barChartData,
          options: {
            responsive: true,
            scales: {
              yAxes: [{
                display: true,
                ticks: {
                  suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                  beginAtZero: true   // minimum value will be 0.
                }
              }]
            }
          }
        });

        var commentsChart = document.getElementById("canvasComments").getContext("2d");
        window.pie = new Chart(commentsChart, {
          type: 'pie',
          data: pieChartData,
          options: {
            responsive: true,
          }
        }
        );

        var userModelsChart = document.getElementById("canvasUserModels").getContext("2d");
        window.line = new Chart(userModelsChart, {
          type: 'line',
          data: lineChartData,
          options: {
            responsive: true,
            scales: {
              yAxes: [{
                display: true,
                ticks: {
                  suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                  beginAtZero: true   // minimum value will be 0.
                }
              }]
            }
          }
        }
        );
      };

      </script>

@endsection
