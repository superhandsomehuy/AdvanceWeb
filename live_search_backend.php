<?php
	include "backend/connect.php";
	
	if(!empty($_POST['i'])) {
		$i = $_POST['i'];
		$query = "SELECT * FROM products where p_name like '%$i%'";
		$result = mysqli_query($conn,$query);
		while ($row = mysqli_fetch_array($result)){
			echo '<div class="result" style="border-bottom: 0.2px solid  #f2f2f2;"><a class="search-result-link" style="color: black;" href="product_view.php?q='.$row['p_id'].'">'.$row['p_name'].'<br>$'.$row['p_price'].'</a></div>';
		}
	}
?>