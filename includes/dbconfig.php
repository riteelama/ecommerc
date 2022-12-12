<?php
// var_dump("ritee");
//database configuration file
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";
// define("hostname","localhost");
// define("username","root");
// define("password","");
// define("database","ecommerce");

//mysql connection
 $conn = mysqli_connect($hostname,$username,$password,$database);

 $secret_key = "sk_test_51MDqIkEQVwxKPes2NpNPl3Bsnh31h6pwYsAFXjomAAKKxJmDb6N02qoL5Xix6ZLzguC1kg31prcxpjwbZWrewi5d00FT0vjH1y";
//  if($conn){
//      echo "Connected successfully";
    
//  }else {
//      echo "Failed to connect".mysqli_connect_error();
//  }

?>