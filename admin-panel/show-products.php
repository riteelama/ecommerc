<?php require "layouts/header.php"?> 
<?php require "../includes/dbconfig.php"?> 

<?php 
if(!isset($_SESSION['username']))
{ 
    header("location: ".ADMINURL."");
}

?>


<?php 

    if(isset($_SESSION['username'])){

      $username = $_SESSION['username'];
      $userSql = "SELECT * FROM users WHERE username = '$username'"; 
      // var_dump($userSql);     
      $userQuery = mysqli_query($conn,$userSql);
      // var_dump($userQuery);
      $users = mysqli_fetch_assoc($userQuery);

      $user_id = $users['id'];
      // var_dump($user_id);

      $selectSql = "SELECT * FROM products";
      var_dump($selectSql);
      $selectQuery = mysqli_query($conn,$selectSql);
      // $row = mysqli_fetch_assoc($result);
      // var_dump($selectQuery);
      // var_dump($selectQuery);

      $products = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);

    }

    
?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a  href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Pricein $</th>
                    <th scope="col">Image</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($products as $product) : ?>
                  <tr>
                    <th scope="row"><?php echo $product['id'];?></th>
                    <td><?php echo $product['product_name'];?></td>
                    <td><?php echo "$".$product['price'];?></td>
                    <td><?php echo $product['image'];?></td>
                    <?php if($product['status'] > 0) :?>
                     <td><a href="<?php echo SELLERURL;?>/products-sellers/status.php?id=<?php echo $product['id'];?>&status=<?php echo $product['status'];?>" class="btn btn-success  text-center ">verfied</a></td>
                     <?php else : ?>
                    <td><a href="<?php echo SELLERURL;?>/products-sellers/status.php?id=<?php echo $product['id'];?>&status=<?php echo $product['status'];?>" class="btn btn-danger  text-center ">Un-verfied</a></td>
                    <?php endif; ?>
                    <td><a href="<?php echo SELLERURL;?>/products-sellers/delete-products.php?id=<?php echo $product['id'];?>" class="btn btn-danger  text-center ">delete</a></td>
                      
                  
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php"?> 