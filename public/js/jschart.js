var year = ['2013','2014','2015', '2016'];

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

};
