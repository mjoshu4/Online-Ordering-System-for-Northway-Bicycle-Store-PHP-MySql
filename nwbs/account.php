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
        <li class="breadcrumb-item active">Manage Accounts</li>
      </ol>
      <!-- Breadcrumbs active-->



<button type="button" onclick="password()" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#modaladd"><i class="fa fa-fw fa-plus"></i>Add New Account</button>
<br>
<br>
  <!-- Table -->
      <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Picture</th>
                  <th>Email Address</th>
                  <th>User Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                 $user_type = $_SESSION['user_type'];
                 $query = "select * from user where not user_type = '$user_type' and not user_type ='Superuser'";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                ?>
                <tr>
                  <td><?php echo $row['user_id']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><a href="#preview<?php echo $row['user_id'];?>" data-toggle="modal"><img src="profilepic/<?php echo $row['profile_picture']; ?>" height="50" width="50" onerror="this.src='profilepic/default.png'" /></a></td>
                  <td><?php echo $row['email_add'] ?></td>
                  <td><?php echo $row['user_type'] ?></td>
                  <td>
                    <?php if($row['status'] == "Enabled") 
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







<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $row['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview: <?php echo $username;?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">
        


             <script src='../library/js/jquery.zoom.js'></script>
  <script>
    $(document).ready(function(){
      $('#a<?php echo $row['user_id'];?>').zoom();
    });
  </script>
<style type="text/css">
  #a<?php echo $row['user_id'];?> img:hover { cursor: url(../library/images/zoom-in.cur), default; }
</style>
<span class='zoom' id='a<?php echo $row['user_id'];?>'>
        <img src='profilepic/<?php echo $row["profile_picture"]; ?>' class="img-thumbnail"  onerror="this.src='profilepic/default.png'"/>
</span>

      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->











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
         <input type="number" name="user_id" id="user_id" class="form-control" hidden="true" />


         <label>First Name:</label>
         <b><span id="first_name"></span></b>
         <br>

          <label>Last Name:</label>
         <b><span id="last_name"></span></b>
         <br>

          <label>Username:</label>
         <b><span id="username"></span></b>
         <br>

          <label>Email Address:</label>
         <b><span id="email_add"></span></b>
         <br>

          <label>Password:</label>
         <b><span>******</span></b><code>Encrypted</code>
         <br>

          <label>User Type:</label>
         <b><span id="user_type"></span></b>
         <br> 

         <label>Current Status:</label>
        <b><span id="status"></span></b>
         <br> 
          <select class="form-control" name="status" required="true">
         <option disabled selected value> --- Select --- </option>
          <option value="Enabled">Enabled</option>
          <option value="Disabled">Disabled</option>
        </select>

           
      </div>
      <div class="modal-footer">
         <button type="submit" name="submiteditaccount" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- EDIT MODAL -->

















<!-- ADD MODAL -->
<div class="modal fade" id="modaladd" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST" enctype="multipart/form-data">
      <div class="modal-body">
         <label>First Name:</label>
         <input type="text" class="form-control" name="first_name" required="true" maxlength="35"/>
          <label>Last Name:</label>
         <input type="text"  class="form-control" name="last_name" required="true" maxlength="35"/>
          <label>Username:</label>
         <input type="text"  class="form-control" name="username" required="true" maxlength="35" />
         <br>
         Profile Picture: <input type='file' id="myFile" name='profile_picture'/>
         <br><br>
          <label>Email:</label>
         <input type="email"  class="form-control" name="email_add" required="true" maxlength="35"/>
          <label>Generated Password:</label>
         <input type="text" id="passwordgen"  class="form-control" name="password" required="true" maxlength="35"  readonly="true" />
         <br>



        <?php 
           if ($_SESSION['user_type'] != "Superuser") { ?>
         <label>Privileges:</label>
         <div class="form-check">
        <label class="form-check-label" for="order_list">
          <input type="checkbox" class="form-check-input" name="order_list" value="order_list">Order List
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="manages">
         <input type="checkbox" class="form-check-input"  name="manages" value="manages">File Maintenance
       </label>
     </div>
      <div class="form-check">
        <label class="form-check-label" for="reports">
          <input type="checkbox" class="form-check-input" name="reports" value="reports">Reports
        </label>
      </div>
       
<?php } ?>



    </div>
      <div class="modal-footer">
         <button type="submit" name="submitaddaccount" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- ADD MODAL -->






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
         <label>Are you sure you want to delete user <span id="user_id"> </span>?</label>
         <input type="number" name="user_id" id="user_id" class="form-control" hidden="true" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeleteaccount" class="btn btn-primary">Submit</button>
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
    my_modal.contents().find('#user_id').val($(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#first_name').text($(this).parent().prev().prev().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#last_name').text($(this).parent().prev().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#username').text($(this).parent().prev().prev().prev().prev().prev().html());
     my_modal.contents().find('#email_add').text($(this).parent().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#user_type').text($(this).parent().prev().prev().prev().html());
    my_modal.contents().find('#status').html($(this).parent().prev().prev().html());
    my_modal.modal('show');
});




    $('.btn-delete').on('click',function(){
    var my_modal = $('#modaldelete');
    my_modal.contents().find('#user_id').val($(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().html());
    my_modal.contents().find('#user_id').text($(this).parent().prev().prev().prev().prev().prev().prev().prev().html()); // username to ng account
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
