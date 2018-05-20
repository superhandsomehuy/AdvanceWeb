<?php
	include "connect.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<?php include "styles.php"; ?>
</head>
<body style="background: linear-gradient(to bottom right, #33ccff, #99ff99); min-height:100%;" >	
	<div class="logo_container_signup">
		<img src="images/logo.png"></img>
	</div>
	<div class="container signup_container">
		<div class="signup-title-container">
			<h1 id="signup_title">Sign Up</h1>
		</div>
		<form action="signup_backend.php" method="post" class="signup_form">
			<div class="container_form">
				<div class="signup left">
					<p class="sub_title_signup">Personal Details</p>
					<div class="userdetails_field">
						<i class="fas fa-user" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Full Name" name="fullname" size="20" required>
					</div>
					<div class="userdetails_field">
						<i class="far fa-calendar" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" onfocus="(this.type='date')" placeholder="Date Of Birth" name="date_of_birth" size="20" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-home" style="font-size: 30px; margin-right: 4px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Address" name="address" size="49" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-home" style="font-size: 30px; margin-right: 4px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Suburb" name="suburb" size="49" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-home" style="font-size: 30px; margin-right: 4px; color: #404040"></i>
						<select name="cars" style="width: 65%; border-radius: 5px; padding: 5px;" required>
							<option value="" disabled selected>Select your state</option>
							<option value="volvo">VIC</option>
							<option value="saab">NSW</option>
							<option value="fiat">QLD</option>
							<option value="audi">WA</option>
							<option value="audi">SA</option>
							<option value="audi">TAS</option>
						 </select>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-home" style="font-size: 30px; margin-right: 4px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Postcode" name="postcode" size="49" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-home" style="font-size: 30px; margin-right: 4px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Country" name="country" size="49" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-phone" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Phone Number" name="phone" pattern="[0-9]{10}" size="50" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-envelope" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" size="50" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-unlock" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="password" placeholder="Password" name="password" pattern=".{6,}" size="50" required>
					</div>
				</div>
				<div class="signup right">
				<p class="sub_title_signup">Payment Details</p>
					<div class="userdetails_field">
						<i class="fas fa-credit-card" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Card Number" name="cardnum" size="20" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-clock" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px; border-radius: 5px;" type="text" placeholder="Expiry Month" name="expmonth" size="20" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-clock" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="Expiry Year" name="expyear" size="50" required>
					</div>
					<div class="userdetails_field">
						<i class="fas fa-credit-card" style="font-size: 30px; margin-right: 5px; color: #404040"></i>
						<input style ="padding: 5px" type="text" placeholder="CVV" name="cvv" size="50" required>
					</div>
					<div class="container signup-instruction">
						<strong><p>Email should contain symbols '@' and '.'</p>
						<p>Password shoud be at least 6 characters</p>
						<p>Phone number should have 10 numbers</p></strong>
					</div>
				</div>
			</div>
			<button id="signin_button" type="submit" value="Sign In">Sign Up</button>
		</form>
		<form action ="logout.php" method="post">
			<button type="submit" id="signup_cancel_btn">Cancel</button>
		</form>
	</div>
</body>
</html>