<?php
    include "backend/connect.php";
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location:signin.php");
    }else{
        $email = $_SESSION["email"];
        $sql = "select * from customer where c_email ='" .$email."'";
        $result = mysqli_query($conn,$sql);
        $row1 = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($result) > 0)
	   {		
            $_SESSION["email"] = $row1["c_email"];
            $_SESSION["fullname"] = $row1["c_name"];
            $_SESSION["dob"] = $row1["c_dob"];
            $_SESSION["address"] = $row1["c_street"]." ".$row1["c_suburb"]." ".$row1["c_state"]." ".$row1["c_country"]." ".$row1["c_postcode"];
            $_SESSION["phone"] = $row1["c_phone"];
        }
    }
?>
<html>
    <head>
        <?php include 'styles.php';?>
        <script>
            $(document).ready(function(){
                $(".form-control").hide();
                   $(".btn-primary").hide();
                   $("#changename").hide();
               $(".btn-sm").click(function(){
                   $(".form-control").toggle();
                   $(".btn-primary").toggle();
                   $("#changename").toggle();
                   $("#name").toggle();
                   
               }); 
            });
        </script>
        <style>
            td,th{
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php include 'header.php';?>
        <div class="container">
            <h2>My Account</h2>
            <form method="post" action="backend/query.php">
                <h2><small>Hi, </small><small id="name"><?php echo $_SESSION["fullname"]; ?> !</small>
                    <small id="changename"><input type="text" name="c_name" placeholder="New Name" ></small>
                        <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span> Update 
                        </button>
                    
                </h2>
            <div class=".table-responsive">
            <table class="table">
                <tr>
                    <th>Password:</th>
                    <td>*********</td>
                    <td><input type="pasdword" name="c_password" placeholder="New Password" class="form-control"></td>
                </tr>
                <tr>
                    <th>Date of Birth:</th>
                    <td><?php
                            $originalDate = $_SESSION["dob"];
                            $newDate = date("d-M-Y", strtotime($originalDate));
                             echo $newDate;
                        ?></td>
                    <td><input type="date" name="c_dob" placeholder="New Date of Birth" class="form-control"></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><?php echo $_SESSION["address"]; ?></td>
                    <td>
                        <input type="text" name="c_street" placeholder="New Street" class="form-control">
                        <input type="text" name="c_suburb" placeholder="New Suburb" class="form-control">
                        <input type="text" name="c_state" placeholder="New state" class="form-control">
                        <input type="text" name="c_country" placeholder="New Country" class="form-control">
                        <input type="text" name="c_postcode" placeholder="New Post Code" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th>Mobile:</th>
                    <td><?php echo $_SESSION["phone"]; ?></td>
                    <td><input type="text" name="c_phone" placeholder="New Mobile number" class="form-control"></td>
                </tr>
            </table>
                </div>
                <input type="hidden" name="table" value="customer">
                <input type="hidden" name="action" value="Update">
                <input type="hidden" name="c_email" value="<?php echo $_SESSION["email"]; ?>">
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
        <?php
            if($_SESSION['userRole'] != "Admin"){
                ?>
        <div class="container">
            <h2>Orders In-Progess</h2>
            <div class="row">
            <?php
                $sql = "select orders.*,products.p_name,products.p_image from orders JOIN products ON products.p_id = orders.p_id where c_email = '$email' and o_status != 'Delivered'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                    <div class="col-sm-3"> 
                      <div class="panel panel-primary">
                        <div class="panel-heading"><?php echo $row["p_name"]?></div>
                        <div class="panel-body"><img src="images/<?php echo $row["p_image"]?>" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Status: <?php echo $row["o_status"]?></div>
                      </div>
                    </div>
                <?php
                    }
                }else {
                    echo "<h2><small>Oops ! No Orders.</small></h2>";
                }
            ?>
            </div>
        </div>
        <div class="container">
            <h2>Orders Delivered</h2>
            <div class="row">
            <?php
                $sql = "select orders.*,products.p_name,products.p_image from orders JOIN products ON products.p_id = orders.p_id where c_email = '$email' and o_status = 'Delivered'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                    <div class="col-sm-3"> 
                      <div class="panel panel-primary">
                        <div class="panel-heading"><?php echo $row["p_name"]?></div>
                        <div class="panel-body"><img src="images/<?php echo $row["p_image"]?>" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Status: <?php echo $row["o_status"]?></div>
                      </div>
                    </div>
                <?php
                    }
                } else {
                    echo "<h2><small>Oops ! No Orders.</small></h2>";
                }
            ?>
                </div>
        </div>
        <?php
            } else {
                ?>
        <div class="container">
            <h2>Orders need to be processed
                <a href="admin.php" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-chevron-right"></span> Go to Admin Panel 
                </a>
            </h2>
            
            <div class="row">
            <?php
                $sql = "select orders.*,products.p_name,products.p_image from orders JOIN products ON products.p_id = orders.p_id where o_status != 'Delivered'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                    <div class="col-sm-3"> 
                      <div class="panel panel-primary">
                        <div class="panel-heading"><?php echo $row["p_name"]?></div>
                        <div class="panel-body"><img src="images/<?php echo $row["p_image"]?>" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">Status: <?php echo $row["o_status"]?></div>
                      </div>
                    </div>
                <?php
                    }
                } else {
                    echo "<h2><small>Oops ! No Orders.</small></h2>";
                }
            ?>
            </div>
        </div>
        <?php
            }
        ?>
    </body>
</html>