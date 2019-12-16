<?php session_start(); ?>
  <?php 
  include_once("../db.php");
 if( !isset($_SESSION["email_add"]) && !isset($_SESSION["success"]))
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
  
 else
 {
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>NWBS | Recovered</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
</head>
<body>

<style>

body
{
  background-color:white;
}

.tip {
  text-align: center;
  margin:0px 50px 20px 50px;
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
  margin-left:48px;
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
      <h2 style="color:black;"><i class="fa fa-bicycle" style="color:gold; font-size:1.2em;"></i> Reset your password</h2>
  </div>
  <br>
  <div class="login-form">
<form action = "process.php" method = "POST">
    <h5>New Password:</h5>
    <input type="password" name="npassword" placeholder="Minimum 8 Characters" required="true" maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/><br>
     <div class="tip">
    <small>Password must be contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</small>
  </div>
    <h5>Retype Password:</h5>
    <input type="password" name="cnpassword" placeholder="Please retype your password" required="true" maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/>
    <br>
    <input type="submit" name="submitrecovered" value="Submit" class="login-button"/>
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


<?php } ?>