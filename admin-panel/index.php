<?php require "layouts/header.php";?>
<?php require "../includes/dbconfig.php";?>


<?php 

    $products = "SELECT COUNT(*) as products_num FROM products";
    $productsQuery = mysqli_query($conn,$products);
    $allproducts = mysqli_fetch_assoc($productsQuery);


    $categories = "SELECT COUNT(*) as cat_num FROM categories";
    $catQuery = mysqli_query($conn,$categories);
    $allcategories = mysqli_fetch_assoc($catQuery);


    $users = "SELECT COUNT(*) as user_num FROM users";
    $userQuery = mysqli_query($conn,$users);
    $allusers = mysqli_fetch_assoc($userQuery);

?>
            
      <?php if(isset($_SESSION['username'])) :?>
          <div class="alert alert-success" role="alert">
            Hello, <?php echo $_SESSION['username'];?> Welcome Back, glad to have you back. <i class="fa-regular fa-face-smile"></i>
          </div>
      <?php endif;?>

      <div class="row">      
        <div class="col-md-4">       
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?php echo $allproducts['products_num']?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $allcategories['cat_num']?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              
              <p class="card-text">number of users: <?php echo $allusers['user_num'];?></p>
              
            </div>
          </div>
        </div>
      </div>
  
<?php require "layouts/footer.php"?>