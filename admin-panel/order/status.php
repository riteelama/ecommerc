<?php require "../layouts/header.php"?> 
<?php require "../../includes/dbconfig.php"?>

<?php 

    if(isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if($status>0)
        {
            $update = "UPDATE `esewa-order` SET status = '0' WHERE id = '$id'";
            var_dump($update);
            $updateQuery = mysqli_query($conn,$update);

            header("location:".ADMINURL."/order/show-orders.php");
        }
        else{
            $update = "UPDATE `esewa-order` SET status = '1' WHERE id = '$id'";
            $updateQuery = mysqli_query($conn,$update);
            header("location:".ADMINURL."/order/show-orders.php");
        }
    }

?>

<?php require "../layouts/footer.php"?> 