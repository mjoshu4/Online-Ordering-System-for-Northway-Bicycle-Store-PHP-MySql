<?php session_start(); ?>
  <?php include '../db.php'; ?> <!-- database -->
    <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
 else
 {
    ?>
  <?php 
  $order_number = $_GET['order_number'];
  $query = "SELECT * from customer_order where order_number = '$order_number'";
  $result = mysqli_query($conn,$query);
  $numrows = mysqli_num_rows($result);
  if($numrows!=0)
  {
 
  $order_number = $_GET['order_number'];
  $query = "SELECT * from customer_order where order_number = '$order_number'";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $customer_order_status = $row['customer_order_status'];
  $customer_order_date = date("m/d/Y", strtotime($row['customer_order_date']));
  $customer_session_cart = $row['customer_session_cart'];
  $customer_payment_method = $row['customer_payment_method'];
  $customer_shipping_address = $row['customer_shipping_address'];

  $query = "SELECT * from customer where customer_id = '$customer_session_cart'";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
  $customer_email = $row['customer_email'];
  $customer_fullname = strtolower($row['customer_fullname']);
  $customer_contact_number = $row['customer_contact_number'];
  include '../fee.php';

  ?>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0em;  /* this affects the margin in the printer settings */
    }
</style>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Invoice - Preview</title>
  <link rel='shortcut icon' href='../library/images/icon.png' type='image/x-icon' />
  <!-- Bootstrap core CSS-->
  <link href="../library/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../library/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../library/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../library/css/bs.css" rel="stylesheet">
  
</head>
<script>
function myFunction() {
    window.print();
    location.replace("invoice.php");
}
</script>


<body onload="myFunction()">
<br>
<div class="container">
  <div class="card">
<div class="card-header">
Invoice #
<strong><?php echo $order_number; ?> - <?php echo $customer_order_date; ?></strong> 
  <span class="float-right"> <strong>Status:</strong> <?php if(empty($customer_order_status)) { echo $customer_order_status = 'Pending'; } elseif($customer_order_status == 'Delivery') { echo $customer_order_status = 'On Delivery'; } else {echo $customer_order_status; } ?></span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-4">
<h6 class="mb-3">From:</h6>
<div>
<strong>North Way Bicycle Store</strong>
</div>
<div>Karuhatan Valenzuela City.</div>
<div>Email: northwaybicyclestore@gmail.com</div>
<div>Phone: +63 907 0430 021</div>
</div>


<div class="col-sm-4">
<h6 class="mb-3">To:</h6>
<div>
<strong><?php echo ucwords($customer_fullname); ?></strong>
</div>
<div><?php echo $customer_shipping_address; ?></div>
<div>Email: <?php echo $customer_email; ?></div>
<div>Phone: +<?php echo $customer_contact_number; ?></div>
</div>





<div class="col-sm-4">
<img src="../library/images/logo.png" width="300" height="120" />
</div>





</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Product</th>
<th>Description</th>

<th class="right">Price</th>
  <th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>



<tbody>
<?php
$number = 0;
$grandtotal = 0;
$query = "select * from customer_order natural join product where order_number = '$order_number'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))  
                 {
                  $number++;
                  $product_name = $row['product_name'];
                  $product_description = str_replace(',', '', $row['product_description']);
                  $product_price = $row['product_price'];
                  $product_discount = $row['product_discount'];
                            if($product_discount>0){
                              $product_price = $product_price-($product_discount / 100) * $product_price;
                            }
                  $customer_quantity = $row['customer_quantity'];
                  $total = $product_price * $customer_quantity;
                 $grandtotal += $total;
                  ?>
<tr>
<td class="center"><?php echo $number; ?></td>
<td class="left strong"><?php echo $product_name; ?></td>
<td class="left"><?php echo $product_description; ?></td>

<td class="right"><?php echo "₱".number_format($product_price,2); ?></td>
  <td class="center"><?php echo $customer_quantity; ?></td>
<td class="right"><?php echo "₱".number_format($total,2); ?></td>
</tr>

<?php } ?>

</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>







<tr>
<td class="left">
<strong>Subtotal</strong>
</td>
<td class="right"><?php echo "₱".number_format($grandtotal,2); ?></td>
</tr>
<tr>
<td class="left">
<strong>Shipping Fee </strong>
</td>
<td class="right">  <?php

  if($customer_payment_method=="cod")
  {
    if($shipping_fee==0)
    {
    echo $shipping_fee_view1;
    }
    else
    {
      echo $shipping_fee_view;
    } 
  }
    else
    {
       echo "₱0"; 
    }

   ?></td>
</tr>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>
  <?php

  if($customer_payment_method=="cod")
  {
    echo "₱".number_format($grandtotal+$shipping_fee,2); 
  }
    else
    {
       echo "₱".number_format($grandtotal,2); 
    }

   ?>
</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>
</body>
<?php }} ?>