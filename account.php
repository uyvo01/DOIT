<?php
  include 'ConnectionData.txt';
  include 'header.php';
  echo "<center>";
$conn=mysqli_connect($servername,$username,$password);
if (!$conn)
{
    die('Could not connect: '.mysqli_error());
}
echo "<h2>BALANCE INFORMATION</h2>";
if (isset($_GET['msg'])) {
  echo "<h2><font color='red'>";
  echo $_GET['msg'];
  echo "</font></h2>";
}
// Account balance
echo "<table>";
mysqli_select_db($conn,$dbname) or die("Unable to select database $dbname");
$ssn = $_SESSION['ssn'];

$sql="Select a.customer_id,a.account_no, a.account_type, a.balance
        from customers c, accounts a
        where c.customer_id = a.customer_id and a.account_type = 'Deposit' and c.ssn = '".$ssn. "'
        order by 1";
$result = mysqli_query($conn,$sql);
While ($row=mysqli_fetch_assoc($result))
{
$_SESSION['cust_id']=$row['customer_id'];
$account_no=$row["account_no"];
$max_amount=$row["balance"];
echo "<tr><td style='text-align:left'>Account No.: ". $row["account_no"]."</td> </tr>";
echo "<tr><td style='text-align:left'>Balance: $<font color='red'>".number_format($row["balance"],2). "</font></td></tr>";
}
echo "</table>";

// Deposit and withdrawal form
?>
<table>
  <tr>
    <td>
      <form action="deposit.php" method="post">
        <p>Deposit amount $<input type="number" min="0" class='textbox' name='dep_amount'/></p>
        <p><input type='hidden' class='textbox' name='account_no' value ='<?php echo $account_no?>'/>
        <input type='submit' class='button' value ='submit'/></p>
      </form>
    </td>
    <td>
      <form action="withdrawal.php" method="post">
        <p>Widrawal amount $<input type="number" min="0" max='<?php echo $max_amount?>' class='textbox' name='wd_amount'/></p>
        <p><input type='hidden' class='textbox' name='account_no' value ='<?php echo $account_no?>'/>
        <input type="submit" class='button' value ='submit'</p>
      </form>
    </td>
  </tr>
</table>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
</center>
</html>