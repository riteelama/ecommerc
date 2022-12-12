<?php require "../layouts/header.php";?>
<?php require "../../includes/dbconfig.php";?>

<?php 

    if(isset($_POST['submit']))
    
    $category_name = $_POST['category_name'];
    
      if(empty($category_name))
      {
          $error = "Category name or image cannot be empty";
      } else 
      {

        $description = $_POST['description'];
        $image = $_FILES['image']['name'];

        $dirname = "images/" . basename($image);

        $insert = "INSERT INTO categories (category_name, description, image) VALUES ('$category_name','$description','$image')";
        $insertQuery = mysqli_query($conn,$insert);
        // var_dump($insert);

        if(move_uploaded_file($_FILES['image']['tmp_name'],$dirname)) {
            header("location: ".ADMINURL."/categories-admins/show-categories.php");
        };
      }

?>


       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
              <form method="POST" action="create-category.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                <label for="category_name">Category Name</label>
                  <input type="text" name="category_name" id="category_name" class="form-control" placeholder="name" />
                 
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="description" rows="3"></textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>

                    <input type="file" name="image" id="image" class="form-control" placeholder="image" />
                </div>

                <hr>
                    <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                  <hr>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php";?>