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
            <form class="card-body" method="POST" action="charge.php">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form">
                    <label for="firstName" name= "fname" class="">First name</label>

                    <input type="text" id="firstName" name= "fname" class="form-control" required>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <label for="lastName" name= "lname" class="">Last name</label>

                    <input type="text" id="lastName" name= "lname" class="form-control" required>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form mb-5">
                <label for="uname" name= "uname" class="">Username</label>

                <input type="text" name= "uname" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <label for="email" name= "email" class="">Email</label>

                <input type="text" id="email" name= "email" class="form-control" placeholder="youremail@example.com" required>
              </div>

              <!--address-->
              <div class="md-form mb-5">
                <label for="address" name= "address" class="">Address</label>

                <input type="text" id="address" name= "address" class="form-control" placeholder="1234 Main St" required>
              </div>

            
              <hr class="mb-4">
              <!-- <button name= "submit" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button> -->
              <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button btn-lg"
                data-key="pk_test_51MDqIkEQVwxKPes2txjV1nvHbCaW7cIkrW8Kzx0BV1JYZn3yL4GmyBH1uEyCutv16SCuIFDFZ9PNeuz4zNpxHEsm00bpPTS2zC"
                data-currency="usd"
                data-label="Pay Now using stripe">
              </script>
            </form>

            <form class="card-body" action="https://uat.esewa.com.np/epay/main" method="POST">
              <input value="" name="tAmt" type="hidden" class="total_price_final">
              <input value="" name="amt" type="hidden" class="total_price_final">
              <input value="0" name="txAmt" type="hidden">
              <input value="0" name="psc" type="hidden">
              <input value="0" name="pdc" type="hidden">
              <input value="NP-ES-COLLEGE-TEST" name="scd" type="hidden">
              <input value="<?php echo $prod['id'];?>" name="pid" type="hidden">
              <input value="http://localhost/ecommerce/after-payment-esewa.php" type="hidden" name="su">
              <input value="http://localhost/ecommerce/404.php" type="hidden" name="fu">
              <input class="btn btn-success btn-lg" value="Pay with e-Sewa" type="submit" name="submit">
            </form>

              

            </form>
              

          </div>
         
        </div>
    </div>

<?php require "../includes/footer.php";?>
