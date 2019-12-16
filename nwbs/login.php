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


</style>







<br>


<div class="login">
  <div class="login-header">
      <h2 style="color:black;margin:13px;"><img src="../library/images/logo.png" width="180" height="50" /> | Admin</h2>
  </div>

  <div class="login-form">
<form action = "process.php" method = "POST" class="accessing">
    <h6>Username:</h6>
    <input type="text" name="username" autocomplete="off" required="true"/><br>
    <h6>Password:</h6>
    <input type="password" name="password" autocomplete="off" required="true"/>
    <div class="no-access">
   <p><a href="#forgot" data-toggle="modal" style="color:blue;">Forgot Password?</a></p>
 </div>
 <center><div class="robot g-recaptcha" data-sitekey="6LcgN24UAAAAAH27KGJ5tic7zJKxl2GZO9XD58Xp" ></div></center>
    <input type="submit" name="submitlogin" value="Login" class="login-button"/>
</form>

  </div>
</div>






















<!--  MODAL -->
<div class="modal fade" id="forgot" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Recover your account.</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
        In order to reset your password, please enter the email attached to your account. You will then receive an email containing the instructions to set your new password.
        <br><br>
        <div class="input-group input-group-lg">
       <span class="input-group-prepend"><i class="input-group-text fa fa-envelope"></i></span>
         <input type="email"  class="form-control" name="email_add" required="true" maxlength="100"/>
       </div>
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitrecover"  class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
<!--  MODAL -->






















          <center><small style="color:black;bottom:0;">Copyright © North Way Bicycle Store <?php echo date("Y"); ?></small></center>

  
     <!-- footer -->








    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#top">
      <i class="fa fa-angle-up"></i>
    </a>
 <!-- Scroll to Top Button-->

</body>
</html>



  <script src="https://www.google.com/recaptcha/api.js"
 async defer>
 </script>
<script>
$(document).ready(function(){
 $(".accessing").submit(function(){
   var response = grecaptcha.getResponse();
      if(response.length == 0){
          alert('Please check the Captcha');
    return false;
 } 
 });
});
</script>



    <!-- Bootstrap core JavaScript-->
    <script src="../library/vendor/jquery/jquery.min.js"></script>
    <script src="../library/js/jquery-3.3.1.js"></script>
    <script src="../library/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>