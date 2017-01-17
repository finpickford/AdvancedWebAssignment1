@extends('layout')


@section('content')

{{-- <script src="https://github.com/chartjs/Chart.js/releases/tag/v2.4.0"></script> --}}
{{-- <script src="/js/jschart.js"></script> --}}
<div class="content">
<script>var year = ['2013','2014','2015', '2016'];

var data_omega = <?php echo $omega; ?>;

var data_rolex = <?php echo $rolex; ?>;


var barChartData = {

    labels: year,

    datasets: [{

        label: 'omega',

        backgroundColor: "rgba(220,220,220,0.5)",

        data: data_omega

    }, {

        label: 'View',

        backgroundColor: "rgba(151,187,205,0.5)",

        data: data_rolex

    }]

};</script>

<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">

                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <canvas id="canvas" height="280" width="600"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>
</div>

@endsection
