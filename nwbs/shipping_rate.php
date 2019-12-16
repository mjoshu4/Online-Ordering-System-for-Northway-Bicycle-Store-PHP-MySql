<?php include 'navi.php' ?>
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
        <li class="breadcrumb-item active">Shipping Fee</li>
      </ol>
      <!-- Breadcrumbs active-->




<button type="button"  style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#modaladd"><i class="fa fa-fw fa-plus"></i>Add New Shipping Fee</button>
<br>
<br>
  <!-- Table -->
 <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                  <tr>
                  <th>Shipping ID</th>
                  <th>City</th>
                  <th>Delivery Fee</th>
                  <th>Action</th>
                   </tr>
                </thead>


                <tbody>
                    <?php 
                 $query = "select * from shipping_fee";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                           $shipping_id = $row['shipping_id'];
                           $shipping_city = $row['shipping_city'];
                           if($shipping_city == "Juan")
                           {
                               $shipping_city = "San Juan";
                           }
                           if($shipping_city == "Piñas")
                           {
                               $shipping_city = "Las Piñas";
                           }
                           $shipping_delivery_fee = $row['shipping_delivery_fee'];
                ?>


                            
              <tr>

                  <td><?php echo $shipping_id; ?></td>
                  <td><?php echo $shipping_city; ?></td>
                  <td><?php echo '₱'.number_format($shipping_delivery_fee,2); ?></td>
          
                    <td>                    
                         <a href="#edit<?php echo $shipping_id;?>" data-toggle="modal"><i class="fa fa-edit" style="font-size:24px" ></i></a>
                        <a href="#delete<?php echo $shipping_id;?>" data-toggle="modal"><i class="fa fa-trash" style="font-size:24px; color:#ff6666;" ></i></a>
                    </td>
 <!-- Table -->




<!-- EDIT MODAL -->
<div class="modal fade" id="edit<?php echo $shipping_id;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Shipping Fee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label hidden="true">Shipping ID:</label>
         <input type="number" name="shipping_id"  class="form-control" hidden="true" value="<?php echo $shipping_id; ?>" />
         <label>City:</label>



          <select  name="shipping_city" required="true" class="form-control">
                                 <option value=""> --- SELECT --- </option>
                                  <option value="Caloocan" <?php if( $shipping_city == "Caloocan" ){ echo "selected"; } ?> >Caloocan</option>
                                  <option value="Las Piñas" <?php if( $shipping_city == "Las Piñas" ){ echo "selected"; }  ?> >Las Piñas</option>
                                  <option value="Makati" <?php if( $shipping_city == "Makati" ){ echo "selected"; } ?> >Makati</option>
                                  <option value="Malabon" <?php if( $shipping_city == "Malabon" ){ echo "selected"; } ?> >Malabon</option>
                                  <option value="Mandaluyong" <?php if( $shipping_city == "Mandaluyong" ){ echo "selected"; } ?> >Mandaluyong</option>
                                  <option value="Manila" <?php if( $shipping_city == "Manila" ){ echo "selected"; } ?> >Manila</option>
                                  <option value="Marikina" <?php if( $shipping_city == "Marikina" ){ echo "selected"; } ?> >Marikina</option>
                                  <option value="Muntinlupa" <?php if( $shipping_city == "Muntinlupa" ){ echo "selected"; } ?> >Muntinlupa</option>
                                  <option value="Navotas" <?php if( $shipping_city == "Navotas" ){ echo "selected"; } ?> >Navotas</option>
                                  <option value="Parañaque" <?php if( $shipping_city == "Parañaque" ){ echo "selected"; } ?> >Parañaque</option>
                                  <option value="Pasay" <?php if( $shipping_city == "Pasay" ){ echo "selected"; } ?> >Pasay</option>
                                  <option value="Pasig" <?php if( $shipping_city == "Pasig" ){ echo "selected"; } ?> >Pasig</option>
                                  <option value="Pateros" <?php if( $shipping_city == "Pateros" ){ echo "selected"; } ?> >Pateros</option>
                                  <option value="Quezon" <?php if( $shipping_city == "Quezon" ){ echo "selected"; } ?> >Quezon City</option>
                                  <option value="San Juan" <?php if( $shipping_city == "San Juan" ){ echo "selected"; }  ?> >San Juan</option>
                                  <option value="Taguig" <?php if( $shipping_city == "Taguig" ){ echo "selected"; } ?> >Taguig</option>
                                  <option value="Valenzuela" <?php if( $shipping_city == "Valenzuela" ){ echo "selected"; } ?> >Valenzuela</option>
                                </select>
     <input type="text" class="form-control" name="shipping_city_duplicate" required="true" maxlength="100"  value="<?php echo $shipping_city; ?>" hidden="true"/>

          <label>Delivery Fee:</label>
         <input type="number" min="1" class="form-control" name="shipping_delivery_fee" required="true" value="<?php echo $shipping_delivery_fee; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submiteditshipping_rate" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- EDIT MODAL -->






<!-- DELETE MODAL -->
<div class="modal fade" id="delete<?php echo $shipping_id;?>"" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Shipping info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Are you sure you want to delete Shipping ID: <?php echo $shipping_id; ?>?</label>
         <input type="text" name="shipping_id" class="form-control" hidden="true" value="<?php echo $shipping_id; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeleteshipping_rate" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- DELETE MODAL -->










<!-- SCRIPT EDIT -->
<?php } ?>
<!-- SCRIPT EDIT -->






</tr>
</tbody>
</table>
</div>
</div>
</div>







<!-- ADD MODAL -->
<div class="modal fade" id="modaladd" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Shipping Fee</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>City:</label>
           <select  name="shipping_city" required="true" class="form-control">
                                   <option value=""> --- SELECT --- </option>
                                  <option value="Caloocan" >Caloocan</option>
                                  <option value="Piñas" >Las Piñas</option>
                                  <option value="Makati" >Makati</option>
                                  <option value="Malabon" >Malabon</option>
                                  <option value="Mandaluyong" >Mandaluyong</option>
                                  <option value="Manila" >Manila</option>
                                  <option value="Marikina" >Marikina</option>
                                  <option value="Muntinlupa" >Muntinlupa</option>
                                  <option value="Navotas" >Navotas</option>
                                  <option value="Parañaque" >Parañaque</option>
                                  <option value="Pasay" >Pasay</option>
                                  <option value="Pasig" >Pasig</option>
                                  <option value="Pateros" >Pateros</option>
                                  <option value="Quezon" >Quezon City</option>
                                  <option value="Juan" >San Juan</option>
                                  <option value="Taguig" >Taguig</option>
                                  <option value="Valenzuela" >Valenzuela</option>
                                </select>
          <label>Delivery Fee:</label>
         <input type="number" min="1"  class="form-control" name="shipping_delivery_fee" required="true"    />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitaddshipping_rate" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- ADD MODAL -->










</div>
 <!-- Content-->

   







<?php include 'footer.php'; ?>




</div>
</body>
</html>
<?php } ?>
