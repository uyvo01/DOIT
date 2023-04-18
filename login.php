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
    $username =  validate($_POST['username']);
    $pass = validate($_POST['password']);
    
    $pass = hash('ripemd128', $pass);

    if(empty($username)){
        header("Location: headerlogin.php?error=User Name is required");
        exit();
    }
    else if(empty($pass)){
        header("Location: headerlogin.php?error=Password is required");
        exit();
    }
    $sql="select * from users where username='".$username."' and password = '".$pass."' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if($row['username']===$username && $row['password']===$pass){
            $_SESSION['username']=$row['username'];
            $_SESSION['ssn']=$row['ssn'];
            header("Location: home.php");
            exit();
        }
        else{
            header("Location: headerlogin.php?error=Incorrect User Name or Password");
            exit();
        }
    }
    else{
        header("Location: headerlogin.php?error=Incorrect User Name or Password");
        exit();
    }

?>
