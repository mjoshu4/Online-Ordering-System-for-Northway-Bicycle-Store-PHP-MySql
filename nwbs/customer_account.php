<?php include 'navi.php' ?>

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
        <li class="breadcrumb-item active">Customer Accounts</li>
      </ol>
      <!-- Breadcrumbs active-->


  <!-- Table -->
      <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Customer ID</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Email Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                 $query = "select * from customer ";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                ?>
                <tr>
                  <td><?php echo $row['customer_id'] ?></td>
                  <td><?php echo $row['customer_fullname'] ?></td>
                  <td><?php echo $row['customer_username'] ?></td>
                  <td><?php echo $row['customer_email'] ?></td>
                  <td>
                    <?php if($row['customer_status'] == "Enabled") 
                    { 
                      echo '<span style="color:green;">Enabled<i class="fa fa-fw fa-check" style="color:green;"></i></span>'; 
                  } else
                   {
                    echo '<span style="color:red;">Disabled<i class="fa fa-fw fa-times" style="color:red;"></i></span>'; 
                   }
                 ?>
                 </td>
                  <td><i class="fa fa-fw fa-eye btn-edit" style="cursor:pointer; color:#007bff;"></i></a>
                    <?php 
                         if ($user_type == "Superuser") {
                      ?>
                    <i class="fa fa-fw fa-trash btn-delete" style="cursor:pointer; color:#ff6666;"></i></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
 <!-- Table get data using jquery -->











<!-- EDIT MODAL -->
<div class="modal fade" id="modaledit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Account Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">

         <label hidden="true">User ID:</label>
         <input type="text" name="customer_id" id="customer_id" class="form-control" hidden="true" />


         <label>Full Name:</label>
         <b><span id="customer_fullname"></span></b>
         <br>


          <label>Username:</label>
         <b><span id="customer_username"></span></b>
         <br>

          <label>Email Address:</label>
         <b><span id="customer_email"></span></b>
         <br>

          <label>Password:</label>
         <b><span>******</span></b><code>Encrypted</code>
         <br>

  
         <label>Current Status:</label>
        <b><span id="customer_status"></span></b>
         <br> 
          <select class="form-control" name="customer_status" required="true">
         <option disabled selected value> --- Select --- </option>
          <option value="Enabled">Enabled</option>
          <option value="Disabled">Disabled</option>
        </select>

           
      </div>
      <div class="modal-footer">
         <button type="submit" name="submiteditcustomer_account" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- EDIT MODAL -->











<!-- DELETE MODAL -->
<div class="modal fade" id="modaldelete" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Are you sure you want to delete User ID: <span id="customer_id"> </span>?</label>
         <input type="number" name="customer_id" id="customer_id" class="form-control" hidden="true" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeletecustomer_account" class="btn btn-danger">Delete</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- DELETE MODAL -->



























</div>
 <!-- Content-->

   







<?php include 'footer.php'; ?>





<script>

  $('.btn-edit').on('click',function(){
    var my_modal = $('#modaledit');
    my_modal.contents().find('#customer_id').val($(this).parent().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#customer_fullname').text($(this).parent().prev().prev().prev().prev().html());
    my_modal.contents().find('#customer_username').text($(this).parent().prev().prev().prev().html());
     my_modal.contents().find('#customer_email').text($(this).parent().prev().prev().html());
    my_modal.contents().find('#customer_status').html($(this).parent().prev().html());
    my_modal.modal('show');
});




    $('.btn-delete').on('click',function(){
    var my_modal = $('#modaldelete');
    my_modal.contents().find('#customer_id').val($(this).parent().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#customer_id').text($(this).parent().prev().prev().prev().prev().prev().html());
    my_modal.modal('show');
});


  function password(){
  var text = "";
  var possible="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
  for ( var i = 0; i < 5 ; i++)
  {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  document.getElementById("passwordgen").value = text;
}

</script>






</div>
</body>
</html>
<?php } ?>
