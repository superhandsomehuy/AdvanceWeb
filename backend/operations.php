<?php
    include "connect.php";
?>
<!doctype html>
<html>
    <head>
        <?php include '../styles.php'; ?>
    </head>
    <body style="margin:0;">
            <h1 style="background-color:#337ab7; margin:0 0 20px 0; color:white; padding:5px;">Add/Update item</h1>
        <div class="container">
                <form action="query.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Select action</label>
                        <select name="action"  class="form-control">
                            <option value="Insert">Add new item</option>
                            <option value="Update">Update Item</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id">Product ID</label>
                        <input type="text" class="form-control" id="id" name="p_id">
                    </div>
                    <div class="form-group ">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="p_name">
                    </div>
                    <div class="form-group ">
                        <label for="Category">Category</label><br>  
                        <input type="radio" id="Category" name="p_category" value="Men">Men<br>
                        <input type="radio" id="Category" name="p_category" value="Women">Women<br>
                        <input type="radio" id="Category" name="p_category" value="Kids">Kids
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <select class="form-control" id="size" name="p_size">
                            <option selected disabled>Size</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" class="form-control" id="color" name="p_color">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="p_price">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="p_stock">
                    </div>
                    <div class="form-group">
                        <label for="bName">Brand</label>
                        <select id="bName" name="b_name" class="form-control">
                            <option selected disabled>Brand</option>
                            <?php
                                $query = "select b_name from brands";
                                $result = mysqli_query($conn,$query);
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option>".$row['b_name']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="p_image" id="image">
                    </div>
                    <input type="hidden" value="products" name="table">
                    
                    <input type="hidden" value="" name="p_date_add" id="p_date_add">
                    <script type="text/javascript">
                         var elem = document.getElementById("p_date_add");
                        n =  new Date();
                        y = n.getFullYear();
                        m = n.getMonth() +1;
                        d = n.getDate();
                         elem.value = y + "/" + m + "/" + d;
                    </script>
                    <div class="form-group">
                        <input type="submit" value="Save item" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
    </body>
</html>