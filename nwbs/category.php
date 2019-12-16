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
        <li class="breadcrumb-item active">Category</li>
      </ol>
      <!-- Breadcrumbs active-->




<button type="button"  style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#modaladd"><i class="fa fa-fw fa-plus"></i>Add New Category</button>
<br>
<br>
  <!-- Table -->
 <div class="card mb-3">
        <div class="card-body">
          <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                <thead>
                  <tr>
                  <th>Thumbnail</th>
                  <th>Name</th>
                  <th>Action</th>
                   </tr>
                </thead>


                <tbody>
                    <?php 
                 $query = "select * from category";
                 $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                 while($row = mysqli_fetch_array($result))
                 {
                           $category_id = $row['category_id'];
                           $category_img = $row['category_img'];
                           $category_name = $row['category_name'];
                ?>


                            
              <tr>

                  <td><a href="#preview<?php echo $category_id;?>" data-toggle="modal"><img src="upload/<?php echo $category_img; ?>" height="50" width="50" onerror="this.src='upload/default.png'" /></a></td>
                  <td><?php echo $category_name; ?></td>
          
                    <td>                    
                        <a href="#edit<?php echo $category_id;?>" data-toggle="modal"><i class="fa fa-edit" style="font-size:24px" ></i></a>
                        <a href="#delete<?php echo $category_id;?>" data-toggle="modal"><i class="fa fa-trash" style="font-size:24px; color:#ff6666;" ></i></a>
                    </td>
 <!-- Table -->











<!-- IMAGE PREVIEW MODAL -->
<div class="modal fade" id="preview<?php echo $category_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Image Preview: <?php echo $category_name;?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>              
      <div class="modal-body">

             <script src='../library/js/jquery.zoom.js'></script>
  <script>
    $(document).ready(function(){
      $('#a<?php echo $category_id;?>').zoom();
    });
  </script>
<style type="text/css">
  #a<?php echo $category_id;?> img:hover { cursor: url(../library/images/zoom-in.cur), default; }
</style>
<span class='zoom' id='a<?php echo $category_id;?>'>
        <img src='upload/<?php echo $category_img; ?>' class="img-thumbnail"  onerror="this.src='upload/default.png'"/>
</span>


      </div>
    </div>
  </div>
</div>
<!-- IMAGE PREVIEW MODAL -->













<!-- EDIT MODAL -->
<div class="modal fade" id="edit<?php echo $category_id;?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST" enctype='multipart/form-data'>
      <div class="modal-body">
         <label hidden="true">Category ID:</label>
         <input type="number" name="category_id"  class="form-control" hidden="true" value="<?php echo $category_id; ?>" />
         <label>Name:</label>
         <input type="text"  class="form-control" name="category_name" required="true" maxlength="50"  value="<?php echo $category_name; ?>" />
          <input type="text"  class="form-control" name="category_name_duplicate" required="true" maxlength="50"  value="<?php echo $category_name; ?>" hidden="true"/>
         <br>
         <input type='file' id="myFile" name='category_img'/>
      </div>
      <div class="modal-footer">
         <button type="submit" name="submiteditcategory" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- EDIT MODAL -->












<!-- DELETE MODAL -->
<div class="modal fade" id="delete<?php echo $category_id;?>"" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST">
      <div class="modal-body">
         <label>Are you sure you want to delete Category ID: <?php echo $category_id; ?>?</label>
         <input type="text" name="category_id" class="form-control" hidden="true" value="<?php echo $category_id; ?>" />
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitdeletecategory" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- DELETE MODAL -->
















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







<!-- ADD MODAL -->
<div class="modal fade" id="modaladd" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


 <form action = "process.php" method = "POST" enctype='multipart/form-data'>
      <div class="modal-body">
         <label>Name:</label>
         <input type="text" class="form-control" name="category_name" required="true" maxlength="50" />
         <br>
         <input type='file' id="myFile" name='category_img'/>
      </div>
      <div class="modal-footer">
         <button type="submit" name="submitaddcategory" class="btn btn-primary">Submit</button>
      </div>
</form>


    </div>
  </div>
</div>
<!-- ADD MODAL -->










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
