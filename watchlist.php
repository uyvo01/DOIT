<?php
    include 'ConnectionData.txt';
    $conn=mysqli_connect($servername,$username,$password);
if (!$conn)
{
    die('Could not connect: '.mysqli_error());
}
mysqli_select_db($conn,$dbname) or die("Unable to select database $dbname");

$stock_code=$_GET['stock_code'];
$op=$_GET['op'];
$trade=$_GET['trade'];
$sql= "update stocks set watchlist='".$op."' where stock_code='". $stock_code. "'";

$result = mysqli_query($conn,$sql);

if($result >0 )
    if ($trade==0){
        header("Location:livemarket.php");
    }else{
        header("Location:trading.php");
    }
else
    echo "Error updating record: ".mysqli_error($conn);
?>