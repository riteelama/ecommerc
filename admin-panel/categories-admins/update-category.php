<?php require "../layouts/header.php";?>
<?php require "../../includes/dbconfig.php";?>


<?php 

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $select = "SELECT * FROM categories WHERE id = '$id'";
    $selectQuery = mysqli_query($conn,$select);

    $categories = mysqli_fetch_assoc($selectQuery);
    


    if(isset($_POST['submit']))
    
    $category_name = $_POST['category_name'];
    
      if(empty($category_name))
      {
          $error = "Category name or image cannot be empty";
      } else 
      {
        unlink("images/".$categories['image']."");

        $description = $_POST['description'];

        $image = $_FILES['image']['name'];

        $dirname = "images/" . basename($image);

        $update = "UPDATE categories SET category_name = '$category_name', description = '$description', image = '$image' WHERE id = '$id'";
        $updateQuery = mysqli_query($conn,$update);
        // var_dump($insert);

        if(move_uploaded_file($_FILES['image']['tmp_name'],$dirname)) {
            header("location: ".ADMINURL."/categories-admins/show-categories.php");
        };
      }


  } else {

    

  }

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
              <form method="POST" action="update-category.php?id=<?php echo $id;?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="category_name" id="form2Example1" class="form-control" placeholder="category name" value ="<?php echo $categories['category_name']?>"/>
                 
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="description" rows="3"><?php echo $categories['description']?>
                    </textarea>
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>
                    <br>
                    <img src="images/<?php echo $categories['image']?>" alt ="catgeory image" width=200 height=200/>
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