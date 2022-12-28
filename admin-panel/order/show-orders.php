<?php require "../layouts/header.php";?>
<?php require "../../includes/dbconfig.php";?>

  <?php 
  
    $selectSql = "SELECT * FROM `esewa-order`";
    // var_dump($selectSql);
    $selectQuery = mysqli_query($conn,$selectSql);
  
    $orders = mysqli_fetch_all($selectQuery,MYSQLI_ASSOC);
  
  
  ?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
             <a  href="<?php echo ADMINURL; ?>/categories-admins/create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($orders as $order) :?>
                  <tr>
                    <th scope="row"><?php echo $order['id']?></th>
                    <td><?php echo $order['username']?></td>
                    <td><?php echo $order['total_amount']?></td>
                    <?php if($order['status'] > 0) :?>
                     <td><a href="<?php echo ADMINURL;?>/order/status.php?id=<?php echo $order['id'];?>&status=<?php echo $order['status'];?>" class="btn btn-success  text-center ">Completed</a></td>
                     <?php else : ?>
                    <td><a href="<?php echo ADMINURL;?>/order/status.php?id=<?php echo $order['id'];?>&status=<?php echo $order['status'];?>" class="btn btn-danger  text-center ">Pending</a></td>
                    <?php endif; ?>
                    <td><a href="<?php echo ADMINURL; ?>/order/delete-order.php?id=<?php echo $order['id'];?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php";?>