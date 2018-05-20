<html>
    <head>
        <?php include "styles.php";?>
        <style>
            iframe{
                width: 100%;
                height: 100%;
                border: 0;
        }
        </style>
        
    </head>
    <body>
        <nav class="navbar navbar-inverse" style="margin-bottom:0px;">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="backend/operations.php" target = "window">Add/Update an Item</a></li>
                <li><a href="backend/delete-operation.php" target = "window">Delete an Item</a></li>
                <li><a href="backend/search-operation.php" target = "window">Search Orders</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="my-account.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
              </ul>
            </div>
          </div>
        </nav>
        
        <iframe name="window" src="backend/operations.php"></iframe>
    </body>
</html>