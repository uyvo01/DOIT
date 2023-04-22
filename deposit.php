<?php

if( empty(session_id()) && !headers_sent()){
    session_start();
}
include "ConnectionData.txt";
$conn=mysqli_connect($servername,$username,$password);
if (!$conn)
{
    die('Could not connect: '.mysqli_error());
}
mysqli_select_db($conn,$dbname) or die("Unable to select database $dbname");
//Check input amount is numeric, if not return 0

$account_no=$_POST['account_no'];
$dep_amount =$_POST['dep_amount'];
$cust_id = $_SESSION['cust_id'];
$date=date('Y-m-d H:i:s');
if ($dep_amount>0){
    // insert into history traction
    $sql= "insert into account_transaction(transaction_type,customer_id,account_to,amount, transaction_date)
    values('Deposit','".$cust_id."','".$account_no. "',
    ". $dep_amount. ",'".$date. "')";
    $result = mysqli_query($conn,$sql);
    
    // update accounts balance
    $sql= "update accounts set balance = balance + ". $dep_amount. "
    where customer_id='".$cust_id."' and account_no = '".$account_no."'";
    $result = mysqli_query($conn,$sql);
    header("Location: account.php?msg=Deposit Successfully!");
}else{
    header("Location: account.php?msg=Invalid amount! Deposit Unsuccessfully");
}
?>
