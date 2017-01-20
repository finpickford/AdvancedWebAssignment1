@extends('layout')

@section('content')
  <div class="heading"> {{-- Page heading. --}}
    <h1>Dashboard</h1>
  </div>

  <div class="charts"> {{--First chart. --}}
    <h3>Brands with the most models</h3>
    <canvas id="canvasBrands" height="280" width="600"></canvas>
  </div>

  <div class="charts"> {{--Second chart. --}}
    <h3>Users with the most comments</h3>
    <canvas id="canvasComments" height="280" width="600"></canvas>
  </div>

  <div class="charts">
    <h3>Users who've added the most models</h3> {{-- Third chart. --}}
    <canvas id="canvasUserModels" height="280" width="600"></canvas>
  </div>

  {{-- Reference the external chart js script from the github location given. --}}
  <script type="text/javascript" src="https://github.com/chartjs/Chart.js/releases/download/v2.4.0/Chart.bundle.js"></script>
  <script>
      var dataBrands = <?php echo $counterBrands; ?>; // Create a variable for the brand data. Reference the counter brands variable.
      var labelBrands = <?php echo $labelBrands; ?>; // Create a variable for the brand labels. Reference the brand labels variable.
      var dataComments = <?php echo $counterUserComments; ?>; // Create a variable for the comments data. Reference the user comments variable.
      var labelComments = <?php echo $labelUserComments; ?>; // Create a variable for the comments label. Reference the label user comments variable.
      var dataUserModels = <?php echo $counterUserModels; ?>; // Create a variable for the models data. Reference the user models varaible.
      var labelUserModels = <?php echo $labelUserModels; ?>; // Create a variable for the models labels. Reference the user models labels variable.

      // Create a variable for the bar charts data. Include the labels and datasets.
      // Reference the label as the labelBrands variable defined above.
      // Reference the data as the dataBrands variable defined above.
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

      // Create a variable for the pie charts data. Include the labels and datasets.
      // Create a label for the comments chart using the labelComments variable defined above.
      // Reference the data as the dataComments variable defined above.
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

      // Create a variable for the line charts data. Include the labels and datasets.
      // Reference the lableUserModels as the label for the chart.
      // Reference the dataUserModels defined above as the data for the chart.
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

      window.onload = function() { // Create a function to load the charts when the window first loads.
        var brandsChart = document.getElementById("canvasBrands").getContext("2d");
        window.bar = new Chart(brandsChart, {
          type: 'bar', // Set the type of chart to bar chart.
          data: barChartData, // Use the data variable for the bar chart defined above.
          options: {
            responsive: true, // Make it responsive.
            scales: {
              yAxes: [{
                display: true,
                ticks: { // Set the values on the axis.
                  suggestedMin: 0,    // Set minimum to 0.
                  beginAtZero: true   // Set it to being at 0.
                }
              }]
            }
          }
        });

        var commentsChart = document.getElementById("canvasComments").getContext("2d");
        window.pie = new Chart(commentsChart, {
          type: 'pie', // Set the type to pie chart.
          data: pieChartData, // use the pieChartData variable as the data.
          options: {
            responsive: true, // Make it responsive.
          }
        }
        );

        var userModelsChart = document.getElementById("canvasUserModels").getContext("2d");
        window.line = new Chart(userModelsChart, {
          type: 'line', // Set the type to line chart.
          data: lineChartData, // Use the lineChartData variable as the data of the chart. This has been set previously.
          options: {
            responsive: true, // Make it responsive.
            scales: { 
              yAxes: [{
                display: true,
                ticks: { // Set the axis ticks.
                  suggestedMin: 0,    // Set minimum as 0.
                  beginAtZero: true   // Being chart at 0.
                }
              }]
            }
          }
        }
        );
      };

      </script>

@endsection
