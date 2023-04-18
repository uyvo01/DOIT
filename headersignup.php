<html>
<head>
    <title>BEAN STOCK LLC</title>
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
<table width="1300" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" bgcolor="#255851" align="center"><strong><font color = "#FFFFFF" size="2px">Home</font></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="aboutus.php"><font color = "#FFFFFF" size="2px">About Us</font></a></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="service.php"><font color = "#FFFFFF" size="2px">Our services</font></a></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="blog.php"><font color = "#FFFFFF" size="2px">Blog</font></a></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="contactus.php"><font color = "#FFFFFF" size="2px">Contact us</font></strong></td>
    <td colspan="2" bgcolor="#255851" align="center"><strong><a href="headerlogin.php"><font color = "#FFFFFF" size="2px">Login / </a><a href="headersignup.php"><font color = "#FFFFFF ">Sign up</font></a></strong></td>
  </tr>
</table>
<hr>
    <form action="signup.php" method = "post">
        <h2>SIGN UP</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class = "error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
<?php
echo "<table style='width:400px'><tr>
        <td style='text-align:right'><font color='RED'>SSN*</font></td>
        <td style='text-align:center'><input type='text' class='textbox' id='ssn' name='ssn' value=''></td>
    </tr>
    <tr>
        <td style='text-align:right'><font color='RED'>First Name*</font></td>
        <td style='text-align:center'><input type='text' class='textbox' id='first_name' name='first_name' value=''></td>
    </tr>
    <tr>
        <td style='text-align:right'><font color='RED'>Last Name*</font></td>
        <td style='text-align:center'><input type='text' class='textbox' id='last_name' name='last_name' value=''></td>
    </tr>
    <tr>
        <td style='text-align:right'>Primary Phone</td>
        <td style='text-align:center'><input type='text' class='textbox' id='primary_phone_no' name='primary_phone_no' value=''></td>
    </tr>
            <tr>
                <td style='text-align:right'>Street #</td>
                <td style='text-align:center'><input type='text' class='textbox' id='street_no' name='street_no' value=''></td>
            </tr>
            <tr>
                <td style='text-align:right'>Street Name</td>
                <td style='text-align:center'><input type='text' class='textbox' id='street_name' name='street_name' value=''></td>
            </tr>
            <tr>
                <td style='text-align:right'>City</td>
                <td style='text-align:center'><input type='text' class='textbox' id='city' name='city' value=''></td>
            </tr>
            <tr>
                <td style='text-align:right'>Zip Code</td>
                <td style='text-align:center'><input type='text' class='textbox' id='zip_code' name='zip_code' value=''></td>
            </tr>
            <tr>
                <td style='text-align:right'>ID Number</td>
                <td style='text-align:center'><input type='text' class='textbox' id='id_number' name='id_number' value=''></td>
            </tr>
                <tr>
                    <td style='text-align:right'><font color='RED'>User name*</font></td>
                    <td style='text-align:center'><input type='text' class='textbox' id='username' name='username' value=''></td>
                </tr>
                <tr>
                    <td style='text-align:right'><font color='RED'>Password*</font></td>
                    <td style='text-align:center'><input type='text' class='textbox' id='password' name='password' value=''></td>
                </tr>
                <tr>
                    <td></td>
                    <td style='text-align:left'><font color='RED'>(*): mandatory</font></td>
                </tr>
    <tr>
    <td></td><td><input type='submit' class='button' value='Sign up'>
    <input type='reset' class='button' value='Reset'></td>
    </tr></table>";
?>
    </form>
</center>
<?php
    include "footer.php";
?>