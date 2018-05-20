<?php
    include "connect.php";
?>
<!doctype html>
<html>
    <head>
        <title>Delete</title>
          <?php include '../styles.php'; ?>
    </head>
    <body style="margin:0;">
            <h1 style="background-color:#337ab7; margin:0 0 20px 0; color:white; padding:5px;">Remove item</h1>
        <div class="container">
                <form action="backend/query.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="id">Product ID</label>
                        <input type="text" class="form-control" id="id" name="p_id">
                    </div>
                    
                    <input type="hidden" value="products" name="table">
                    <input type="hidden" value="Delete" name="action">
                    <div class="form-group">
                        <input type="submit" value="Delete item" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
    </body>
</html>