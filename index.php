<?php
    include 'backend/connect.php';
    session_start();
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
            $(".col-sm-4").fadeIn(2000);
        });
    </script>
    <script><?php include 'livesearch.js'; ?></script>
    <style>
        .col-sm-4:hover{
            box-shadow: 5px 10px 18px #888888 ;
        }
        .panel-footer{
            color: black;
            font-weight: bold;
        }
        .scrolling-wrapper {
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
        }
  .card {
    display: inline-block;
  }
        .scrolling-wrapper {
  &::-webkit-overflow-scrolling: touch;
}
        .scrolling-wrapper {
  &::-webkit-scrollbar {
    display: none;
  }
}

    </style>
</head>
<body>
  <?php include 'header.php';?>
<div class="container" style="margin-top:20px;">    
  <div class="row">
    <a href = "product.php?p_category=Women"><div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Women</div>
        <div class="panel-body"><img src="images/womens-main.jpg" class="img-responsive" alt="Image"></div>
        <div class="panel-footer">Go to Women's Collection</div>
      </div>
        </div></a>
   <a href = "product.php?p_category=Men"> <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Men</div>
        <div class="panel-body"><img src="images/mens-main.jpg" class="img-responsive" alt="Image"></div>
        <div class="panel-footer">Go to Men's Collection</div>
      </div>
       </div></a>
    <a href = "product.php?p_category=Kids"><div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Kids</div>
        <div class="panel-body"><img src="images/kids-main.jpg" class="img-responsive" alt="Image"></div>
        <div class="panel-footer">Go to Kids' Collection</div>
      </div>
        </div></a>
  </div>
</div>
<div class="container">
    <h2>Trending</h2>
  <div class="scrolling-wrapper" id="mover">
      <?php
      $sql = "select * from products order by p_clicks desc limit 6;";
          $result = mysqli_query($conn,$sql);
      if($result){
          while($row = mysqli_fetch_assoc($result)){
          ?>
      <div class="card">
    <a href = "product_view.php?q=<?php echo $row['p_id']; ?>"><div style="margin-right:15px;"> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $row['p_name'];?></div>
        <div class="panel-body"><img src="images/<?php echo $row['p_image'];?>" class="img-responsive" style="max-height:400px;" alt="Image"></div>
        <div class="panel-footer">Just for AU $<?php echo $row['p_price'];?></div>
      </div>
        </div></a>
          </div>
      <?php
        }
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
  </form>
</footer>
</body>
</html>
