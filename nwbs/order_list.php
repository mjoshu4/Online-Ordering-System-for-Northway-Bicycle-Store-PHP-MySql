<?php include 'navi.php'; ?>
<!-- To be continued category-->
  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
  elseif ($_SESSION['order_list']=="1") {
   echo "<script>alert('Unauthorized Access...');</script>";
    echo '<script>history.back();</script>';
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




td{
  white-space:  nowrap; 
}




a:link {
  text-decoration: none;
}

</style>
  



 <!-- Content-->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs active-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Admin Panel</a>
        </li>
        <li class="breadcrumb-item active">Order List</li>
      </ol>
      <!-- Breadcrumbs active-->




  <!-- Table -->
       <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                     <tr>
                  <th>Order #.</th>
                  <th>Payment Method</th>
                  <th>Status</th>
                  <th>Client</th>
                  <th>Date Ordered</th>
                  <th>Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php 
                $query = "select * from customer_order  group by order_number ORDER BY customer_order_status='Approved' ASC, customer_order_status='Cancelled' ASC, customer_order_status='' DESC, customer_order_status='Delivery' DESC, customer_order_status='Noreceiver' DESC";
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
                              $customer_order_status ="<span class='labelcustom warning'>Pending</span>";
                              $state = "Pending";
                            }
                             if($customer_order_status=="Delivery")
                            {
                              $customer_order_status ="<span class='labelcustom other'>On Delivery</span>";
                              $state = "Delivery";
                            }
                             if($customer_order_status=="Approved")
                            {
                              $customer_order_status ="<span class='labelcustom success'>Approved</span>";
                              $state = "Approved";
                            }
                              if($customer_order_status=="Cancelled")
                            {
                              $customer_order_status ="<span class='labelcustom danger'>Cancelled</span>";
                              $state = "Cancelled";
                            }
                              if($customer_order_status=="Returned")
                            {
                              $customer_order_status ="<span class='labelcustom other1'>Returned</span>";
                              $state = "Returned";
                            }
                              if($customer_order_status=="Noreceiver")
                            {
                              $customer_order_status ="<span class='labelcustom other2'>Not Received</span>";
                              $state = "Returned";
                            }

                            $customer_session_cart = $row['customer_session_cart'];
                            $customer_shipping_address = $row['customer_shipping_address'];
                            $customer_order_date = date("m/d/Y", strtotime($row['customer_order_date']));

                             $query1 = "select * from customer where customer_id = '$customer_session_cart'";
                             $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                             $row1 = mysqli_fetch_array($result1);

                            $customer_fullname = $row1['customer_fullname'];
                            $customer_contact_number = $row1['customer_contact_number'];


                            //state is no need for process
                           
                ?>

                            
              <tr>

                  <td><?php echo "#".$order_number; ?></td>
                  <td><?php echo $customer_payment_method; ?></td>
                  <td nowrap><?php echo $customer_order_status; ?></td>
                  <td><?php echo $customer_fullname; ?></td>
                <td><?php echo $customer_order_date; ?></td>
               <td>
                <a href="#view<?php echo $order_number;?>" data-toggle="modal" style="color:blue;"><i class="fa fa-eye" style="font-size:24px" ></i> View</a>
                
                <?php if($state != 'Cancelled' && $state != 'Returned')
                { ?>
                <?php if($state == 'Pending')
                { ?>
                <a href="process.php?delivery=<?php echo $order_number;?>&customer_contact_number=<?php echo $customer_contact_number; ?>"  style="color:grey;"><i class="fa fa-truck" style="font-size:24px;color:grey;" ></i> On Delivery</a>
                <?php } ?>
                
                
                 <?php if($state == 'Delivery')
                { ?>
                <a href="process.php?approved=<?php echo $order_number;?>&state=<?php echo $state; ?>&customer_contact_number=<?php echo $customer_contact_number; ?>"  style="color:green;"><i class="fa fa-check" style="font-size:24px;color:green;" ></i> Approve</a>
                <a href="process.php?noreceiver=<?php echo $order_number;?>&state=<?php echo $state; ?>"  style="color:black;"><i class="fa fa-question" style="font-size:24px;color:black;" ></i> No Receiver</a>
                <?php } ?>
                
                <?php if($state != 'Approved')
                { ?>
                <a href="process.php?cancelled=<?php echo $order_number;?>&customer_contact_number=<?php echo $customer_contact_number; ?>"  style="color:red;"><i class="fa fa-times" style="font-size:24px;color:red;" ></i> Cancel</a>
                <?php } ?>
                
                
                
                 <?php if($state != 'Pending' && $state != 'Delivery')
                { ?>
                 <!--<a href="process.php?revert=<?php echo $order_number;?>&state=<?php echo $state; ?>"  style="color:orange;"><i class="fa fa-undo" style="font-size:24px;color:orange;" ></i> Revert</a>-->
                <a href="process.php?return=<?php echo $order_number;?>&state=<?php echo $state; ?>&customer_contact_number=<?php echo $customer_contact_number; ?>"  style="color:red;"><i class="fa fa-undo" style="font-size:24px;color:red;" ></i> Return</a>
                 <?php } ?>
                 <?php } ?>
                 
              </td>
                    <!-- Table -->





<!-- view MODAL -->
<div class="modal fade" id="view<?php echo $order_number;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">

<?php 
            include '../fee.php';
            if($shipping_fee==0)
            {
              echo $shipping_fee_view1;
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
                  <img src="upload/<?php echo $product_img; ?>"  height="150" width="150" onerror="this.src='upload/default.png'"/>
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
                     echo "<h6>Ship to: ".$customer_shipping_address."</h6>";
                     $total = "₱".number_format($total+$shipping_fee,2);
                     echo "<h6>Shipping Fee: ₱".number_format($shipping_fee,2)."</h6>";
                     echo "<h6>Total: $total</h6>";
                  }
                 else
                    {
                        echo "<h6>Ship to: ".$customer_shipping_address."</h6>";
                       $total = "₱".number_format($total,2);
                     echo "<h6>Total: $total</h6>"; 
                    }
?>


    </div>
  </div>
</div>
<!-- view MODAL -->











 <!-- Content-->

   


<!-- SCRIPT EDIT -->
<?php } ?>


</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>





<?php include 'footer.php'; ?>

<script type="text/javascript">
 $('#dataTable').dataTable({
    "bSort": false,
})
</script>






</body>
</html>
<?php } ?>
