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
</style>




 <!-- Content-->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs active-->
      <ol class="breadcrumb no-print">
        <li class="breadcrumb-item">
          <a href="#">Admin Panel</a>
        </li>
        <li class="breadcrumb-item active">Sales Report</li>
      </ol>
      <!-- Breadcrumbs active-->









<form action="" class="form-inline no-print" onsubmit="return dateCheck()">
  <div class="form-group mb-2">
   <label for="inputPassword2">&nbsp;&nbsp;From&nbsp;</label>
    <input type="date" id="durationstart" name="from" class="form-control" required="true" value="<?php if(!empty($_GET['from'])){ echo $_GET['from']; }?>">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2">To&nbsp;</label>
    <input type="date" id="durationend" name="to" class="form-control" required="true" value="<?php if(!empty($_GET['to'])){ echo $_GET['to']; }?>">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Generate report</button>
</form>












  <!-- Table -->
     
          <div class="table-responsive">
               




               


<?php

  if(isset($_GET['from']) and isset($_GET['to'])){
  $from = date("Y-m-d", strtotime($_GET['from']));
  $to = date("Y-m-d", strtotime($_GET['to']));
  $total = 0;
  $query = "SELECT order_number , customer_quantity, customer_session_cart, customer_payment_method, customer_order_date, sum(round(( product_price - (product_discount / 100) * product_price ),2)*customer_quantity) AS amount, customer_shipping_address from customer_order  left join product  on customer_order.product_code=product.product_code where customer_order_status = 'Approved' and  customer_order_date  between '$from' and  '$to' group by order_number";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count >0 ) { ?>
<div class="forprintmargin">
     <table class="table">
                  <thead>
                    <tr>
                      <th>Order #</th>
                      <th>Number of Items</th>
                      <th>Client</th>
                      <th>Date Ordered</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php 

  while($row = mysqli_fetch_assoc($result)){

    $order_number = $row['order_number'];
    $customer_quantity = $row['customer_quantity'];
    $customer_session_cart = $row['customer_session_cart'];
    $customer_payment_method = $row['customer_payment_method'];

     $query1 = "select * from customer where customer_id = '$customer_session_cart'";
     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
     $row1 = mysqli_fetch_array($result1);
     $customer_fullname = $row1['customer_fullname'];
     $customer_shipping_address = $row['customer_shipping_address'];
     include '../fee.php';

    $customer_order_date = $row['customer_order_date'];

    if($customer_payment_method!="cod"){
      $shipping_fee = 0;
    }

    $amount = $row['amount']+$shipping_fee; //discount and shipping fee calculated included based on query
 
    
    $total +=$amount;

  ?>


                    <tr>
                      <td><?php echo $order_number; ?></td>
                      <td><?php echo $customer_quantity; ?></td>
                      <td><?php echo $customer_fullname; ?></td>
                      <td><?php echo date("m/d/Y", strtotime($customer_order_date)); ?></td>
                      <td><?php echo number_format($amount,2); ?></td>
                    </tr>


                  <?php } 

                  $formtxt = $from = date("F d, Y", strtotime($_GET['from']));
                  $totxt =  $to = date("F d, Y", strtotime($_GET['to']));
                   echo "<center><img src='../library/images/banner.png' class='img-thumbnail forprintimg' style='border:none; display:none;' width='200'/><br><br><h6>Sales report as of $formtxt to $totxt</h6></center><br>"; ?> 

                    <tr>
                      <td><button class="btn btn-success no-print" onclick="window.print()"><i class="fa fa-print"></i> Print</button></td>
                      <td></td>
                      <td></td>
                      <td align="right"><b>Total: </b></td>
                      <td><b><?php echo number_format($total,2); ?></b></td>
                    </tr>

                    <?php } else { echo "<center><br><br><img src='../library/images/norest.png' class='img-thumbnail' style='border:none;' width='600' /></center>"; } ?>



                   
                  </tbody>
                </table>
              </div>







<?php } ?>


              </div>














  </div>
  </div>





   <?php include 'footer.php'; ?>




</div>
</body>
</html>
<?php } ?>
