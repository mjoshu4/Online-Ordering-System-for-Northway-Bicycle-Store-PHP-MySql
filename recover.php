<?php session_start(); ?>
  <?php 

 if( !isset($_SESSION["customer_email"]))
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
  else
  {
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>NWBS | Recover Account</title>
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

body
{
  background-color:white;
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
.login-form h5 {
  text-align:left;
  margin-left:47px;
  color:black;
}





.login-form {
  box-sizing:border-box;
  padding-top:0px;
  padding-bottom:20%;
  margin:5% auto;
  text-align:center;
}

.login input[type="text"],
.login input[type="email"],
.login input[type="password"] {
  max-width:400px;
  width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius: 3px;
  border:1px solid black;
  outline:none;
  padding-left:10px;
}
.login-form input[type="submit"] {
  height:50px;
  width:80%;
  background:black;
  border-radius: 3px;
  border:1px solid #f2f2f2;
  color: white;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}


.no-access p{
  text-align:left;
  margin-left:40px;
  color:white;
}


.responsive {
    width: 80%;
    height: auto;
}


/*Media Querie*/
@media only screen and (min-width : 150px) and (max-width : 530px){
  .login-form h3 {
    text-align:center;
    margin:0;
  }
  .sign-up, .no-access {
    margin:10px 0;
  }
  .login-button {
    margin-bottom:10px;
  }
}
</style>







<br>
<br>
<br>

<div class="login">
  <div class="login-header">
      <h2 style="color:black;"><i class="fa fa-bicycle" style="color:gold; font-size:1.2em;"></i> Recover Account.</h2>
  </div>
  <br>
  <div class="login-form">
    <p style="text-align:left;margin:0px 50px 0px 50px;">We sent 5 Digits Code to your Email <?php echo $_SESSION["customer_email"]; ?> Didn't not receive? <a href="https://northwaybicyclestore.tk/process.php?resend" >resend</a> again or Back to <a href="https://northwaybicyclestore.tk">Home Page.</a></p>
<form action = "process.php" method = "POST">
    <input type="text" name="customer_username"name="customer_email" required="true" value="<?php echo $_SESSION["customer_email"]; ?>" hidden="true"/><br>
    <h5>Enter Verification Code:</h5>
    <input type="text" name="customer_verification_code" required="true" maxlength="5"/>
    <br>
    <input type="submit" name="submitreset" value="Reset Password" class="login-button"/>
</form>
  </div>
</div>




     <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->

</body>
</html>
<?php } ?>