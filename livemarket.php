
<?php
  include 'ConnectionData.txt';
  include "header.php";
?>
<?php
/*
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/stocks-usa/" rel="noopener" target="_blank"><span class="blue-text">Stocks today</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
  {
  "colorTheme": "light",
  "dateRange": "12M",
  "exchange": "US",
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": false,
  "showSymbolLogo": false,
  "showFloatingTooltip": false,
  "width": "1100px",
  "height": "500",
  "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
  "plotLineColorFalling": "rgba(41, 98, 255, 1)",
  "gridLineColor": "rgba(240, 243, 250, 0)",
  "scaleFontColor": "rgba(106, 109, 120, 1)",
  "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
  "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
  "symbolActiveColor": "rgba(41, 98, 255, 0.12)"
}
  </script>
</div>
*/
?>
<?php
  // set global session of search criteria
  $link = mysqli_connect($servername, $username, $password);
  mysqli_select_db($link, $dbname) or die("Unable to select database $dbname");
  if(isset($_POST['search'])){
    $stock = htmlspecialchars($_POST['search']);
    $_SESSION['search']=$stock;
  }
?>
<center>
<form action="livemarket.php" method="post">
  <p>Search <input type="text" class='textbox' name='search' value ='<?php echo $_SESSION['search']?>'/>
  <input type="submit" class='button' value ='Go'/></p>
</form>
<?php
    $stock_low=strtoupper($_SESSION['search']);
    // if empty search string, set critiria = xxxxx to get nothing
    if (trim($stock_low)==""){
      $stock_low="xxxxxx";
    }
    $sql = " select stock_code, stock_name, industry, watchlist 
    from stocks where lower(stock_code) like '%$stock_low%' or lower(stock_name) like '%$stock_low%' or lower(industry) like '%$stock_low%'
    order by stock_code";
    $result = mysqli_query($link, $sql);
    //$num = mysqli_num_rows($result);
    echo "<table>";
    echo "<thead><tr>";
    echo "<td> Stock code </td><td> Stock name </td><td> Industry </td><td>Watch List</td>";
    echo "</tr></thead>";
    
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { 
      echo "<tr>";
      echo "<td><a href='livemarket.php?stock_code=$row[stock_code]&interval=1hour'> $row[stock_code] </a></td>";
      echo "<td>$row[stock_name]</td><td>$row[industry]</td>";
      echo "<td style='text-align:right'>";
      if($row["watchlist"]==1)
        {
          echo "<a href = 'watchlist.php?stock_code=". $row["stock_code"]. "&op=0&trade=0'><input type='button' value=' - '></a>";
        }
          else 
        {
          echo "<a href = 'watchlist.php?stock_code=". $row["stock_code"]. "&op=1&trade=0'><input type='button' value=' + '></a>";
        }
      echo"</td>";   
      echo "</tr>";
    }
    echo "</table>";

    if(isset($_GET['stock_code'])){
     $stock_code = $_GET['stock_code'];
     $interval = $_GET['interval'];
     $sql = " select stock_code, stock_name, industry 
     from stocks where stock_code like '%$stock_code%'
     order by stock_code";
     $result = mysqli_query($link, $sql);
     $row = mysqli_fetch_array($result, MYSQLI_BOTH);
     echo "<h3>$row[stock_name]</h3>";
    }
     if (empty($stock_code)){
      exit();
    }

//$json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=TSLA&apikey=2I1BKJQADWQH5H8Q');
$file_content = "https://financialmodelingprep.com/api/v3/historical-chart/".$interval."/".$stock_code."?apikey=demo";
//echo $file_content;
$json = file_get_contents($file_content);
//print_r($json);
$data = json_decode($json,true);

//print_r($data);

// Open the table

echo "<table><tr><td style='text-align:left'>Range: <a href='livemarket.php?stock_code=$row[stock_code]&interval=1min'>1min | </a>";
echo "<a href='livemarket.php?stock_code=$row[stock_code]&interval=5min'>5min | </a>";
echo "<a href='livemarket.php?stock_code=$row[stock_code]&interval=15min'>15min | </a>";
echo "<a href='livemarket.php?stock_code=$row[stock_code]&interval=1hour'>1hour | </a>";
echo "<a href='livemarket.php?stock_code=$row[stock_code]&interval=4hour'>4hour | </a></td></tr>";
echo "<tr><td>Current data: <font color='red'>$interval</font></td></tr></table>";

// Historical stock prices with volume 
echo "<table>";
echo "<thead><tr><td style='width:200px'>Date</td>";
echo "<td style='text-align:right'>Open</td>";
echo "<td style='text-align:right'>Low</td>";
echo "<td style='text-align:right'>High</td>";
echo "<td style='text-align:right'>Close</td>";
echo "<td style='text-align:right'>Volume</td></tr></thead>";

 foreach ($data as $sd) {?>
    <tr>
      <td style='text-align:right'> <?= $sd['date']; ?> </td>
      <td style='text-align:right'> <?= $sd['open']; ?> </td>
      <td style='text-align:right'> <?= $sd['low']; ?> </td>
      <td style='text-align:right'> <?= $sd['high']; ?> </td>
      <td style='text-align:right'> <?= $sd['close']; ?> </td>
      <td style='text-align:right'> <?= $sd['volume']; ?> </td>
    </tr>
    <?php }
  // Close the table
  echo "</table>";
echo "<br>";
?>
</form>

</center>
</html>
<?php
    include "footer.php";
?>
