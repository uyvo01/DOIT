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
    $birth_day = validate($_POST['birth_day']);
    $phone_no = validate($_POST['phone_no']);
    $street_no = validate($_POST['street_no']);
    $street_name = validate($_POST['street_name']);
    $city = validate($_POST['city']);
    $state = validate($_POST['state']);
    $zip_code = validate($_POST['zip_code']);
    $id_number = validate($_POST['id_number']);
    $username =  validate($_POST['username']);
    $pass = validate($_POST['password']);
    $pass = hash('ripemd128', $pass);

    if(empty($username)){
        header("Location: headersignup.php?error=User Name is required!");
        exit();
    }
    else if(empty($pass)){
        header("Location: headersignup.php?error=Password is required!");
        exit();
    } else if(empty($ssn)){
        header("Location: headersignup.php?error=SSN is required!");
        exit();
    } else if(empty($first_name)){
        header("Location: headersignup.php?error=First name is required!");
        exit();
    } else if(empty($last_name)){
        header("Location: headersignup.php?error=Last name is required!");
        exit();
    } else if(empty($birth_day)){
        header("Location: headersignup.php?error=Birth day is required!");
        exit();
    } else if(empty($phone_no)){
        header("Location: headersignup.php?error=Phone number is required!");
        exit();
    }

    $sql="select username from users where username = '".$username."' or ssn='".$ssn."'";
    $result=mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num>0){
        header("Location: headersignup.php?error=The username or ssn exist!");
        exit();
    }
    $usertype='C';
    // insert to table users
    $sql="insert into users values('".$username."', '".$pass."','".$ssn."','".$usertype."')";
    $result=mysqli_query($conn,$sql);
    
    // insert to table persons
    $sql= " insert into persons(lastname, firstname, birthday, phone_no, street_no, 
                street_name, city, state, zipcode, email, id_number, ssn) 
            values('".$last_name. "','". $first_name. "','". $birth_day. "',
                '". $phone_no. "', '". $street_no. "','". $street_name. "',
                '". $city. "','". $state. "','". $zip_code. "','". $username."',
                '". $id_number. "','". $ssn."')";
    $result = mysqli_query($conn,$sql);
    
    // insert to table customers
    $sql="insert into customers(ssn,customer_status,customer_type)
         values('".$ssn."', 'Active','External')";
    $result=mysqli_query($conn,$sql);
    
    // create a deposit account for new customer
    $sql="select customer_id from customers where ssn = '".$ssn."'";
    $result=mysqli_query($conn,$sql);    
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $cust_id=$row['customer_id'];
        $sql="insert into accounts(customer_id,account_type,balance)
        values('".$cust_id."', 'Deposit',0)";
        $result=mysqli_query($conn,$sql);
    }
    // redirect to login page
    header("Location: headerlogin.php?error=Register Successfully!");
?>
