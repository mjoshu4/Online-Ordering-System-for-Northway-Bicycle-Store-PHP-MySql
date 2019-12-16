<?php session_start(); ?> 
<?php include '../db.php'; //database ?>


<?php


 //server side validation
  function input_($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
//server side validation
}








//submit edit account function account.php
if (isset($_POST['submiteditaccount']) && !empty($_POST['user_id']) && !empty($_POST['status']) ) {



$user_id = input_($_POST['user_id']);
$status = input_($_POST['status']);



$query = "SELECT first_name from user where user_id = '$user_id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$first_name = $row['first_name'];

date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has ".$status." account of ".$first_name."  in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');



  $query = 'UPDATE user set status ="'.$status.'"
           WHERE
          user_id ="'.$user_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("account.php")</script>';
}
//submit edit account function account.php











//submit add account function account.php
if (isset($_POST['submitaddaccount']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['email_add']) && !empty($_POST['password']) ) {


$first_name = input_($_POST['first_name']);
$last_name = input_($_POST['last_name']);
$username = input_($_POST['username']);


  $profile_picture = rand().$_FILES['profile_picture']['name'];
  $target_dir = "profilepic/";
  $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);


$email_add = input_($_POST['email_add']);
$password = base64_encode($_POST['password']);



$query = "SELECT * from user where username = '$username'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$dbusername = $row['username'];


$query1 = "SELECT * from user where email_add = '$email_add'";
$result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);
$dbemail_add = $row1['email_add'];


/*user exist */
   if($username==$dbusername && $email_add==$dbemail_add)
  {
    echo '<script>alert("Username and Email is not Available...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  }
  /*user exist */
  elseif($username==$dbusername)
  {
    echo '<script>alert("Username is not Available...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  }
   elseif($email_add==$dbemail_add)
  {
    echo '<script>alert("Email Address is not Available...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  }

/*email exist */

  
  /*email exist */







else
{


    if ($_SESSION['user_type'] != "Superuser") {


       if ($_SESSION['user_type'] != "Superuser" && !isset($_POST['manages'])  && !isset($_POST['reports']) && !isset($_POST['order_list'])) { //0
        echo '<script>alert("Please choose atleast one privileges...");</script>';
        echo '<script>history.back();</script>';
       }

       else
       {


               // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
            // Insert record
              $query = 'Insert into user (first_name,last_name,username,profile_picture,email_add,password,user_type,manages,reports,order_list,verify,status,verification_code) values ("'.$first_name.'", "'.$last_name.'", "'.$username.'", "'.$profile_picture.'", "'.$email_add.'", "'.$password.'", "Staff","1","1","1","1","Enabled","")';
               // pag may image
            // Upload file
            move_uploaded_file($_FILES['profile_picture']['tmp_name'],$target_dir.$profile_picture);
             }
             else
             {
                  $query = 'Insert into user (first_name,last_name,username,profile_picture,email_add,password,user_type,manages,reports,order_list,verify,status,verification_code) values ("'.$first_name.'", "'.$last_name.'", "'.$username.'","", "'.$email_add.'", "'.$password.'", "Staff","1","1","1","1","Enabled","")';
                 // pag walang image
             }
      // Check extension


           mysqli_query($conn,$query) or die(mysqli_error($conn));

        if(isset($_POST['manages']))
        {
           $query = 'UPDATE user set manages ="0"
               WHERE
              username ="'.$username.'"';
              mysqli_query($conn,$query) or die(mysqli_error($conn));
        }
        if(isset($_POST['reports']))
        {
          $query = 'UPDATE user set reports ="0"
               WHERE
              username ="'.$username.'"';
              mysqli_query($conn,$query) or die(mysqli_error($conn));
        }
        if(isset($_POST['order_list']))
        {
          $query = 'UPDATE user set order_list ="0"
               WHERE
              username ="'.$username.'"';
              mysqli_query($conn,$query) or die(mysqli_error($conn));
        }

           echo '<script>window.location.replace("account.php")</script>';
       }

     }


      if ($_SESSION['user_type'] == "Superuser")
       {



               // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
            // Insert record
              $query = 'Insert into user (first_name,last_name,username,profile_picture,email_add,password,user_type,manages,reports,order_list,verify,status,verification_code) values ("'.$first_name.'", "'.$last_name.'", "'.$username.'", "'.$profile_picture.'" , "'.$email_add.'", "'.$password.'", "Admin","0","0","0","1","Enabled","")';
               // pag may image
            // Upload file
            move_uploaded_file($_FILES['profile_picture']['tmp_name'],$target_dir.$profile_picture);
             }
             else
             {
                  $query = 'Insert into user (first_name,last_name,username,profile_picture,email_add,password,user_type,manages,reports,order_list,verify,status,verification_code) values ("'.$first_name.'", "'.$last_name.'", "'.$username.'" ,"", "'.$email_add.'", "'.$password.'", "Admin","0","0","0","1","Enabled","")';
                 // pag walang image
             }
      // Check extension


           mysqli_query($conn,$query) or die(mysqli_error($conn));
            echo '<script>window.location.replace("account.php")</script>';




        }

           date_default_timezone_set('Asia/Manila');
        $query = "INSERT INTO history (details, date_)
            VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has added a account of ".$username." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
                mysqli_query($conn,$query)or die ('Error in updating Database');
  }


}
//submit add account function account.php












//submit delete account function account.php
if (isset($_POST['submitdeleteaccount']) && !empty($_POST['user_id'])) {

$user_id = $_POST['user_id'];




$query = "SELECT first_name from user where user_id = '$user_id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$first_name = $row['first_name'];

date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has delete account of ".$first_name."  in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


  $query = 'delete from user where user_id = "'.$user_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("account.php")</script>';
}
//submit delete account function account.php








//submit edit category function category.php
if (isset($_POST['submiteditcategory']) && !empty($_POST['category_id']) && !empty($_POST['category_name']) && !empty($_POST['category_name_duplicate']) ) {


      $category_id = input_($_POST['category_id']);


      $category_name = input_($_POST['category_name']);
      $category_name_duplicate = input_($_POST['category_name_duplicate']);
      $category_img = rand().$_FILES['category_img']['name'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["category_img"]["name"]);

  

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");






      $query = "SELECT * from category where not category_name = '$category_name_duplicate'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*cat exist */


  while ($row = mysqli_fetch_assoc($result))
  {
        $dbcategory_name = $row['category_name'];

         if($category_name==$dbcategory_name)
      {
        $dbcategory_name = $row['category_name'];
          break; //breaking the earth false condition
      }
      else
      {
        $dbcategory_name = "NoResult";
      }
  }
  /*cat exist */

   
  if ($category_name!=$dbcategory_name) {


    // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
 
      // Insert record
      $query = 'UPDATE category set category_name ="'.$category_name.'", category_img ="'.$category_img.'"
           WHERE
          category_id ="'.$category_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
 
      // Upload file
      move_uploaded_file($_FILES['category_img']['tmp_name'],$target_dir.$category_img);
          echo '<script>window.location.replace("category.php")</script>';
 }
// Check extension

  $query = 'UPDATE category set category_name ="'.$category_name.'"
           WHERE
          category_id ="'.$category_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));




       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has edit a category of ".$category_name_duplicate." to ".$category_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


        echo '<script>window.location.replace("category.php")</script>';
  }


  else
  {
      echo '<script>alert("Category is already exist...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  } 


      
}
//submit edit category function category.php










//submit delete category function category.php
if (isset($_POST['submitdeletecategory']) && !empty($_POST['category_id']) ) {

        $category_id = $_POST['category_id'];




        $query = "SELECT category_name from category where category_id = '$category_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $category_name = $row['category_name'];



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has delete a category of ".$category_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


        $query = 'delete from category where category_id = "'.$category_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("category.php")</script>';
}
//submit delete category function category.php














//submit add category function category.php
if (isset($_POST['submitaddcategory']) && !empty($_POST['category_name']) )
{


      $category_name = input_($_POST['category_name']);
      $category_img = rand().$_FILES['category_img']['name'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["category_img"]["name"]);

  


$query = "SELECT * from category where category_name = '$category_name'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*cat exist */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbcategory_name = $row['category_name'];
  }
  
    if($category_name==$dbcategory_name)
  {
    echo '<script>alert("Category is already exist...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  }

  /*cat exist */
  
}

else
{

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");


      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
 
      // Insert record
        $query = 'Insert into category (category_name,category_img) values ("'.$category_name.'", "'.$category_img.'")';
        
 
      // Upload file
      move_uploaded_file($_FILES['category_img']['tmp_name'],$target_dir.$category_img);
       
 }
 else
 {
     $query = 'Insert into category (category_name) values ("'.$category_name.'")';
 }
// Check extension



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has add a new category ".$category_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');



      mysqli_query($conn,$query) or die(mysqli_error($conn));
      echo '<script>window.location.replace("category.php")</script>';
}

}
//submit add category function category.php














//submit edit customer_account function customer_account.php
if (isset($_POST['submiteditcustomer_account']) && !empty($_POST['customer_id']) && !empty($_POST['customer_status']) ) {


$customer_id = input_($_POST['customer_id']);
$customer_status = input_($_POST['customer_status']);



      $query = "SELECT customer_fullname from customer where customer_id = '$customer_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $customer_fullname = $row['customer_fullname'];



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has ".$status." account of ".$customer_fullname." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');



  $query = 'UPDATE customer set customer_status ="'.$customer_status.'"
           WHERE
          customer_id ="'.$customer_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("customer_account.php")</script>';
}
//submit edit customer_account function customer_account.php







//submit delete customer_account function customer_account.php
if (isset($_POST['submitdeletecustomer_account']) && !empty($_POST['customer_id']) ) {

$customer_id = $_POST['customer_id'];



  $query = "SELECT customer_fullname from customer where customer_id = '$customer_id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$customer_fullname = $row['customer_fullname'];

date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has delete account of ".$customer_fullname."  in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


  $query = 'delete from customer where customer_id = "'.$customer_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("customer_account.php")</script>';
}
//submit edit customer_account function customer_account.php










//submit new password function reset.php
if (isset($_POST['submitnewpass']) && !empty($_POST['npassword']) && !empty($_POST['cnpassword']) ) {

$username = $_SESSION['dbusername'];


$npassword = input_($_POST['npassword']);
$cnpassword = input_($_POST['cnpassword']);

if ($npassword && $cnpassword)
{


mysqli_real_escape_string($conn, $npassword);
mysqli_real_escape_string($conn, $cnpassword);

$query = "SELECT * from user where username = '$username'";
$result = mysqli_query($conn, $query);


/*user */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbverify = $row['verify'];
  }
  

  if ($dbverify == "1") {
  
    if($npassword == $cnpassword)
  {
    $query = 'UPDATE user set password ="'.base64_encode($npassword).'", verify ="0"
           WHERE
          username ="'.$username.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
       // remove all session variables
    session_unset(); 
    // destroy the session 
    session_destroy(); 
    echo "<script>alert('Successful! You may now able to login ...')</script>";
       echo '<script>window.location.replace("login.php")</script>';

  
  }
  
  else
  {
    echo "<script>alert('Password not Match!')</script>";
    echo '<script>window.location.replace("reset.php")</script>';
  }
}

}
  


}

}
//submit new password function reset.php











//submit login function login.php
if (isset($_POST['submitlogin']) && !empty($_POST['username']) && !empty($_POST['password']) ) {


$username = input_($_POST['username']);
$password = input_($_POST['password']);

if ($username && $password)
{

mysqli_real_escape_string($conn, $username);
mysqli_real_escape_string($conn, $password);

$sql = "SELECT * from user where username = '$username'";
$result = mysqli_query($conn, $sql);


/*user */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbusername = $row['username'];
    $dbpassword = $row['password'];
    $dbfirst_name = $row['first_name'];
    $dblast_name = $row['last_name'];
    $dbuser_type = $row['user_type'];
    $dbmanages = $row['manages'];
    $dbreports = $row['reports'];
    $dborder_list = $row['order_list'];
    $dbverify = $row['verify'];
    $dbstatus = $row['status'];
  }
  

  
  
    if($username==$dbusername && base64_encode($password) == $dbpassword)
  {
    if ($dbverify == "0") {

    if ($dbstatus == "Enabled") {
    $_SESSION['username']=$dbusername;
    $_SESSION['first_name']=$dbfirst_name;
    $_SESSION['last_name']=$dblast_name;
    $_SESSION['user_type']=$dbuser_type;
    $_SESSION['manages']=$dbmanages;
    $_SESSION['reports']=$dbreports;
    $_SESSION['order_list']=$dborder_list;
    echo '<script>window.location.replace("dashboard.php")</script>';

    date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has Login in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');
        }

        else
        {
          echo "<script>alert('Your Account is Disabled Please Contact Developer.')</script>";
      echo '<script>window.location.replace("login.php")</script>';
        }
        
  }
  
    else
{   $_SESSION['dbusername']=$dbusername;
    echo "<script>alert('Welcome user! I think you are new account to operate this system. Please set your own Password first before you start...')</script>";
    echo '<script>window.location.replace("reset.php")</script>';
}

}


else
  {
    echo "<script>alert('Incorrect Username or Password!')</script>";
    echo '<script>window.location.replace("login.php")</script>';
  }



  
}
  
  //check to see if they match!


else
{
  echo "<script>alert('That user does not exist!')</script>";
  echo '<script>window.location.replace("login.php")</script>';
}
//echo $numrows;

}

}
//submit login function login.php










//submit recover function login.php
        if (isset($_POST['submitrecover']) && !empty($_POST['email_add'])) {

          $email_add = $_POST['email_add'];
          mysqli_real_escape_string($conn, $email_add);

          $query = "SELECT * from user where email_add = '$email_add'";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*valid email exist */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbemail_add = $row['email_add'];
    $username = $row['username'];
    $oldpass = $row['password'];
  }
  
    if($email_add==$dbemail_add)
  {

    $verification_code = rand(99999,10000);;
     $query = 'UPDATE user set verification_code ="'.$verification_code.'"
           WHERE
          email_add ="'.$email_add.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
       


        require 'phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'concepcionjoshua90@gmail.com';
        $mail->Password = 'hokageteama21';

        $mail->setFrom('taeyangsolar8@gmail.com', 'North Way Bicycle Store');
        $mail->addAddress($email_add);
        $mail->Subject = 'Reset your password';
        $mail->Body = '<p>Hello '.$username.',<br/><br/>A password reset request was sent for your account from IP address '.$_SERVER['REMOTE_ADDR'].'.<br/>
        If you did not request a password reset you can safely ignore this message.<br/><br/>To define your new password, please use the following code:<br/><br/><b>'.$verification_code.'</b><br/><br/>Best Regards Joshua!<br/>System Developer.</p>';
        $mail->isHTML(true);


        if ($mail->send())
          $_SESSION['email_add']=$email_add;
          $_SESSION['username']=$username;
          echo '<script>alert("Success! Please Check your email account for resetting password...");</script>';
        echo '<script>window.location.replace("recover.php")</script>';
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
//submit recover function login.php














//approved function orderlist.php
if(isset($_GET['approved']))
{


  $sufficient_stock = false;

  $order_number = $_GET['approved']; #id

  $query3 = "SELECT customer_payment_method from customer_order where order_number = '$order_number'";
  $result3 = mysqli_query($conn,$query3);
  $row3 = mysqli_fetch_assoc($result3);
  $customer_payment_method = $row3['customer_payment_method'];


  if($customer_payment_method=="cod"){

            $query2 = "SELECT * from customer_order natural join product where order_number = '$order_number'";
            $result2 = mysqli_query($conn,$query2);
            while($row2 = mysqli_fetch_assoc($result2)) # check if sufficient stock get customer quantity.
            {
              $customer_product_code = $row2['product_code'];
              $customer_quantity = $row2['customer_quantity'];

              $query = "SELECT * from inventory natural join product where product_code = '$customer_product_code'";
              $result = mysqli_query($conn,$query);
              $row = mysqli_fetch_assoc($result);
                $stock = $row['stock'];
                if($stock<$customer_quantity)
                {
                  break;
                }
                else
                {
                   $sufficient_stock = true;
                }
            }


            if($sufficient_stock == true)
            {
                    $query2 = "SELECT * from customer_order natural join product where order_number = '$order_number'";
                    $result2 = mysqli_query($conn,$query2);
                    while($row2 = mysqli_fetch_assoc($result2)) # check if sufficient stock get customer quantity.
                    {
                      $customer_product_code = $row2['product_code'];
                      $customer_quantity = $row2['customer_quantity'];

                      $query = "SELECT * from inventory natural join product where product_code = '$customer_product_code'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);

                      
                      $stock = $row['stock'] - $customer_quantity;
                      $query = "UPDATE inventory set stock = '$stock' where product_code = '$customer_product_code'";
                      $result = mysqli_query($conn,$query);
                      
                    }
                  $query = "UPDATE customer_order set customer_order_status = 'Approved' where order_number = '$order_number'";
                   $result = mysqli_query($conn,$query);


                   date_default_timezone_set('Asia/Manila');
              $query = "INSERT INTO history (details, date_)
                  VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has approved Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
                      mysqli_query($conn,$query)or die ('Error in updating Database');


                       $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
                    $phone = $_GET['customer_contact_number']; // Phone number
                     $msg = "NORTHWAY - Transaction complete. Thanks for ordering to Northway Bicycle Store!";  // Message
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
            else
            {
               echo '<script>alert("Insufficient Stock Cannot Proceed...");</script>';
            }
      }
      else
      {

        $query = "UPDATE customer_order set customer_order_status = 'Approved' where order_number = '$order_number'";
        $result = mysqli_query($conn,$query);
        date_default_timezone_set('Asia/Manila');
              $query = "INSERT INTO history (details, date_)
                  VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has approved Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
                      mysqli_query($conn,$query)or die ('Error in updating Database');
      }


echo '<script>window.location.replace("order_list.php")</script>';

}
//approved function orderlist.php






//cancelled function orderlist.php
if(isset($_GET['cancelled']))
{

  $order_number = $_GET['cancelled']; #id

        $query = "UPDATE customer_order set customer_order_status = 'Cancelled' where order_number = '$order_number'";
         $result = mysqli_query($conn,$query);

           date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has cancel Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

             $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
          $phone = $_GET['customer_contact_number']; // Phone number
           $msg = "NORTHWAY - Your order #".$order_number." has been cancelled.";  // Message
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


     
         echo '<script>window.location.replace("order_list.php")</script>';

  }
//cancelled function orderlist.php










//no receiver function orderlist.php
if(isset($_GET['noreceiver']))
{

  $order_number = $_GET['noreceiver']; #id

        $query = "UPDATE customer_order set customer_order_status = 'Noreceiver' where order_number = '$order_number'";
         $result = mysqli_query($conn,$query);

           date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has move to no receiver of Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

         echo '<script>window.location.replace("order_list.php")</script>';

  }
//no receiver function orderlist.php











//delivery function orderlist.php
 if(isset($_GET['delivery']))
{

  $order_number = $_GET['delivery']; #id

        $query = "UPDATE customer_order set customer_order_status = 'Delivery' where order_number = '$order_number'";
         $result = mysqli_query($conn,$query);

           date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has set order to On Delivery Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

    
    
        $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
          $phone = $_GET['customer_contact_number']; // Phone number
           $msg = "NORTHWAY - Success! Your order #".$order_number." has been confirmed and is going to Delivery. Please expect a few days Thanks!.";  // Message
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
    
    echo '<script>window.location.replace("order_list.php")</script>';
  }
//delivery function orderlist.php








//revert function orderlist.php
if(isset($_GET['revert']))
{
    
 

          $order_number = $_GET['revert']; #id

          $query2 = "SELECT * from customer_order natural join product where order_number = '$order_number'";
          $result2 = mysqli_query($conn,$query2);
          while($row2 = mysqli_fetch_assoc($result2)) # check if sufficient stock get customer quantity.
          {
            $customer_product_code = $row2['product_code'];
            $customer_quantity = $row2['customer_quantity'];

            $query = "SELECT * from inventory natural join product where product_code = '$customer_product_code'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);

            
            $stock = $row['stock'] + $customer_quantity;
            $query = "UPDATE inventory set stock = '$stock' where product_code = '$customer_product_code'";
            $result = mysqli_query($conn,$query);
            
          }
           $query = "UPDATE customer_order set customer_order_status = '' where order_number = '$order_number'";
           $result = mysqli_query($conn,$query);

             date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has revert Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

         echo '<script>window.location.replace("order_list.php")</script>';
}
//revert function orderlist.php





//return function orderlist.php
if(isset($_GET['return']))
{
    
 

          $order_number = $_GET['return']; #id

          $query2 = "SELECT * from customer_order natural join product where order_number = '$order_number'";
          $result2 = mysqli_query($conn,$query2);
          while($row2 = mysqli_fetch_assoc($result2)) # check if sufficient stock get customer quantity.
          {
            $customer_product_code = $row2['product_code'];
            $customer_quantity = $row2['customer_quantity'];

            $query = "SELECT * from inventory natural join product where product_code = '$customer_product_code'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);

            
            $stock = $row['stock'] + $customer_quantity;
            $query = "UPDATE inventory set stock = '$stock' where product_code = '$customer_product_code'";
            $result = mysqli_query($conn,$query);
            
          }
           $query = "UPDATE customer_order set customer_order_status = 'Returned' where order_number = '$order_number'";
           $result = mysqli_query($conn,$query);

             date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has return Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

             $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
          $phone = $_GET['customer_contact_number']; // Phone number
           $msg = "NORTHWAY - Your order #".$order_number." has been returned.";  // Message
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

         echo '<script>window.location.replace("order_list.php")</script>';
}
//return function orderlist.php









//submit edit product function product.php
if (isset($_POST['submiteditproduct']) && !empty($_POST['product_code']) && !empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['supplier_id']) && !empty($_POST['category_id']) && $_POST['product_price'] != "" && $_POST['product_discount'] != "" ) {


      $product_code = input_($_POST['product_code']);


      $product_name = input_($_POST['product_name']);
      $product_img = rand().$_FILES['product_img']['name'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["product_img"]["name"]);


      $product_description = input_($_POST['product_description']);
      $supplier_id = input_($_POST['supplier_id']);
      $category_id = input_($_POST['category_id']);
      $product_price = input_($_POST['product_price']);
      $product_discount = input_($_POST['product_discount']);

  

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");




      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
 
      // Insert record
      $query = 'UPDATE product set product_name ="'.$product_name.'", product_img ="'.$product_img.'", product_description ="'.$product_description.'", supplier_id ="'.$supplier_id.'", category_id ="'.$category_id.'", product_price ="'.$product_price.'", product_discount ="'.$product_discount.'"
           WHERE
          product_code ="'.$product_code.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
 
      // Upload file
      move_uploaded_file($_FILES['product_img']['tmp_name'],$target_dir.$product_img);
          echo '<script>window.location.replace("product.php")</script>';
 }
// Check extension



  date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has edit a product code of ".$product_code." to name ".$product_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');



   $query = 'UPDATE product set product_name ="'.$product_name.'", product_description ="'.$product_description.'", supplier_id ="'.$supplier_id.'", category_id ="'.$category_id.'", product_price ="'.$product_price.'", product_discount ="'.$product_discount.'"
           WHERE
          product_code ="'.$product_code.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("product.php")</script>';
}
//submit edit product function product.php













//submit add product function product.php
if (isset($_POST['submitaddproduct'])  && !empty($_POST['product_name']) && !empty($_POST['product_description']) && !empty($_POST['supplier_id']) && !empty($_POST['category_id']) && $_POST['product_price'] != "" && $_POST['product_discount'] != "" )
{

      $product_name = input_($_POST['product_name']);
      $product_img = rand().$_FILES['product_img']['name'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["product_img"]["name"]);

      $product_description = input_($_POST['product_description']);
      $supplier_id = input_($_POST['supplier_id']);
      $category_id = input_($_POST['category_id']);
      $product_price = input_($_POST['product_price']);
      $product_discount = input_($_POST['product_discount']);

         $query = "SELECT count(product_code) as lastcode FROM product"; //para sa auto generate
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
              while($row = mysqli_fetch_array($result))
              {   
                $getlastcode = $row['lastcode']; //para sa auto generate
              }

            $product_code_generate = $getlastcode+1;
            $myvalue = $product_name;
            $arr = explode(' ',trim($myvalue));
            $product_code = $arr[0]."-".$product_code_generate; //para sa auto generate



      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");
      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){
      // Insert record
        $query = 'Insert into product (product_code,product_name,product_img,product_description,supplier_id,category_id,product_price,product_discount) values ("'.$product_code.'", "'.$product_name.'", "'.$product_img.'", "'.$product_description.'", "'.$supplier_id.'", "'.$category_id.'", "'.$product_price.'", "'.$product_discount.'")'; // pag may image
      // Upload file
      move_uploaded_file($_FILES['product_img']['tmp_name'],$target_dir.$product_img);
 }
 else
 {
    $query = 'Insert into product (product_code,product_name,product_img,product_description,supplier_id,category_id,product_price,product_discount) values ("'.$product_code.'", "'.$product_name.'", "default.png", "'.$product_description.'", "'.$supplier_id.'", "'.$category_id.'", "'.$product_price.'", "'.$product_discount.'")'; // pag walang image
 }
// Check extension

      mysqli_query($conn,$query) or die(mysqli_error($conn));



      date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has add a new product ".$product_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');




       $query = 'Insert into inventory (product_code,stock) values ("'.$product_code.'",0)'; 
               mysqli_query($conn,$query) or die(mysqli_error($conn));
    
      //echo '<script>window.location.replace("product.php")</script>';

}
//submit add product function product.php











//submit delete product function product.php
if (isset($_POST['submitdeleteproduct']) && !empty($_POST['product_code']) ) {

        $product_code = $_POST['product_code'];


        $query = "SELECT product_name from product where product_code = '$product_code'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has delete a product of ".$product_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');



        $query = 'delete from product where product_code = "'.$product_code.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        $query = 'delete from inventory where product_code = "'.$product_code.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("product.php")</script>';
}
//submit delete product function product.php











//recover account function recover.php
 if (isset($_GET['resend'])) {

          $email_add = $_SESSION["email_add"];
          
          mysqli_real_escape_string($conn, $email_add);

          $query = "SELECT * from user where email_add = '$email_add'";
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));



          $verification_code = rand(99999,10000);;
          $query = 'UPDATE user set verification_code ="'.$verification_code.'"
           WHERE
          email_add ="'.$email_add.'"';
           mysqli_query($conn,$query) or die(mysqli_error($conn));
       


        require 'phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'concepcionjoshua90@gmail.com';
        $mail->Password = 'hokageteama21';

        $mail->setFrom('taeyangsolar8@gmail.com', 'North Way Bicycle Store');
        $mail->addAddress($email_add);
        $mail->Subject = 'Reset your password';
        $mail->Body = '<p>Hello '.$_SESSION['username'].',<br/><br/>A password reset request was sent for your account from IP address '.$_SERVER['REMOTE_ADDR'].'.<br/>
        If you did not request a password reset you can safely ignore this message.<br/><br/>To define your new password, please use the following code:<br/><br/><b>'.$verification_code.'</b><br/><br/>Best Regards Joshua!<br/>System Developer.</p>';
        $mail->isHTML(true);


        if ($mail->send())
          echo '<script>alert("Success! Please Check your email account for resetting password...");</script>';
          echo '<script>window.location.replace("recover.php")</script>';

}
//recover account function recover.php









//submit reset recover function recover.php
 if (isset($_POST['submitresetrecover']) && !empty($_POST['verification_code'])) {


        $email_add = $_SESSION['email_add'];
        $query = "SELECT * from user where email_add = '$email_add'";
        $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);

        $dbverification_code = $row['verification_code'];
          
        $verification_code = input_($_POST['verification_code']);

       
        if($verification_code == $dbverification_code)
        {
          $_SESSION['success'] = $verification_code;
          echo '<script>window.location.replace("recovered.php")</script>';
        }
        else
        {
          echo '<script>alert("Invalid Code... Please Check Your Email.");</script>';
          echo '<script>window.location.replace("recover.php")</script>';
        }
        

 }
//submit reset recover function recover.php










//submit reset recovered function recovered.php
if (isset($_POST['submitrecovered']) && !empty($_POST['npassword']) && !empty($_POST['cnpassword']) ) {

$email_add = $_SESSION['email_add'];


$npassword = input_($_POST['npassword']);
$cnpassword = input_($_POST['cnpassword']);


mysqli_real_escape_string($conn, $npassword);
mysqli_real_escape_string($conn, $cnpassword);

$query = "SELECT * from user where email_add = '$email_add'";
$result = mysqli_query($conn, $query);


/*user */

     
          if($npassword == $cnpassword)
     {
          $query = 'UPDATE user set password ="'.base64_encode($npassword).'", verification_code = ""
           WHERE
          email_add ="'.$email_add.'"';
         mysqli_query($conn,$query) or die(mysqli_error($conn));
       // remove all session variables
          session_unset(); 
          // destroy the session 
          session_destroy(); 
          echo "<script>alert('Successful! You may now able to login ...')</script>";
           echo '<script>window.location.replace("login.php")</script>';

     
     }
     
     else
     {
          echo "<script>alert('Password not Match!')</script>";
          echo '<script>window.location.replace("recovered.php")</script>';
     }
    

}
//submit reset recovered function recovered.php









//submit edit shipping_rate function shipping_rate.php
if (isset($_POST['submiteditshipping_rate']) && !empty($_POST['shipping_id']) && !empty($_POST['shipping_city']) && !empty($_POST['shipping_city_duplicate']) && !empty($_POST['shipping_delivery_fee']) ) {


  $shipping_id = input_($_POST['shipping_id']);
  $shipping_city = input_($_POST['shipping_city']);
  if($shipping_city == 'San Juan')
  {
     $shipping_city = "Juan";
  }
  if($shipping_city == 'Las Piñas')
  {
     $shipping_city = "Piñas";
  }
  $shipping_city_duplicate = input_($_POST['shipping_city_duplicate']);
  if($shipping_city_duplicate == 'San Juan')
  {
     $shipping_city_duplicate = "Juan";
  }
  if($shipping_city_duplicate == 'Las Piñas')
  {
     $shipping_city_duplicate = "Piñas";
  }
  $shipping_delivery_fee = input_($_POST['shipping_delivery_fee']);


   $query = "SELECT * from shipping_fee where not shipping_city = '$shipping_city_duplicate'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*ship exist */


  while ($row = mysqli_fetch_assoc($result))
  {
        $dbshipping_city = $row['shipping_city'];

         if($shipping_city==$dbshipping_city)
      {
        $dbshipping_city = $row['shipping_city'];
          break; //breaking the earth false condition
      }
      else
      {
        $dbshipping_city = "NoResult";
      }
  }
  /*ship exist */

if ($shipping_city!=$dbshipping_city) {



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has update shipping rate of ".$shipping_city." to ".$shipping_delivery_fee." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');



   $query = 'UPDATE shipping_fee set shipping_city ="'.$shipping_city.'",shipping_delivery_fee ="'.$shipping_delivery_fee.'"
           WHERE
          shipping_id ="'.$shipping_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("shipping_rate.php")</script>';
}
else
{
  echo '<script>alert("Shipping City is already exist...");</script>';
   echo '<script>window.location.replace("shipping_rate.php")</script>';
}
 
}
//submit edit shipping_rate function shipping_rate.php









//submit add shipping_rate function shipping_rate.php
if (isset($_POST['submitaddshipping_rate']) && !empty($_POST['shipping_city']) && !empty($_POST['shipping_delivery_fee']) )
{

  $shipping_city = input_($_POST['shipping_city']);
  $shipping_delivery_fee = input_($_POST['shipping_delivery_fee']);

  


$query = "SELECT * from shipping_fee where shipping_city = '$shipping_city'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*sup exist */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbshipping_city = $row['shipping_city'];
  }
  
    if($shipping_city==$dbshipping_city)
  {
    echo '<script>alert("Shipping info is already exist...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  }

  /*sup exist */
  
}

else
{



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has add a new shipping rate of ".$shipping_city." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

      $query = 'Insert into shipping_fee (shipping_city,shipping_delivery_fee) values ("'.$shipping_city.'","'.$shipping_delivery_fee.'")';
      mysqli_query($conn,$query) or die(mysqli_error($conn));
      echo '<script>window.location.replace("shipping_rate.php")</script>';
}

}
//submit add shipping_rate function shipping_rate.php










//submit delete shipping_rate function shipping_rate.php
if (isset($_POST['submitdeleteshipping_rate']) && !empty($_POST['shipping_id'])) {

        $shipping_id = $_POST['shipping_id'];




         $query = "SELECT shipping_city from shipping_fee where shipping_id = '$shipping_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $shipping_city = $row['shipping_city'];



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has delete a shipping rate of ".$shipping_city." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');




        $query = 'delete from shipping_fee where shipping_id = "'.$shipping_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("shipping_rate.php")</script>';
}
//submit delete shipping_rate function shipping_rate.php









//submit stockin function stockin.php
if (isset($_POST['submitstockin']) && !empty($_POST['product_code']) && !empty($_POST['quantity']) )
{


      $product_code = input_($_POST['product_code']);
      $quantity = input_($_POST['quantity']);
      $date_ = date("Y-m-d");



     
          $query = "SELECT * from inventory where product_code = '$product_code'";
          $result = mysqli_query($conn,$query);
          $row = mysqli_fetch_assoc($result);
          $stock = $row['stock'];


        $query = "SELECT product_name from product where product_code = '$product_code'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has add ".$quantity." stock of ".$product_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


          
              $query = 'Insert into stockin (product_code,quantity,date_) values ("'.$product_code.'","'.$quantity.'","'.$date_.'")';
               mysqli_query($conn,$query) or die(mysqli_error($conn));

          
              $stock = $stock + $quantity;
              $query = 'UPDATE inventory set stock ="'.$stock.'"
                  WHERE
               product_code ="'.$product_code.'"';
              mysqli_query($conn,$query) or die(mysqli_error($conn));
              echo '<script>window.location.replace("stockin.php")</script>';
          
        

}
//submit stockin function stockin.php










//submit edit supplier function supplier.php
if (isset($_POST['submiteditsupplier']) && !empty($_POST['supplier_id']) && !empty($_POST['supplier_name']) && !empty($_POST['supplier_address']) && !empty($_POST['supplier_contact']) ) {


  $supplier_id = input_($_POST['supplier_id']);
  $supplier_name = input_($_POST['supplier_name']);
  $supplier_address = input_($_POST['supplier_address']);
  $supplier_contact = input_($_POST['supplier_contact']);
  $supplier_contact_person = input_($_POST['supplier_contact_person']);


   date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has edit a supplier id ".$supplier_id." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


   $query = 'UPDATE supplier set supplier_name ="'.$supplier_name.'",supplier_address ="'.$supplier_address.'",supplier_contact ="'.$supplier_contact.'",supplier_contact_person ="'.$supplier_contact_person.'"
           WHERE
          supplier_id ="'.$supplier_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("supplier.php")</script>';

 
}
//submit edit supplier function supplier.php







//submit add supplier function supplier.php
if (isset($_POST['submitaddsupplier']) && !empty($_POST['supplier_name']) && !empty($_POST['supplier_address']) && !empty($_POST['supplier_contact']) )
{

  $supplier_name = input_($_POST['supplier_name']);
  $supplier_address = input_($_POST['supplier_address']);
  $supplier_contact = input_($_POST['supplier_contact']);
  $supplier_contact_person = input_($_POST['supplier_contact_person']);
  


$query = "SELECT * from supplier where supplier_name = '$supplier_name'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));


/*sup exist */

if (mysqli_num_rows($result)!=0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
    $dbsupplier_name = $row['supplier_name'];
  }
  
    if($supplier_name==$dbsupplier_name)
  {
    echo '<script>alert("Supplier is already exist...");</script>';
      echo '<script type="text/javascript">
        window.history.back();
      </script>';
  }

  /*sup exist */
  
}

else
{

       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has add a new supplier ".$supplier_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


      $query = 'Insert into supplier (supplier_name,supplier_address,supplier_contact,supplier_contact_person) values ("'.$supplier_name.'","'.$supplier_address.'","'.$supplier_contact.'","'.$supplier_contact_person.'")';
      mysqli_query($conn,$query) or die(mysqli_error($conn));
      echo '<script>window.location.replace("supplier.php")</script>';
}

}
//submit add supplier function supplier.php





//submit delete supplier function supplier.php
if (isset($_POST['submitdeletesupplier']) && !empty($_POST['supplier_id']) ) {

        $supplier_id = $_POST['supplier_id'];




         $query = "SELECT supplier_name from supplier where supplier_id = '$supplier_id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($result);
        $supplier_name = $row['supplier_name'];



       date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has delete a supplier of ".$supplier_name." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');





        $query = 'delete from supplier where supplier_id = "'.$supplier_id.'"';
       mysqli_query($conn,$query) or die(mysqli_error($conn));
        echo '<script>window.location.replace("supplier.php")</script>';
}
//submit delete supplier function supplier.php









//submit user  function user.php
if (isset($_POST['submituser']) && !empty($_POST['id']) && !empty($_POST['password']) && !empty($_POST['newfirst_name']) && !empty($_POST['newlast_name']) && !empty($_POST['newusername']) && !empty($_POST['newusername_duplicate']) && !empty($_POST['currentpassword'])) {

      $user_id = input_($_POST['id']);
      $password = input_($_POST['password']);

      $first_name= input_($_POST['newfirst_name']);
      $last_name= input_($_POST['newlast_name']);
      $newusername= input_($_POST['newusername']);
      $new_email= input_($_POST['new_email']);

      $newprofile_picture = rand().$_FILES['newprofile_picture']['name'];
      $target_dir = "profilepic/";
      $target_file = $target_dir . basename($_FILES["newprofile_picture"]["name"]);

      $newusername_duplicate= input_($_POST['newusername_duplicate']);
      $new_email_duplicate= input_($_POST['new_email_duplicate']);
      $newpassword= input_(base64_encode($_POST['newpassword']));
      $verifynewpassword= input_(base64_encode($_POST['verifynewpassword']));

      $currentpassword = input_(base64_encode($_POST['currentpassword']));


      $query = "SELECT * from user where not username = '$newusername_duplicate'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


      /*user exist */


  while ($row = mysqli_fetch_assoc($result))
  {
        $dbusername = $row['username'];

         if($newusername==$dbusername)
      {
        $dbusername = $row['username'];
          break; //breaking the earth
      }
      else
      {
        $dbusername = "NoResult";
      }
  }
  /*user exist */







      $query = "SELECT * from user where not email_add = '$new_email_duplicate'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


      /*email exist */


  while ($row = mysqli_fetch_assoc($result))
  {
        $dbemail_add = $row['email_add'];

         if($new_email==$dbemail_add)
      {
        $dbemail_add = $row['email_add'];
          break; //breaking the earth
      }
      else
      {
        $dbemail_add = "NoResult";
      }
  }
  /*email exist */




if($new_email!=$dbemail_add)
{
  if ($newusername!=$dbusername) {





             if (empty($newpassword) && empty($verifynewpassword) && $currentpassword == $password) {



                    date_default_timezone_set('Asia/Manila');
          $query = "INSERT INTO history (details, date_)
              VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." update his account setting in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
                  mysqli_query($conn,$query)or die ('Error in updating Database');




                         // Select file type
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  // Valid file extensions
                  $extensions_arr = array("jpg","jpeg","png","gif");
                  // Check extension
                  if( in_array($imageFileType,$extensions_arr) ){
                  // Insert record
                    $query = 'UPDATE user set first_name ="'.$first_name.'", last_name ="'.$last_name.'", username ="'.$newusername.'", profile_picture ="'.$newprofile_picture.'", email_add ="'.$new_email.'"
                     WHERE
                    user_id ="'.$user_id.'"';
                     // pag may image
                  // Upload file
                  move_uploaded_file($_FILES['newprofile_picture']['tmp_name'],$target_dir.$newprofile_picture);
             }
             else
             {
                  $query = 'UPDATE user set first_name ="'.$first_name.'", last_name ="'.$last_name.'", username ="'.$newusername.'", email_add ="'.$new_email.'"
                     WHERE
                    user_id ="'.$user_id.'"';
                 // pag walang image
             }
            // Check extension



                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                echo '<script>alert("Successful!");</script>';
                  

             foreach($_SESSION as $key => $val)
            {

                if ($key !== 'session_cart' && $key !== 'customer_username' && $key !== 'customer_fullname' && $key !== 'errno')
                {

                  unset($_SESSION[$key]);

                }

            }


                echo '<script>window.location.replace("login.php")</script>';
            
             }

          
          elseif ($newpassword==$verifynewpassword && $currentpassword == $password) {  // verify kung tama lahat



                    date_default_timezone_set('Asia/Manila');
          $query = "INSERT INTO history (details, date_)
              VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." update his account setting in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
                  mysqli_query($conn,$query)or die ('Error in updating Database');





                   // Select file type
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  // Valid file extensions
                  $extensions_arr = array("jpg","jpeg","png","gif");
                  // Check extension
                  if( in_array($imageFileType,$extensions_arr) ){
                  // Insert record
                     $query = 'UPDATE user set first_name ="'.$first_name.'", last_name ="'.$last_name.'", username ="'.$newusername.'", profile_picture ="'.$newprofile_picture.'" , email_add ="'.$new_email.'", password ="'.$newpassword.'"
                 WHERE
                user_id ="'.$user_id.'"';
                     // pag may image
                  // Upload file
                  move_uploaded_file($_FILES['newprofile_picture']['tmp_name'],$target_dir.$newprofile_picture);
             }
             else
             {
                   $query = 'UPDATE user set first_name ="'.$first_name.'", last_name ="'.$last_name.'", username ="'.$newusername.'", password ="'.$newpassword.'"
                 WHERE
                user_id ="'.$user_id.'"';
                 // pag walang image
             }
            // Check extension









             
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                echo '<script>alert("Successful!");</script>';
                  


                 foreach($_SESSION as $key => $val)
                {

                    if ($key !== 'session_cart' && $key !== 'customer_username' && $key !== 'customer_fullname')
                    {

                      unset($_SESSION[$key]);

                    }

                }



                echo '<script>window.location.replace("login.php")</script>';

                }


                else if ($currentpassword!=$password) { // pag mali yung current password
                  echo '<script>alert("Incorrect Current Password");</script>';
                  echo '<script>history.back();</script>';
                }


                else // pag yung password hindi match else
                { 
                  echo '<script>alert("Password not match!");</script>';
                   echo '<script>history.back();</script>';
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
else
{
  echo '<script>alert("Email is already exist...");</script>';
                   echo '<script type="text/javascript">
                    window.history.back();
                    </script>';
}

  











        }
//submit user  function user.php











//return function orderlist.php
if(isset($_GET['markasread']))
{
    
 

          $order_number = $_GET['markasread']; #id

        
           $query = "UPDATE notification set notification_read = 'Y' where notification_order_no = '$order_number'";
           $result = mysqli_query($conn,$query);

             date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has mark as read Order #".$order_number." in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

        

         echo '<script>window.location.replace("notification.php")</script>';
}
//return function orderlist.php







?>