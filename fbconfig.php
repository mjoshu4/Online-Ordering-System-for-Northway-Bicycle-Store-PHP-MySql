<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
require_once 'db.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '290871505094851','7ec32b30be485fbd8d7c45288d284bbc' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://northwaybicyclestore.tk/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	  


    /* ---- header location after session ----*/


$fxploit =  $fbfullname; 
$fusername = explode(' ',trim($fxploit));



  $customer_id = $fbid;
  $customer_email = $femail;
  $customer_username =  $fusername[0] . $fbid;
  $customer_fullname = $fbfullname;



$query = "SELECT * from customer where customer_username = '$customer_username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$numrows = mysqli_num_rows($result);
$dbcustomer_id = $row['customer_id'];
$session_cart = $_SESSION['session_cart'];
$dbcustomer_username = $row['customer_username'];
$dbcustomer_fullname = $row['customer_fullname'];
$dbcustomer_status = $row['customer_status'];



if ($dbcustomer_status == "Enabled" || empty($dbcustomer_status)) {
if($numrows!=0)
{
    $_SESSION['customer_username']=$dbcustomer_username;
    $_SESSION['customer_fullname']=$dbcustomer_fullname;



        //if multiple login

        $query1 = "SELECT * from temp_cart where session_cart = '$dbcustomer_id'";
        $result1 = mysqli_query($conn,$query1);
         while($row1 = mysqli_fetch_assoc($result1))
          {  
            $query2 = "SELECT * from temp_cart where session_cart = '$session_cart'";
            $result2 = mysqli_query($conn,$query2);
            while($row2 = mysqli_fetch_assoc($result2)) 
            {
              $product_code1 = $row1['product_code'];
              $quantity1 = $row1['quantity'];
              $product_code2 = $row2['product_code'];
              $quantity2 = $row2['quantity'];

              if($product_code1 == $product_code2)
              {
                $total = $quantity1 + $quantity2;
                $query = "SELECT * from inventory where product_code = '$product_code1'";
                 $result = mysqli_query($conn,$query);
                 $row = mysqli_fetch_assoc($result);
                 $stock = $row['stock'];

                 if($total <= $stock)
                 {
                     $query = "UPDATE temp_cart set quantity ='$total'
                      WHERE session_cart ='$dbcustomer_id' and product_code ='$product_code1'";
                      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                      $query = "DELETE from temp_cart WHERE session_cart ='$session_cart'and product_code ='$product_code2'";
                      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 }
                 else
                 {
                    $query = "DELETE from temp_cart WHERE session_cart ='$session_cart'and product_code ='$product_code2'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    echo '<script>alert("Some product quantity has been changed.");</script>';
                 }
              }
            }
          }

         
          $query = "UPDATE temp_cart set session_cart ='$dbcustomer_id'
          WHERE session_cart ='$session_cart'";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
          $_SESSION['session_cart'] = $dbcustomer_id;

          //if multiple login





    echo '<script>window.location.replace("home.php")</script>';
}
else
{
    
        $query = 'INSERT into customer (customer_email,customer_username,customer_fullname,customer_password,customer_contact_number,customer_address,customer_shipping_address,customer_status,customer_verification_code,recipient_name,recipient_address,recipient_contact_number) values ("'.$customer_email.'", "'.$customer_username.'", "'.$customer_fullname.'","","","","","Enabled","","","","")';
           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
          $_SESSION['customer_username']=$customer_username;
          $_SESSION['customer_fullname']=$customer_fullname;
           echo '<script>window.location.replace("home.php")</script>';
}
}
else
{
      echo "<script>alert('Your account is disabled. If you think this is mistake please contact us.')</script>";
      echo '<script>window.location.replace("login.php")</script>';
}





}
 else 
 {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>