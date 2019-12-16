<?php include 'navi.php' ?>

  <?php 
 if( !isset($_SESSION["first_name"]) || !isset($_SESSION["last_name"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
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
        <li class="breadcrumb-item active">User Account</li>
      </ol>
      <!-- Breadcrumbs active-->






<!-- SCRIPT -->
<?php 

$session_username = $_SESSION['username'];

$query = "SELECT * FROM user where username = '$session_username'";

            $result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
              while($row = mysqli_fetch_array($result))
              {   
                $id= $row['user_id'];
                $first_name= $row['first_name'];
                $last_name= $row['last_name'];
                $username = $row['username'];
                $password = $row['password'];
                $email_add = $row['email_add'];
              }
?>
<!-- SCRIPT -->








  <form action = "process.php" method = "POST" enctype="multipart/form-data">


     <input type="hidden" name="id" value="<?php echo $id; ?>" />
     <input type="hidden" name="password" value="<?php echo $password; ?>" />

    <div class="form-group col-8">
        <label for="firstName">First Name:</label>
      <input type="text" class="form-control"  placeholder="Enter First Name" name="newfirst_name" required="true" value="<?php echo $first_name; ?>">
    </div>
    <div class="form-group col-8">
      <label for="lastName:">Last Name:</label>
      <input type="text" class="form-control"  placeholder="Enter Last Name " name="newlast_name" required="true" value="<?php echo $last_name; ?>">
    </div>
    <div class="form-group col-8">
      <label for="username">Username:</label>
      <input type="text" class="form-control"  placeholder="Enter Username " name="newusername" required="true" value="<?php echo $username; ?>"  maxlength="35">
      <label for="username" hidden="true">Username:</label>
      <input type="text" class="form-control"  placeholder="Enter Username " name="newusername_duplicate" required="true" value="<?php echo $username; ?>"  maxlength="35" hidden="true">
    </div>
      <div class="form-group col-8">
         Profile Picture: <input type='file' id="myFile" name='newprofile_picture'/>
    </div>
    <div class="form-group col-8">
      <label for="email">Email Address:</label>
      <input type="text" class="form-control" placeholder="Enter Email " name="new_email"   value="<?php echo $email_add; ?>"  maxlength="35">
      <label for="email" hidden="true">Email Address:</label>
      <input type="text" class="form-control" placeholder="Enter Email " name="new_email_duplicate"   value="<?php echo $email_add; ?>"  maxlength="35" hidden="true">
    </div>
    <div class="form-group col-8">
      <label for="password">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter Password " name="newpassword"  maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><small>Password must be contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</small>
    </div>
    <div class="form-group col-8">
      <label for="vpassword">Verify Password:</label>
      <input type="password" class="form-control"  placeholder="Verify Password " name="verifynewpassword"  maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    </div>
    <br>
    <div class="form-group col-8">
      <label for="cpassword:">Current Password To Confirm Changes:</label>
      <input type="password" class="form-control"  placeholder="Current Password " name="currentpassword" required="true">
    </div>
      <div class="ml-3"> 
    <button type="Reset" class="btn btn-secondary">Reset</button>
    <button type="submit" name="submituser" class="btn btn-primary">Submit</button>
  </div>
  </form>
  <br>










  


</div>
 <!-- Content-->

   


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