<?php
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }
    if (empty($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<title>BEAN STOCK LLC.</title>
<style>
table {
    border-collapse: collapse;
    font-family: Tahoma, Geneva, sans-serif;
    width:1300px;
}
table td {
    padding: 7px;
}
table thead td {
    background-color: #54585d;
    color: #ffffff;
    font-weight: bold;
    font-size: 13px;
    border: 1px solid #54585d;
}
table tbody td {
    color: #636363;
    border: 1px solid #dddfe1;
}
table tbody tr {
    background-color: #ffffff;
}
table tbody tr:nth-child(even) {
    background-color: #FEF9E7;
}
.button {
  background-color: #D35400;
  border: none;
  color: white;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 2px 1px;
  cursor: pointer;
}
.textbox {
    border: 2px ridge #85C1E9;
    outline: 0;
    height: 30px;
    width: 250px;
    font-size:16px;
</style>
<body>
<center>

<td colspan="2"><img src="images/banner.jpg" width = "1000" height="180"></td>
</center>
<table width="1300" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr><td style='padding:1px; text-align:right' ><font color = "RED" size ="3px">
    <img src="images/user_icon.png" width = "20" height="20">  <?php echo $_SESSION['username'];?> - xxx-xx-<?php echo  substr($_SESSION['ssn'],-4,4)?></font></td></tr>
</table>
<table width="1300" height="15" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding: 7px" colspan="1" bgcolor="#154360" align="center"><strong><a href="dashboard.php"><font color = "#FFFFFF" size="2px">Dashboard</font></a></strong></td>
    <td style="padding: 7px" colspan="1" bgcolor="#154360" align="center"><strong><a href="livemarket.php"><font color = "#FFFFFF" size="2px">Live market</font></a></strong></td>
    <td style="padding: 7px" colspan="2" bgcolor="#154360" align="center"><strong><a href="trading.php"><font color = "#FFFFFF " size="2px">Buy / Sell</font></a></strong></td>
    <td style="padding: 7px" colspan="1" bgcolor="#154360" align="center"><strong><a href="documents.php"><font color = "#FFFFFF" size="2px">Documents</font></a></strong></td>

    <td style="padding: 7px" colspan="1" bgcolor="#154360" align="center"><strong><a href="profile.php"><font color = "#FFFFFF" size="2px">Profile</font></a></strong></td>
    <td style="padding: 7px" colspan="1" bgcolor="#154360" align="center"><strong><a href="logout.php"><font color = "#FFFFFF" size="2px">Logout</font></a></strong></td>
  </tr>
</table>
<hr>
</body>
</html>
