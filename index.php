<?php require "includes/header.php"?> 
<?php require "includes/dbconfig.php"?> 

<?php
    $sql = "SELECT * FROM products WHERE status = 1";
    $query = mysqli_query($conn,$sql);
     // var_dump($allRows);
    // $allRows = $rows->mysqli_fetch_all;

?>
        <div class="row mt-5">
            <?php 
            while($row = mysqli_fetch_assoc($query)):
            ?>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                <div class="card mb-5">
                    <img height="213px" class="card-img-top" src="http://localhost/ecommerce/seller-panel/images/<?php echo $row['image'];?>">
                    <div class="card-body" >
                        <h5 class="d-inline">Name: <b><?php echo $row['product_name'];?></b> </h5>
                        <br>
                        <h5 class="d-inline">Price: <div class="text-warning d-inline"><?php echo $row['price'];?></div></h5>
                        <p><?php echo $row['excerpt'];?></p>
                         <a href="<?php echo APPURL;?>/shopping/single.php?id=<?php echo $row['id']?>"  class="btn btn-primary w-100 rounded my-2"> View Details<i class="fas fa-arrow-right"></i> </a>      
                    </div>
                </div>
            </div>
            <br>
            <?php endwhile; ?>
        </div>

<?php require"includes/footer.php"?>