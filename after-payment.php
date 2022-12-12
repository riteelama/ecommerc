<?php require "includes/header.php"?> 
<?php require "includes/dbconfig.php"?> 

<div class="alert alert-success mt-5 mb-5" role="alert">
  Thank you for purchasing our goods. Your product will be delivered within 1 week.
</div>

<?php 


if(isset($_SESSION['username']))
{
  $username = $_SESSION['username'];
  $selectUser = "SELECT * FROM users WHERE username = '$username'";
  // var_dump($selectUser);
  $selectQuery = mysqli_query($conn,$selectUser);

  $selectRow = mysqli_fetch_assoc($selectQuery);
  $user_id = $selectRow['id'];

}
$delete = "DELETE FROM cart WHERE user_id = '$user_id'";
// var_dump($delete);
$deleteQuery = mysqli_query($conn,$delete);

?>

<?php require "includes/footer.php"?>  