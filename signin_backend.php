<?php
	include"backend/connect.php";
	

	$email = $_POST["signin_email"];
	$password = $_POST["signin_password"];
	$password_encrypt = sha1($password);
    
    $admin = checkUser($email);
    
    if($admin == "Admin"){
        $query = "SELECT * FROM admin WHERE ad_email = '$email' AND ad_password = '$password_encrypt'";
    } else{
       $query = "SELECT * FROM customer WHERE c_email = '$email' AND c_password = '$password_encrypt'";
    }
	
	
	$result = mysqli_query($conn,$query);

	$row1 = mysqli_fetch_assoc($result);
	session_start();
	if(mysqli_num_rows($result) > 0)
	{		
        if($admin == "Admin"){
            $_SESSION["email"] = $row1["ad_email"];
            $_SESSION["fullname"] = $row1["ad_name"];
            $_SESSION["dob"] = $row1["ad_dob"];
            $_SESSION["address"] = $row1["ad_street"]." ".$row1["ad_suburb"]." ".$row1["ad_state"]." ".$row1["ad_country"]." ".$row1["ad_postcode"];
            $_SESSION["phone"] = $row1["ad_phone"];
            $_SESSION["userRole"] = $admin;
        } else {
          $_SESSION["email"] = $row1["c_email"];
          $_SESSION["fullname"] = $row1["c_name"];
          $_SESSION["dob"] = $row1["c_dob"];
          $_SESSION["address"] = $row1["c_street"]." ".$row1["c_suburb"]." ".$row1["c_state"]." ".$row1["c_country"]." ".$row1["c_postcode"];
          $_SESSION["phone"] = $row1["c_phone"];
          $_SESSION["userRole"] = "Customer";
        }
		header("Location:index.php");
	} else {
		$_SESSION["email_err"] = "Your email is wrong.";
		$_SESSION["password_err"] = "Your password is wrong.";
    header ("Location:signin.php");
	}

  function checkUser($email){
    $loginCheck = explode("@",$email);
    foreach($loginCheck as $admin){
        if($admin == "shopping.com"){
            $admin = "Admin";
            break;
        }
    }
    return $admin;
  }
?>