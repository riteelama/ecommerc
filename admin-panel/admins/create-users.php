<?php require "../layouts/header.php"?> 
<?php require "../../includes/dbconfig.php"?>

<?php 
      // if(isset($_SESSION['username']))
      // {
      //     header("location: ".ADMINURL."");
      // }

      if (isset($_POST['submit'])) {
          $fullname = $_POST['fullname'];
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $confirmpassword = $_POST['confirmpassword'];
          $phoneno = $_POST['phoneno'];
          $address = $_POST['address'];
          $role_id = $_POST['role_id'];

          if ($password != $confirmpassword) {
              $error = "Confirm password doesnot match.";
          } elseif (!empty($username) && !empty($email) && !empty($password)) {
              //process to data entry

              $sql = "INSERT INTO users(fullname,username,email,password,phoneno,address,role_id) VALUES ('$fullname','$username','$email',md5('$password'),'$phoneno','$address','$role_id')";
              // var_dump($sql);

              $query = mysqli_query($conn, $sql);
              // svar_dump($query);
              if ($query) {
                  $success = "User has been successfully created.";
                  header("location: ".ADMINURL."/admins/users.php");
              } else {
                  $error = "Username and email already exists";
                  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
          } else {
              $error = "Username and email cannot be blank";
          }
      }
?>
    <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="post" action="create-users.php" enctype="mutipart/form-data">
                    <h4 class="text-center mt-3"> Register Account</h4>
                    <div class="">
                        <label for="fullname" class="col-form-label">Full Name<span style="color:red;">*</span></label>
                        <div class="">
                            <input type="text"  class="form-control" id="" value="" name="fullname">
                        </div>
                    </div>
                    <div class="">
                        <label for="" class="col-form-label">Username<span style="color:red;">*</span></label>
                        <div class="">
                            <input type="text"  class="form-control" id="" value="" name="username">
                        </div>
                    </div>
                    <div class="">
                        <label for="staticEmail" class="col-form-label">Email<span style="color:red;">*</span></label>
                        <div class="">
                            <input type="email"  class="form-control" id="" value="" name="email">
                        </div>
                    </div>
                    <div class="">
                        <label for="inputPassword" class="col-form-label">Password<span style="color:red;">*</span></label>
                        <div class="">
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                    </div>
                    <div class="">
                        <label for="confirmpassword" class="col-form-label">Confirm Password<span style="color:red;">*</span></label>
                        <div class="">
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                        </div>
                    </div>
                    <div class="">
                        <label for="phoneno" class="col-form-label">Phone Number</label>
                        <div class="">
                            <input type="text"  class="form-control" id="" value="" name="phoneno">
                        </div>
                    </div>
                    <div class="">
                        <label for="address" class="col-form-label">Address</label>
                        <div class="">
                            <input type="text"  class="form-control" id="" value="" name="address">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="address" class="col-form-label">Choose your role<span style="color:red;">*</span></label>
                            <select name="role_id" id="role_id" class="form-select" selected>
                                <?php
                                $active = 'selected="selected"';
                                $inactive = '';
                                if (isset($editData)) {
                                    if (!$editData['role_id']) {
                                        $active = '';
                                        $inactive = 'selected = "selected"';
                                    }
                                }
                                ?>
                                <option value="2" <?php echo $active; ?>>Seller</option>
                                <option value="3" <?php echo $inactive; ?>>Customers</option>
                            </select>
                        </div>
                    <div class="">
                        <button class="w-100 btn btn-lg btn-success mt-4 mb-3" type="submit" name="submit">Register</button>
                    </div> 
                    <hr>
                        <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                    <hr>                  
                </form>
            </div>
        </div>

<?php require "../layouts/footer.php"?>