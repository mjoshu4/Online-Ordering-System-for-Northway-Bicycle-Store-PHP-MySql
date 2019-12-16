<?php include 'navi.php' ?>
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






 <!-- Content-->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs active-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Admin Panel</a>
        </li>
        <li class="breadcrumb-item active">Notification</li>
      </ol>
      <!-- Breadcrumbs active-->


  <!-- Table -->
 <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                  <tr>
                  <th>Notification</th>
                  <th>Message</th>
                  <th>Date / Time</th>
                  <th>Screenshot</th>
                  <th>Action</th>
                   </tr>
                </thead>


                <tbody>

                    <?php 

                    $query = "SELECT * FROM notification order by notification_id DESC";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($result)){
                      $notification_id = $row['notification_id'];
                      $notification_message = $row['notification_message'];
                      $notification_screenshot = $row['notification_screenshot'];
                      $notification_username = $row['notification_username'];
                      $notification_order_no = $row['notification_order_no'];
                      $time_frame = $row['time_frame'];
                      $notification_read = $row['notification_read'];
                      $notification_type = $row['notification_type'];

                      $query1 = "SELECT * FROM customer where customer_username ='".$notification_username."'";
                      $result1 = mysqli_query($conn,$query1);
                      $row1 = mysqli_fetch_assoc($result1);
                      $customer_fullname = $row1['customer_fullname'];


                ?>
                            
              <tr>

                  <td><?php echo $customer_fullname; ?> was <?php if($notification_type=="followup") {echo "follow up";}else{echo "request return";} ?> of order #<?php echo $notification_order_no; ?></td>
                  <td><?php echo $notification_message; ?></td>
                  <td><?php echo $time_frame; ?></td>
                  <td><a href="#preview<?php echo $notification_id;?>" data-toggle="modal"><img src='upload/<?php echo $notification_screenshot; ?>' class="img-thumbnail" width="50"  onerror="this.src='upload/default.png'" /></a></td>
                    <td><?php if($notification_read=='N') { ?><a href="process.php?markasread=<?php echo $notification_order_no; ?>">Mark as Read</a><?php } ?></td>
 <!-- Table -->







<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $notification_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview:</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">
        


             <script src='../library/js/jquery.zoom.js'></script>
  <script>
    $(document).ready(function(){
      $('#a<?php echo $notification_id;?>').zoom();
    });
  </script>
<style type="text/css">
  #a<?php echo $notification_id;?> img:hover { cursor: url(../library/images/zoom-in.cur), default; }
</style>
<span class='zoom' id='a<?php echo $notification_id;?>'>
        <img src='upload/<?php echo $notification_screenshot; ?>' class="img-thumbnail"  onerror="this.src='upload/default.png'"/>
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
</div>















</div>
 <!-- Content-->

   







<?php include 'footer.php'; ?>

<script type="text/javascript">
   $('#dataTable').dataTable({
    "bSort": false,
})
</script>


</div>
</body>
</html>
<?php } ?>
