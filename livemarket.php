
<?php
    include "header.php";
?>
<html>
<?php
// replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#api-key
$json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=TSLA&apikey=2I1BKJQADWQH5H8Q');

$dataStock = json_decode($json,true);

//print_r($dataStock);

echo "<br>";
//$json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=AAPL&apikey=2I1BKJQADWQH5H8Q');

//$data = json_decode($json,true);

//print_r($data);

    //2I1BKJQADWQH5H8Q: API key
//<hr>
//<center>
//<td colspan="2"><img src="images/live.jpeg" width="1100" height="600"></td>
//</center>
?>
    <head>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.stock.min.js"></script>
    <script type="text/javascript">
window.onload = function () {
  var dataPoints = [];
  var stockChart = new CanvasJS.StockChart("stockChartContainer", {
    exportEnabled: true,
    title: {
      text:"StockChart with Line using JSON Data"
    },
    subtitles: [{
      text:"Total Retail Sales of ACME "
    }],
    charts: [{
      axisX: {
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "MMM YYYY"
        }
      },
      axisY: {
        title: "Million of Dollars",
        prefix: "$",
        suffix: "M",
        crosshair: {
          enabled: true,
          snapToDataPoint: true,
          valueFormatString: "$#,###.00M",
        }
      },
      data: [{
        type: "line",
        xValueFormatString: "MMM YYYY",
        yValueFormatString: "$#,###.##M",
        dataPoints : dataPoints
      }]
    }],
    navigator: {
      slider: {
        minimum: new Date(2010, 00, 01),
        maximum: new Date(2018, 00, 01)
      }
    }
  });
  $.getJSON("https://canvasjs.com/data/gallery/stock-chart/grocery-sales.json", function(data) {
    for(var i = 0; i < data.length; i++){
      dataPoints.push({x: new Date(data[i].date), y: Number(data[i].sale)});
    }
    stockChart.render();
  });
}
</script>
    </head>

    <body>
    <table width="1300" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr><td>
    <div id="stockChartContainer" style="height: 450px; width: 1300;"></div>
    </td></tr>
    </table>
    </body>
    </html>

<?php
    include "footer.php";
?>
