<?php include 'navi.php'; ?>
<!-- To be continued category-->
  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
  elseif ($_SESSION['manages']=="1") {
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
        <li class="breadcrumb-item active">Product</li>
      </ol>
      <!-- Breadcrumbs active-->




<button type="button"  style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#modaladd"><i class="fa fa-fw fa-plus"></i>Add New Product</button>
<br>
<br>



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
                  <th>Discount</th>
                  <th>Options</th>
                    </tr>
                </thead>


                <tbody>
                    <?php 
                 $query = "SELECT 
    *
FROM product
LEFT JOIN supplier 
ON product.supplier_id=supplier.supplier_id
LEFT JOIN category 
ON product.category_id=category.category_id";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                            $product_code = $row['product_code'];
                            $product_name = $row['product_name'];
                            $product_img = $row['product_img'];
                            $product_description = $row['product_description'];
                            $supplier_name = $row['supplier_name'];
                            $category_name = $row['category_name'];
                            $product_price = $row['product_price'];
                            $product_discount = $row['product_discount'];
                ?>


                            
              <tr>

                  <td><?php echo $product_code; ?></td>
                  <td><?php echo $product_name; ?></td>
                  <td><a href="#preview<?php echo $product_code;?>" data-toggle="modal"><img src="upload/<?php echo $product_img; ?>" height="50" width="50" onerror="this.src='upload/default.png'" /></a></td>
                  <td><?php echo substr($product_description,0,25).'...'; ?></td>
                  <td><?php echo $supplier_name; ?></td>
                  <td><?php echo $category_name; ?></td>
                  <td nowrap><?php echo '₱ '.number_format($product_price,2); ?></td>
                  <td nowrap><?php echo $product_discount.'%'; ?></td>
                    <td>                    
                        <a href="#edit<?php echo $product_code;?>" data-toggle="modal"><i class="fa fa-edit" style="font-size:24px" ></i></a>
                        <a href="#delete<?php echo $product_code;?>" data-toggle="modal"><i class="fa fa-trash" style="font-size:24px; color:#ff6666;" ></i></a>
                    </td>
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
         <p>
         <?php 
         
         
          $string = $row['product_description']; 
        
        $array = explode(',', $string);
        echo implode("<br />", $array); 
         
         
         ?></p>
      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->














<!-- EDIT MODAL -->
<div class="modal fade" id="edit<?php echo $product_code;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


<form action = "process.php" method = "POST" enctype='multipart/form-data'>
      <div class="modal-body">
         <label hidden="true">Product Code:</label>
         <input type="text" name="product_code" class="form-control" hidden="true" value="<?php echo $product_code; ?>" />
          <label>Name:</label>
         <input type="text" class="form-control"  name="product_name" required="true" maxlength="200"  value="<?php echo $product_name; ?>" />
         <br>
         Image: <input type='file' id="myFile" name='product_img'/>
         <br>
         <br>
          <label>Description:</label>
         <textarea class="form-control" name="product_description" required="true"><?php echo $product_description; ?></textarea>


                        <label>Supplier:</label>
                           <select  name="supplier_id" required="true" class="form-control"  onchange="if (this.value == 'supplier.php') window.location.href=this.value">
                                   <?php
                                   $query1 = 'SELECT * FROM supplier order by supplier_name';
                                     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                 while ($row1 = mysqli_fetch_array($result1)) {
                                  ?>
                                    <option value="<?php echo $row1['supplier_id']; ?>" <?php if( $supplier_name == $row1['supplier_name']){ echo "selected"; } ?> ><?php echo $row1['supplier_name'];?></option>
                                <?php } ?>
                                 <option value="supplier.php">----Define new Supplier----</option>
                                </select>

       
                         <label>Category:</label>
                           <select  name="category_id" required="true" class="form-control"  onchange="if (this.value == 'category.php') window.location.href=this.value">
                                   <?php
                                      $query2 = 'SELECT * FROM category order by category_name';
                                     $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                 while ($row2 = mysqli_fetch_array($result2)) {
                                  ?>
                                    <option value="<?php echo $row2['category_id']; ?>" <?php if( $category_name == $row2['category_name']){ echo "selected"; } ?> ><?php echo $row2['category_name'];?></option>
                                <?php } ?>
                                 <option value="category.php" >----Define new Category----</option>
                                </select>
                      

            
          <label>Price:</label>
         <input type="number" class="form-control" name="product_price" required="true" step=".01" value="<?php echo $product_price; ?>" />
         <label>Discount:</label>
         <input type="number" class="form-control" name="product_discount" required="true" step=".01" value="<?php echo $product_discount; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submiteditproduct" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- EDIT MODAL -->








<!-- DELETE MODAL -->
<div class="modal fade" id="delete<?php echo $product_code;?>"" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Are you sure you want to delete Product Code: <?php echo $product_code; ?>?</label>
         <input type="text" name="product_code" class="form-control" hidden="true" value="<?php echo $product_code; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeleteproduct" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- DELETE MODAL -->












 <!-- Content-->

   


<!-- SCRIPT EDIT -->
<?php } ?>
<!-- SCRIPT EDIT -->






</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>




<!-- ADD MODAL -->
<div class="modal fade" id="modaladd" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST" enctype='multipart/form-data'>
      <div class="modal-body">
         <label>Name:</label>
         <input type="text" class="form-control" name="product_name" required="true" maxlength="200" />
         <br>
         Image: <input type='file' id="myFile" name='product_img'/>
         <br>
         <br>
          <label>Description:</label>
         <textarea class="form-control" name="product_description" required="true"></textarea>


                       <label>Supplier:</label>
                          <select  name="supplier_id" required="true" class="form-control" onchange="if (this.value == 'supplier.php') window.location.href=this.value">
                             <option value=""> --- SELECT --- </option>
                                   <?php
                               $query1 = 'SELECT * FROM supplier order by supplier_name';
                                     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                               while ($row1 = mysqli_fetch_array($result1)) {
                                  ?>
                                   <option value="<?php echo $row1['supplier_id']; ?>"><?php echo $row1['supplier_name'];?></option>
                                <?php } ?>
                               <option value="supplier.php">----Define new Supplier----</option>
                         </select>


       
                     <label>Category:</label>
                         <select name="category_id" required="true" class="form-control"  onchange="if (this.value == 'category.php') window.location.href=this.value">
                          <option value=""> --- SELECT --- </option>
                           <?php
                                 $query = 'SELECT * FROM category order by category_name';
                                     $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                 while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name'];?></option>
                                <?php }?>
                                 <option value="category.php">----Define new Category----</option>
                                </select>
            

          <label>Price:</label>
         <input type="number" class="form-control" name="product_price" step=".01" required="true" min="0"/>
          <label>Discount:</label>
         <input type="number" class="form-control" name="product_discount" step=".01" required="true" min="0"/>
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitaddproduct" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- ADD MODAL -->








<?php include 'footer.php'; ?>





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







</div>
</body>
</html>
<?php } ?>
