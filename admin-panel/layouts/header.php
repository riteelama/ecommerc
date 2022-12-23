<?php 

  session_start();

  define("ADMINURL","http://localhost/ecommerce/admin-panel");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="http://localhost/ecommerce/admin-panel/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
     <link href="<?php echo ADMINURL;?>/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="ttp://localhost/ecommerce/admin-panel/bootstrap.min.css"></script>
    <script src = "http://localhost/ecommerce/admin-panel/bootstrap.min.js"></script>
    <!-- <script src="http://localhost/ecommerce/admin-panel/jquery-1.11.1.js"></script> -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="<?php echo ADMINURL;?>">ECOMMERCE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
      <?php if(isset($_SESSION['username'])):?>
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link " style="margin-left: 20px;" href="<?php echo ADMINURL;?>">Home
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL;?>/admins/users.php" style="margin-left: 20px;">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL;?>/categories-admins/show-categories.php" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL;?>/products-admin/show-products.php" style="margin-left: 20px;">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL;?>/order/show-orders.php" style="margin-left: 20px;">Orders</a>
          </li>
        
        </ul>

        <?php endif;?>
    
        <ul class="navbar-nav ml-md-auto d-md-flex">
            <?php if(!isset($_SESSION['username'])):?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo ADMINURL?>/admins/login-admins.php">login
                  <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php else :?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo ADMINURL;?>">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['username'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo ADMINURL;?>/admins/logout-admins.php">Logout</a>             
              </li>
            <?php endif; ?>                  
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">