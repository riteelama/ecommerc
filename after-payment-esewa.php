<?php require "includes/header.php"?> 
<?php require "includes/dbconfig.php"?> 


<?php 
if(isset($_SESSION['username'])){

  $username = $_SESSION['username'];

  $userSql = "SELECT * FROM users WHERE username = '$username'";
  $userQuery = mysqli_query($conn,$userSql);
  $userValue = mysqli_fetch_assoc($userQuery);
  $user_id = $userValue['id'];


   $prod_id = $_COOKIE["productId"];
   $totalAmount = $_COOKIE["totalPrice"];

  $insertOrder = "INSERT INTO `esewa-order` (`username`, `total_amount`, `prod_id`, `user_id`) VALUES ('$username', '$totalAmount', '$prod_id', '$user_id');";
  // var_dump($insertOrder);
  $insertOrderQuery = mysqli_query($conn,$insertOrder);
}

?>



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

<script>

var prod_id = localStorage.getItem("prodId");
var d = new Date();
d.setTime(d.getTime()+(1*24*60*60*1000));
var expires = "expires="+ d.toUTCString();
document.cookie = "productId" + "=" + prod_id + ";" + "expires";

var total_amount = localStorage.getItem("totalPrice");
var d = new Date();
d.setTime(d.getTime()+(1*24*60*60*1000));
var expires = "expires="+ d.toUTCString();
document.cookie = "totalPrice" + "=" + total_amount + ";" + "expires";

</script>