<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?>

      <!-- Heading -->
      <?php
        $user_id = $userFindRow['id'];
      
        $cartFindSql = "SELECT * FROM cart WHERE user_id = '$user_id'";
        // var_dump($cartFindSql);
        $cartFindQuery = mysqli_query($conn,$cartFindSql);
        $userCart = mysqli_fetch_assoc($cartFindQuery);

        $prod_id = $userCart['prod_id'];
        // var_dump($prod_id);
        $userProd = "SELECT * FROM products WHERE id = '$prod_id'";
        // var_dump($userProd);
        $userProdQuery = mysqli_query($conn,$userProd);
        $prod = mysqli_fetch_assoc($userProdQuery);


        if(!isset($_SESSION['username']))
        { 
            header("location: ".APPURL."");
        }

        
        
        // var_dump($sql);
      ?>
      <h2 class="my-5 h2 text-center">Checkout</h2>

      <!--Grid row-->
      <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->

            <form class="card-body" action="https://uat.esewa.com.np/epay/main" method="POST">
              <input value="" name="tAmt" type="hidden" class="total_price_final">
              <input value="" name="amt" type="hidden" class="total_price_final">
              <input value="0" name="txAmt" type="hidden">
              <input value="0" name="psc" type="hidden">
              <input value="0" name="pdc" type="hidden">
              <input value="NP-ES-COLLEGE-TEST" name="scd" type="hidden">
              <input value="<?php echo $prod['id'];?>" name="pid" type="text">
              <input value="http://localhost/ecommerce/after-payment-esewa.php" type="hidden" name="su">
              <input value="http://localhost/ecommerce/404.php" type="hidden" name="fu">
              <input class="btn btn-success btn-lg" value="Pay with e-Sewa" type="submit" name="submit">
            </form>      
          </div>         
        </div>
    </div>

<?php require "../includes/footer.php";?>
