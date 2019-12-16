<?php include 'nav.php';
include 'db.php';

      function input_($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

 ?>





  <?php 
             if( !isset($_SESSION["customer_fullname"]) || !isset($_SESSION["customer_username"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
else
{
    ?>





<style>
.labelcustom {
    color: white;
    padding: 5px;
    font-family: Arial;
    font-weight:bold;
    font-size: 0.6em;
}
.success {background-color: #4CAF50; border-radius:0.5em;} /* Green */
.info {background-color: #2196F3;border-radius:0.5em;} /* Blue */
.warning {background-color: #ff9800;border-radius:0.5em;} /* Orange */
.danger {background-color: #f44336;border-radius:0.5em;} /* Red */ 
.other {background-color: grey; color: white;border-radius:0.5em;} /* Gray */ 
.other1 {background-color: darkred; color: white;border-radius:0.5em;} /* darkred */ 
.other2 {background-color: black; color: white;border-radius:0.5em;} /* black */ 
</style>

  <!-- Table -->
        <div class="card-body">
          <div class="table-responsive">
      <table class="table table-borderless" cellspacing="0" id="dataTable" width="100%" cellspacing="0">



           <thead>
                    <tr>
                  <th>Order#</th>
                  <th>Payment Method</th>
                  <th>Status</th>
                  <th>Date Ordered</th>
                  <th>Action</th>
                    </tr>
                </thead>


                 <tbody>
                    <?php 
                    $customer_username = $_SESSION['customer_username'];
                     $query = "SELECT * from customer where customer_username ='$customer_username'";
                      $result = mysqli_query($conn,$query);
                      $row = mysqli_fetch_assoc($result);
                      $customer_id = $row['customer_id'];
                 $query = "select * from customer_order where customer_session_cart ='$customer_id' group by order_number ORDER BY customer_order_id DESC";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $order_number = $row['order_number'];
                            $customer_payment_method = $row['customer_payment_method'];
                            if($customer_payment_method == 'cod')
                            {
                              $customer_payment_method = "Cash on Delivery";
                            }
                            if($customer_payment_method == 'visa')
                            {
                              $customer_payment_method = "Visa Checkout";
                            }
                            $customer_order_status = $row['customer_order_status'];
                            if(empty($customer_order_status))
                            {
                              $customer_order_status ="<span class='labelcustom warning'>Processing</span>";
                            }
                            if($customer_order_status=="Delivery")
                            {
                              $customer_order_status ="<span class='labelcustom other'>On Delivery</span>";
                            }
                            if($customer_order_status=="Approved")
                            {
                              $customer_order_status ="<span class='labelcustom success'>Successful</span>";
                            }
                                if($customer_order_status=="Cancelled")
                            {
                              $customer_order_status ="<span class='labelcustom danger'>Cancelled</span>";
                            }
                                  if($customer_order_status=="Returned")
                            {
                              $customer_order_status ="<span class='labelcustom other1'>Returned</span>";
                            }
                              if($customer_order_status=="Noreceiver")
                            {
                              $customer_order_status ="<span class='labelcustom other2'>No Receiver</span>";
                              $state = "Returned";
                            }
                            $customer_order_date = date("m/d/Y", strtotime($row['customer_order_date']));
                            $customer_shipping_address = $row['customer_shipping_address'];

                            $query1 = "SELECT * from notification where notification_order_no ='$order_number' and notification_type ='followup'";
                            $result1 = mysqli_query($conn,$query1);
                            $countfollowup = mysqli_num_rows($result1);

                            $query2 = "SELECT * from notification where notification_order_no ='$order_number' and notification_type ='requestreturn'";
                            $result2 = mysqli_query($conn,$query2);
                            $countrequestreturn = mysqli_num_rows($result2);

                ?> 


                            
             <tr>
                  <td><?php echo $order_number; ?></td>
                  <td><?php echo $customer_payment_method; ?></td>
                  <td><?php echo $customer_order_status; ?></td>
                <td><?php echo $customer_order_date; ?></td>
               <td> 
                <a href="#view<?php echo $order_number;?>" data-toggle="modal"><i class="fa fa-eye" style="font-size:24px" ></i> View</a>
                <?php if(empty($row['customer_order_status']) && $countfollowup == 0 && date("d",strtotime($customer_order_date))+5 <= date("d") ) { ?><span>|</span> <a href="#followup<?php echo $order_number;?>" data-toggle="modal" style="color:green;"><i class="fa fa-arrow-up" style="font-size:24px" ></i> Follow up Order</a> <?php } ?>
                <?php if($row['customer_order_status']=="Approved" && $countrequestreturn == 0) { ?><span>|</span> <a href="#requestreturn<?php echo $order_number;?>" data-toggle="modal" style="color:red;"><i class="fa fa-undo" style="font-size:24px" ></i> Request return</a> <?php } ?>
               </td>
                    <!-- Table -->







<!-- VIEW MODAL -->
<div class="modal fade" id="view<?php echo $order_number;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">

<?php
            include 'fee.php';
            if($shipping_fee==0)
            {
              echo $shipping_fee_view;
            }
            $total = 0;
                 $query1 = "select * from customer_order natural join product where order_number = '$order_number'";
                 $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result1))
                 {
                  $product_img = $row['product_img']; 
                  $product_name = $row['product_name'];
                  $product_description = $row['product_description'];
                  $product_price = $row['product_price'];
                  $product_discount = $row['product_discount'];
                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                  $customer_quantity = $row['customer_quantity'];
                  ?>
                  <img src="nwbs/upload/<?php echo $product_img; ?>"  height="150" width="150" onerror="this.src='nwbs/upload/default.png'"/>
                  <?php
                  echo "<br><br>";
                  echo "Name: ".$product_name;
                  echo "<br><br>";
                    
                    echo "Description<br>";
                     $string = $product_description;
                    $array = explode(',', $string);
                    echo implode("<br />", $array);
    
       
                  echo "<br>";
                  echo "Price: ₱".number_format($product_price,2);
                  echo "<br>";
                  echo "Quantity: "."<b>x</b>".$customer_quantity;
                  echo "<br>";
                  echo "Total: ₱".number_format($customer_quantity * $product_price);
                  echo  "<br><br>";

                  $total += $customer_quantity * $product_price;
                   $customer_payment_method = $row['customer_payment_method'];
                 }
                 if($customer_payment_method=="cod")
                  {
                     $total = "₱".number_format($total+$shipping_fee,2);
                      echo "<h6>Shipping Fee: ₱".number_format($shipping_fee,2)."</h6>";
                     echo "<h6>Total: $total</h6>";
                  }
                 else
                    {
                       $total = "₱".number_format($total,2);
                     echo "<h6>Total: $total</h6>"; 
                    }
?>


    </div>
  </div>
</div>
</div>
<!-- VIEW MODAL -->












<!-- FOLLOW UP -->
<div class="modal fade" id="followup<?php echo $order_number;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Follow up order?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">

        Are you sure you want to follow up your order#<?php echo $order_number; ?>?



        

    </div>
      
     <div class="modal-footer">
      <form action="process.php" method="post">
        <input type="hidden" name="notification_username" value="<?php echo $customer_username; ?>">
        <input type="hidden" name="notification_order_no" value="<?php echo $order_number; ?>">
            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            <input type="submit" class="btn btn-primary btn-sm" name="followup" value="Yes follow up!">
      </form>
          </div>
  </div>
</div>
</div>
<!-- FOLLOW UP -->











<!-- REQUEST RETURN -->
<div class="modal fade" id="requestreturn<?php echo $order_number;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Request return</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">

    <form action="process.php" method="post" enctype="multipart/form-data">
        <label>State your reason for returning this product.</label>
        <textarea name="reason" class="form-control" rows="5" placeholder="Your product is defective..."></textarea>
        <br>
         Screenshot: <input type='file' id="myFile" name='screenshot'/>

        

    </div>
      
     <div class="modal-footer">
      
        <input type="hidden" name="notification_username" value="<?php echo $customer_username; ?>">
        <input type="hidden" name="notification_order_no" value="<?php echo $order_number; ?>">
            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">No</button>
            <input type="submit" class="btn btn-danger btn-sm" name="requestreturn" value="Submit">
      </form>
          </div>
  </div>
</div>
</div>
<!-- REQUEST RETURN -->











 <!-- Content-->

   


<!-- SCRIPT EDIT -->
<?php } ?>
<!-- SCRIPT EDIT -->






</tr>
</tbody>
</table>
<br><br>











</div>
</div>



<?php include "footer.php"; ?>
     <!-- footer -->








  <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->


<script>


  $('#myFile').bind('change', function() {

  //this.files[0].size gets the size of your file.
  
  var size = this.files[0].size;

  if(size>=3000000)
  {
   alert("File limit Exceed. Cannot be upload.");
   $('#myFile').val(null); 
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
})
</script>


</body>
</html>
<?php } ?>