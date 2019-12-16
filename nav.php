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






</style>


    <nav class="navbar fixed-top py-0 pl-0 navbar-expand-lg navbar-dark" style="background-color:black;">

         <a href="home.php"><img src="library/images/logo1.png" width="180" height="60" /></a>




         <?php
// Check for any mobile device.
if ($detect->isMobile()){ ?>
         <a href="viewcart.php" style="color:white;"><i class="fa fa-shopping-cart"></i> Cart<span style="color:white;"> 
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