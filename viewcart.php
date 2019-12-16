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
                      <sup class="circle" id="sub_total_quantity1">
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
                     <sup class="circle" id="sub_total_quantity1">
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




//for error code
$session_errno = $_SESSION['errno'] = 'notlogin';

 ?>
 
 
 <style type="text/css">
  .img-thumbnail{
  border:none;
}
</style>
 
 
 
  <?php 
                 $query = "select * from temp_cart where session_cart= '$session_cart'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 $numrows = mysqli_num_rows($result);
                 if($numrows==0)
                 {
                        echo '<br><center><p>There are no items in this cart.</p><button type="button" onclick="shop()" style="border-radius: 0px !important;" class="btn btn-outline-primary m-1">CONTINUE SHOPPING <i class="fa fa-shopping-cart"></i></a></button></center><br>';
                 }
                 else
                 {
    ?>





<script type="text/javascript">
$(document).ready(function () {
  load_data();
});
 </script>



  <!-- Table -->
        <div class="card-body">
            <div class="row" style="text-align: left; margin-bottom:4em;">
                <div class="col-sm-8">
          <div class="table-responsive" >
      <table class="table table-borderless" cellspacing="0" width="100%" cellspacing="0">



           <thead>
                    <tr>
                  <th>Thumbnail</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th></th>
                    </tr>
                </thead>


                 <tbody>
                    <?php 
                 $query = "select * from temp_cart natural join product where session_cart ='$session_cart' order by temp_cart_id DESC";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $product_code = $row['product_code'];
                            $quantity = $row['quantity'];
                            $product_name = $row['product_name'];
                            $product_img = $row['product_img'];
                            $product_description = $row['product_description'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];

                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                ?>


                            
             <tr>
                  <td><a href="#preview<?php echo $product_code;?>" data-toggle="modal"><img src="nwbs/upload/<?php echo $product_img; ?>" height="50" width="50" onerror="this.src='nwbs/upload/default.png'" /></a></td>
                  <td><?php echo $product_name; ?></td>
                  <td>




<div style="width: 120px;">
      
      <div class="input-group">


          <span class="input-group-btn">
             <button type="button" class="minus<?php echo $product_code;?> btn btn-primary" style="border-radius: 0px;">
                  <i class="fa fa-minus"></i>
              </button>
          </span>

          <input type="hidden" id="product_code<?php echo $product_code;?>" class="form-control" value="<?php echo $product_code;?>">
          <input type="text" id="quantity<?php echo $product_code;?>" class="form-control" value="<?php echo $quantity;?>" min="1" max="10" readonly>


          <span class="input-group-btn">
              <button type="button" class="plus<?php echo $product_code;?> btn btn-primary" style="border-radius: 0px;">
                  <i class="fa fa-plus" aria-hidden="true"></i>
              </button>
          </span>


      </div>

</div>



              
                
                    
                    <script type="text/javascript">

                          $(document).on('click', '.minus<?php echo $product_code; ?>', function(){
                          var product_code = $('#product_code<?php echo $product_code; ?>').val();
                          var quantity = $('#quantity<?php echo $product_code; ?>').val();
                          quantity--;
                          var action = "update";
                            $.ajax({
                              url:"process.php",
                              method:"POST",
                              beforeSend: function(){
                              $('.loader').css("visibility", "visible");
                            },
                              data:{product_code:product_code,quantity:quantity,action:action},
                              success:function(data)
                              {
                                load_data();
                                  if(data==false){
                                  document.getElementById('quantity<?php echo $product_code;?>').value=++quantity;
                                }else{
                                  document.getElementById('quantity<?php echo $product_code;?>').value--;
                                }
                              },
                              complete: function(){
                              $('.loader').css("visibility", "hidden");
                            }
                            });
                        });



                      $(document).on('click', '.plus<?php echo $product_code; ?>', function(){
                          var product_code = $('#product_code<?php echo $product_code; ?>').val();
                          var quantity = $('#quantity<?php echo $product_code; ?>').val();
                          quantity++;
                          var action = "update";
                            $.ajax({
                              url:"process.php",
                              method:"POST",
                              beforeSend: function(){
                              $('.loader').css("visibility", "visible");
                            },
                              data:{product_code:product_code,quantity:quantity,action:action},
                              success:function(data)
                              {
                                  load_data();
                                  if(data==false){
                                    document.getElementById('quantity<?php echo $product_code;?>').value=--quantity;
                                    alert('Insufficient');
                                  }else{
                                    document.getElementById('quantity<?php echo $product_code;?>').value++;
                                  }
                              },
                                complete: function(){
                                $('.loader').css("visibility", "hidden");
                              }
                            });
                        });

                    </script>
                    

                  </td>
          
                  <td><?php echo '₱'.number_format($product_price,2); ?> <?php if($product_discount>0){ echo '<small> -'.$product_discount.'%</small>'; } ?></td>
          
                    <td>                    
                        <a href="#delete<?php echo $product_code;?>" data-toggle="modal"><i class="fa fa-trash" style="font-size:24px; color:#ff6666;" ></i></a>
                    </td>
                    <!-- Table -->













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
      $('#zoom<?php echo $product_code;?>').zoom();
    });
  </script>
<style type="text/css">
  #zoom<?php echo $product_code;?> img:hover { cursor: url(library/images/zoom-in.cur), default; }
</style>
<span class='zoom' id='zoom<?php echo $product_code;?>'>
        <img src='nwbs/upload/<?php echo $product_img; ?>' class="img-thumbnail" onerror="this.src='nwbs/upload/default.png'"/><br>
</span>
<p>
  <?php

  $array = explode(',', $product_description);
        echo implode("<br />", $array);

    ?>
</p>


      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->

















<!-- DELETE MODAL -->
<div class="modal fade" id="delete<?php echo $product_code;?>"" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Remove Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Are you sure you want to remove <?php echo $product_name; ?> in your cart?</label>
         <input type="text" name="product_code" class="form-control" hidden="true" value="<?php echo $product_code; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeletecart" class="btn btn-danger">Remove</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- DELETE MODAL -->

<?php } ?>







</tr>
</tbody>
</table>
</div>










<script type="text/javascript">
    function load_data()
  {
    $.ajax({
      url:"detail_cart",
      dataType:"json",
      success:function(data)
      {
        $('#sub_total_quantity').html(data.sub_total_quantity);
        $('#sub_total_quantity1').html(data.sub_total_quantity);
        $('#total').html(data.total);
        $('#total1').html(data.total);
      }
    });
  }
</script>
















<br>
<form action="process.php" method="post">
  <button type="submit" name="clearcart" style="border-radius: 0px !important;" class="btn btn-outline-danger m-1">Clear Cart <i class="fa fa-trash"></i></button>
  <button type="button" onclick="shop()" style="border-radius: 0px !important;" class="btn btn-outline-primary m-1">CONTINUE SHOPPING <i class="fa fa-shopping-cart"></i></a></button>
</form><br>






<?php


$query="SELECT * from temp_cart where session_cart='$session_cart' order by temp_cart_id DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$time_frame = $row['time_frame'];




//Convert to date THIS BUG DATE COME FROM VERSION OF PHP
$datestr=$time_frame;//Your date
$date=strtotime($datestr);//Converted to a PHP date (a second count)

//Calculate difference
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60)+8); //+8 hours because timezone of db

//Report
echo "<b>Time left: </b> $hours hours remaining";


?>







<br><br>
<p>Free Shipping fee when you pay using these methods <img src="library/images/paypal.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 50px;"/>
         <img src="library/images/visa.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 50px;"/><br>


         <small>Note: Your reserved item will be gone in 24 hours.</small>
</div>
<div class="col-sm-4">
<h5><b>Order Summary</b></h5>
<hr>

<p style="color:grey;">Subtotal (<span id="sub_total_quantity"></span> Items) - <span style="color:black;">₱<span id="total"></span></span></p>


                        <p><b>Total - </b>  <span style="color:blue; font-size: 1.5em;">₱<span id="total1"></span></span></p>
      
                        <a href="#payment_method" data-toggle="modal" style="color:white;"><button type="submit" style="border-radius: 0px !important;" class="btn btn-primary btn-block">PROCEED TO CHECK OUT</button></a>        
</div>







<!-- Payment Method -->
<div class="modal fade" id="payment_method" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Choose Payment Method</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>





<form action = "process.php" method = "POST" onsubmit="return (function() { if (!document.getElementById('checkbox').checked) { alert('You must accept the Terms of Agreement to proceed.');return false; }})()">
      <div class="modal-body">
          <?php
        if( !isset($_SESSION["customer_fullname"]) || !isset($_SESSION["customer_username"]) )
         {
            echo '<center>Kindly input your <a href="register.php">credentials</a></center>';
         }
       else
       {
        ?>
         <select id="agreement"  name="payment_method" required="true" class="form-control">                      
                                 <option disabled selected value> -- SELECT -- </option>
                                 <option value="cod">Cash on delivery (COD)</option>
                                 <option value="visa">Visa Checkout</option>
                                 <option value="Paypal">Paypal</option>
                                 <option value="Dragonpay">Pay with Dragonpay ( Testing only )</option>
                                </select>

             <div class="cod box">
              <div class="container">
              <br>
               <div style="overflow-y: scroll; height: 150px;">
                <p style="margin:1em;">These are the following terms of agreement that should be applied prior to the products to be delivered from Northway Bicycle Store supplied to all purchasers from time to time. This is for the Cash on Delivery (COD) basis only. This must be noted by the supplier and the purchaser. The item(s) is/are reserved when it has been chosen and added to the cart. No items are RETURNED unless damaged. No other payment terms are considered except by special written agreement. Orders CANNOT be CANCELLED when the delivery is on going. There is a replacement for damaged items on process 3 to 5 days when the product is checked.
                  <br>
                  <br>
                   <input type="checkbox" id="checkbox">
                 You must accept the <a href="terms_and_conditions.php">Terms of Agreement</a> to proceed.
                </p>
               </div>
               </div>
             </div>

      </div>
      <div class="modal-footer">
         <button type="submit" name="select_payment" class="btn btn-primary">Submit</button>
      </div>
</form>
<?php }?>
    </div>
  </div>
</div>

<!-- Payment Method -->








<!-- Agreement -->
<script type="text/javascript">
$(document).ready(function(){
    $("#agreement").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == "cod"){
                $("." + optionValue).show();
                $('#checkbox').prop('checked', false);
            } else{
                $(".box").hide();
                $('#checkbox').prop('checked', true);
            }
        });
    }).change();
});
</script>
<!-- Agreement -->
    






</div>
</div>
</div>

<?php } ?>










    <br><br><br>
   <?php include "footer.php"; ?>
     <!-- footer -->






  <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->




<script type="text/javascript">

    function shop()
    {
        window.location.replace("home.php")
    }



</script>




  
</body>
</html>


