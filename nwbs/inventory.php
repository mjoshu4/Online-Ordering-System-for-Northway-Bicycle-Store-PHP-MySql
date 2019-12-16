<?php include 'navi.php'; ?>
<!-- To be continued category-->


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
.other {background-color: #e7e7e7; color: black;border-radius:0.5em;} /* Gray */ 
</style>


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

 <!-- Content-->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs active-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Admin Panel</a>
        </li>
        <li class="breadcrumb-item active">Inventory</li>
      </ol>
      <!-- Breadcrumbs active-->




  <!-- Table -->
       <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                    <tr>
                  <th>Product Code</th>
                  <th>Name</th>
                  <th>Thumbnail</th>
                  <th>Description</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Critical Level</th>
                    </tr>
                </thead>


                <tbody>
                    <?php 
                 $query = "SELECT 
    *
FROM inventory
LEFT JOIN product 
ON inventory.product_code=product.product_code
LEFT JOIN category 
ON product.category_id=category.category_id
LEFT JOIN supplier
ON product.supplier_id=supplier.supplier_id";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $product_code = $row['product_code'];
                            $product_name = $row['product_name'];
                            $product_img = $row['product_img'];
                            $product_description = $row['product_description'];
                            $supplier_name = $row['supplier_name'];
                            $supplier_address = $row['supplier_address'];
                            $supplier_contact = $row['supplier_contact'];
                            $supplier_contact_person = $row['supplier_contact_person'];
                            $category_name = $row['category_name'];
                            $product_price = $row['product_price'];
                            $stock = $row['stock'];

                             if($stock >= 5)
                            {
                               $critical_level = '<span class="labelcustom success">GOOD</span>';
                            }

                            if($stock< 5)
                            {
                              $critical_level = '<span class="labelcustom warning">CRITICAL</span>';
                            }

                            if($stock <= 0)
                            {
                              $critical_level =  '<a href="#supplier'.$supplier_name.'" style="text-decoration:none;" data-toggle="modal"><span class="labelcustom danger">EMPTY </span>&nbsp;&nbsp;<img src="../library/images/call-icon.gif" height="20" width="20"></a>';
                            }


                ?>


                            
              <tr>

                  <td><?php echo $product_code; ?></td>
                  <td><?php echo $product_name; ?></td>
                  <td><a href="#preview<?php echo $product_code;?>" data-toggle="modal"><img src="upload/<?php echo $product_img; ?>" height="50" width="50" onerror="this.src='upload/default.png'" /></a></td>
                  <td><?php echo substr($product_description,0,25).'...'; ?></td>
                  <td><?php echo $supplier_name; ?></td>
                  <td><?php echo $category_name; ?></td>
                  <td><?php echo number_format($product_price,2); ?></td>
                  <td><?php echo $stock; ?></td>
                  <td nowrap><?php echo $critical_level; ?></td>
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
        <img src='upload/<?php echo $product_img; ?>' class="img-thumbnail"  onerror="this.src='upload/default.png'"/>
</span>

         <label>Description:</label>
         <p><?php
         
         
          $string = $row['product_description']; 
        
        $array = explode(',', $string);
        echo implode("<br />", $array);
         
         ?></p>
      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->










<!-- SUPPLIER CONTACT PREVIEW MODAL -->
<div class="modal fade" id="supplier<?php echo $supplier_name; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $supplier_name; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">
         <b>Contact Information:</b>
        <p><?php echo $supplier_name; ?>
          <br>
          <?php echo $supplier_address; ?>
          <br>
          <?php echo $supplier_contact; ?>
          <br>
          <?php echo $supplier_contact_person; ?>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- SUPPLIER CONTACT PREVIEW MODAL -->










 <!-- Content-->

   


<!-- SCRIPT EDIT -->
<?php
}
?>


</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>





<?php include 'footer.php'; ?>







</div>
</body>
</html>
<?php } ?>
