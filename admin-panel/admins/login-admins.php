<?php require "../layouts/header.php"?> 
<?php require "../../includes/dbconfig.php"?>

<?php 

if(isset($_SESSION['username']))
{
    header("location: ".ADMINURL."");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    {
        if(empty($email) || empty($password))
        {
            $error = "Email address or password cannot be empty";
        }
        else
        {
            //check email and password
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') AND status = '1' AND role_id='1'";
            // var_dump($sql);
            $query = mysqli_query($conn, $sql);
            // echo $sql;
            $data = mysqli_fetch_assoc($query); 

            if(mysqli_num_rows($query)>0){
                $_SESSION['email'] = $data['email'] ;
                $_SESSION['username'] = $data['username'];
                // $_SESSION['user_id'] = $data['id'];
                header("location:".ADMINURL.""); 
                // echo "<div style='margin-top:10em;'>LOGGED IN</div>";
            }
            else
            {
                $error = "Invalid email and password";
            }
                    
        }
    }
}
?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="login" class="btn btn-primary  mb-4 text-center">Login</button>
                  <hr>
                    <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                  <hr>
                 
                </form>

            </div>
       </div>

<?php require "../layouts/footer.php"?>