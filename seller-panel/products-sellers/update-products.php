<?php require "../layouts/header.php";?>
<?php require "../../includes/dbconfig.php";?>


<?php 

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $select = "SELECT * FROM products WHERE id = '$id'";
    $selectQuery = mysqli_query($conn,$select);

    $product = mysqli_fetch_assoc($selectQuery);
    


    if(isset($_POST['submit']))
    
    $product_name = $_POST['product_name'];
    
      if(empty($product_name))
      {
          $error = "Product name cannot be empty";
      } else 
      {
        $description = $_POST['description'];
        $excerpt = $_POST['excerpt'];
        $price = $_POST['price'];

        $image = $_FILES['image']['name'];

        $dirname = "../images/" . basename($image);
        // var_dump($dirname);

        $update = "UPDATE products SET product_name = '$product_name', description = '$description', price = '$price', excerpt = '$excerpt', image = '$image' WHERE id = '$id'";
        $updateQuery = mysqli_query($conn,$update);
        var_dump($update);

        if(move_uploaded_file($_FILES['image']['tmp_name'],$dirname)) {
            header("location: ".SELLERURL."/products-sellers/show-products.php");
        };
      }


  } else {

    

  }

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Products</h5>
              <form method="POST" action="update-products.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="product_name" id="form2Example1" class="form-control" placeholder="Product Name" value ="<?php echo $product['product_name']?>"/>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="Price" value ="<?php echo $product['price']?>"/>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="description" rows="3"><?php echo $product['description']?>
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea name="excerpt" placeholder="Excerpt" class="form-control" id="excerpt" rows="3"><?php echo $product['excerpt']?>
                    </textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>
                    <br>
                    <img src="../images/<?php echo $product['image']?>" alt ="catgeory image" width=200 height=200/>
                    <input type="file" name="image" id="image" class="form-control" placeholder="image" />
                </div>

                <hr>
                    <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                  <hr>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php";?>