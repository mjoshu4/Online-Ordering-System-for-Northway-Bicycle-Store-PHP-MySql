<?php include 'nav.php'; ?>
<?php

include 'db.php';
require 'nwbs/phpmailer/PHPMailerAutoload.php';

  function input_($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if( !isset($_SESSION["customer_fullname"]) || !isset($_SESSION["customer_username"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
else
{

  
$txn_id = $_GET['tx'];
if(!empty($txn_id)){

                  $query = "select * from temp_cart where session_cart= '$session_cart' and payment_method is not null";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 $row = mysqli_fetch_assoc($result);
                 $payment_method = $row['payment_method'];  //payment method global access also

                 
                if($payment_method !='cod' && $payment_method !='Paypal' && $payment_method !='Dragonpay' && $payment_method !='visa')
                {
                  echo '<script>window.location.replace("viewcart.php")</script>';
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
                  $customer_shipping_address = $row['customer_shipping_address'];
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
          $result = mysqli_query($conn, $query) or die(mysqli_error($conn));






          //for deducted stocks
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
              


                      //

                               $_SESSION['orderplaced'] = "<h2><center><br><br><br>Your order has been placed successfully.<br><br> <p style='color:green;'>Your Order#".$order_number."</p></center></h2>";


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



              


                            $output.="
                            <tr>
                              <td></td>
                              <td>Total</td>
                              <td>".number_format($total,2)."</td>
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
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


                         $query = "select * from customer where customer_username = '$customer_username'";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        $row = mysqli_fetch_array($result);
                        $customer_contact_number = $row['customer_contact_number'];
                        

                         $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
                         $phone = $customer_contact_number; // Phone number
                         if(isset($_POST['addrecipient'])){
                          $recipient_name = $recipient_name;
                   $msg = "NORTHWAY - Order #".$order_number." has been received to ".$recipient_name." from ".$customer_username." and is going through approval process. Thanks!.";  // Message
                   }else { $msg = "NORTHWAY - Your order #".$order_number." has been received and is going through approval process. Thanks!."; }
                         $device = '113068';  //  Device code
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
                         $device = '113068';  //  Device code
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

                      //

              }
              else
              {
                $query = "DELETE from customer_order where order_number ='$order_number'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 echo '<script>alert("Insufficient Stock Cannot Proceed...");</script>';
              }
              //for deducted stocks










         

   }

}

else
{
   echo "<h2><center><br><br><br>Your order has been Cancelled.</center></h2>";
}






}
?>




  <br><br><br>
<?php include "footer.php"; ?>
     <!-- footer -->




  <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->






