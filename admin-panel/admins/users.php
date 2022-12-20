<?php require "../layouts/header.php"?> 
<?php require "../../includes/dbconfig.php"?>

<?php 
if(!isset($_SESSION['username']))
{ 
    header("location: ".ADMINURL."");
}

?>

<?php 

    $selectSql = "SELECT * FROM users";
    $selectQuery = mysqli_query($conn,$selectSql);
    // $row = mysqli_fetch_assoc($result);
    // var_dump($selectQuery);
    // var_dump($selectQuery);

    $users = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);
    // $email = $users['email'];

    $username = $_SESSION['username'];
    $selectId = "SELECT id FROM users WHERE username = '$username'";
    // var_dump($selectId);
    $selectIdQuery = mysqli_query($conn,$selectId);
    // var_dump($selectIdQuery);
    $userId = mysqli_fetch_assoc($selectIdQuery);
    $id = $userId['id'];
    // var_dump($id);
  

    //to change the status of the record
    if(isset($_GET['id']) && isset($_GET['status'])){
      $id = $_GET['id'];
      $status = $_GET['status'];
      if($status == 1){
      $sql = "UPDATE users SET status = 0 WHERE id = '$id'";
      }
      else {
        $sql = "UPDATE users SET status = 1 WHERE id = '$id'";
      }
      $query = mysqli_query($conn,$sql);
      // $editData  = mysqli_fetch_array($query);
      if($query){
          $msg = "User status has been successfully changed.";
      }
    }

?>



      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Users</h5>
             <a  href="<?php echo ADMINURL;?>/admins/create-users.php" class="btn btn-primary mb-4 text-center float-right">Create Users</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user) : ?>                  
                  <tr>
                    <th scope="row"><?php echo $user['id'];?></th>
                    <td><?php echo $user['username'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['address'];?></td>
                    <td><?php echo $user['phoneno'];?></td>
                    <td><a href="?id=<?php echo $user['id'];?>&status=<?php echo $user['status']?>" style ="color:<?php echo $row['status']?'green' : 'red'; ?>
                    "onclick="return confirm('Are you sure to change the status of this item?')">
                     <?php echo $user['status']?'Active' : 'In-Active';?></a>  </td>
                    <!-- <td>Otto</td> -->

                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>




<?php require "../layouts/footer.php"?>