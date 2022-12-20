<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?> 

<?php 
    if(isset($_POST['submit'])){
            $prod_id = $_POST['prod_id'];
            $prod_name = $_POST['prod_name'];
            $prod_image = $_POST['prod_image'];
            $prod_price = $_POST['prod_price'];
            $prod_quantity = $_POST['prod_quantity'];
            $user_id = $_POST['user_id'];
            $category_id = $_POST['category_id'];

            $insert = "INSERT INTO cart (prod_id,prod_name,prod_image,prod_price,prod_quantity,user_id,category_id) VALUES('$prod_id','$prod_name','$prod_image','$prod_price','$prod_quantity','$user_id','$category_id')";

            $insertQuery = mysqli_query($conn,$insert);
        }
    

    if(isset($_GET['id'])){
        $id = $_GET['id'];
            //checking for product in cart
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $userSql = "SELECT * FROM users WHERE username = '$username'";
                // var_dump($userSql);
                $userQuery = mysqli_query($conn,$userSql);
                $userRow = mysqli_fetch_assoc($userQuery);
                $user_id = $userRow['id'];
                // var_dump($user_id);

                $select = "SELECT * FROM cart WHERE prod_id = '$id' AND user_id = '$user_id'";
                // var_dump($select);
                $selectQuery = mysqli_query($conn, $select); 
                  
            }
          

            //getting data for every product
            $sql = "SELECT * FROM products WHERE STATUS = 1 AND id = '$id'";
            // var_dump($sql);
            $query = mysqli_query($conn,$sql);

            $product = mysqli_fetch_assoc($query);

            $cat_id = $product['category_id'];
            // var_dump($cat_id);

            $categorySql = "SELECT * FROM categories WHERE id = '$cat_id' ";
            // var_dump($categorySql);
            $catQuery = mysqli_query($conn,$categorySql);
            $catRows = mysqli_fetch_assoc($catQuery);
            $cat_name = $catRows['category_name'];
            // var_dump($cat_name);
            // var_dump($product);
        }
    else
    {
        // echo "404";
       header("location: ".APPURL."/404.php");
    }
?>

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="http://localhost/ecommerce/seller-panel//images/<?php echo $product['image'];?>" width="100%" height="auto" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <a href="<?php echo APPURL;?>" class="ml-1 btn btn-primary"><i class="fa fa-long-arrow-left"></i> Back</a> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> 
                                <h5 class="text-uppercase"><?php echo $product['product_name'];?></h5><span><a href="<?php echo APPURL;?>/categories/single-category.php?id=<?php echo $catRows['id']?>"><?php echo $cat_name;?></a>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">$<?php echo $product['price'];?></span>
                                </div>
                            </div>
                            
                            <p class="about"><?php echo $product['description'];?></p>
                            </div>
                            <form method="post" id="form-data">
                                <div class="">
                                    <input type="hidden" name="prod_id" class="form-control" value="<?php echo $product['id']?>">
                                </div>
                                <div class="">
                                    <input type="hidden" name="prod_name" class="form-control" value="<?php echo $product['product_name']?>">
                                </div>
                                <div class="">
                                    <input type="hidden" name="prod_image" class="form-control" value="<?php echo $product['image']?>">
                                </div>
                                <div class="">
                                    <input type="hidden" name="prod_price" class="form-control" value="<?php echo $product['price']?>">
                                </div>
                                <div class="">
                                    <input type="hidden" name="prod_quantity" class="form-control" value="1">
                                </div>
                                <div class="">
                                    <input type="hidden" name="category_id" class="form-control" value="<?php echo $product['category_id']?>">
                                </div>
                                <?php if(isset($_SESSION['username'])) : ?>
                                <div class="">
                                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $user_id;?>">
                                </div>
                                <?php endif; ?>
                                <div class="cart mt-4 align-items-center"> 
                                    <?php if(isset($_SESSION['username'])) : ?>
                                        <?php 
                                        // var_dump($select);
                                       if($row = mysqli_num_rows($selectQuery) > 0) :?>
                                            <button id = "submit" name="submit" type="submit" disabled class="btn btn-success text-uppercase mr-2 px-4"><i class="fas fa-shopping-cart"></i> Added to cart</button> 
                                        <?php else :?>
                                            <button id = "submit" name="submit" type="submit" class="btn btn-success text-uppercase mr-2 px-4"><i class="fas fa-shopping-cart"></i> Add to cart</button> 
                                        <?php endif; ?> 
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require "../includes/footer.php"?> 

<script>
    $(document).ready(function(){
       $(document).on("submit", function(e) {
        
        e.preventDefault();
            var formdata = $("#form-data").serialize()+'&submit=submit';

            $.ajax({
                type: "post",
                url: "single.php?id=<?php echo $id;?>",
                data: formdata,

                success: function()
                {
                    alert("Added to cart successfully");
                    $("#submit").html("<i class='fas fa-shopping-cart'></i> Added to cart").prop("disabled",true);
                    ref();
                }
            });

            function ref() {       
                $("body").load("single.php?id=<?php echo $id;?>");       
            }
       })
    });
</script>