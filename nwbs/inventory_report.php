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
        <li class="breadcrumb-item active">Inventory Report</li>
      </ol>
      <!-- Breadcrumbs active-->









<form action="" class="form-inline no-print" onsubmit="return dateCheck()">
  <div class="form-group mb-2">
   <label for="inputPassword2">&nbsp;&nbsp;From&nbsp;</label>
    <input type="date" id="durationstart" name="from" class="form-control" required="true" value="<?php if(!empty($_GET['from'])){ echo $_GET['from']; }?>">
  </div>
  <div class="form-group mb-2">
    <label for="inputPassword2">&nbsp;&nbsp;To&nbsp;</label>
    <input type="date" id="durationend" name="to" class="form-control" required="true" value="<?php if(!empty($_GET['to'])){ echo $_GET['to']; }?>">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2">Filter&nbsp;</label>
    <select name="filter" required="true" class="form-control">                      
                                 <option disabled selected value> -- SELECT -- </option>
                                 <option value="incoming" <?php if(!empty($_GET['filter'])){if($_GET['filter']=="incoming"){echo "selected";}} ?>>Incoming</option>
                                 <option value="outgoing" <?php if(!empty($_GET['filter'])){if($_GET['filter']=="outgoing"){echo "selected";}} ?>>Outgoing</option>
                                </select>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Generate report</button>
</form>












  <!-- Table -->
     
          <div class="table-responsive">
               




               


<?php

  if(isset($_GET['from']) and isset($_GET['to']) and $_GET['filter'] == "incoming"){




// TOTAL IN


  $from = date("Y-m-d", strtotime($_GET['from']));
  $to = date("Y-m-d", strtotime($_GET['to']));






  $totalin = 0;
  $query = "SELECT * from stockin natural join product where  date_  between '$from' and  '$to'";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count >0 ) { ?>
<div class="forprintmargin">

     <table class="table">
                  <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Quantity IN</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php 

  while($row = mysqli_fetch_assoc($result)){

    $product_code = $row['product_code'];
    $product_name = $row['product_name'];
    $quantity = $row['quantity']; // TOTAL IN

    $totalin+=$quantity;

  ?>

                    <tr>
                      <td><?php echo $product_code; ?></td>
                      <td><?php echo $product_name; ?></td>
                      <td><?php echo $quantity; ?></td>
                    </tr>


                  <?php } 

                   $formtxt = $from = date("F d, Y", strtotime($_GET['from']));
                  $totxt =  $to = date("F d, Y", strtotime($_GET['to']));
                  echo "<center><img src='../library/images/banner.png' class='img-thumbnail forprintimg' style='border:none; display:none;' width='200'/><br><br><h6>Inventory report as of $formtxt to $totxt</h6></center><br><b>Incoming Stocks</b><br><br>"; ?> 

                    <tr>
                      <td><button class="btn btn-success no-print" onclick="window.print()"><i class="fa fa-print"></i> Print</button></td>
                      <td align="right"><b>Total: </b></td>
                      <td><b><?php echo $totalin; ?></b></td>
                    </tr>

                    <?php } else { echo "<br><center><b>Incoming Stocks</b><br><br>We have no stockin to this date.<br><br></center>"; } ?>



                   
                  </tbody>
                </table>
              </div>


<?php } ?>







<!-- TOTAL OUT -->
<?php

 if(isset($_GET['from']) and isset($_GET['to']) and $_GET['filter'] == "outgoing"){


// TOTAL OUT


$from = date("Y-m-d", strtotime($_GET['from']));
  $to = date("Y-m-d", strtotime($_GET['to']));
  $totalout = 0;
  $query = "SELECT product_code,product_name, sum(customer_quantity) as customer_quantity from customer_order natural join product where customer_order_status='Approved' and  customer_order_date  between '$from' and  '$to' group by product_code";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count >0 ) { ?>
<div class="forprintmargin">
     <table class="table">
                  <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Product Name</th>
                      <th>Quantity OUT</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php 

  while($row = mysqli_fetch_assoc($result)){

    $product_code = $row['product_code'];
    $product_name = $row['product_name'];
    $customer_quantity = $row['customer_quantity']; // TOTAL OUT

    $totalout+=$customer_quantity;

  ?>


                    <tr>
                      <td><?php echo $product_code; ?></td>
                      <td><?php echo $product_name; ?></td>
                      <td><?php echo $customer_quantity; ?></td>
                    </tr>


                  <?php } 

                  $formtxt = $from = date("F d, Y", strtotime($_GET['from']));
                  $totxt =  $to = date("F d, Y", strtotime($_GET['to']));
                  echo "<center><img src='../library/images/banner.png' class='img-thumbnail forprintimg' style='border:none; display:none;' width='200'/><br><br><h6>Inventory report as of $formtxt to $totxt</h6></center><br><b>Outgoing Stocks</b><br><br>"; ?>

                    <tr>
                      <td><button class="btn btn-success no-print" onclick="window.print()"><i class="fa fa-print"></i> Print</button></td>
                      <td align="right"><b>Total: </b></td>
                      <td><b><?php echo $totalout; ?></b></td>
                    </tr>

                    <?php } else { echo "<br><center><b>Outgoing Stocks</b><br><br>We have no stockout to this date.<br><br></center>"; } ?>



                   
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
