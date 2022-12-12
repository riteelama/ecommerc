<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?> 
      <!-- Heading -->
      <?php
        /* at the top of 'check.php' */
        // if($_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        //     /* 
        //       Up to you which header to send, some prefer 404 even if 
        //       the files does exist for security
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
                class="stripe-button"
                data-key="pk_test_51MDqIkEQVwxKPes2txjV1nvHbCaW7cIkrW8Kzx0BV1JYZn3yL4GmyBH1uEyCutv16SCuIFDFZ9PNeuz4zNpxHEsm00bpPTS2zC"
                data-currency="usd"
                data-label="Pay Now">
              </script>

            </form>

          </div>
         
        </div>
    </div>

<?php require "../includes/footer.php";?> 