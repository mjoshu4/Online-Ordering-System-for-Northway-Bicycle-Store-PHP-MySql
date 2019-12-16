<?php include 'navi.php'; ?>
<!-- To be continued category-->
  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
  elseif ($_SESSION['reports']=="1") {
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
                $query = "select * from customer_order  group by order_number ORDER BY order_number DESC";
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
                            }
                             if($customer_order_status=="Delivery")
                            {
                              $customer_order_status ="<span class='labelcustom other'>On Delivery</span>";
                            }
                             if($customer_order_status=="Approved")
                            {
                              $customer_order_status ="<span class='labelcustom success'>Approved</span>";
                            }
                              if($customer_order_status=="Cancelled")
                            {
                              $customer_order_status ="<span class='labelcustom danger'>Cancelled</span>";
                            }
                              if($customer_order_status=="Returned")
                            {
                              $customer_order_status ="<span class='labelcustom other1'>Returned</span>";
                            }
                            $customer_session_cart = $row['customer_session_cart'];
                            $customer_order_date = date("m/d/Y", strtotime($row['customer_order_date']));

                             $query1 = "select * from customer where customer_id = '$customer_session_cart'";
                             $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                             $row1 = mysqli_fetch_array($result1);

                            $customer_fullname = $row1['customer_fullname'];
                ?>

                            
              <tr>

                  <td><?php echo "#".$order_number; ?></td>
                  <td><?php echo $customer_payment_method; ?></td>
                  <td nowrap><?php echo $customer_order_status; ?></td>
                     <td><?php echo $customer_fullname; ?></td>
                <td><?php echo $customer_order_date; ?></td>
               <td>
                <a href="invoice_preview.php?order_number=<?php echo $order_number;?>"><i class="fa fa-print" style="font-size:24px" ></i> Print</a>
               
              </td>
                    <!-- Table -->










 <!-- Content-->

   


<!-- SCRIPT EDIT -->
<?php }?>


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


</div>
</body>
</html>
<?php } ?>
