<?php require "../layouts/header.php";?>
<?php require "../../includes/dbconfig.php";?>

  <?php 
  
    $selectSql = "SELECT * FROM orders";
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
                    <th scope="col">Token</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($orders as $order) :?>
                  <tr>
                    <th scope="row"><?php echo $order['id']?></th>
                    <td><?php echo $order['email']?></td>
                    <td><?php echo $order['uname']?></td>
                    <td><?php echo $order['token']?></td>
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