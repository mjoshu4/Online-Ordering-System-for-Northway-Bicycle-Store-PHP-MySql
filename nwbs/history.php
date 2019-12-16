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
        <li class="breadcrumb-item active">Audit Trail</li>
      </ol>
      <!-- Breadcrumbs active-->




         
            
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <!--<small> &nbsp;&nbsp; Note: Last record will be deleted if exceed 100 records.</small>-->
                  <table class="table">
                    <tbody>
<?php


         $query=mysqli_query($conn,"select * from history")or die(mysqli_error());
         $count =  mysqli_num_rows($query);

        if ($count>=100) {
           $query=mysqli_query($conn,"delete FROM history order by history_id asc limit 2")or die(mysqli_error());
        }




        $query=mysqli_query($conn,"select * from history order by history_id desc limit 100")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
        
?>
                      <tr>
                        <td><?php echo $row['details']. $row['date_'];?> <i class="fa fa-fw fa-check" style="color:green;"></i></td>
                      </tr>
                      
<?php } ?>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          
      
       
  



  









</div>
 <!-- Content-->

   








<?php include 'footer.php'; ?>

  </div>
</body>
</html>
<?php } ?>
