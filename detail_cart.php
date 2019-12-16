<?php 
session_start(); 
include 'db.php';



if(empty($_SESSION['session_cart']) && empty($_SESSION['errlogin']))  // global access and used to payout
{
  $session_cart = $_SESSION['session_cart'] = md5(microtime().rand()); 
  $session_errno = $_SESSION['errno'] = "notlogin"; 
}

else
{
$session_cart = $_SESSION['session_cart']; 
$session_errno =  $_SESSION['errno'];


                           $total = 0;
                           $sub_total_quantity = 0;
                           $query = "select * from temp_cart natural join product where session_cart ='$session_cart'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           $count = mysqli_num_rows($result);
                           while($row = mysqli_fetch_assoc($result))
                           {
                            $quantity = $row['quantity'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];
                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                            $total += $quantity * $product_price;
                            $sub_total_quantity += $quantity;
                           }
                          
                          if($sub_total_quantity<=0){ $sub_total_quantity = "Empty"; }

                           $data = array(
                            'sub_total_quantity' => $sub_total_quantity,
                            'total' => number_format($total,2)
                             );

                           echo json_encode($data);

}
    ?>
      
                       
                     