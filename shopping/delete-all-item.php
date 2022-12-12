<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?> 

<?php
    /* at the top of 'check.php' */
    if($_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        die( header( 'location: '.APPURL.'' ) );

    }

    if(!isset($_SESSION['username']))
    { 
        header("location: ".APPURL."");
    }
?>

<?php 

    if(isset($_POST['delete'])) {
        $username = $_SESSION['username'];
        $user = "SELECT * FROM users WHERE username = '$username'";
        $userQuery = mysqli_query($conn,$user);
        // var_dump($userQuery);

        $row = mysqli_fetch_assoc($userQuery);

        $user_id = $row['id'];

        $delete = "DELETE FROM cart WHERE  user_id = '$user_id'";
        // var_dump($delete);
        $deleteQuery = mysqli_query($conn,$delete);
    }

?>

<?php require "../includes/footer.php"?>  