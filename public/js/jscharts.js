var unicorns = new FusionCharts({
  type: 'column2d',
  renderAt: 'top-companies',
  width: '100%',
  height: '500',
  dataFormat: 'json',
  dataSource: {
    "chart": {
      "caption": "Time to $300bn Market Cap",
      "yAxisName": "# Years",
      // more chart customizations
    },

    "data": [{
        "label": "Berkshire Hathaway",
        "value": "49",
      }, {
        "label": "Apple",
        "value": "35"
      }, // more data
    ]

  }
});
unicorns.render();
