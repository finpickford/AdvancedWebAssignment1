var year = ['2013','2014','2015', '2016'];

var data_omega = omega;

var data_rolex = rolex;


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

                text: 'Yearly Website Visitor'

            }

        }

    });


};
