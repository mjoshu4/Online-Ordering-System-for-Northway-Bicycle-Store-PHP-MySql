<?php session_start(); ?>
  <?php 
  include_once("../db.php");
 if( !isset($_SESSION["email_add"]))
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
  <link rel='shortcut icon' href='../library/images/icon.png' type='image/x-icon' />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap core CSS-->
  <link href="../library/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../library/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../library/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../library/css/bs.css" rel="stylesheet">
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
    <p style="text-align:left;margin:0px 50px 0px 50px;">We sent 5 Digits Code to your Email <?php echo $_SESSION["email_add"]; ?> Didn't not receive? <a href="https://nbws.000webhostapp.com/nwbs/process.php?resend" >resend</a> again or Back to <a href="login.php">Admin Panel.</a></p>
<form action = "process.php" method = "POST">
    <input type="text" name="username"name="email_add" required="true" value="<?php echo $_SESSION["email_add"]; ?>" hidden="true"/><br>
    <h5>Enter Verification Code:</h5>
    <input type="text" name="verification_code" required="true" maxlength="5"/>
    <br>
    <input type="submit" name="submitresetrecover" value="Reset Password" class="login-button"/>
</form>
  </div>
</div>










          

  
     <!-- footer -->








    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#top">
      <i class="fa fa-angle-up"></i>
    </a>
 <!-- Scroll to Top Button-->

</body>
</html>





    <!-- Bootstrap core JavaScript-->
    <script src="../library/vendor/jquery/jquery.min.js"></script>
    <script src="../library/js/jquery-3.3.1.js"></script>
    <script src="../library/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../library/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../library/vendor/chart.js/Chart.min.js"></script>
    <script src="../library/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../library/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../library/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../library/js/sb-admin-datatables.min.js"></script>
    <script src="../library/js/sb-admin-charts.min.js"></script>
    <?php } ?>