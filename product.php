<?php
    include "backend/connect.php";
	session_start();
	if(isset($_GET["p_category"]))
	{
		$category = $_GET["p_category"];
    foreach($_GET as $key => $value){
      if($key != 'filter'){
        if($key == "p_name"){
          $whereArr[] = $key." LIKE '%".$value."%'";
        }else{
          $whereArr[] = $key." = '".$value."'";
        }
        $condition = implode(" and ",$whereArr);
         }
    }
    
    if(isset($_GET["filter"])){
      $query = "SELECT * FROM products where $condition";
    }else{
      $query = "SELECT * FROM products where p_category = '$category'";  
    }
		
		$result = mysqli_query($conn,$query);
		$data = array();
		$count = mysqli_num_rows($result);
		if ($count > 0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
				$data[] = $row;
			}
		}
	} else {
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <?php include 'styles.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".col-sm-4").hide();
            $(".col-sm-4").fadeIn(1000);
        });
    </script>
    <script><?php include "livesearch.js";?></script>
    <style>
        .col-sm-4:hover{
            box-shadow: 5px 10px 18px #888888 ;
        }
      .filter{
        margin:auto;
        width:80%;
        margin-bottom:20px;
      }
      .form-group{
        margin-left:20px;
      }
    </style>
</head>
<body>
<?php include "header.php";?>
<div class="filter">
  <form style= "margin-top: 20px; display: flex; justify-content: center;" method="get" class="form-inline">
    <div class="form-group">
      <label>Type:</label>
    <select name="p_name" class="form-control">
			<option value="" disabled selected>Select your type</option>
			<option value="T-Shirt">T-Shirt</option>
			<option value="Skirt">Skirt</option>
			<option value="Jeans">Jeans</option>
			<option value="Pants">Pants</option>
			<option value="Shirt">Shirt</option>
		</select>
      </div>
    <div class="form-group">
      <label>Size:</label>
    <select name="p_size" class="form-control">
			<option value="" disabled selected>Select your size</option>
			<option value="S">S</option>
			<option value="M">M</option>
			<option value="L">L</option>
			<option value="XL">XL</option>
			<option value="XXL">XXL</option>
		</select> 
    </div>
    <div class="form-group">
      <label>Color:</label>
    <select name="p_color" class="form-control">
			<option value="" disabled selected>Select your Color</option>
      <option>White</option>
      <option>Blue</option>
      <option>Green</option>
      <option>Black</option>
		</select>
    </div>
    <div class="form-group">
      <label>Brand:</label>
    <select  name="b_name" class="form-control">
			<option value="" disabled selected>Select your Brand</option>
			<option>Zara</option>
      <option>Armani</option>
      <option>Levis</option>
    </select>
    </div>
    <input type="hidden" name="p_category" value="<?php echo $category;?>">
    <button type="submit" value="Apply" name="filter" class="btn btn-primary">Apply</button>
  </form>  
</div>
<div class="container">
  <div class="row">
	<?php 
		for ($x = 0; $x < $count; $x++)
		{
	?>
	<a href="product_view.php?q=<?php echo $data[$x]["p_id"]; ?>">
		<div class="col-sm-4"> 
		  <div class="panel panel-primary">
			<div class="panel-heading"><?php echo $data[$x]["p_name"]; ?></div>
			<div class="panel-body"><img src="images/<?php echo $data[$x]["p_image"]; ?>" class="img-responsive" style="width:100%" alt="Image"></div>
			<div class="panel-footer">Price: AU $<?php echo $data[$x]["p_price"]; ?></div>
		  </div>
		</div>	
	</a>
	<?php 
		}
	?>
  </div>
</div>

<br><br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
	<div id="huy-test"></div>
  </form>
</footer>
</body>
</html>
