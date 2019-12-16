<?php include 'navi.php'; ?>
<!-- To be continued category-->
  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
    elseif ($_SESSION['user_type'] != "Superuser" && $_SESSION['user_type'] != "Admin") {
   echo "<script>alert('Unauthorized Access...');</script>";
    echo '<script>history.back();</script>';
 }
 else
 {
    ?>



<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


 <!-- Content-->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs active-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Admin Panel</a>
        </li>
        <li class="breadcrumb-item active">Stockin</li>
      </ol>
      <!-- Breadcrumbs active-->






  <!-- Table -->
       <div class="card mb-3">
  
       





 <!-- Table -->

        <div class="card-body">
          <div class="row" style="text-align: left; margin-bottom:4em;">
                <div class="col-sm-8">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                  <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Date</th>
                   </tr>
                </thead>


                <tbody>
                    <?php 
                 $query = "select * from stockin natural join product order by stockin_id DESC";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $product_code = $row['product_code'];
                            $product_name = $row['product_name'];
                            $product_img = $row['product_img'];
                           // $product_description = $row['product_description'];
                            $product_price = $row['product_price'];

                            $quantity = $row['quantity'];
                            $date_ = date("m/d/Y", strtotime($row['date_']));


                ?>


                            
              <tr>

         
                  <td><?php echo $product_name; ?></td>
                  <td><a href="#preview<?php echo $product_code;?>" data-toggle="modal"><img src="upload/<?php echo $product_img; ?>" height="50" width="50" onerror="this.src='upload/default.png'" /></a></td>
                  <td><?php echo number_format($product_price,2); ?></td>
                  <td><?php echo $quantity; ?></td>
                  <td><?php echo $date_; ?></td>
     
 <!-- Table -->










<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $product_code;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview: <?php echo $product_name;?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">
       

             <script src='../library/js/jquery.zoom.js'></script>
  <script>
    $(document).ready(function(){
      $('#a<?php echo $product_code;?>').zoom();
    });
  </script>
<style type="text/css">
  #a<?php echo $product_code;?> img:hover { cursor: url(../library/images/zoom-in.cur), default; }
</style>
<span class='zoom' id='a<?php echo $product_code;?>'>
        <img src='upload/<?php echo $product_img; ?>' class="img-thumbnail" onerror="this.src='upload/default.png'"/>
</span>
        
         
         
      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->

















<!-- SCRIPT EDIT -->
<?php
}











?>
<!-- SCRIPT EDIT -->






</tr>
</tbody>
</table>
</div>
</div>
<div class="col-sm-3">
 <form action = "process.php" method = "POST" enctype='multipart/form-data'>
      <div class="modal-body">

          <label>Product:</label>
                           <select required="true"  name="product_code" class="form-control js-example-basic-single"  onchange="if (this.value == 'product.php') window.location.href=this.value">
                                            <option value=""> --- SELECT ---</option>
                                   <?php
                                   $query1 = 'SELECT * from inventory natural join product order by stock ASC';
                                     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                 while ($row1 = mysqli_fetch_array($result1)) {
                                  ?>
                                    <option value="<?php echo $row1['product_code']; ?>"> <?php echo $row1['product_code'];?> - <?php echo $row1['product_name'];?> - In Stock:<?php echo $row1['stock'];?></option>
                                <?php } ?>
                                 <option value="product.php">----Define new Product----</option>
                                </select>
         <label>Quantity:</label>
         <input type="number" class="form-control" name="quantity" required="true" min="1" maxlength="20" />
         <br>
         <button type="submit" name="submitstockin" class="btn btn-primary">Add Stock</button>
      </div>
         </form>
      </div>
  </div>
</div>






 <!-- Content-->











</div>
</div>
</div>










<?php include 'footer.php'; ?>

<script type="text/javascript">
 $('#dataTable').dataTable({
    "bSort": false,
})
 // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>





</div>
</body>
</html>
<?php } ?>

