<?php session_start(); ?>

<?php 

if(empty($_SESSION['session_cart']) && empty($_SESSION['errlogin']))  // global access and used to payout
{
  $session_cart = $_SESSION['session_cart'] = md5(microtime().rand()); 
  $session_errno = $_SESSION['errno'] = "notlogin"; 
}

else
{
$session_cart = $_SESSION['session_cart']; 
$session_errno =  $_SESSION['errno'];
}



?>

<?php include 'db.php'; 
include 'library/Mobile_Detect.php';
$detect = new Mobile_Detect();

$query = "DELETE FROM temp_cart WHERE time_frame < (NOW() - INTERVAL 24 HOUR)";
$result = mysqli_query($conn,$query);

?>








<?php
$session=session_id();
$time=time();
$time_check=$time-60; //SET TIME 10 Minute



$sql="SELECT * FROM user_online WHERE session='$session'";
$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);

if($count=="0"){

$sql1="INSERT INTO user_online(session, time)VALUES('$session', '$time')";
$result1=mysqli_query($conn,$sql1);
}

else {
$sql2="UPDATE user_online SET time='$time' WHERE session = '$session'";
$result2=mysqli_query($conn,$sql2);
}

$sql3="SELECT * FROM user_online";
$result3=mysqli_query($conn,$sql3);

$count_user_online=mysqli_num_rows($result3);


// if over 10 minute, delete session 
$sql4="DELETE FROM user_online WHERE time<$time_check";
$result4=mysqli_query($conn,$sql4);

// Open multiple browser page for result


// Close connection?>



















<!DOCTYPE html>
<html lang="en">
<head  id="page-top">
  <title>Northway Bicycle Store</title>
  <link rel='shortcut icon' href='library/images/icon.png' type='image/x-icon' />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap core CSS-->
  <link href="library/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="library/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="library/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="library/css/bs.css" rel="stylesheet">

</head>
<body>








<style>




body {
  
   
}



a:link {
    text-decoration: none;
}





.circle { 
   background: red; 
   padding: 0.5em;
   -moz-border-radius: 70px; 
   -webkit-border-radius: 70px; 
   border-radius: 70px;
}



h1, h2, h3, h4, h5, h6, a {
  margin:0; padding:0;
}
.login {
  margin:0 auto;
  max-width:500px;
}
.login-header {
  color:#fff;
  text-align:center;
  font-size:300%;
}
/* .login-header h1 {
   text-shadow: 0px 5px 15px #000; */
}
.login-form {
  border:.5px solid #fff;
  background:#4facff;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
}



.login-form h6 {
  text-align:left;
  margin-left:100px;
  color:black;
}



.tip {
  text-align: center;
  margin:0px 50px 20px 50px;
}




.login-form {
  box-sizing:border-box;
  padding-top:0px;
  padding-bottom:20%;
  margin:5% auto;
  text-align:center;
}

.login input[type="text"],
.login input[type="number"],
.login input[type="email"],
.login input[type="password"] {
  max-width:300px;
  width: 70%;
  line-height:2.5em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius: 3px;
  border:1px solid black;
  outline:none;
  padding-left:10px;
}
.login-form input[type="submit"] {
  height:50px;
  width:60%;
  background:black;
  border-radius: 3px;
  border:1px solid #f2f2f2;
  color: white;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}


.no-access p{
  text-align:right;
  margin-right:100px;
  color:white;
}


.responsive {
    width: 80%;
    height: auto;
}


/*Media Querie*/
@media only screen and (min-width : 150px) and (max-width : 530px){
  .login-form h6 {
  margin-left:55px;
  }
  .sign-up, .no-access {
    margin:10px 0;
  }
  .login-button {
    margin-bottom:10px;
  }


}




/*Media Querie*/
@media only screen and (min-width : 1px) and (max-width : 1092px){
  .ads
  {
    display: none;
  }
  td
  {
    white-space: nowrap
  }

}



/*Media Querie*/
@media only screen and (min-width : 100px) and (max-width : 308px){
  .login-form h6 {
  margin-left:45px;
  }

}




/*Media Querie*/
@media only screen and (min-width : 385px) and (max-width : 512px){
  .login-form h6 {
  margin-left:100px;
  }
  /* Shared */

}





@media (min-width: 150px) and (max-width: 300px) {
  
.robot
{
     margin:0 0 .6em 1em !important;
    transform:scale(.95) !important;
  
}


}

@media (min-width: 300px) and (max-width: 400px) {
  
.robot
{
     margin:0 0 .6em 3em !important;
    transform:scale(.85) !important;
   
}

.login-form h3 {

  margin-left:53px;
 
}


.no-access p{

  margin-right:50px;

}


.login-form input[type="submit"] {
  height:50px;
  width:72%;
}







}







.robot
{
    margin:0 0em 1em 0;
    transform:scale(1);
    -webkit-transform-origin:0 0;
    transform-origin:0 0;
}


.table-borderless td,
.table-borderless th {
    border: 0;
}











/* Shared */
.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: center;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
  width: 8em;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}






.dropdown-toggle::after {
    display:none;
}


.dropdown-menu {
    width: 300px !important;

}





.online
{
   height: 10px;
    width: 10px;
    background-color: green;
    border-radius: 50%;
    display: inline-block;
}












input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}






    /* these styles are for the demo, but are not required for the plugin */
    .zoom {
      display:inline-block;
      position: relative;
    }
    


    .zoom img {
      display: block;
    }










.loader{
  visibility: hidden;
 position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: rgba(255, 255, 255, 0.7);
  background-image: url("library/images/loading-bikes1.gif");
  background-size: 120px 100px;
  background-repeat: no-repeat;
  background-position:center;
 
}





</style>





<div class="loader">
</div>







    <nav class="navbar fixed-top py-0 pl-0 navbar-expand-lg navbar-dark" style="background-color:black;">

         <a href="home.php"><img src="library/images/logo1.png" width="180" height="60" /></a>





         <?php
// Check for any mobile device.
if ($detect->isMobile()){ ?>
         <a href="viewcart.php" style="color:white;"><i class="fa fa-shopping-cart"></i> Cart<span style="color:white;"> 
                      <sup class="circle" id="cart_details">
                        Empty
                      </sup>
                      </span></a>
<?php } ?>









        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div id="navbarNavDropdown" class="navbar-collapse collapse" style="margin-left: 1em;">
            <ul class="navbar-nav mr-auto"></ul>


            <ul class="navbar-nav">

                <li>
                    <a class="nav-link" href="home.php"><i class="fa fa-home"></i> Home</a>
                </li>




                <?php 
                 if (!isset($_SESSION['customer_username']) || !isset($_SESSION['customer_fullname']) ) {
                ?>
                <li>
                    <a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
                </li>

                <li>
                    <a class="nav-link" href="register.php"><i class="fa fa-user"></i> Register</a>
                </li>
              <?php } ?>





        <?php 
                 if (isset($_SESSION['customer_username']) && isset($_SESSION['customer_fullname']) ) {
                ?>

                 <li>
                    <a class="nav-link" href="vieworder.php"><i class="fa fa-list"></i> View Order</a>
                </li>



                 <li>
                    <a class="nav-link" href="user.php"><i class="fa fa-user"></i> <?php
   if (!empty($_SESSION['customer_fullname'])) {
    $customer_fullname = strtolower($_SESSION['customer_fullname']);
    echo ucwords(($customer_fullname))."'s Account";
   }
?></a>
                </li>
              


                 <li>
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
    <?php } ?>







                 <li>
                    <a class="nav-link" href="contact.php"><i class="fa fa-phone"></i> Contact</a>
                </li>











<?php
// Check for any mobile device.
if (!$detect->isMobile()){ ?>
                 <li>
                    <a class="nav-link" href="viewcart.php"><i class="fa fa-shopping-cart"></i> Cart<span style="color:white;"> 
                      <sup class="circle" id="cart_details">
                        Empty
                      </sup>
                      </span></a>
                </li>
<?php } ?>









<!--

 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View Cart <i class="fa fa-shopping-cart"></i><span style="color:white;"> 
                      <sup class="circle">
                        <?php 
                           $query = "select sum(quantity) as quantity from temp_cart where session_cart ='$session_cart'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           $row = mysqli_fetch_assoc($result);
                           $count = $row['quantity'];
                           if($count  == 0)
                           {
                            echo 'Empty';
                           }
                           else
                           {
                            echo $count;
                           }
                        ?>
                      </sup>
                      </span></a>
     


        <ul class="dropdown-menu dropdown-menu-right">
         <center style="margin:.5em;"> <?php 
                           $query = "select * from temp_cart natural join product where session_cart ='$session_cart'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           $count = mysqli_num_rows($result);
                           if($count!=0)
                           {
                           while($row = mysqli_fetch_assoc($result))
                           {
                             $product_img = $row['product_img'];
                            echo '<a href="viewcart.php">';
                            echo '<img src="nwbs/upload/'.$product_img.'" height="30" width="30" /> '."x".$row['quantity']." ".$row['product_name']."<br>";
                            echo '</a>';
                           }
                         }
                         else
                         {
                            echo "No items in this cart.";
                         }
                        ?></center>
                         
        </ul>
      </li>

-->





            </ul>
        </div>

    </nav>


<br><br><br>









 <script src="library/js/jquery-3.3.1.js"></script>  <!-- captcha -->
 <script src='library/js/jquery.zoom.js'></script>










<!-- SNOW 

<style>
#snowflakeContainer {
    position: absolute;
    left: 0px;
    top: 0px;
}
.snowflake {
    padding-left: 15px;
    font-family: Cambria, Georgia, serif;
    font-size: 14px;
    line-height: 24px;
    position: fixed;
    color: #FFFFFF;
    user-select: none;
    z-index: 1000;
}
.snowflake:hover {
    cursor: default;
}
</style>
<div id="snowflakeContainer">
    <p class="snowflake">*</p>
</div>
<script src="//www.kirupa.com/js/fallingsnow_v6.js"></script>
<script src="//www.kirupa.com/js/prefixfree.min.js"></script>-->


<style type="text/css">
  .card:hover {
  box-shadow: 8px 8px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
  transition: box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
.card{
  border-radius: 0 !important;
}
.card-notify-year {
        position: absolute;
        right: -1px;
        top: -1px;
        background: red;
        text-align: center;
        color: #fff;      
        font-size: 14px;      
        width: 60px;
        height: 30px;    
        padding: 4px 0 0 0;
}
</style>














































<?php 
$session_errno = $_SESSION['errno'] = 'notlogin'; // to remove pop up message
?>

<style type="text/css">
  .img-thumbnail{
  border:none;
}
</style>


<!-- Pagination for category if many more -->
<?php

    $query=mysqli_query($conn,"select count(category_id) from category");
    $row = mysqli_fetch_row($query);

    $rows = $row[0];
    
    $page_rows = 30;

    $last = ceil($rows/$page_rows);

    if($last < 1){
        $last = 1;
    }

    $pagenum = 1;

    if(isset($_GET['pn'])){
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
    }

    if ($pagenum < 1) { 
        $pagenum = 1; 
    } 
    else if ($pagenum > $last) { 
        $pagenum = $last; 
    }

    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    
    $nquery=mysqli_query($conn,"select * from category $limit");

   $paginationCtrls = '';

    if($last != 1){
        
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a></li></u>';
        
        for($i = $pagenum-4; $i < $pagenum; $i++){
            if($i > 0){
                $paginationCtrls .= '<ul class="pagination justify-content-center"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" >'.$i.'</a></u>';
            }
        }
    }
    
    $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item active"><a class="page-link">'.$pagenum.'</a></li></u>';
    
    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" >'.$i.'</a></li></u>';
        if($i >= $pagenum+4){
            break;
        }
    }

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" >Next</a></li></u>';
    }
    }


?>
<!-- Pagination for category if many more -->











 <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4"><center>Categories</center></h1>
            <?php 
                while($row = mysqli_fetch_array($nquery))
                 {
                           $category_id = $row['category_id'];
                           $category_img = $row['category_img'];
                           $category_name = strtolower($row['category_name']);


                           $query = "select count(*) as ilan from product where category_id = '$category_id'";
                           $result = mysqli_query($conn,$query);
                           $row = mysqli_fetch_assoc($result);
                           $ilan = $row['ilan'];


                ?>
          <div class="list-group">
            <a style="color:black;" href="product.php?category_name=<?php echo $category_name; ?>" class="list-group-item"><?php echo ucwords($category_name); ?> <small style="color:grey;">(<?php echo $ilan; ?>)</small><img style="float:right;" class="img"  src="nwbs/upload/<?php echo $category_img; ?>" onerror="this.src='nwbs/upload/default.png'" width="30"height="30" /></a>
          </div>

          <?php } ?>
          <br>
          <?php echo $paginationCtrls; ?>
          <a href="#" class="ads"><img src="library/images/ads1.jpg"  width="100%" style="margin-bottom: 1em;" /></a>
        </div>

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox" style="">
              <div class="carousel-item active">
                <img class="d-block img-fluid"  src="library/images/slide0.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid"  src="library/images/slide1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid"  src="library/images/slide2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid"  src="library/images/slide3.jpg" alt="Third slide">
              </div>
            </div>

           <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span> button </a>-->

          </div>








<!-- product search bar -->
<form action="search.php" method="get">
<div class="input-group mb-3">
  
  <input type="text" class="form-control" name="product_name" placeholder="Search product..." aria-label="Search product..." aria-describedby="basic-addon2" required="true">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div>

</div>
</form>
<!-- product search bar -->
















<!-- Pagination for product -->
<?php

    $query=mysqli_query($conn,"select count(inventory_id) from inventory natural join product");
    $row = mysqli_fetch_row($query);

    $rows = $row[0];
    
    $page_rows = 12;

    $last = ceil($rows/$page_rows);

    if($last < 1){
        $last = 1;
    }

    $pagenum = 1;

    if(isset($_GET['pn1'])){
        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn1']);
    }

    if ($pagenum < 1) { 
        $pagenum = 1; 
    } 
    else if ($pagenum > $last) { 
        $pagenum = $last; 
    }

    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
    
    $nquery=mysqli_query($conn,"select * from inventory natural join product $limit");

    $paginationCtrls = '';

    if($last != 1){
        
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn1='.$previous.'">Previous</a></li></u>';
        
        for($i = $pagenum-4; $i < $pagenum; $i++){
            if($i > 0){
                $paginationCtrls .= '<ul class="pagination justify-content-center"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn1='.$i.'" >'.$i.'</a></u>';
            }
        }
    }
    
    $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item active"><a class="page-link">'.$pagenum.'</a></li></u>';
    
    for($i = $pagenum+1; $i <= $last; $i++){
        $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn1='.$i.'" >'.$i.'</a></li></u>';
        if($i >= $pagenum+4){
            break;
        }
    }

    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= '<ul class="pagination justify-content-center"><li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?pn1='.$next.'" >Next</a></li></u>';
    }
    }

?>
<!-- Pagination for product -->











<script type="text/javascript">
$(document).ready(function () {
  load_data();
});
 </script>








    <h3>Bike's</h3>
    <br>
       <div class="row">
            <?php 
               $query = "SELECT * from inventory natural join product natural join category where category_name = 'bikes'  limit 3";
               $result = mysqli_query($conn,$query);
               $numrows = mysqli_num_rows($result);
                    if($numrows !=0 ) //if may resulta
                    {
                     while($row = mysqli_fetch_array($result))
                     {
                               $product_code = $row['product_code'];
                               $product_name = strtolower($row['product_name']);
                               $product_img = $row['product_img'];
                               $product_description = strtolower(substr($row['product_description'],0,25)).'...'; //substring to cut the long description
                               $product_price = $row['product_price'];
                               $product_discount = $row['product_discount'];
                               $stock = $row['stock']; //in stock
              ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <?php if($product_discount>0){ ?>
                <span class="card-notify-year">Sale!</span>
                <?php } ?>
                <a href="#preview<?php echo $product_code;?>" data-toggle="modal" style="color:black"><img class="img-thumbnail" src="nwbs/upload/<?php echo $product_img; ?>" onerror="this.src='nwbs/upload/default.png'"  />
                <div class="card-body">
                  <h4 class="card-title">
                    <?php echo ucwords($product_name); // to make Title case product details ?> 
                  </h4>
                   <p class="card-text">


                    <?php if($product_discount>0){ ?>


                    Price: <b>₱<?php echo number_format($product_price-($product_discount / 100) * $product_price ,2); ?></b> <br>
                    <small class="text-muted"><s>₱<?php echo number_format($product_price,2); ?></s></small> <small>-<?php echo $product_discount; ?>%</small><br>

                    <?php } else{ ?>

                    Price: <b>₱<?php echo number_format($product_price,2); ?></b> <br>

                    <?php } ?>



                    <?php if($stock <=0) { echo "<span style='color:red;'>Out of Stock</span>"; } else { echo "In Stock: <span style='color:green;'>$stock</span>"; } //stock colors ?>
                  </p>
                </a>
                </div>
                <!-- ADD TO CART BUTTON -->
                <?php if($stock >0) {  ?>
                <input type="hidden" id="bikesproduct_code<?php echo $product_code; ?>" value="<?php echo $product_code; ?>">
                   <center><p class="cart" style="cursor:pointer;"><a href="javascript:;" class="bikesproduct_code<?php echo $product_code; ?>">Add to Cart <i class="fa fa-shopping-cart"></i></a>
                   </center>
                   <?php } ?>
                <!-- ADD TO CART BUTTON -->
              </div>
            </div>










<script type="text/javascript">
  


  $(document).on('click', '.bikesproduct_code<?php echo $product_code; ?>', function(){
    var product_code = $('#bikesproduct_code<?php echo $product_code; ?>').val();
    var action = "add";
      $.ajax({
        url:"process.php",
        method:"POST",
        beforeSend: function(){
        $('.loader').css("visibility", "visible");
        },
        data:{product_code:product_code,action:action},
        success:function(data)
        { 
          if(data==1){
            alert("Insufficient");
          }
          load_data();
        },
        complete: function(){
        $('.loader').css("visibility", "hidden");
       }
      });
  });


</script>











<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $product_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">

 

  <script>
    $(document).ready(function(){
      $('#zoom<?php echo $product_code;?>').zoom(); // function for image zoom in
    });
  </script>
<style type="text/css">
  #zoom<?php echo $product_code;?> img:hover { cursor: url(library/images/zoom-in.cur), default; } /* styling cursor and image */
</style>

<span class='zoom' id='zoom<?php echo $product_code;?>'> <!-- spanning image -->
        <img src='nwbs/upload/<?php echo $product_img; ?>'  class="img-thumbnail" onerror="this.src='nwbs/upload/default.png'"/>
</span>



          <?php 
        
         $string = $row['product_description'];  //product description explode to ,
        
        $array = explode(',', $string);
        echo implode("<br />", $array);
    

        ?>


      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->
          <?php }} else { echo 'No Available Item yet.<br><br><br><br>'; } //if no item yet for this ?>


          </div>
          <!-- /.row -->















<h3>Kid's Bike</h3>
    <br>
       <div class="row">
            <?php 
               $query = "SELECT * from inventory natural join product natural join category where category_name = 'kids bikes'  limit 3";
               $result = mysqli_query($conn,$query);
               $numrows = mysqli_num_rows($result);
                    if($numrows !=0 ) //if may resulta
                    {
                     while($row = mysqli_fetch_array($result))
                     {
                               $product_code = $row['product_code'];
                               $product_name = strtolower($row['product_name']);
                               $product_img = $row['product_img'];
                               $product_description = strtolower(substr($row['product_description'],0,25)).'...'; //substring to cut the long description
                               $product_price = $row['product_price'];
                               $product_discount = $row['product_discount'];
                               $stock = $row['stock']; //in stock
              ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                 <?php if($product_discount>0){ ?>
                <span class="card-notify-year">Sale!</span>
                <?php } ?>
                <a href="#preview<?php echo $product_code;?>" data-toggle="modal" style="color:black"><img class="img-thumbnail" src="nwbs/upload/<?php echo $product_img; ?>" onerror="this.src='nwbs/upload/default.png'" />
                <div class="card-body">
                  <h4 class="card-title">
                    <?php echo ucwords($product_name); // to make Title case product details ?> 
                  </h4>
                   <p class="card-text">
                    


                     <?php if($product_discount>0){ ?>


                    Price: <b>₱<?php echo number_format($product_price-($product_discount / 100) * $product_price ,2); ?></b> <br>
                    <small class="text-muted"><s>₱<?php echo number_format($product_price,2); ?></s></small> <small>-<?php echo $product_discount; ?>%</small><br>

                    <?php } else{ ?>

                    Price: <b>₱<?php echo number_format($product_price,2); ?></b> <br>

                    <?php } ?>



                    <?php if($stock <=0) { echo "<span style='color:red;'>Out of Stock</span>"; } else { echo "In Stock: <span style='color:green;'>$stock</span>"; } //stock colors ?>
                  </p>
                </a>
                </div>
                <!-- ADD TO CART BUTTON -->
                <?php if($stock >0) {  ?>
                <input type="hidden" id="kidbikesproduct_code<?php echo $product_code; ?>" value="<?php echo $product_code; ?>">
                   <center><p class="cart" style="cursor:pointer;"><a href="javascript:;" class="kidbikesproduct_code<?php echo $product_code; ?>">Add to Cart <i class="fa fa-shopping-cart"></i></a>
                   </center>
                   <?php } ?>
                <!-- ADD TO CART BUTTON -->
              </div>
            </div>











<script type="text/javascript">
  


  $(document).on('click', '.kidbikesproduct_code<?php echo $product_code; ?>', function(){
    var product_code = $('#kidbikesproduct_code<?php echo $product_code; ?>').val();
    var action = "add";
      $.ajax({
        url:"process.php",
        method:"POST",
        beforeSend: function(){
        $('.loader').css("visibility", "visible");
        },
        data:{product_code:product_code,action:action},
        success:function(data)
        { 
          if(data==1){
            alert("Insufficient");
          }
          load_data();
        },
        complete: function(){
        $('.loader').css("visibility", "hidden");
       }
      });
  });


</script>









<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $product_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">



  <script>
    $(document).ready(function(){
      $('#zoom<?php echo $product_code;?>').zoom(); // function for image zoom in
    });
  </script>
<style type="text/css">
  #zoom<?php echo $product_code;?> img:hover { cursor: url(library/images/zoom-in.cur), default; } /* styling cursor and image */
</style>

<span class='zoom' id='zoom<?php echo $product_code;?>'> <!-- spanning image -->
        <img src='nwbs/upload/<?php echo $product_img; ?>' class="img-thumbnail" onerror="this.src='nwbs/upload/default.png'"/>
</span>



          <?php 
        
         $string = $row['product_description'];  //product description explode to ,
        
        $array = explode(',', $string);
        echo implode("<br />", $array);
    

        ?>


      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->
          <?php }} else { echo 'No Available Item yet.<br><br><br><br>'; } //if no item yet for this ?>


          </div>
          <!-- /.row -->















<h3>Other Product's</h3>
    <br>
       <div class="row">
        <?php 
           $numrows = mysqli_num_rows($nquery);
           if($numrows !=0 ) //if may resulta
               {
                  while($row = mysqli_fetch_array($nquery))
                     {
                               $product_code = $row['product_code'];
                               $product_name = strtolower($row['product_name']);
                               $product_img = $row['product_img'];
                               $product_description = strtolower(substr($row['product_description'],0,25)).'...';
                               $product_price = $row['product_price'];
                               $product_discount = $row['product_discount'];
                               $stock = $row['stock'];
                ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                 <?php if($product_discount>0){ ?>
                <span class="card-notify-year">Sale!</span>
                <?php } ?>
                <a href="#preview<?php echo $product_code;?>" data-toggle="modal" style="color:black"><img class="img-thumbnail" src="nwbs/upload/<?php echo $product_img; ?>" onerror="this.src='nwbs/upload/default.png'" />
                <div class="card-body">
                  <h4 class="card-title">
                    <?php echo ucwords($product_name); // to make Title case product details ?> 
                  </h4>
                   <p class="card-text">
                    


                    <?php if($product_discount>0){ ?>


                    Price: <b>₱<?php echo number_format($product_price-($product_discount / 100) * $product_price ,2); ?></b> <br>
                    <small class="text-muted"><s>₱<?php echo number_format($product_price,2); ?></s></small> <small>-<?php echo $product_discount; ?>%</small><br>

                    <?php } else{ ?>

                    Price: <b>₱<?php echo number_format($product_price,2); ?></b> <br>

                    <?php } ?>



                    <?php if($stock <=0) { echo "<span style='color:red;'>Out of Stock</span>"; } else { echo "In Stock: <span style='color:green;'>$stock</span>"; }; //stock colors ?>
                  </p>
                </a>
                </div>
                  <!-- ADD TO CART BUTTON -->
                <?php if($stock >0) {  ?>
                <input type="hidden" id="otherproduct_code<?php echo $product_code; ?>" value="<?php echo $product_code; ?>">
                   <center><p class="cart" style="cursor:pointer;"><a href="javascript:;" class="otherproduct_code<?php echo $product_code; ?>">Add to Cart <i class="fa fa-shopping-cart"></i></a>
                   </center>
                   <?php } ?>
                <!-- ADD TO CART BUTTON -->
              </div>
            </div>









<script type="text/javascript">
  


  $(document).on('click', '.otherproduct_code<?php echo $product_code; ?>', function(){
    var product_code = $('#otherproduct_code<?php echo $product_code; ?>').val();
    var action = "add";
      $.ajax({
        url:"process.php",
        method:"POST",
        beforeSend: function(){
        $('.loader').css("visibility", "visible");
        },
        data:{product_code:product_code,action:action},
        success:function(data)
        { 
          if(data==1){
            alert("Insufficient");
          }
          load_data();
        },
        complete: function(){
        $('.loader').css("visibility", "hidden");
       }
      });
  });


</script>









<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $product_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">

 

  <script>
    $(document).ready(function(){
      $('#zoom<?php echo $product_code;?>').zoom(); // function for image zoom in
    });
  </script>
<style type="text/css">
  #zoom<?php echo $product_code;?> img:hover { cursor: url(library/images/zoom-in.cur), default; } /* styling cursor and image */
</style>

<span class='zoom' id='zoom<?php echo $product_code;?>'> <!-- spanning image -->
        <img src='nwbs/upload/<?php echo $product_img; ?>' class="img-thumbnail" onerror="this.src='nwbs/upload/default.png'"/>
</span>



          <?php 
        
         $string = $row['product_description'];  //product description explode to ,
        
        $array = explode(',', $string);
        echo implode("<br />", $array);
    

        ?>


      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->
          <?php }} else { echo 'No Available Item yet.<br><br><br><br>'; } //if no item yet for this ?>


          </div>
          <!-- /.row -->


<?php echo $paginationCtrls; //paging ?>


        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->






<script type="text/javascript">
    function load_data()
  {
    $.ajax({
      url:"detail_cart",
      dataType:"json",
      success:function(data)
      {
        $('#cart_details').html(data.sub_total_quantity);
      }
    });
  }
</script>





<br><br><br>
<?php include "footer.php"; //footer ?>
     <!-- footer -->


   <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->


  
</body>
</html>


