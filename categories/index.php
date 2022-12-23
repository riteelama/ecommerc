<?php require "../includes/header.php"?> 
<?php require "../includes/dbconfig.php"?>  

<?php 

$select = "SELECT * FROM categories";
$selectQuery = mysqli_query($conn,$select);

$categories = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);

?>


<div class="row mt-5">
        <?php foreach($categories as $category) :?>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                    <div class="card mt-4" >
                        <img height="213px" class="card-img-top" src="http://localhost/ecommerce/admin-panel/categories-admins/images/<?php echo $category['image']?>">
                            <div class="card-body">
                            <h5><b><?php echo $category['category_name']?></b> </h5>
                            <div class="d-flex flex-row my-2">
                                <div class="text-muted"><?php echo $category['description']?></div>                            
                            </div> 
                            <a href="<?php echo APPURL;?>/categories/single-category.php?id=<?php echo $category['id'];?>" class="btn btn-info text-white w-100 rounded my-2">Discover Products</a>      
                        </div>
                    </div>
                </div>
                <br>
        <?php endforeach; ?>      
    </div>
</div>


        
<?php require "../includes/footer.php"?> 