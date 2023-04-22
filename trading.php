<?php
    include 'ConnectionData.txt';
    include "header.php";
?>

<center>
<form action="livemarket.php" method="post">
  <p>Search <input type='text' class='textbox' name='search'/><input type="submit" class='button' value ='Go'/></p>
</form>
<table border="0" cellpading="0" ><tr><td><h2>Watching List </h2></td></tr></table>
<?php
  $link = mysqli_connect($servername, $username, $password);
  mysqli_select_db($link, $dbname) or die("Unable to select database $dbname");

    $sql = " select stock_code, stock_name , watchlist
    from stocks where watchlist=1
    order by stock_code";
    $result = mysqli_query($link, $sql);
    //$num = mysqli_num_rows($result);
    echo "<table>";
    echo "<thead><tr>";
    echo "<td>Buy / Sell</td><td> Stock code </td><td> Stock name </td>";
    echo "<td> Time </td><td> Price </td><td> Volume </td><td>Watch List</td>";
    echo "</tr></thead>";
    $interval='1min';
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) { 
        $stock_code = $row["stock_code"];
        $file_content = "https://financialmodelingprep.com/api/v3/historical-price-full/".$stock_code."?timeseries=1&apikey=demo";
        $json = file_get_contents($file_content);
        // begin substring json to cut the header to become the standard string before decode
        $pos = strpos($json, '[');
        $json2=substr($json,$pos,-1);
        // end of substring
        $data = json_decode($json2,true);
        $sd = $data[0];
        $close=number_format($sd['close'], 2,);
        $volume=number_format($sd['volume'], 2);
        echo "<tr><td><input type='button' value='Buy'><input type='button' value='Sale'></td>";
        echo "<td><a href='trading.php?stock_code=$row[stock_code]&interval=1min'> $row[stock_code] </a></td><td>$row[stock_name]</td>";
        echo "<td>$sd[date]</a></td><td style='text-align:right'>$close</td><td style='text-align:right'>$volume</td>";
        echo "<td style='text-align:right'>";
        if($row["watchlist"]==1)
          {
            echo "<a href = 'watchlist.php?stock_code=". $row["stock_code"]. "&op=0&trade=1'><input type='button' value=' - '></a>";
          }
            else 
          {
            echo "<a href = 'watchlist.php?stock_code=". $row["stock_code"]. "&op=1&trade=1'><input type='button' value=' + '></a>";
          }
        echo"</td>";   
        echo "</tr>";
    }
    echo "</table>";
if(isset($_POST['stock'])){
    $stock = htmlspecialchars($_POST['stock']);
    $stock=strtoupper($stock);  
}

    if(isset($_GET['stock_code'])){
     $stock_code = $_GET['stock_code'];
     $interval = $_GET['interval'];
     $sql = " select stock_code, stock_name, industry, watchlist 
     from stocks where stock_code like '%$stock_code%'
     order by stock_code";
     $result = mysqli_query($link, $sql);
     $row = mysqli_fetch_array($result, MYSQLI_BOTH);
     echo "<h3>$row[stock_name]</h3>";
    }
     if (empty($stock_code)){
      exit();
    }
echo "<br>";
?>
    </form>

</center>
<?php
    include "footer.php";
?>