<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>NWBS | Admin Panel</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  <!-- captcha -->
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
.login-form h6 {
  text-align:left;
  margin-left:100px;
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

.login-form h6 {

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





.tip {
  text-align: center;
  margin:0px 50px 20px 50px;
}





</style>

  <?php 
 if( !isset($_SESSION['dbusername']) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
 else
 {
    ?>





<br>


<div class="login">
  <div class="login-header">
      <h2 style="color:black;margin:13px;"><img src="../library/images/logo.png" width="180" height="50" /> | Admin</h2>
  </div>

  <div class="login-form">
<form action = "process.php" method = "POST">
    <h6>New Password:</h6>
    <input type="password" name="npassword" placeholder="Minimum 8 Characters" required="true" maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    <div class="tip">
    <small>Password must be contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</small>
  </div>
    <h6>Confirm New Password:</h6>
     <input type="password" name="cnpassword" placeholder="Please retype your password" required="true" maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    <input type="submit" name="submitnewpass" value="Submit" class="login-button"/>
</form>

  </div>
</div>










          <center><small style="color:black;bottom:0;">Copyright © North Way Bicycle Store 2018</small></center>

  
     <!-- footer -->
<?php } ?>







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