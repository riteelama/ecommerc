<?php require "../layouts/header.php";?>
<?php require "../../includes/dbconfig.php";?>

  <?php 
  
    $selectSql = "SELECT * FROM categories";
    $selectQuery = mysqli_query($conn,$selectSql);
  
    $categories = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);
  
  
  ?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="<?php echo ADMINURL; ?>/categories-admins/create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $category) :?>
                  <tr>
                    <th scope="row"><?php echo $category['id']?></th>
                    <td><?php echo $category['category_name']?></td>
                    <td><?php echo $category['image']?></td>
                    <td><a  href="<?php echo ADMINURL; ?>/categories-admins/update-category.php?id=<?php echo $category['id'];?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="<?php echo ADMINURL; ?>/categories-admins/delete-category.php?id=<?php echo $category['id'];?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php";?>