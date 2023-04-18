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
    if(isset($_POST['username']) && isset($_POST['password'])){
        function validate($data) {
            $data = trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    }

    $ssn = validate($_POST['ssn']);
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $primary_phone_no = validate($_POST['primary_phone_no']);
    $street_no = validate($_POST['street_no']);
    $street_name = validate($_POST['street_name']);
    $city = validate($_POST['city']);
    $zip_code = validate($_POST['zip_code']);
    $insurance_id = validate($_POST['insurance_id']);

    $username =  validate($_POST['username']);
    $pass = validate($_POST['password']);
    $pass = hash('ripemd128', $pass);

    if(empty($username)){
        header("Location: headersignup.php?error=User Name is required");
        exit();
    }
    else if(empty($pass)){
        header("Location: headersignup.php?error=Password is required");
        exit();
    } else if(empty($ssn)){
        header("Location: headersignup.php?error=SSN is required");
        exit();
    } else if(empty($first_name)){
        header("Location: headersignup.php?error=First name is required");
        exit();
    } else if(empty($last_name)){
        header("Location: headersignup.php?error=Last name is required");
        exit();
    }

    $sql="select username from users where username = '".$username."'";
    $result=mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num>0){
        header("Location: headersignup.php?error=The username exist!");
        exit();
    }
    $sql="insert into users values('".$username."', '".$pass."','".$ssn."')";
    $result=mysqli_query($conn,$sql);

    $sql="select ssn from patient where ssn = '".$ssn."'";
    $result=mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num>0){
        $sql= "insert into patient_member values('". $ssn. "','". $ssn. "','Self')";
        $result = mysqli_query($conn,$sql);
        
        header("Location: headerlogin.php?error=Sign up successfully!");
        exit();
    }

$sql= "insert into patient values('". $ssn. "','". $first_name. "',
    '". $last_name. "','". $primary_phone_no. "',
    '". $street_no. "','". $street_name. "',
    '". $city. "','". $zip_code. "',
    '". $insurance_id. "')";
$result = mysqli_query($conn,$sql);

?>
