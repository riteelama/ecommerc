<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?> 


<?php
    // /* at the top of 'check.php' */
    // if($_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    //     /* 
    //        Up to you which header to send, some prefer 404 even if 
    //        the files does exist for security
    //     */
    //     header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

    //     /* choose the appropriate page to redirect users */
    //     die( header( 'location: '.APPURL.'' ) );

    // }

    if(!isset($_SESSION['username']))
    { 
        header("location: ".APPURL."");
    }
?>

<?php 

// if(isset($_POST['submit'])) {

//   \Stripe\Stripe::setApiKey($secret_key);

//   // \Stripe\Stripe::setApiKey( $secret_key);

//   $charge = \Stripe\Charge::create([
//       'source' => $_POST['stripeToken'],
//       'amount' => $_SESSION['price'] * 100,
//       'currency' => 'usd', 
//     ]);
//     // var_dump($insert);
//   echo "Paid";

//             $email = $_POST['email'];
//             $uname = $_POST['uname'];
//             $fname = $_POST['fname'];
//             $lname = $_POST['lname'];
//             $address = $_POST['address'];
//             $token = $_POST['stripeToken'];
//             $price = $_SESSION['price'];
//             if(isset($_SESSION['email'])) {
//               $
//               $username = $_SESSION['email'];

//               $userSql = "SELECT * FROM users WHERE email = '$email'";
//               // var_dump($userSql);

//               $userQuery = mysqli_query($conn,$userSql);

//               $userRow = mysqli_fetch_assoc($userQuery);

//               $user_id = $userRow['id'];
//             }
           



//           $insert = "INSERT INTO orders (email, uname, fname, lname, address, token, price,user_id) VALUES ('$email', '$uname', '$fname', '$lname', '$address', '$token', '$price','$user_id')";
//           // var_dump($insert);
//           $insertQuery = mysqli_query($conn,$insert);

//           header("location: ".APPURL."/after-payment.php");
//           }

?>