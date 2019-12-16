<?php include 'nav.php';

//for error code self
$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
if($pageWasRefreshed) {
   $session_errno = $_SESSION['errno'] = 'notlogin'; //if refresh error message will be gone
}

 if( isset($_SESSION["customer_fullname"]) && isset($_SESSION["customer_username"]) )
 {
    echo '<script>window.location.replace("home.php")</script>'; //if already login redirect to home
 }
 else
 {
 ?>







<!-- FOR LOGIN WITH GOOGLE -->
<?php

//Include Google client library 
include_once 'library/Google/Google_Client.php';
include_once 'library/Google/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '41062752661-161c46aaj9cj705seivo4usael9vlcd5.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'J2u19m3Fl_lBbAzjglSvhm5q'; //Google client secret
$redirectURL = 'https://northwaybicyclestore.tk/login.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('North Way Bicycle Store');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);


if(isset($_GET['code'])){
  $gClient->authenticate($_GET['code']);
  $_SESSION['token'] = $gClient->getAccessToken();

}

if (isset($_SESSION['token'])) {
  $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
  //Get user profile data from google
  $gpUserProfile = $google_oauthV2->userinfo->get();
  

  //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $gpUserData;
  

  //Storing user data into session
  $_SESSION['userData'] = $userData;
  
  //Render facebook profile data
    if(!empty($userData)){
     

$fxploit =  $userData['first_name'].' '.$userData['last_name']; 
$fusername = explode(' ',trim($fxploit));



  $customer_id = $userData['oauth_uid'];
  $customer_email = $userData['email'];
  $customer_username =  $fusername[0] . $userData['oauth_uid'];
  $customer_fullname = $userData['first_name'].' '.$userData['last_name'];

   $query = "SELECT * from customer where customer_email = '$customer_email' and not customer_password = ''";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);


   if($count!=0){
      echo '<script>alert("Email is already exist try to login manually!");</script>';
          echo '<script>window.location.replace("logout.php")</script>';
   }else{
      


       $query = "SELECT * from customer where customer_username = '$customer_username'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $numrows = mysqli_num_rows($result);
      $dbcustomer_id = $row['customer_id'];
      $session_cart = $_SESSION['session_cart'];
      $dbcustomer_username = $row['customer_username'];
      $dbcustomer_fullname = $row['customer_fullname'];
      $dbcustomer_status = $row['customer_status'];

 


      if($numrows!=0)
      {       
        if ($dbcustomer_status == "Enabled") { //if customer acc is enabled
          $_SESSION['customer_username']=$dbcustomer_username;
          $_SESSION['customer_fullname']=$dbcustomer_fullname;





         //if multiple login update quantity

        $query1 = "SELECT * from temp_cart where session_cart = '$dbcustomer_id'"; //select product 1
        $result1 = mysqli_query($conn,$query1);
         while($row1 = mysqli_fetch_assoc($result1))
          {  
            $query2 = "SELECT * from temp_cart where session_cart = '$session_cart'"; //select product 2
            $result2 = mysqli_query($conn,$query2);
            while($row2 = mysqli_fetch_assoc($result2)) 
            {
              $product_code1 = $row1['product_code'];
              $quantity1 = $row1['quantity'];
              $product_code2 = $row2['product_code'];
              $quantity2 = $row2['quantity'];

              if($product_code1 == $product_code2) //if match select current stock and update it
              {
                $total = $quantity1 + $quantity2;
                $query = "SELECT * from inventory where product_code = '$product_code1'";
                 $result = mysqli_query($conn,$query);
                 $row = mysqli_fetch_assoc($result);
                 $stock = $row['stock'];

                 if($total <= $stock)
                 {
                     $query = "UPDATE temp_cart set quantity ='$total'
                      WHERE session_cart ='$dbcustomer_id' and product_code ='$product_code1'"; //update to current stock
                      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                      $query = "DELETE from temp_cart WHERE session_cart ='$session_cart'and product_code ='$product_code2'";
                      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 }
                 else
                 {
                    $query = "DELETE from temp_cart WHERE session_cart ='$session_cart'and product_code ='$product_code2'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); //delete product after update to the login user
                    echo '<script>alert("Some product quantity has been changed.");</script>';
                 }
              }
            }
          }

          //after all process update session to login user id
         
          $query = "UPDATE temp_cart set session_cart ='$dbcustomer_id'
          WHERE session_cart ='$session_cart'";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
          $_SESSION['session_cart'] = $dbcustomer_id;

          //if multiple login update quantity

          echo '<script>window.location.replace("home.php")</script>';
        }
        else
        {
            echo "<script>alert('Your Account is Disabled Please Contact Developer.')</script>"; //for disabled account
            echo '<script>window.location.replace("login.php")</script>';
        }
      }
      else
      {
              $query = 'INSERT into customer (customer_email,customer_username,customer_fullname,customer_password,customer_contact_number,customer_address,customer_shipping_address,customer_status,customer_verification_code,recipient_name,recipient_address,recipient_contact_number) values ("'.$customer_email.'", "'.$customer_username.'", "'.$customer_fullname.'","","","","","Enabled","","","","")';
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                $_SESSION['customer_username']=$customer_username;
                $_SESSION['customer_fullname']=$customer_fullname;
                 echo '<script>window.location.replace("home.php")</script>'; //if not already member create account
      }
   }



}

}

else {
  $authUrl = $gClient->createAuthUrl();
  $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">'; //google api
}
?>
<!-- FOR LOGIN WITH GOOGLE -->















<br>
<div class="login">
   <div class="login-header">
      <h2 style="color:black;margin:13px;"><img src="library/images/logo.png" width="180" height="60" /> | Login</h2>
  </div>




<?php if($session_errno == 'notexist'){ //not exist login popup ?>
  <div class="alert alert-warning col-8 mx-auto alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <small>That user does not exist!</small>
  </div>
<?php }
    if($session_errno == 'incorrectpass'){ //incorrect pass login popup
 ?>
 <div class="alert alert-danger col-8 mx-auto alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <small>Incorrect Username or Password!</small>
  </div>
<?php } ?>



  <div class="login-form">
<form action = "process.php" method = "POST" class="accessing">
    <h6>Username:</h6>
    <input type="text" name="customer_username" required="true"/><br>
    <h6>Password:</h6>
    <input type="password" name="customer_password" required="true"/>
   <div class="no-access">
   <p><a href="#forgot" data-toggle="modal" style="color:blue;">Forgot Password?</a></p>
 </div>
     <center><div class="robot g-recaptcha" data-sitekey="6LcgN24UAAAAAH27KGJ5tic7zJKxl2GZO9XD58Xp" ></div></center>
    <input type="submit" name="submitlogin" value="Login" class="login-button"/>
    <style type="text/css">
      .pline { width:40%; text-align:center; border-bottom: 1px solid grey; line-height:0.1em; margin:20px 0 20px; } 
      .pline .spanline { background:#fff; padding:0 10px; }
    </style>
    <center>
  <p class="pline"><span class="spanline">Or login with</span></p>
    </center>
    <a href="fbconfig.php"><button style="cursor: pointer;" type="button" class="loginBtn loginBtn--facebook">
  Facebook
</button></a>
<?php if(!empty($output)) { echo $output; } ?><button style="cursor: pointer;" type="button" class="loginBtn loginBtn--google">
  Google
</button></a>
</form><br>
     <p><a href="register.php" style="color:blue;">Don't have an account? Sign up here.</a></p>
  </div>
</div>










<!--  MODAL recover account -->
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
         <input type="email"  class="form-control" name="customer_email" required="true" maxlength="100"/>
       </div>
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitrecover"  class="btn btn-primary">Submit</button>
      </div>
</form>
    </div>
  </div>
</div>
<!--  MODAL recover account -->







<?php include "footer.php"; ?>
     <!-- footer -->








    <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->



  
</body>
</html>
<?php } ?>

