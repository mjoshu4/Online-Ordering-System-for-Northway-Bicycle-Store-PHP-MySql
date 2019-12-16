<?php session_start(); //session start for user visitor cart ?> 
<?php include 'db.php'; //database
require 'nwbs/phpmailer/PHPMailerAutoload.php';



 ?>


<?php



 //server side validation
  function input_($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
//server side validation
}



if(empty($_SESSION['session_cart']) && empty($_SESSION['errlogin']))  // global access and used to payout
{
  $session_cart = $_SESSION['session_cart'] = md5(microtime().rand()); //create session cart user random
  $session_errno = $_SESSION['errno'] = "notlogin";                    // session cart error notlogin
}

else
{
$session_cart = $_SESSION['session_cart']; //login success!
$session_errno =  $_SESSION['errno'];
}








//add to cart function home.php
if(isset($_POST['action'])){
    if($_POST['action'] == "add")
    {
        $product_code = input_($_POST['product_code']); //get product code to url and use to where clause
        $query = "SELECT * from temp_cart where product_code = '$product_code' and session_cart = '$session_cart'"; // select data
        $result = mysqli_query($conn,$query); //result
        $numrows = mysqli_num_rows($result); //count row

        //updating cart product
        if($numrows!=0) // if not 0 result found means product is existing
        {
             $query = "SELECT * from temp_cart where product_code = '$product_code' and session_cart = '$session_cart'";
             $result = mysqli_query($conn,$query);
             $row = mysqli_fetch_assoc($result);
             $quantity = $row['quantity'];
             $quantity = $quantity + 1; //add plus one to cart update

             $query = "SELECT * from inventory where product_code = '$product_code'";
             $result = mysqli_query($conn,$query);
             $row = mysqli_fetch_assoc($result);
             $stock = $row['stock']; //determine current stock

             if($quantity <= $stock)
             {
                 $query = "UPDATE temp_cart set quantity = $quantity where product_code = '$product_code'";
                 $result = mysqli_query($conn,$query); //update stock if stock is sufficient
             }
             else
             {
                echo $quantity-$stock;
                //echo '<script>alert("Out of Stock");</script>'; //out of stock alert. no transact happen
             }
         }
         //updating cart product

         //if new product added to cart
        else
        {
             $query = "SELECT * from inventory where product_code = '$product_code'";
             $result = mysqli_query($conn,$query);
             $row = mysqli_fetch_assoc($result);
             $stock = $row['stock']; //for validation also if inventory out of stock or equal to 0

                if($stock > 0) // !=0
             {
                $query = "INSERT into temp_cart (product_code,quantity,session_cart,payment_method) values ('$product_code',1,'$session_cart','')";
                 $result = mysqli_query($conn,$query);
             }
             else
             {
                  //echo '<script>alert("Out of Stock!");</script>';
             }
        }
        //if new product added to cart

        //echo '<script>history.back()</script>'; //after all transaction window history back to return cart

      }
    }
    //add to cart function home.php


















//recover function login.php
if (isset($_POST['submitrecover']) && !empty($_POST['customer_email'])) {

          $customer_email = input_($_POST['customer_email']);
      
          mysqli_real_escape_string($conn, $customer_email);

          $query = "SELECT * from customer where customer_email = '$customer_email' and customer_password !=''";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*valid email exist */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbcustomer_email = $row['customer_email'];
    $customer_username = $row['customer_username'];
    $customer_oldpass = $row['customer_password'];
  }
  
    if($customer_email==$dbcustomer_email)
  {

    $customer_verification_code = rand(99999,10000);
     $query = "UPDATE customer set customer_verification_code ='$customer_verification_code'
           WHERE
          customer_email ='$customer_email' and customer_password !=''";
       mysqli_query($conn,$query) or die(mysqli_error($conn));
       


        

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'concepcionjoshua90@gmail.com';
        $mail->Password = 'hokageteama21';

        $mail->setFrom('noreply@northway.com', 'North Way Bicycle Store');
        $mail->addAddress($customer_email);
        $mail->Subject = 'Reset your password';
        $mail->Body = '<p>Hello '.$customer_username.',<br/><br/>A password reset request was sent for your account from IP address '.$_SERVER['REMOTE_ADDR'].'.<br/>
        If you did not request a password reset you can safely ignore this message.<br/><br/>To define your new password, please use the following code:<br/><br/><b>'.$customer_verification_code.'</b><br/><br/>Best Regards Joshua!<br/>System Developer.</p>';
        $mail->isHTML(true);


        if ($mail->send()) //for online
        {
          $_SESSION['customer_email'] = $customer_email;
          $_SESSION['customer_username'] = $customer_username;
          echo '<script>alert("Success! Please Check your email account for resetting password...");</script>';
          echo '<script>window.location.replace("recover.php")</script>';
        }
  }

  /*valid email exist */


}
else
{
   echo '<script>alert("Email not found...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
}
}
//recover function login.php
















//submit login customer function login.php
if (isset($_POST['submitlogin']) && !empty($_POST['customer_username']) && !empty($_POST['customer_password']) ) {




$customer_username = input_($_POST['customer_username']);
$customer_password = input_($_POST['customer_password']);

if ($customer_username && $customer_password)
{


mysqli_real_escape_string($conn, $customer_username); //escaping user and pw to malicious code
mysqli_real_escape_string($conn, $customer_password); //escaping user and pw to malicious code

$sql = "SELECT * from customer where customer_username = '$customer_username'";
$result = mysqli_query($conn, $sql);


/*user not zero found */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbcustomer_id = $row['customer_id'];
    //$session_cart = $_SESSION['session_cart'];
    $dbcustomer_username = $row['customer_username'];
    $dbcustomer_password = $row['customer_password'];
    $dbcustomer_fullname = $row['customer_fullname'];
    $dbcustomer_status = $row['customer_status'];
  }
  

  
  
    if($customer_username==$dbcustomer_username && base64_encode($customer_password) == $dbcustomer_password) //ifcorrect pass
  {
    if ($dbcustomer_status == "Enabled") { //verify if enabled
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
      echo "<script>alert('Your account is disabled. If you think this is mistake please contact us.')</script>"; //disabled pop up
      echo '<script>window.location.replace("login.php")</script>';
  }
}


else
  {
    $session_errno = $_SESSION['errno'] = 'incorrectpass'; //show message error pop up
    echo '<script>window.location.replace("login.php")</script>';
  }


  
}
  
  //check to see if they match!


else
{
  $session_errno = $_SESSION['errno'] = 'notexist';
  echo '<script>window.location.replace("login.php")</script>';
}
//echo $numrows;

}

}
//submit login customer function login.php















//submit register customer function register.php
if(isset($_POST['submitregister']) && !empty($_POST['customer_email']) && !empty($_POST['customer_username']) && !empty($_POST['customer_fullname']) && !empty($_POST['customer_password']) && !empty($_POST['customer_contact_number']) && !empty($_POST['customer_address']) && !empty($_POST['customer_shipping_address']) && !empty($_POST['customer_password2']) )
{
  $customer_email = input_($_POST['customer_email']);
  $customer_username = input_($_POST['customer_username']);
  $customer_fullname = input_($_POST['customer_fullname']);
  $customer_password = input_($_POST['customer_password']);
  $customer_contact_number = input_($_POST['customer_contact_number']);
  $customer_address = input_($_POST['customer_address']);
  $customer_shipping_address = input_($_POST['customer_shipping_address']); //gather all data
  $customer_password2 = input_($_POST['customer_password2']);

  $query = "SELECT * from customer where customer_email = '$customer_email'"; //check customer if already exist set condition for this
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $dbcustomer_email = $row['customer_email'];


  if($dbcustomer_email==$customer_email) //condition
  {
    echo "<script>alert('Email Already Exist...');</script>";
    echo '<script>history.back(-2);</script>';
  }
  else //not exist
  {
    $query = "SELECT * from customer where customer_username ='$customer_username'";
     $result = mysqli_query($conn,$query);
      $row = mysqli_fetch_assoc($result);
      $dbcustomer_username = $row['customer_username'];
      if($dbcustomer_username == $customer_username)
      {
          echo "<script>alert('Username is already Exist...');</script>";
          echo '<script>history.back();</script>';
      }
      else
      {
        if($customer_password == $customer_password2) //password match
        {
          $query = 'INSERT into customer (customer_email,customer_username,customer_fullname,customer_password,customer_contact_number,customer_address,customer_shipping_address,customer_status,customer_verification_code) values ("'.$customer_email.'", "'.$customer_username.'", "'.$customer_fullname.'", "'.base64_encode($customer_password).'", "'.$customer_contact_number.'", "'.$customer_address.'", "'.$customer_shipping_address.'","Enabled","")';
           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
           echo "<script>alert('Registration Successful...');</script>";
           echo '<script>window.location.replace("login.php")</script>';
        }
        else // not match
        {
          echo "<script>alert('Password not Match...');</script>";
          echo '<script>history.back(-2);</script>';
        }
      }
  }
}
//submit register customer function register.php













//contact customer function contact.php
if (isset($_POST['contact']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message']) ) {

          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $message = $_POST['message'];
      

        

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'concepcionjoshua90@gmail.com';
        $mail->Password = 'hokageteama21';

        $mail->setFrom($email, 'Customer');
        $mail->addAddress('taeyangsolar8@gmail.com');
        $mail->Subject = 'New Inquiries!';
        $mail->Body = '<p>Name: '.$name.'<br/>Email: '.$email.'<br/>Phone: '.$phone.'<br/>Message: '.$message.'</p>';
        $mail->isHTML(true);


        if ($mail->send())
        {
            echo "<script>alert('Thanks for your feedback');</script>";
            echo '<script>window.location.replace("contact.php")</script>';
        }


}
//contact customer function contact.php











//update customer quantity function viewcart.php
if(isset($_POST['action'])){
    if ($_POST['action'] == "update" && $_POST['quantity'] > 0 ) {


          $product_code = input_($_POST['product_code']); //product code 
          $quantity = input_($_POST['quantity']);
          
          $query = "SELECT * from inventory where product_code = '$product_code'";
             $result = mysqli_query($conn,$query);
             $row = mysqli_fetch_assoc($result);
             $stock = $row['stock'];

                 if($quantity <= $stock)
             {
                  $query = 'UPDATE temp_cart set quantity ="'.$quantity.'"
               WHERE
                  product_code ="'.$product_code.'" and session_cart  ="'.$session_cart.'"';
               mysqli_query($conn,$query) or die(mysqli_error($conn));
                echo "a"; // for true
             }
             else
             {
               // echo '<script>alert("Out of Stock");</script>';
               // echo '<script>window.location.replace("viewcart.php")</script>';
             }
        }
    }
//update customer quantity function viewcart.php











//clear cart customer quantity function viewcart.php
if (isset($_POST['clearcart'])) {

        $query = "delete from temp_cart where session_cart='$session_cart'";
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("viewcart.php")</script>';
}
//clear cart customer quantity function viewcart.php










//delete cart customer quantity function viewcart.php
if (isset($_POST['submitdeletecart']) && !empty($_POST['product_code'])) {

        $product_code = input_($_POST['product_code']);
        $query = 'delete from temp_cart where product_code = "'.$product_code.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("viewcart.php")</script>';
}
//delete cart customer quantity function viewcart.php









//select payment cart customer quantity function viewcart.php
if(isset($_POST['select_payment']) && !empty($_POST['payment_method']))
{
        $payment_method = input_($_POST['payment_method']);
         $query = 'UPDATE temp_cart set payment_method ="'.$payment_method.'"
           WHERE
          session_cart ="'.$session_cart.'"';
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
           echo '<script>window.location.replace("checkout.php")</script>';
}
//select payment cart customer quantity function viewcart.php







//submit reset pass customer function recover.php
 if (isset($_POST['submitreset']) && !empty($_POST['customer_verification_code']) ) {



        $customer_email = $_SESSION['customer_email'];
        $query = "SELECT * from customer where customer_email = '$customer_email' and customer_password !=''";
        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);

        $dbcustomer_verification_code = $row['customer_verification_code'];
          
        $customer_verification_code = input_($_POST['customer_verification_code']);

       
        if($customer_verification_code == $dbcustomer_verification_code)
        {
          $_SESSION['customer_success'] = $customer_verification_code;
          echo '<script>window.location.replace("recovered.php")</script>';
        }
        else
        {
          echo '<script>alert("Invalid Code... Please Check Your Email.");</script>';
          echo '<script>window.location.replace("recover.php")</script>';
        }
        

 }
//submit reset pass customer function recover.php











//submit resend code pass customer function recover.php
    if (isset($_GET['resend'])) {

          $customer_email = $_SESSION["customer_email"];
          
          mysqli_real_escape_string($conn, $customer_email);

          $query = "SELECT * from customer where customer_email = '$customer_email' and customer_password !=''";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));



          $customer_verification_code = rand(99999,10000);
          $query = "UPDATE customer set customer_verification_code ='$customer_verification_code'
           WHERE
          customer_email ='$customer_email' and customer_password !=''";
           mysqli_query($conn,$query) or die(mysqli_error($conn));
       


        

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'concepcionjoshua90@gmail.com';
        $mail->Password = 'hokageteama21';

        $mail->setFrom('noreply@northway.com', 'North Way Bicycle Store');
        $mail->addAddress($customer_email);
        $mail->Subject = 'Reset your password';
        $mail->Body = '<p>Hello '.$_SESSION['customer_username'].',<br/><br/>A password reset request was sent for your account from IP address '.$_SERVER['REMOTE_ADDR'].'.<br/>
        If you did not request a password reset you can safely ignore this message.<br/><br/>To define your new password, please use the following code:<br/><br/><b>'.$customer_verification_code.'</b><br/><br/>Best Regards Joshua!<br/>System Developer.</p>';
        $mail->isHTML(true);


        if ($mail->send())
          echo '<script>alert("Success! Please Check your email account for resetting password...");</script>';
          echo '<script>window.location.replace("recover.php")</script>';

}
//submit resend code pass customer function recover.php









//submit recovered pass customer function recovered.php
if (isset($_POST['submitrecovered']) && !empty($_POST['customer_npassword']) && !empty($_POST['customer_cnpassword']) ) {

$customer_email = $_SESSION['customer_email'];



$customer_npassword = input_($_POST['customer_npassword']);
$customer_cnpassword = input_($_POST['customer_cnpassword']);


mysqli_real_escape_string($conn, $customer_npassword);
mysqli_real_escape_string($conn, $customer_cnpassword);

$query = "SELECT * from customer where customer_email = '$customer_email' and customer_password !=''";
$result = mysqli_query($conn, $query);


/*user */

     
          if($customer_npassword == $customer_cnpassword)
     {    
          $customer_npassword = base64_encode($customer_npassword);
          $query = "UPDATE customer set customer_password ='$customer_npassword', customer_verification_code = ''
           WHERE
          customer_email ='$customer_email' and customer_password !=''";
         mysqli_query($conn,$query) or die(mysqli_error($conn));
       // remove all session variables
          //session_unset(); 
          // destroy the session 
          //session_destroy(); 

                 foreach($_SESSION as $key => $val)
        {

            if ($key !== 'session_cart' && $key !== 'username' && $key !== 'first_name' && $key !== 'last_name' && $key !== 'user_type' && $key !== 'manages' && $key !== 'reports' && $key !== 'order_list' && $key !== 'errno' )
            {

              unset($_SESSION[$key]);

            }

        }
         
          echo "<script>alert('Successful! You may now able to login ...')</script>";
           echo '<script>window.location.replace("login.php")</script>';

     
     }
     
     else
     {
          echo "<script>alert('Password not Match!')</script>";
          echo '<script>window.location.replace("recovered.php")</script>';
     }
    

}
//submit recovered pass customer function recovered.php














//submit change shipping address checkout.php
if(isset($_POST['submitchangeshippingaddress']) && !empty($_POST['house']) && !empty($_POST['province']) && !empty($_POST['city']))
{

   
  $customer_username = $_SESSION['customer_username'];
  $customer_shipping_address = input_($_POST['house']) . " " . input_($_POST['province']) . " " . input_($_POST['city']) ;

   $query = 'UPDATE customer set customer_shipping_address ="'.$customer_shipping_address.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
}
//submit change shipping address checkout.php











//submit change email checkout.php
if(isset($_POST['submitchangeemail']) && !empty($_POST['customer_email']) )
{

   
  $customer_username = $_SESSION['customer_username'];
  $customer_email = input_($_POST['customer_email']) ;

    $query = "SELECT * from customer where customer_email = '$customer_email'"; //check customer if already exist set condition for this
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $dbcustomer_email = $row['customer_email'];


  if($dbcustomer_email==$customer_email) //condition
  {
     echo "<script>alert('Email Already Exist...');</script>";
    echo '<script>history.back(-2);</script>';
  }
  else
  {
    $query = 'UPDATE customer set customer_email ="'.$customer_email.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
  }
}
//submit change email checkout.php 









//submit change contact checkout.php
if(isset($_POST['submitchangecontact']) && !empty($_POST['customer_contact_number']) )
{

   
  $customer_username = $_SESSION['customer_username'];
  $customer_contact_number = input_($_POST['customer_contact_number']) ;

   $query = 'UPDATE customer set customer_contact_number ="'.$customer_contact_number.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
}
//submit change contact checkout.php




















//submit change recipient name checkout.php
if(isset($_POST['submitchangerecipientname']) && !empty($_POST['recipient_name']) )
{

   
  $customer_username = $_SESSION['customer_username'];
  $recipient_name = input_($_POST['recipient_name']) ;

   $query = 'UPDATE customer set recipient_name ="'.$recipient_name.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
}
//submit change recipient name checkout.php








//submit change recipient shipping address checkout.php
if(isset($_POST['submitchangerecipientaddress']) && !empty($_POST['house']) && !empty($_POST['province']) && !empty($_POST['city']))
{

   
  $customer_username = $_SESSION['customer_username'];
  $recipient_address = input_($_POST['house']) . " " . input_($_POST['province']) . " " . input_($_POST['city']) ;

   $query = 'UPDATE customer set recipient_address ="'.$recipient_address.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
}
//submit change recipient shipping address checkout.php












//submit change recipient contact checkout.php
if(isset($_POST['submitchangerecipientcontactnumber']) && !empty($_POST['recipient_contact_number']) )
{

   
  $customer_username = $_SESSION['customer_username'];
  $recipient_contact_number = input_($_POST['recipient_contact_number']) ;

   $query = 'UPDATE customer set recipient_contact_number ="'.$recipient_contact_number.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
}
//submit change recipient contact checkout.php























/* RECIPIENTRECIPIENTRECIPIENTRECIPIENTRECIPIENT
















//submit change recipient email checkout.php
if(isset($_POST['submitchangerecipientemail']) && !empty($_POST['recipient_email']) )
{

   
  $customer_username = $_SESSION['customer_username'];
  $recipient_email = input_($_POST['recipient_email']) ;

    $query = "SELECT * from customer where recipient_email = '$recipient_email'"; //check customer if already exist set condition for this
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $dbrecipient_email = $row['recipient_email'];


  if($dbrecipient_email==$recipient_email) //condition
  {
     echo "<script>alert('Email Already Exist...');</script>";
    echo '<script>history.back(-2);</script>';
  }
  else
  {
    $query = 'UPDATE customer set recipient_email ="'.$recipient_email.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';
  }
}
//submit change recipient email checkout.php






RECIPIENTRECIPIENTRECIPIENTRECIPIENTRECIPIENTRECIPIENTRECIPIENTRECIPIENT*/



















//submit change shipping details checkout.php
if(isset($_POST['submitchangeshippingdetails']) && !empty($_POST['house']) && !empty($_POST['province']) && !empty($_POST['city']) && !empty($_POST['customer_email']) && !empty($_POST['customer_contact_number']) )
{

   
  $customer_username = $_SESSION['customer_username'];
  $customer_shipping_address = input_($_POST['house']) . " " . input_($_POST['province']) . " " . input_($_POST['city']) ;
  $customer_email = input_($_POST['customer_email']);
  $customer_contact_number = input_($_POST['customer_contact_number']);



  $query = "SELECT * from customer where customer_email = '$customer_email'"; //check customer if already exist set condition for this
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $dbcustomer_email = $row['customer_email'];


  if($dbcustomer_email==$customer_email) //condition
  {
     echo "<script>alert('Email Already Exist...');</script>";
    echo '<script>history.back(-2);</script>';
  }
  else
  {

   $query = 'UPDATE customer set customer_shipping_address ="'.$customer_shipping_address.'", customer_email ="'.$customer_email.'", customer_contact_number ="'.$customer_contact_number.'"
           WHERE
          customer_username ="'.$customer_username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
         echo '<script>window.location.replace("checkout.php")</script>';

  }


}
//submit change shipping details checkout.php














//submit change place order cod checkout.php
if(isset($_POST['place_order_cod']))
{         


                 $query = "select * from temp_cart where session_cart= '$session_cart' and payment_method is not null";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 $row = mysqli_fetch_assoc($result);
                 $payment_method = $row['payment_method'];  //payment method global access also

                 
                if($payment_method !='cod' && $payment_method !='Paypal' && $payment_method !='Dragonpay' && $payment_method !='visa')
                {
                  echo '<script>window.location.replace("viewcart.php")</script>'; //validation for something error
                }
                else
                {

                  $customer_username = $_SESSION['customer_username'];
                  $query = "SELECT * from customer where customer_username ='$customer_username'";
                  $result = mysqli_query($conn,$query);
                  $row = mysqli_fetch_assoc($result);
                  $recipient_name = $row['recipient_name'];
                  $recipient_address = $row['recipient_address'];
                  $recipient_contact_number = $row['recipient_contact_number'];
                if(isset($_POST['addrecipient']) && $recipient_name!="" && $recipient_address!="" && $recipient_contact_number!="" || !isset($_POST['addrecipient'])){
                  $customer_shipping_address = $row['customer_shipping_address']; //get customer shipping address via username session
                  $customer_email = $row['customer_email'];
                  $customer_id = $row['customer_id'];


                  $query = "select * from customer_order order by customer_order_id DESC limit 1";
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                  $row = mysqli_fetch_array($result);
                  $order_number = $row['order_number']+1; //for where clause

                  $customer_username = $_SESSION['customer_username'];
                  $customer_order_date = date("Y-m-d");
                  #customer_shipping address sa taas
                 $query = "INSERT INTO customer_order (order_number,product_code,customer_quantity,customer_session_cart,customer_payment_method,customer_order_status,customer_order_date,customer_shipping_address) SELECT '$order_number',product_code,quantity,session_cart,payment_method,'','$customer_order_date','' FROM temp_cart WHERE session_cart ='$session_cart' and payment_method = '$payment_method'";
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); //insert to the list of customer order then (not completed all info)


                  $_SESSION['orderplaced'] = "<h2><center><br><br><br>Your order has been placed successfully.<br><br> <p style='color:green;'>Your Order#".$order_number."</p></center></h2>"; //session order placed text.



              if(isset($_POST['addrecipient']) && $recipient_name !="" && $recipient_contact_number !="" ){
                  $query = "UPDATE customer_order set customer_session_cart ='$customer_id' , customer_order_date ='$customer_order_date' , customer_shipping_address ='$recipient_address'
                  WHERE order_number = '$order_number'"; //update some info of customer order list via id
                }else{
                   $query = "UPDATE customer_order set customer_session_cart ='$customer_id' , customer_order_date ='$customer_order_date' , customer_shipping_address ='$customer_shipping_address'
                  WHERE order_number = '$order_number'"; //update some info of customer order list via id
                }



                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));









                  //email place order
                            $output = "<p>Hello $customer_username <br/><br/>


                        Your order #$order_number has been received and is going through approval process. Thanks!.
                        <br/><br/>





                        <table border='1' cellpadding='10'>
                          <tr>
                            <th align='left'>Name</th>
                            <th align='left'>Quantity</th>
                            <th align='left'>Amount</th>
                          </tr>";
                  

                    $query = "SELECT * from temp_cart natural join product where session_cart ='$session_cart'"; //email order
                                    $result = mysqli_query($conn, $query);
                                    $total = 0;
                                    while($row = mysqli_fetch_assoc($result)){
                                      $product_name = $row['product_name'];
                                      $quantity = $row['quantity'];
                                      $product_price = $row['product_price'];
                                      $product_discount = $row['product_discount'];
                                      if($product_discount>0){
                                                $product_price = $product_price-($product_discount / 100) * $product_price;
                                                $total +=$quantity * $product_price;
                                                $product_price = number_format($product_price,2).' -'.$product_discount.'%';
                                              }else{
                                                $total +=$quantity * $product_price;
                                                 $product_price = number_format($product_price,2);
                                              }
                                    
                                    
                  $output.="
                    <tr>
                      <td>$product_name</td>
                      <td>$quantity</td>
                      <td>$product_price</td>
                    </tr>";
                   } 



                  $query = "SELECT * from customer where customer_username ='$customer_username'";
                  $result = mysqli_query($conn,$query);
                  $row = mysqli_fetch_assoc($result);
                  $customer_shipping_address = $row['customer_shipping_address'];
                  include 'fee.php';


                  $output.="
                  <tr>
                    <td></td>
                    <td>Total</td>
                    <td>".number_format($total+$shipping_fee,2)."</td>
                  </tr>
                  </table>
                  <br/>Best Regards,<br/>Northway Bicyclestore.</p>
                  ";




                  $mail = new PHPMailer();

                  $mail->isSMTP();
                  $mail->Host = "smtp.gmail.com";
                  $mail->SMTPSecure = "ssl";
                  $mail->Port = 465;
                  $mail->SMTPAuth = true;
                  $mail->Username = 'concepcionjoshua90@gmail.com';
                  $mail->Password = 'hokageteama21';

                  $mail->setFrom('noreply@northway.com', 'North Way Bicycle Store');
                  $mail->addAddress($customer_email);
                  $mail->Subject = 'Your Order @Northway Bicycle Store';
                  $mail->Body = $output ;
                  $mail->isHTML(true);
                  $mail->send();
                   //email place order












      




                  $query = "DELETE from temp_cart where session_cart ='$session_cart' and payment_method = '$payment_method'";
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); // delete temp cart after to transfer data to customer order


                  $query = "select * from customer where customer_username = '$customer_username'";
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                  $row = mysqli_fetch_array($result);
                  $customer_contact_number = $row['customer_contact_number']; //retrieve cp number of customer
                  

                   $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
                   $phone = $customer_contact_number; // Phone number
                   $msg = "NORTHWAY - Your order #".$order_number." has been received and is going through approval process. Thanks!."; 
                   $device = '118899';  //  Device code
                   $token = '5f4ffcf4ecaeef98560ac439e72e7ebb';  //  Your token (secret)

                   $data = array(
                          "phone" => $phone,
                          "msg" => $msg,
                          "device" => $device,
                          "token" => $token
                      );

                      $curl = curl_init($url);
                      curl_setopt($curl, CURLOPT_POST, true);
                      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                      curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
                      $output = curl_exec($curl);
                      curl_close($curl); 






                      //FOR RECIPIENT
                      if(isset($_POST['addrecipient']) && $recipient_name !="" && $recipient_contact_number !="" ){
                         $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
                         $phone = $recipient_contact_number; // Phone number
                         $msg = "NORTHWAY - Order #".$order_number." has been received to ".$recipient_name." from ".$customer_username." and is going through approval process. Thanks!.";  // Message
                         $device = '118899';  //  Device code
                         $token = '5f4ffcf4ecaeef98560ac439e72e7ebb';  //  Your token (secret)

                         $data = array(
                                "phone" => $phone,
                                "msg" => $msg,
                                "device" => $device,
                                "token" => $token
                            );

                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_POST, true);
                            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
                            $output = curl_exec($curl);
                            curl_close($curl); 
                      }
                    //FOR RECIPIENT

                 


             echo '<script>window.location.replace("order_placed.php")</script>';
           }else{ //for recipient
              echo '<script>alert("Please complete recipient info.")</script>';
              echo '<script>window.location.replace("checkout.php")</script>';
           }
       }


}
//submit change place order cod checkout.php






//submit change some info account of user user.php
if (isset($_POST['submitcustomeruser']) && !empty($_POST['customer_id']) && !empty($_POST['newcustomer_fullname']) && !empty($_POST['newcustomer_username']) && !empty($_POST['newcustomer_contact_number']) && !empty($_POST['newcustomer_address']) && !empty($_POST['newcustomer_shipping_address']) ) {




      $customer_id = input_($_POST['customer_id']);
      $customer_password = input_($_POST['customer_password']);

      $customer_fullname= input_($_POST['newcustomer_fullname']);
      $newcustomer_username= input_($_POST['newcustomer_username']);
      $newcustomer_username_duplicate= input_($_POST['newcustomer_username_duplicate']);
      $newcustomer_email= input_($_POST['newcustomer_email']);
      $newcustomer_email_duplicate= input_($_POST['newcustomer_email_duplicate']);



//for google and facebook
      if(empty($_POST['newcustomer_password']))
    {
     $newcustomer_password = "";
    }
    else
    {
      $newcustomer_password= input_(base64_encode($_POST['newcustomer_password']));
    }
//for google and facebook


      $newcustomer_contact_number= input_($_POST['newcustomer_contact_number']);
      $newcustomer_address= input_($_POST['newcustomer_address']);
      $newcustomer_shipping_address= input_($_POST['newcustomer_shipping_address']);


//for google and facebook
      if(empty($_POST['customer_verifynewpassword']))
    {
     $customer_verifynewpassword = "";
    }
    else
    {
      $customer_verifynewpassword= input_(base64_encode($_POST['customer_verifynewpassword']));
    }


    if(empty($_POST['customer_currentpassword']))
    {
     $customer_currentpassword = "";
    }
    else
    {
      $customer_currentpassword = input_(base64_encode($_POST['customer_currentpassword']));
    }
//for google and facebook





      $query = "SELECT * from customer where not customer_username = '$newcustomer_username_duplicate'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


       /*user while edit exist */
      while ($row = mysqli_fetch_assoc($result))
      {
            $dbcustomer_username = $row['customer_username'];

             if($newcustomer_username==$dbcustomer_username)
          {
            $dbcustomer_username = $row['customer_username'];
              break; //breaking the earth
          }
          else
          {
            $dbcustomer_username = "NoResult";
          }
      }
      /*user while edit exist */








      $query = "SELECT * from customer where not customer_email = '$newcustomer_email_duplicate'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


       /*email while edit exist */
      while ($row = mysqli_fetch_assoc($result))
      {
            $dbcustomer_email = $row['customer_email'];

             if($newcustomer_email==$dbcustomer_email)
          {
            $dbcustomer_email = $row['customer_email'];
              break; //breaking the earth
          }
          else
          {
            $dbcustomer_email= "NoResult";
          }
      }
      /*email while edit exist */













      if ($newcustomer_username!=$dbcustomer_username) 
      {   

        if($newcustomer_email!=$dbcustomer_email)
        {

              if (empty($newcustomer_password) && empty($customer_verifynewpassword) && empty($customer_currentpassword)) 
               {
                  $query = 'UPDATE customer set customer_fullname ="'.$customer_fullname.'" , customer_username ="'.$newcustomer_username.'" , customer_contact_number ="'.$newcustomer_contact_number.'" , customer_address ="'.$newcustomer_address.'" , customer_shipping_address ="'.$newcustomer_shipping_address.'" WHERE customer_id ="'.$customer_id.'"';
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                  echo '<script>alert("Successful!");</script>';
                  
                    foreach($_SESSION as $key => $val)
                      {
                          if ($key !== 'session_cart' && $key !== 'username' && $key !== 'first_name' && $key !== 'last_name' && $key !== 'user_type' && $key !== 'manages' && $key !== 'reports' && $key !== 'order_list' && $key !== 'errno')
                          {
                            unset($_SESSION[$key]);
                          }
                      }
                  echo '<script>window.location.replace("login.php")</script>';
               }//for google and facebook user change


               elseif (empty($newcustomer_password) && empty($customer_verifynewpassword) && $customer_currentpassword == $customer_password) 
               {
                  $query = 'UPDATE customer set customer_fullname ="'.$customer_fullname.'" ,customer_email ="'.$newcustomer_email.'", customer_username ="'.$newcustomer_username.'" , customer_contact_number ="'.$newcustomer_contact_number.'" , customer_address ="'.$newcustomer_address.'" , customer_shipping_address ="'.$newcustomer_shipping_address.'" WHERE customer_id ="'.$customer_id.'"';
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                  echo '<script>alert("Successful!");</script>';
                  
                    foreach($_SESSION as $key => $val)
                      {
                          if ($key !== 'session_cart' && $key !== 'username' && $key !== 'first_name' && $key !== 'last_name' && $key !== 'user_type' && $key !== 'manages' && $key !== 'reports' && $key !== 'order_list' && $key !== 'errno')
                          {
                            unset($_SESSION[$key]);
                          }
                      }
                  echo '<script>window.location.replace("login.php")</script>';
               }//for user who want not to change her password



              elseif ($newcustomer_password==$customer_verifynewpassword && $customer_currentpassword == $customer_password) 
              {  // verify kung tama lahat
                  $query = 'UPDATE customer set customer_fullname ="'.$customer_fullname.'", customer_email ="'.$newcustomer_email.'", customer_username ="'.$newcustomer_username.'", customer_password ="'.$newcustomer_password.'", customer_contact_number ="'.$newcustomer_contact_number.'" , customer_address ="'.$newcustomer_address.'" , customer_shipping_address ="'.$newcustomer_shipping_address.'" WHERE customer_id ="'.$customer_id.'"';
                  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                  echo '<script>alert("Successful!");</script>';


                  foreach($_SESSION as $key => $val)
                  {
                      if ($key !== 'session_cart' && $key !== 'username' && $key !== 'first_name' && $key !== 'last_name' && $key !== 'user_type' && $key !== 'manages' && $key !== 'reports' && $key !== 'order_list' && $key !== 'errno' )
                      {
                        unset($_SESSION[$key]);
                      }
                  }
                   echo '<script>window.location.replace("login.php")</script>';
                } //for user who want to change full info password

                elseif ($customer_currentpassword!=$customer_password) 
                { 
                  echo '<script>alert("Incorrect Current Password");</script>';
                  echo '<script>history.back();</script>';
                  
                }
                 else 
                { 
                  echo '<script>alert("Password not match!");</script>'; 
                   echo '<script>history.back();</script>';

                }
            }


           else
           {
                  echo '<script>alert("Email is already exist...");</script>';
                   echo '<script type="text/javascript">
                    window.history.back();
                    </script>';
           }
      }
      else
      {
        echo '<script>alert("Username is already exist...");</script>';
                 echo '<script type="text/javascript">
                  window.history.back();
                  </script>';
      }



}
//submit change some info account of user user.php












//followup vieworder.php
if(isset($_POST['followup']) && !empty($_POST['notification_username']) && !empty($_POST['notification_order_no']))
{

   
  $notification_username = $_POST['notification_username'];
  $notification_order_no = $_POST['notification_order_no'];

  $query = 'INSERT into notification (notification_message,notification_username,notification_order_no,notification_type,notification_read) values ("Follow up product","'.$notification_username.'", "'.$notification_order_no.'", "followup", "N")';
           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
           echo "<script>alert('Follow up successful! your order has been notified.');</script>";
           echo '<script>window.location.replace("vieworder.php")</script>';


}
//followup vieworder.php













//request return vieworder.php
if(isset($_POST['requestreturn']) && !empty($_POST['notification_username']) && !empty($_POST['notification_order_no']))
{

  $notification_message = $_POST['reason'];
  $notification_username = $_POST['notification_username'];
  $notification_order_no = $_POST['notification_order_no'];


  $notification_screenshot = rand().$_FILES['screenshot']['name'];
  $target_dir = "nwbs/upload/";
  $target_file = $target_dir . basename($_FILES["screenshot"]["name"]);




      // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
            // Insert record
                $query = 'INSERT into notification (notification_message,notification_screenshot,notification_username,notification_order_no,notification_type,notification_read) values ("'.$notification_message.'","'.$notification_screenshot.'","'.$notification_username.'", "'.$notification_order_no.'", "requestreturn", "N")';
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 echo "<script>alert('Request return successful! your request has been notified.');</script>";
                 echo '<script>window.location.replace("vieworder.php")</script>';
               // pag may image
            // Upload file
            move_uploaded_file($_FILES['screenshot']['tmp_name'],$target_dir.$notification_screenshot);
             }
             else
             {
                  $query = 'INSERT into notification (notification_message,notification_screenshot,notification_username,notification_order_no,notification_type,notification_read) values ("'.$notification_message.'","","'.$notification_username.'", "'.$notification_order_no.'", "requestreturn", "N")';
           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
           echo "<script>alert('Request return successful! your request has been notified.');</script>";
           echo '<script>window.location.replace("vieworder.php")</script>';
                 // pag walang image
             }
      // Check extension



 


}
//request return vieworder.php








?>