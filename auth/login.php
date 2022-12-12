<?php
require "../includes/dbconfig.php";
include "../includes/header.php";
require "../includes/dbconfig.php";

if(isset($_SESSION['username']))
{
    header("location: ".APPURL."");
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
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = md5('$password') AND status = '1'";
            $query = mysqli_query($conn, $sql);
            // echo $sql;
            $data = mysqli_fetch_assoc($query); 

            if(mysqli_num_rows($query)>0){
                $_SESSION['email'] = $data['email'] ;
                $_SESSION['username'] = $data['username'];
                header("location:".APPURL.""); 
            }
            else
            {
                $error = "Invalid email and password";
            }
                    
        }
    }
}
?>


        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="post" name="login" action="login.php">
                    <h4 class="text-center mt-3"> Login Account</h4>
                   
                    <div class="">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email<span style="color:red;">*</span></label>
                        <div class="">
                            <input type="email"  class="form-control" id="" value="" name="email">
                        </div>
                    </div>
                    <div class="">
                        <label for="password">Password<span style="color:red;">*</span></label>
                        <input type="password" name="password" class="form-control form-control-user" id="password">
                    </div>
                    <hr>
                        <p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
                    <hr>
                    <button class="w-100 btn btn-lg btn-success mt-4" type="submit" name="login">Login</button>
                    <div class="text-center">
                        <a class="small" href="register.php">Don't have an account? Register now!</a>
                    </div>
                </form>
            </div>
        </div>
 
   

<?php include "../includes/footer.php"?>