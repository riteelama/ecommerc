<?php require "../layouts/header.php"?> 
<?php require "../../includes/dbconfig.php"?>


<?php 

  if($_SESSION['username']){

    $username = $_SESSION['username'];
    $userSql = "SELECT * FROM users WHERE username = '$username'";
    $userQuery = mysqli_query($conn,$userSql);

    $user = mysqli_fetch_assoc($userQuery);
    $user_id = $user['id'];
    
    $selectSql = "SELECT * FROM categories";
    $selectQuery = mysqli_query($conn,$selectSql);
  
    $categories = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);

    if(isset($_POST['submit'])) {
    
    $product_name = $_POST['product_name'];
    
      if(empty($product_name))
      {
          $error = "Product name cannot be empty";
      } else 
      {

        $price = $_POST['price'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $category_id = $_POST['category_id'];
        $excerpt = $_POST['excerpt'];

        $dirname = "../images/" . basename($image);
        echo $dirname;

        $insert = "INSERT INTO products (product_name, image, price, description, excerpt, user_id, category_id) VALUES ('$product_name', '$image', '$price', '$description', '$excerpt', '$user_id', '$category_id')";
        var_dump($insert);
        // $insert = "INSERT INTO products (product_name, price,description, image, user_id, category_id) VALUES ('$product_name','$price','$description','$image','$user_id', '$category_id')";
        $insertQuery = mysqli_query($conn,$insert);
        // var_dump($insert);

        if(move_uploaded_file($_FILES['image']['tmp_name'],$dirname)) {
            header("location: ".SELLERURL."/products-sellers/show-products.php");
        };
      } 
    }
  }

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Products</h5>
              <form method="POST" action="create-products.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Product Name</label>

                  <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Price</label>

                    <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Excerpt</label>
                    <textarea name="excerpt" placeholder="excerpt" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                      <option>--select category--</option>
                      <?php foreach($categories as $category) :?>
                      <option value = "<?php echo $category['id'];?>"><?php echo $category['category_name'];?></option>
                      <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>

                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

                <!-- <div class="form-outline mb-4 mt-4">
                    <label>File</label>
                    <input type="file" name="file" id="form2Example1" class="form-control" placeholder="file" />
                </div> -->

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php"?> 