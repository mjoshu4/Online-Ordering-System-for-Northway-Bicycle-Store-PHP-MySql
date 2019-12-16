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
        <li class="breadcrumb-item active">Supplier</li>
      </ol>
      <!-- Breadcrumbs active-->




<button type="button"  style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#modaladd"><i class="fa fa-fw fa-plus"></i>Add New Supplier</button>
<br>
<br>
  <!-- Table -->
 <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                  <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Contact Person</th>
                  <th>Action</th>
                   </tr>
                </thead>


                <tbody>
                    <?php 
                 $query = "select * from supplier";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                           $supplier_id = $row['supplier_id'];
                           $supplier_name= $row['supplier_name'];
                           $supplier_address = $row['supplier_address'];
                           $supplier_contact = $row['supplier_contact'];
                           $supplier_contact_person = $row['supplier_contact_person'];
                ?>


                            
              <tr>

                  <td><?php echo $supplier_name; ?></td>
                  <td><?php echo $supplier_address; ?></td>
                  <td><?php echo $supplier_contact; ?></td>
                  <td><?php echo $supplier_contact_person; ?></td>
          
                    <td>                    
                         <a href="#edit<?php echo $supplier_id;?>" data-toggle="modal"><i class="fa fa-edit" style="font-size:24px" ></i></a>
                        <a href="#delete<?php echo $supplier_id;?>" data-toggle="modal"><i class="fa fa-trash" style="font-size:24px; color:#ff6666;" ></i></a>
                    </td>
 <!-- Table -->




<!-- EDIT MODAL -->
<div class="modal fade" id="edit<?php echo $supplier_id;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Supplier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label hidden="true">Supplier ID:</label>
         <input type="number" name="supplier_id"  class="form-control" hidden="true" value="<?php echo $supplier_id; ?>" />
         <label>Name:</label>
         <input type="text"  class="form-control" name="supplier_name" required="true" maxlength="50" value="<?php echo $supplier_name; ?>" />
          <label>Address:</label>
         <input type="text"  class="form-control" name="supplier_address" required="true" maxlength="100"  value="<?php echo $supplier_address; ?>" />
          <label>Contact:</label>
         <input type="text"  class="form-control" name="supplier_contact" required="true" maxlength="50"  value="<?php echo $supplier_contact; ?>" />
          <label>Contact Person:</label>
         <input type="text"  class="form-control" name="supplier_contact_person" required="true" maxlength="100"  value="<?php echo $supplier_contact_person; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submiteditsupplier" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- EDIT MODAL -->






<!-- DELETE MODAL -->
<div class="modal fade" id="delete<?php echo $supplier_id;?>"" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Supplier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Are you sure you want to delete Supplier ID: <?php echo $supplier_id; ?>?</label>
         <input type="text" name="supplier_id" class="form-control" hidden="true" value="<?php echo $supplier_id; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeletesupplier" class="btn btn-primary">Submit</button>
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
        <h4 class="modal-title">Add New Supplier</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Name:</label>
         <input type="text"  class="form-control" name="supplier_name" required="true" maxlength="25" />
          <label>Address:</label>
         <input type="text"  class="form-control" name="supplier_address" required="true" maxlength="50"   />
          <label>Contact:</label>
         <input type="number"  class="form-control" name="supplier_contact" required="true" maxlength="20" />
         <label>Contact Person:</label>
         <input type="text"  class="form-control" name="supplier_contact_person" required="true" maxlength="50"   />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitaddsupplier" class="btn btn-primary">Submit</button>
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
