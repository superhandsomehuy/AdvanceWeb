<?php
	include "backend/connect.php";
	session_start();
	if (isset($_GET["q"]))
	{
		$q = $_GET["q"];
		$query = "SELECT * FROM products where p_id='$q'";
		
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		if ($result){
			$ID = $row['p_id'];
			$NAME = $row['p_name'];
			$BRAND = $row['b_name'];
			$STOCK = $row['p_stock'];
			$PRICE = $row['p_price'];
			$IMAGE = $row['p_image'];
			$COLOUR = $row['p_color'];
			$SIZE = $row['p_size'];
		} else {
			echo "Some errors have occured";
		}
	} else {
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $NAME;?></title>
  <?php include 'styles.php'; ?>
  <script><?php include "livesearch.js";?></script>
</head>
<body style="background-color: #f7f7f7;">
	<?php include 'header.php';?>
    <div class="container" style="margin-top: 20px;">
		<div class="product_details container">
			<div class="product_picture">
				<img src="<?php echo "images/".$IMAGE; ?>">
			</div>
			<div class="product_attribute">
				<p class="product_attributes"><?php echo $NAME;?></p>
				<p class="product_attributes">$<?php echo $PRICE;?></p>
				<p class="product_attributes color"><strong>Colour:</strong> <?php echo $COLOUR;?></p>
				<p class="product_attributes size"><strong>Size:</strong> Size <?php echo $SIZE;?></p>
				<p class="product_attributes brand"><strong>Brand:</strong> <?php echo $BRAND;?></p>
				<p class="product_attributes stock"><strong>Stock:</strong> <?php echo $STOCK;?></p>
				<!--<h3><strong>Price:</strong></h3>-->
				<form style="padding: 20px 0 10px 0; border-bottom: 0.5px solid #e6e6e6; width: 50%;" action="cart.php?method=add&id=<?php echo $q; ?>" method="post">
					<input id=" quantity_input" style="width: 100%;" type="text" placeholder="Quantity" name="quantity" size="5">
					<input id="add_to_cart_btn" style="width: 100%;" type="submit" value="Add to cart" name="add_to_cart">
				</form>
				<div class="description">
					<strong><p style="size: 18px;">Description</p></strong>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
				</div>
			</div>
		</div>
    </div>
	<footer>
	</footer>
	</body>
</html>