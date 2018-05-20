<?php
  echo '<div class="jumbotron feature">
  <div class="container text-center main_feature" >
	<img style="max-width: 50%; max-height: 250px;" src="images/logo.png"></img>
  </div>
</div>

<nav class="navbar navbar-inverse" style="margin-bottom:15px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <img src="images/logo.png" class="navbar-brand">
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="product.php?p_category=Women">Women</a></li>
        <li><a href="product.php?p_category=Men">Men</a></li>
        <li><a href="product.php?p_category=Kids">Kids</a></li>
      </ul>
        
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>';
		if (isset($_SESSION["email"]))
		{
		echo '<li class="account">
			<div class="dropdown">
				<a href="#" class="dropdown-link dropdown-toggle"  data-toggle="dropdown"><span class=" glyphicon glyphicon-user"></span>'.$_SESSION["fullname"].'<span class="caret"></span></a>
				<ul style="background-color: #262626;" class="dropdown-menu">
				  <li style="background-color: #262626; color: #a6a6a6;"><a class ="account-option" href="my-account.php">My Account</a></li>
				  <li style="background-color: #262626; color: #a6a6a6;"><a class ="account-option" href="logout.php">Log Out</a></li>
				</ul>
			</div>
		</li>';
		} else {
			echo '<li><a id ="index_signin_button" href="signin.php">Sign In</a></li>
			<li><a id ="index_signup_button" href="signup.php">Sign Up</a></li>';
		}
     echo '</ul>
    </div>
  </div>
</nav>    
  </div>
    <div class="container margin-top: 20px;">
        <div class="input-group" style="width:80%; margin: auto;">
          <input type="text" class="form-control" id="search" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>        
        <div id="search_result" style="display: none;"></div>
    </div>   
  </div>';
?>