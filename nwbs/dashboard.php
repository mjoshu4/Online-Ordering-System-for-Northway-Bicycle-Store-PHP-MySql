<?php include 'navi.php' ?>

  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
 else
 {
    ?>





 <!-- Content-->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs active-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Admin Panel</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <!-- Breadcrumbs active-->



      <div class="row">

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cube"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from inventory'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Product in Inventory!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="inventory.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-database"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from product'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Products!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="product.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from category'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Categories!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="category.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>




        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-rocket"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from supplier'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Suppliers!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="supplier.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


         <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from customer'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Customers!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="customer_account.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-plus"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from stockin'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Stockin!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="stockin.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>




        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-book"></i>
              </div>
                <div class="mr-5">You have <b style="font-size: 2em;"><?php $query = 'SELECT * from customer_order where customer_order_status ="" group by order_number'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Pending Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="order_list.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



          <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Total of <b style="font-size: 2em;"><?php $query = 'SELECT * from user where not user_type ="Superuser"'; $result = mysqli_query($conn,$query); $numrows = mysqli_num_rows($result); echo $numrows; ?></b> Admin Users!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="account.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
      </div>










 <!-- Content-->

   
<!-- chart 

          <div class="row">
            <div class="col-lg">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar"></i>
                  Top 5 most product buy</div>
                <div class="card-body">
                  <canvas id="myBarChart" width="100%" height="50"></canvas>
                </div>
              </div>
            </div>
          </div>
           
-->


   <?php include 'footer.php'; ?>
<script src="chart-bar-demo.js"></script>


  </div>
</body>
</html>
<?php } ?>
