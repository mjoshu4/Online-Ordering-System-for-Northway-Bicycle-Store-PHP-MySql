<?php include 'nav.php';
$session_errno = $_SESSION['errno'] = 'notlogin'; // to remove pop up message
?>


<?php 
  if( isset($_SESSION["customer_fullname"]) && isset($_SESSION["customer_username"]) )
   {
      echo '<script>window.location.replace("home.php")</script>'; //if already login redirect to home
   }
   else{
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

else {
  $authUrl = $gClient->createAuthUrl();
  $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">'; //google api
}
?>
<!-- FOR LOGIN WITH GOOGLE -->













<br>
<div class="login">
 <div class="login-header">
      <h2 style="color:black;margin:13px;"><img src="library/images/logo.png" width="180" height="60" /> | Register</h2>
  </div>
  <div class="login-form">
<form action = "process.php" method = "POST">
    <h6>Email Address<sup>*</sup></h6>
    <input type="email" name="customer_email" placeholder="Please enter your email" required="true" maxlength="35"/>
    <h6>Username<sup>*</sup></h6>
    <input type="text" name="customer_username"  placeholder="Please enter your username"  required="true" maxlength="35"/>
    <h6>Full Name<sup>*</sup></h6>
    <input type="text" name="customer_fullname"  placeholder="First last"  required="true" maxlength="35" />
    <h6>Contact Number<sup>*</sup></h6>
    <input type="text" name="customer_contact_number"  placeholder="Ex. 0907xxxxxxx"  required="true" maxlength="11"/>
     <h6>Address<sup>*</sup></h6>
    <input type="text" name="customer_address"  placeholder="House Number, Building, Barangay and Street Name"  required="true" maxlength="100"/>
     <h6>Shipping Address<sup>*</sup></h6>
    <input type="text" name="customer_shipping_address"  placeholder="House Number, Building, Barangay, Street Name Province and City"  required="true" maxlength="100"/>
    <h6>Password<sup>*</sup></h6>
    <input type="password" name="customer_password" placeholder="Minimum 8 Characters" required="true" maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/>
    <div class="tip">
    <small>Password must be contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</small>
  </div>
   <h6>Retype Password<sup>*</sup></h6>
    <input type="password" name="customer_password2" placeholder="Please retype your password" required="true" maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"/>
     <div class="no-access">
   <p><a href="#" onclick="alr()" style="color:blue;">Already member? login here</a></p>
 </div>
    <input type="submit" name="submitregister" value="Register!" class="login-button"/>
       <style type="text/css">
      .pline { width:40%; text-align:center; border-bottom: 1px solid grey; line-height:0.1em; margin:20px 0 20px; } 
      .pline .spanline { background:#fff; padding:0 10px; }
    </style>
    <center>
  <p class="pline"><span class="spanline">Or register with</span></p>
</center>
<a href="fbconfig.php"><button style="cursor: pointer;" type="button"class="loginBtn loginBtn--facebook">
  Facebook
</button></a>
<?php echo $output; ?><button style="cursor: pointer;" type="button"class="loginBtn loginBtn--google">
  Google
</button></a>
</form>
    <script> function alr() { location.replace('login.php'); }</script>
  </div>
</div>




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

