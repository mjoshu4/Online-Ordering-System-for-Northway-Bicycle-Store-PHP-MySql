<?php include 'nav.php'; ?>

  <?php 
 if( !isset($_SESSION["customer_fullname"]) || !isset($_SESSION["customer_username"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
else
{
    ?>



 <!-- Content-->
  <div class="content-wrapper">
 


<!-- SCRIPT -->
<?php 

$session_customer_username = $_SESSION['customer_username'];

$query = "SELECT * FROM customer where customer_username = '$session_customer_username'";

            $result = mysqli_query($conn, $query) or die("Connection failed: " . mysqli_connect_error());
              while($row = mysqli_fetch_array($result))
              {   
                $customer_id= $row['customer_id'];
                $customer_fullname= $row['customer_fullname'];
                $customer_username = $row['customer_username'];
                $customer_email = $row['customer_email'];
                $customer_password = $row['customer_password'];
                $customer_contact_number = $row['customer_contact_number'];
                $customer_address = $row['customer_address'];
                $customer_shipping_address = $row['customer_shipping_address'];
              }
?>
<!-- SCRIPT -->








  <form action = "process.php" method = "POST">


     <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>" />
     <input type="hidden" name="customer_password" value="<?php echo $customer_password; ?>" />

    <div class="form-group col-8">
        <label for="firstName">Full Name:</label>
      <input type="text" class="form-control"  placeholder="First Last" name="newcustomer_fullname" required="true" value="<?php echo $customer_fullname; ?>">
    </div>
            <?php
  if(!empty($customer_password))
  {
?> 
    <div class="form-group col-8">
      <label for="username">Username:</label>
      <input type="text" class="form-control"  placeholder="Enter Username " name="newcustomer_username" required="true" value="<?php echo $customer_username; ?>"  maxlength="35">
      <label for="username" hidden="true">Username:</label> <!--hidden duplicate -->
      <input type="text" class="form-control"  placeholder="Enter Username " name="newcustomer_username_duplicate" required="true" value="<?php echo $customer_username; ?>"  maxlength="35" hidden="true">
    </div>
     <?php } else { ?><!-- because we are using facebook and google login hidden username -->

<input type="text" class="form-control"  placeholder="Enter Username " name="newcustomer_username" required="true" value="<?php echo $customer_username; ?>"  maxlength="35" hidden="true">
<input type="text" class="form-control"  placeholder="Enter Username " name="newcustomer_username_duplicate" required="true" value="<?php echo $customer_username; ?>"  maxlength="35" hidden="true">

<?php } ?>







     <?php
  if(!empty($customer_password))
  {
?> 
    <div class="form-group col-8">
      <label for="email">Email Address:</label>
      <input type="text" class="form-control" name="newcustomer_email"  value="<?php echo $customer_email; ?>"  maxlength="35">
      <label for="email" hidden="true">Email Address:</label> <!--hidden duplicate -->
      <input type="text" class="form-control" name="newcustomer_email_duplicate"  value="<?php echo $customer_email; ?>"  maxlength="35" hidden="true">
    </div>
<?php }else{?><!-- because we are using facebook and google login hidden email -->

<input type="text" class="form-control" name="newcustomer_email"  value="<?php echo $customer_email; ?>"  maxlength="35" hidden="true">
<input type="text" class="form-control" name="newcustomer_email_duplicate"  value="<?php echo $customer_email; ?>"  maxlength="35" hidden="true">

<?php } ?>


       <div class="form-group col-8">
        <label for="firstName">Contact Number:</label>
      <input type="text" class="form-control"  placeholder="Ex. 0907xxxxxxx" name="newcustomer_contact_number" required="true" maxlength="11" value="<?php echo $customer_contact_number; ?>">
    </div>
     <div class="form-group col-8">
      <label for="text">Address:</label>
      <input type="text" class="form-control"  value="<?php echo $customer_address; ?>" name="newcustomer_address" placeholder="House Number, Building, Barangay and Street Name" required="true"  maxlength="200" >
    </div>
     <div class="form-group col-8">
      <label for="text">Shipping Address:</label>
      <input type="text" class="form-control"  value="<?php echo $customer_shipping_address; ?>" name="newcustomer_shipping_address" placeholder="House Number, Building, Barangay, Street Name Province and City" required="true" maxlength="200">
    </div>





<?php
  if(!empty($customer_password))
  {
?>  
    <div class="form-group col-8">
      <label for="password">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter Password " name="newcustomer_password"  maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><small>Password must be contain UpperCase, LowerCase, Number/SpecialChar and min 8 Chars</small>
    </div>
    <div class="form-group col-8">
      <label for="vpassword">Verify Password:</label>
      <input type="password" class="form-control"  placeholder="Verify Password " name="customer_verifynewpassword"  maxlength="35" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
    </div>
    <br>
    <div class="form-group col-8">
      <label for="cpassword:">Current Password To Confirm Changes:</label>
      <input type="password" class="form-control"  placeholder="Current Password " name="customer_currentpassword" required="true">
    </div>

<?php } ?>







      <div class="ml-3"> 
    <button type="Reset" class="btn btn-secondary">Reset</button>
    <button type="submit" name="submitcustomeruser" class="btn btn-primary">Submit</button>
  </div>
  </form>
  <br><br><br>






  


</div>
 <!-- Content-->

   











   <br>
<?php include "footer.php"; ?>
     <!-- footer -->



  <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->


  
</body>
</html>
<?php } ?>