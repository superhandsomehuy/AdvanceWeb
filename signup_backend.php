<?php
	include "backend/connect.php";
	
	$fullname = $_POST["fullname"];
	$dob = $_POST["date_of_birth"];
  $_POST["address"];
	$suburb = $_POST["suburb"];
	$state = $_POST["state"];
	$postcode = $_POST["postcode"];
	$country = $_POST["country"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password_hash = sha1($password);
	$cardnum = $_POST["cardnum"];
	$expmonth = $_POST["expmonth"];
	$expyear = $_POST["expyear"];
	$cvv = $_POST["cvv"];
	
	$query1 = "INSERT INTO customer VALUES ('$email','$password_hash', '$fullname', '$dob', '$address', '$suburb', '$state', '$country', '$postcode', '$phone')";
	$query2 = "INSERT INTO cards VALUES ('$email', '$cardnum', '$expmonth', '$expyear', '$cvv')";
	
	$result1 = mysqli_query($conn,$query1);
	$result2 = mysqli_query($conn,$query2);
	
	$query3 = "SELECT * FROM customer WHERE c_email = '$email'";
	$result3 = mysqli_query($conn,$query3);
	$row = mysqli_fetch_assoc($result3);
	
	if ($row){
		session_start();
		$_SESSION["email"] = $row["c_email"];		
		$_SESSION["fullname"] = $row["c_name"];
		header("Location:index.php");
	} else {
		echo "Some error has occured!";
	}
?>