<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>NWBS | Administrator</title>
  <link rel='shortcut icon' href='../library/images/icon.png' type='image/x-icon' />
  <!-- Bootstrap core CSS-->
  <link href="../library/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../library/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../library/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../library/css/bs.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  <!-- captcha -->
</head>
 <!-- to be stud id ="exampleAccordion" data-placement="left" -->

<style type="text/css">
  
    /* these styles are for the demo, but are not required for the plugin */
    .zoom {
      display:inline-block;
      position: relative;
    }
    


    .zoom img {
      display: block;
    }




    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
    .forprintimg{
      display: inline !important;
    }
    .forprintmargin{
      margin:0 3em 0 3em !important;
    }
}

@page { size: auto;  margin: 0mm; size: landscape }


  .img-thumbnail{
  border:none;
}

</style>

  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
 else
 {
?>
<!--theme color -->
<body class="fixed-nav sticky-footer bg-dark" id="page-top">



  <?php include '../db.php'; ?> <!-- database -->

  <?php
                 if( isset($_SESSION["first_name"]) || isset($_SESSION["last_name"]) )
                      {
                          $username = $_SESSION['username'];
                      }
                      else
                      {
                        $username = "";
                      }
                      
                 $query = "select * from user where username = '$username'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 $row = mysqli_fetch_array($result);
                 $profile_picture = $row['profile_picture'];
                 $user_type = $row['user_type'];
                 $manages = $row['manages'];
                 $reports = $row['reports'];
                 $order_list = $row['order_list'];
   ?>

  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: rgb(85, 85, 85)"  id="mainNav" >
<!--theme color -->






     <!--title logo ng navibar -->
    <a href="dashboard.php" class="navbar-brand" style=" color:white;  "> Admin Panel</a> <a href="https://northwaybicyclestore.tk/" target="_blank" style="color:white;text-decoration: none;">View Store <span class="fa fa-chevron-right"></span></a>
    <!-- title logo ng navibar -->




     <!-- navibar button pag nag collapse -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"  aria-label="Toggle navigation" onclick="hidepic()">
      <span class="navbar-toggler-icon"></span>
    </button>
     <!-- navibar button pag nag collapse -->







    <div class="collapse navbar-collapse" id="navbarResponsive" >


 <!-- left side navibar -->


      <ul class="navbar-nav navbar-sidenav id="exampleAccordion">


        <!--boss-->
        <br>
        <center><img class="img-thumbnail" src="profilepic/<?php echo $profile_picture; ?>" onerror="this.src='profilepic/default.png'" style="background-color:transparent; border-radius: 80%" width="120"  /></center>
        <br>
        <!--boss -->


       
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i> Dashboard</a><!--dashboard -->
        </li>
 



         <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" || $user_type =="Staff" && $order_list=="0" ) {
                ?>
       <li class="nav-item">
          <a class="nav-link" href="order_list.php">
            <i class="fa fa-fw fa-book"></i> Order List</a><!--order_list -->
        </li>
       <?php }?>


  

          <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" ) {
                ?>
        <li class="nav-item">
          <a class="nav-link" href="inventory.php">
            <i class="fa fa-fw fa-cube"></i> Inventory</a>
        </li>
        <?php } ?>





          <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" ) {
                ?>
        <li class="nav-item">
          <a class="nav-link" href="stockin.php">
            <i class="fa fa-fw fa-plus"></i> Stock In</a><!--Stock In -->
        </li>
      <?php } ?>


      <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin") {
                ?>
       <li class="nav-item">
          <a class="nav-link" href="shipping_rate.php">
            <i class="fa fa-truck"></i> Shipping Rates</a>
        </li>
       <?php }?>




      

        <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" || $user_type =="Staff" && $manages=="0" ) {
                ?>
       <li class="nav-item" ">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i> File Maintenance</a>  <!-- File maintenance formerly Manages Dropdown -->
          <ul class="sidenav-second-level collapse" id="collapse1">
            <li>
              <a href="product.php"><i class="fa fa-fw fa-database"></i> Product</a>
            </li>
            <li>
              <a href="category.php"><i class="fa fa-fw fa-user"></i> Category</a>
            </li>
            <li>
              <a href="supplier.php"><i class="fa fa-fw fa-rocket"></i> Supplier</a>
            </li>
          </ul>
        </li>
        <?php } ?>






        <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" || $user_type =="Staff" && $reports =="0" ) {
                ?>
          <li class="nav-item" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-bar-chart"></i> Reports </a> <!-- Manages Dropdown-->
          <ul class="sidenav-second-level collapse" id="collapse2">
            <li>
              <a href="invoice.php"><i class="fa fa-fw fa-usd"></i> Invoice</a>
            </li>
            <li>
              <a href="sales_report.php"><i class="fa fa-bar-chart "></i> Sales</a>
            </li>
            <li>
              <a href="inventory_report.php"><i class="fa fa-fw fa-cube"></i> Inventory</a>
            </li>
          </ul>
        </li>
      <?php }?>



       <?php 
                 if ($user_type == "Superuser" || $user_type == "Admin") {
                ?>
       <li class="nav-item">
          <a class="nav-link" href="customer_account.php">
            <i class="fa fa-fw fa-user"></i> Customer Account</a>
        </li>
       <?php }?>


      </ul>
 <!-- left side navibar -->






<!-- top right navibar -->
      <ul class="navbar-nav ml-auto">  





      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Notification <i class="fa fa-bell"></i>
                      <sup style="color:yellow;">
                          <?php 
                           $query = "select count(*) as count from notification where notification_read ='N'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           $row = mysqli_fetch_assoc($result);
                           $count = $row['count'];
                           if($count  != 0)
                           {
                            echo $count;
                          }
                        ?>
                      </sup>
                      </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Notifications:</h6>
            <div class="dropdown-divider"></div>


            <?php

              $query = "SELECT * FROM notification where notification_read ='N' order by notification_id DESC limit 5";
              $result = mysqli_query($conn,$query);
              $count = mysqli_num_rows($result);
              while($row = mysqli_fetch_assoc($result)){


                $query1 = "SELECT * FROM customer where customer_username ='".$row['notification_username']."'";
                $result1 = mysqli_query($conn,$query1);
                $row1 = mysqli_fetch_assoc($result1);
                $customer_fullname = $row1['customer_fullname'];

            ?>



          <?php if($row['notification_type']=="followup") { ?>

            <a class="dropdown-item" href="notification.php">
              <span class="text-warning">
                Follow up request
              </span>
              <span class="small float-right text-muted"><?php echo $time_elapsed = timeAgo($row['time_frame']); ?></span>
              <div class="dropdown-message small">Customer <?php echo $customer_fullname; ?> was follow up of order#<?php echo $row['notification_order_no']; ?></div>
            </a>
            <div class="dropdown-divider"></div>

          <?php } else { ?>


             <a class="dropdown-item" href="notification.php">
              <span class="text-danger">
                Request return
              </span>
              <span class="small float-right text-muted"><?php echo $time_elapsed = timeAgo($row['time_frame']); ?></span>
              <div class="dropdown-message small">Customer <?php echo $customer_fullname; ?> was request return of order#<?php echo $row['notification_order_no']; ?></div>
            </a>
            <div class="dropdown-divider"></div>


          <?php } ?>


            <?php } if($count==0) { ?><center><div class="dropdown-message small">No notification. </div></center><br><?php } ?>

            <a class="dropdown-item small" href="notification.php">View all Notifications</a>
          </div>
        </li>








<!-- other links -->
<?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" ) {
                ?>
     <li class="nav-item">
          <a class="nav-link" href="history.php">
            <i class="fa fa-fw fa-history"></i> Audit Trail</a><!--History -->
        </li>
<?php } ?>

<!--Admin sup stap name -->
       <li class="nav-item">
          <a class="nav-link" href="user.php">
            <i class="fa fa-fw fa-gear"></i> <?php
   if (!empty($_SESSION['first_name']) || !empty($_SESSION['last_name'])) {
    echo $_SESSION['first_name'];
    echo " ";
    echo $_SESSION['last_name'];
   }
?></a>
        </li>
<!--Admin sup stap name -->




<?php 
                 if ($user_type == "Superuser" || $user_type == "Admin" ) {
                ?>
   <li class="nav-item">
          <a class="nav-link" href="account.php">
            <i class="fa fa-fw fa-user"></i>Manage Accounts</a><!--History -->
        </li>
<?php } ?>




     
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
<!-- other links -->




      </ul>
<!-- top right navibar -->


  </div>
</nav>

<!-- end navibar -->
<?php } ?>




<?php

  
       // $time_elapsed = timeAgo($time_ago); The argument $time_ago is in timestamp (Y-m-d H:i:s)format.

    //Function definition

    function timeAgo($time_ago)
    {
        $time_ago = strtotime($time_ago);
        $cur_time   = time()-28800;
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            return "just now";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                return "one minute ago";
            }
            else{
                return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                return "an hour ago";
            }else{
                return "$hours hrs ago";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                return "yesterday";
            }else{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                return "a week ago";
            }else{
                return "$weeks weeks ago";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                return "a month ago";
            }else{
                return "$months months ago";
            }
        }
        //Years
        else{
            if($years==1){
                return "one year ago";
            }else{
                return "$years years ago";
            }
        }
    }



?>