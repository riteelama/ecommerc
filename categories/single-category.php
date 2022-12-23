<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?> 

<?php

    if(isset($_GET['id'])){
        $category_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE status = 1 AND category_id = '$category_id'";
        $query = mysqli_query($conn,$sql);
        $allProducts = mysqli_fetch_all($query,MYSQLI_ASSOC);
        // var_dump($allRows);
        // $allRows = $rows->mysqli_fetch_all;
    }
    

?>
        <div class="row mt-5">
            <?php 
            foreach($allProducts as $row) : 
            ?>
            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                <div class="card" >
                    <img height="213px" class="card-img-top" src="http://localhost/ecommerce/seller-panel/images/<?php echo $row['image'];?>">
                    <div class="card-body" >
                        <h5 class="d-inline"><b><?php echo $row['product_name'];?></b> </h5>
                        <br>
                        <h5 class="d-inline"><div class="text-muted d-inline"><?php echo $row['price'];?></div></h5>
                        <p><?php echo $row['excerpt'];?></p>
                         <a href="<?php echo APPURL;?>/shopping/single.php?id=<?php echo $row['id']?>"  class="btn btn-primary w-100 rounded my-2"> View Details<i class="fas fa-arrow-right"></i> </a>      
     
                    </div>
                </div>
            </div>
            <br>
            <?php endforeach; ?>
         </div>

<?php require"../includes/footer.php"?>