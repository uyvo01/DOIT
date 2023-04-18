<html>
<head>
    <title>BEAN STOCK LLC.</title>
<script src="style.css"></script>
<style>
table {
    border-collapse: collapse;
    font-family: Tahoma, Geneva, sans-serif;
    width:1100px;
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
  background-color: #255851;
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
</head>
<body>
<center>
<td colspan="2"><img src="images/banner.jpeg" width = "1100" height="200"></td>
<table width="1300" height="15" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#255851" align="center"><strong><font color = "#FFFFFF" size="2px">Home</font></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="aboutus.php"><font color = "#FFFFFF" size="2px">About Us</font></a></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="service.php"><font color = "#FFFFFF" size="2px">Our services</font></a></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="blog.php"><font color = "#FFFFFF" size="2px">Blog</font></a></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="contactus.php"><font color = "#FFFFFF" size="2px">Contact us</font></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="headerlogin.php"><font color = "#FFFFFF" size="2px">Login</strong></td>
  </tr>
</table>
<hr>
    <form action="login.php" method = "post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class = "error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        <table style="width:400px">
        <tr>
        <td><label> User Name </label></td>
        <td><input type = "text" class="textbox" name = "username" placeholder="User Name"></td>
        </tr>
        <tr><td><label>Password</label></td><td><input type = "text" class="textbox"  name = "password" placeholder="Password"></td></tr>
        <tr><td></td><td><button type="submit" class="button" >Login </button> </td></tr>
        <tr><td colspan="2" align="center">Not Register? <a href="headersignup.php"><strong>Create an account</strong></a></td></tr>
        </table>
    </form>
    
    <table style="height:400px">
    <tr style="border: none;">
    <td style="border: none;"></td>
    </tr>
    </table>
</center>
<?php
    include "footer.php";
?>