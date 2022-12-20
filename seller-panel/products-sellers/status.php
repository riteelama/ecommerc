<?php require "../layouts/header.php"?> 
<?php require "../../includes/dbconfig.php"?>

<?php 

    if(isset($_GET['id']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if($status>0)
        {
            $update = "UPDATE products SET status = '0' WHERE id = '$id'";
            $updateQuery = mysqli_query($conn,$update);

            header("location:".SELLERURL."/products-sellers/show-products.php");
        }
        else{
            $update = "UPDATE products SET status = '1' WHERE id = '$id'";
            $updateQuery = mysqli_query($conn,$update);
            header("location:".SELLERURL."/products-sellers/show-products.php");
        }
    }

?>

<?php require "../layouts/footer.php"?> 