<?php include 'nav.php';
include 'db.php'; ?>


  <?php 
       if( !isset($_SESSION["customer_fullname"]) || !isset($_SESSION["customer_username"]) )
               {
                  echo '<script>window.location.replace("login.php")</script>'; // if not login redirect to homepage
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



                $customer_shipping_address = $row['customer_shipping_address'];
                $customer_email = $row['customer_email'];
                $customer_contact_number = $row['customer_contact_number'];
                $customer_id = $row['customer_id']; //get shipping address, email, contact DESC
    
                 $query = "select * from temp_cart where session_cart= '$session_cart' and payment_method is not null";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 $row = mysqli_fetch_assoc($result); //get payment method

                 $payment_method = $row['payment_method'];  //payment method global access also
                if($payment_method !='cod' && $payment_method !='Paypal' && $payment_method !='Dragonpay' && $payment_method !='visa')
                {
                  echo '<script>window.location.replace("viewcart.php")</script>'; //if no payment method redirect to cart and set payment method
                }
                else
                {
    ?>



<style type="text/css">

input[type="text"],
input[type="email"],
select.form-control {
  background: transparent;
  border: none;
  border-bottom: 1px solid #000000;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0;
}

input[type="text"]:focus,
input[type="email"]:focus,
select.form-control:focus {
  -webkit-box-shadow: none;
  box-shadow: none;
}

</style>



  <!-- Table -->
        <div class="card-body">
            <div class="row" style="text-align: left; margin-bottom:4em;">
                <div class="col-lg-8">
          <div class="table-responsive">
      <table class="table table-borderless" cellspacing="0" id="dataTable" width="100%" cellspacing="0">



           <thead>
                  <tr>
                  <th>Thumbnail</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  </tr>
          </thead>


                 <tbody>
                    <?php 

                 $query = "select * from temp_cart natural join product where session_cart ='$session_cart' and payment_method ='$payment_method'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $product_code = $row['product_code'];
                            $quantity = $row['quantity'];
                            $product_name = $row['product_name'];
                            $product_img = $row['product_img'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];

                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                ?>


                            
             <tr>
                  <td><img src="nwbs/upload/<?php echo $product_img; ?>" height="50" width="50" onerror="this.src='nwbs/upload/default.png'" /></td>
                  <td><?php echo $product_name; ?></td>
                  <td><?php echo $quantity; ?></td>
                  <td><?php echo number_format($product_price,2); ?> <?php if($product_discount>0){ echo '<small> -'.$product_discount.'%</small>'; } ?></td>
        
                    <!-- Table -->






 <!-- Content-->

   


<!-- SCRIPT EDIT -->
<?php
} ?>
<!-- SCRIPT EDIT -->






</tr>
</tbody>
</table>
</div>
<small>Note: Following the successful order pickup the buyer should receive their order within the following time frame:
<br>
• Within Metro Manila = 2 to 5 calendar days* <br><br>
</small>
</div>



<div class="col-lg-4">
<h5><b>Order Summary</b></h5>
<hr>




<small style="color:grey;">Subtotal (<?php 
                           $query = "select sum(quantity) as quantity from temp_cart where session_cart ='$session_cart' and payment_method ='$payment_method'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           $row = mysqli_fetch_assoc($result);
                           $count = $row['quantity'];
                            echo $count;
                        ?> Items) - <span style="color:black;">₱<?php 
                            $total = 0;
                           $query = "select * from temp_cart natural join product where session_cart ='$session_cart'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           while($row = mysqli_fetch_assoc($result))
                           {
                            $quantity = $row['quantity'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];
                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                            $total += $quantity * $product_price;
                            $payment_method = $row['payment_method'];
                           }
                            echo number_format($total,2); // Subtotal ...
                        ?></span></small>






<br>
     <small style="color:grey;">Shipping fee - <span style="color:black;">
                            <?php include 'fee.php';
                          if(!empty($customer_shipping_address)){
                            if($payment_method == "cod")
                            {
                              echo $shipping_fee_view;
                            }
                            else
                            {
                              if ($shipping_fee_view_auth==false) {
                                echo $shipping_fee_view;
                              }else{
                                echo '₱ 0';
                              }
                            }
                          }
                          else{
                            echo 'Please provide shipping address first.';
                          }
                            ?>
                          

                        </span></small>



<br>
<small style="color:grey;">Shipping Details:
<br>
  <span style="color:black">
  <li class="fa fa-check"></li> <b>Address:</b> <?php if(empty($customer_shipping_address)){ echo "<span style='color:red;'>Required <sup>*</sup></span>"; }else{ echo $customer_shipping_address; } ?>
  <a href="#customer_shipping_address" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
</span>
<br>
  <span style="color:black">
  <li class="fa fa-check"></li> <b>Email:</b> <?php if(empty($customer_email)){ echo "<span style='color:red;'>Required <sup>*</sup></span>" ;}else{ echo $customer_email; } ?>
  <a href="#customer_email" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
</span>
<br>
  <span style="color:black">
  <li class="fa fa-check"></li> <b>Contact No.:</b> <?php if(empty($customer_contact_number)){ echo "<span style='color:red;'>Required <sup>*</sup></span>" ;}else{ echo $customer_contact_number; } ?>
  <a href="#customer_contact_number" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
</span>
</small>
<hr>




<input type="checkbox" name="addrecipient" form="checkout" onclick="toggle('.myClass', this)"><small> Add Recipient Name?</small>
<div id="recipient" style="display: none;"><br>
<small style="color:grey;">
  <span style="color:black">
  <li class="fa fa-check"></li> <b>Name:</b> <?php if(empty($recipient_name)){ echo "<span style='color:red;'>Required <sup>*</sup></span>"; }else{ echo $recipient_name; } ?>
  <a href="#recipient_name" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
</span>
<br>
<span style="color:black">
  <li class="fa fa-check"></li> <b>Address:</b> <?php if(empty($recipient_address)){ echo "<span style='color:red;'>Required <sup>*</sup></span>"; }else{ echo $recipient_address; } ?>
  <a href="#recipient_address" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
</span>
<br>
<span style="color:black">
  <li class="fa fa-check"></li> <b>Contact:</b> <?php if(empty($recipient_contact_number)){ echo "<span style='color:red;'>Required <sup>*</sup></span>"; }else{ echo $recipient_contact_number; } ?>
  <a href="#recipient_contact_number" data-toggle="modal"><i class="fa fa-pencil"></i> Update</a>
</span>
</small>
</div>


















<br>
  <small style="color:grey;">Payment Method - <span style="color:black;"><?php 
                           $query = "select * from temp_cart where session_cart ='$session_cart'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           $row = mysqli_fetch_assoc($result);
                           $payment_method = $row['payment_method'];
                           if($payment_method=='cod') { echo "<img src='library/images/checkout1.png' width='100' height='50'>"; } if($payment_method=='Paypal'){ echo "<img src='library/images/checkout.png' width='130' height='50'>"; }
                           if($payment_method=='Dragonpay'){ echo "<img src='library/images/checkout2.jpg' width='130' height='60'>"; }
                           if($payment_method=='visa'){ echo "<img src='library/images/checkout3.png' width='130' height='35'>"; }
                        ?> </span></p>


                        <p><b>Total - </b>  <span style="color:blue; font-size: 1.5em;">₱<?php 
                            $total = 0;
                           $query = "select * from temp_cart natural join product where session_cart ='$session_cart'";
                           $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                           while($row = mysqli_fetch_assoc($result))
                           {
                            $quantity = $row['quantity'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];
                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                            $total += $quantity * $product_price;
                           }
                           if($payment_method=="cod"){
                            echo number_format($total+$shipping_fee,2);
                          }else { echo number_format($total,2); }
                        ?></span></small>















 <?php if($payment_method =="cod") { ?>                    
<form action="process.php" method="post" id="checkout"> <!-- COD -->
<?php } if($payment_method =="Paypal") { 

$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_email = 'northway@gmail.com';
$customer_username = $_SESSION['customer_username'];
  ?>
  <form action="<?php echo $paypal_url; ?>" method="post" id="checkout">       <!-- PAYPAL -->
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
<input type="hidden" name="currency_code" value="PHP">



      <?php 
                 $item_number = 0;
                 $query = "select * from temp_cart natural join product where session_cart ='$session_cart' and payment_method ='$payment_method'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $item_number = $item_number +1;
                            $product_code = $row['product_code'];
                            $quantity = $row['quantity'];
                            $product_name = $row['product_name'];
                            $product_img = $row['product_img'];
                            $product_description = $row['product_description'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];

                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                ?>
<input type="hidden" name="<?php echo 'item_name_'.$item_number; ?>" value="<?php echo $product_name; ?>">
<input type="hidden" name="<?php echo 'quantity_'.$item_number; ?>" value="<?php echo $quantity; ?>">
<input type="hidden" name="<?php echo 'amount_'.$item_number; ?>" value="<?php echo $product_price; ?>">
<?php } ?>

      <!-- URLs -->
      <input type='hidden' name='cancel_return' value='https://northwaybicyclestore.000webhostapp.com/cancelled.php'>
      <input type='hidden' name='return' value='https://northwaybicyclestore.000webhostapp.com/success.php?customer_username=<?php echo $customer_username; ?>&payment_method=<?php echo $payment_method; ?>&session_cart=<?php echo $session_cart; ?>'>

                        
<?php } if($payment_method == "Dragonpay") { 

    $query = "SELECT * from customer where customer_id ='$session_cart'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);

    $customer_fullname = $row['customer_fullname'];
    $customer_email = $row['customer_email'];

  ?>

<form action="https://test.dragonpay.ph/GenPay.aspx" method="get" id="checkout"> <!-- DRAGON PAY -->
  <input type="hidden" name="merchantid" value="SAMPLEGEN">
  <input type="hidden" name="invoiceno" value="<?php echo rand(); ?>">
  <input type="hidden" name="name" value="<?php echo $customer_fullname; ?>">
  <input type="hidden" name="email" value="<?php if(empty($customer_email)) { echo 'noemaildetected@email.com'; } echo $customer_email; ?>">
   <input type="hidden" name="amount" value="<?php echo $total; ?>">
   <input type="hidden" name="remarks" value="Total of all product of Northway Bicycle Store.">

<?php } ?>


                         <?php if($payment_method =="cod") { if($shipping_fee_view_auth != false && !empty($customer_email) && !empty($customer_contact_number) ){ ?>   

                               <button type="submit" name="place_order_cod" style="border-radius: 0px !important;" class="btn btn-primary btn-block">PLACE ORDER</button> 

                        <?php }else{ echo "<span style='color:red;'>Please complete shipping details first to continue.</span>"; }} ?>


  

                         <?php if($payment_method =="Dragonpay") { if($shipping_fee_view_auth != false && !empty($customer_email) && !empty($customer_contact_number) ){ ?>   

                               <button type="submit"  style="border-radius: 0px !important;" class="btn btn-primary btn-block">PLACE ORDER</button> 

                        <?php }else{ echo "<span style='color:red;'>Please complete shipping details first to continue.</span>"; }} ?>





                         <?php if($payment_method =="Paypal") { if($shipping_fee_view_auth != false && !empty($customer_email) && !empty($customer_contact_number) ){ ?>   

                               <button type="submit" style="border-radius: 0px !important;" class="btn btn-primary btn-block">PLACE ORDER</button> 

                        <?php }else{ echo "<span style='color:red;'>Please complete shipping details first to continue.</span>"; }} ?>





                         <?php if($payment_method =="visa") { if($shipping_fee_view_auth != false && !empty($customer_email) && !empty($customer_contact_number) ){ ?>   

                                <script type="text/javascript">
  function onVisaCheckoutReady(){
  V.init( {
  apikey: "ZXSAU7OG5T68Z2QLYW8K21tMxy8CV0JRHE_Nt8HJDJgJvMTu8",
  paymentRequest:{
    currencyCode: "PHP",
    subtotal: "<?php echo $total; ?>"
  }
  });


V.on("payment.success", function(payment)
  {
    window.location.replace("visa_success.php");
  });
V.on("payment.cancel", function(payment)
  {
    <?php echo 'alert("Visa Checkout has been cancelled.")' ?>
  });
V.on("payment.error", function(payment, error)
  {
    <?php echo 'alert("Something error about your transaction.")' ?>
  });
}



</script>

<!-- VISA BUTTON -->
<br><br>
<img alt="Visa Checkout" class="v-button" role="button"
src="https://sandbox.secure.checkout.visa.com/wallet-services-web/xo/button.png"/>
<script type="text/javascript"
src="https://sandbox-assets.secure.checkout.visa.com/
checkout-widget/resources/js/integration/v1/sdk.js">
</script>  

                        <?php }else{ echo "<span style='color:red;'>Please complete shipping details first to continue.</span>"; }} ?>



                        </form>     
                        
</div>







</div>
</div>




<!-- shipp change -->
<div class="modal fade" id="customer_shipping_address" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Shipping Address</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
 <form action = "process.php" method = "POST">
      <div class="modal-body"> 
        <!--customer shipping address -->
         <input type="text" class="form-control" placeholder="House Number, Building, Barangay and Street Name " name="house"  required="true" maxlength="200" />
         <!--<br>
         <input type="text" class="form-control" placeholder="Zip Code" name="zipcode" required="true" maxlength="4" />-->
         <br>
         <select id="province"  name="province" class="form-control" ></select>
         <br>
        <select id="city"  name="city" class="form-control"></select> 
        <!--customer shipping address -->
    </div>
      <div class="modal-footer">
         <button type="submit" name="submitchangeshippingaddress" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- ship change -->








<!-- email change -->
<div class="modal fade" id="customer_email" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Email</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
 <form action = "process.php" method = "POST">
      <div class="modal-body"> 
        <!--customer shipping address -->
         <input type="email" class="form-control" placeholder="Email Address" name="customer_email"  required="true" maxlength="200" />
        <!--customer shipping address -->
    </div>
      <div class="modal-footer">
         <button type="submit" name="submitchangeemail" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- email change -->







<!-- contact change -->
<div class="modal fade" id="customer_contact_number" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Contact No.</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
 <form action = "process.php" method = "POST">
      <div class="modal-body"> 
        <!--customer contact -->
         <input type="text" class="form-control" pattern="^(09|\+639)\d{9}$" placeholder="Contact No. (11 digit Ex. 09051234567)" name="customer_contact_number"  required="true" maxlength="11" />
        <!--customer contact -->
    </div>
      <div class="modal-footer">
         <button type="submit" name="submitchangecontact" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- contact change -->











<!-- shipp details change -->
<div class="modal fade" id="shippdetails" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Do you want to update shipping details?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
 <form action = "process.php" method = "POST">
      <div class="modal-body"> 
        <!--customer shipping address -->
         <input type="text" class="form-control" placeholder="House Number, Building, Barangay and Street Name " name="house"  required="true" maxlength="200" />
        <!-- <br>
         <input type="text" class="form-control" placeholder="Zip Code" name="zipcode" required="true" maxlength="4" />-->
         <br>
         <select id="province1"  name="province" class="form-control" ></select>
         <br>
        <select id="city1"  name="city" class="form-control"></select>
        <br>
        <input type="email" class="form-control" placeholder="Email Address" name="customer_email"  required="true" maxlength="200" />
        <br>
        <input type="text" class="form-control" pattern="^(09|\+639)\d{9}$" placeholder="Contact No. (11 digit Ex. 09051234567)" name="customer_contact_number"  required="true" maxlength="11" />
        <!--customer shipping address -->
    </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-success" data-dismiss="modal">No thanks!</button>
         <button type="submit" name="submitchangeshippingdetails" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- shipping details change -->























<!-- recipient name change -->
<div class="modal fade" id="recipient_name" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Recipient Name</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
  <form action = "process.php" method = "POST">
      <div class="modal-body"> 
        <!--customer shipping address -->
         <input type="text" class="form-control" placeholder="Recipient Name" name="recipient_name"  required="true" maxlength="200" />
        <!--customer shipping address -->
    </div>
      <div class="modal-footer">
         <button type="submit" name="submitchangerecipientname" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- recipient name change -->







<!-- recipient shipp change -->
<div class="modal fade" id="recipient_address" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Recipient Shipping Address</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
 <form action = "process.php" method = "POST">
      <div class="modal-body"> 
        <!--customer shipping address -->
         <input type="text" class="form-control" placeholder="House Number, Building, Barangay and Street Name " name="house"  required="true" maxlength="200" />
         <!--<br>
         <input type="text" class="form-control" placeholder="Zip Code" name="zipcode" required="true" maxlength="4" /> -->
         <br>
         <select id="province2"  name="province" class="form-control" ></select>
         <br>
        <select id="city2"  name="city" class="form-control"></select> 
        <!--customer shipping address -->
    </div>
      <div class="modal-footer">
         <button type="submit" name="submitchangerecipientaddress" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- recipient shipp change -->











<!-- recipient contact number change -->
<div class="modal fade" id="recipient_contact_number" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Recipient Contact No.</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
<center>
  <form action = "process.php" method = "POST">
      <div class="modal-body"> 
       <!--customer contact -->
         <input type="text" class="form-control" pattern="^(09|\+639)\d{9}$" placeholder="Contact No. (11 digit Ex. 09051234567)" name="recipient_contact_number"  required="true" maxlength="11" />
        <!--customer contact -->
    </div>
      <div class="modal-footer">
         <button type="submit" name="submitchangerecipientcontactnumber" class="btn btn-primary">Update</button>
      </div>
</form>
</center>


    </div>
  </div>
</div>
</div>
<!-- recipient contact number change -->












    <br><br><br>
<?php include "footer.php"; ?>
     <!-- footer -->








  <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->








<script>  
window.onload = function() {  

  // ---------------
  // basic usage
  // ---------------
  var $ = new City(); //for account holder
  $.showProvinces("#province");
  $.showCities("#city");


  var $1 = new City(); // for once pop up
  $1.showProvinces("#province1");
  $1.showCities("#city1");


  var $2 = new City(); //for recipient
  $2.showProvinces("#province2");
  $2.showCities("#city2");
  // ------------------
  // additional methods 
  // -------------------

  
}
</script>


<script type="text/javascript">
    $(window).on('load',function(){
      if(localStorage.getItem('popState') != 'shown'){
        $('#shippdetails').modal('show');
        localStorage.setItem('popState','shown');
    }
    });
</script>



<script type="text/javascript">

    function shop()
    {
        window.location.replace("home.php")
    }




 $('#dataTable').dataTable({
    "bSort": false,
    "searching": false,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
})
</script>


<script>
function toggle(className, obj) {
    var $input = $(obj);
    if ($input.prop('checked')) $("#recipient").show();
    else $("#recipient").hide();
}
</script>

  
</body>
</html>
<?php }} ?>
