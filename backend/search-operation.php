
<!doctype html>
<html>
    <head>
          <?php include '../styles.php'; ?>
            <style>
                table {
                    width: 100%;
                    height: auto;
                    
                }
                td,th {
                    text-align: center;
                }
            </style>
	</head>
    <body style="margin:0;">
            <h1 style="background-color:#337ab7; margin:0 0 20px 0; color:white; padding:5px;">Search Order</h1>
        <div class="container">
                <form method="post">
                    
                    <div class="form-group">
                        <label for="id">Order ID or Customer Email</label>
                        <input type="text" class="form-control" id="search" name="o_id">
                    </div>
                    
                    <input type="hidden" value="orders" name="table">
                    <input type="hidden" value="select" name="action">
                    
                    <input type="submit" value="Search item" name="submit" class="btn btn-primary">
                    <input type="submit" value="View Pending Orders" name="pending" class="btn btn-primary">
                </form>
                <div>
                    <?php
                        include "connect.php";
                        if(isset($_POST['submit'])){
                        $id = $_POST['o_id'];
                        $sql = "select orders.o_id,orders.o_date,orders.o_status,orders.o_price,products.p_name, customer.c_name from orders inner JOIN customer ON customer.c_email = orders.c_email INNER JOIN products on products.p_id = orders.p_id where orders.c_email = '$id' OR orders.o_id = '$id';";
                        $result = mysqli_query($conn,$sql);
                        if($result && !empty($id)){
                            echo "<h2>Orders for ".$id."</h2>";
                            echo "<table class='table'";
                            echo "<tr>";  
                            echo "<th>Order ID</th>";
                            echo "<th>Customer</th>";
                            echo "<th>Product</th>";
                            echo "<th>Dated</th>";
                            echo "<th>Status</th>";
                            echo "<th>Price</th>";
                            echo "</tr>";
                        if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['o_id']."</td>";
                            echo "<td>".$row['c_name']."</td>";
                            echo "<td>".$row['p_name']."</td>";
                            echo "<td>".$row['o_date']."</td>";
                            echo "<td>".$row['o_status']."</td>";
                            echo "<td>AU$".$row['o_price']."</td>";
                            echo '<td><a href="order-view.php?order_id='.$row['o_id'].'" class="btn btn-primary">View</a></td>';
                            echo "</tr>";
                        }
                            echo "</table>";
                        } else {
                            echo "<h3>There are no orders<h3>";
                        }
                        } else {
                            echo "<h2>Please enter Order ID or Customer Email.</h2>";
                        }
                    } else {
                            $sql = "select orders.o_id,orders.o_date,orders.o_status,orders.o_price,products.p_name, customer.c_name from orders inner JOIN customer ON customer.c_email = orders.c_email INNER JOIN products on products.p_id = orders.p_id where o_status != 'Delivered'";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            echo "<h2>Pending Order</h2>";
                            echo "<table class='table'";
                            echo "<tr>";  
                            echo "<th>Order ID</th>";
                            echo "<th>Customer</th>";
                            echo "<th>Product</th>";
                            echo "<th>Dated</th>";
                            echo "<th>Status</th>";
                            echo "<th>Price</th>";
                            echo "</tr>";
                        if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['o_id']."</td>";
                            echo "<td>".$row['c_name']."</td>";
                            echo "<td>".$row['p_name']."</td>";
                            echo "<td>".$row['o_date']."</td>";
                            echo "<td>".$row['o_status']."</td>";
                            echo "<td>AU$".$row['o_price']."</td>";
                            echo '<td><a href="order-view.php?order_id='.$row['o_id'].'" class="btn btn-primary">View</a></td>';
                            echo "</tr>";
                        }
                            echo "</table>";
                        } else {
                            echo "<h3>There are no orders<h3>";
                        }
                        }
                            
                        }
                    ?>
                </div>
            </div>
    </body>
</html>