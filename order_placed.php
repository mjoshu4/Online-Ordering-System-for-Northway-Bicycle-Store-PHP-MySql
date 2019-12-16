<?php include 'nav.php';
include 'db.php';
 ?>
  <?php 
             if( !isset($_SESSION["customer_fullname"]) || !isset($_SESSION["customer_username"]) )
 {
    echo '<script>window.location.replace("login.php")</script>';
 }
 else
 {
  ?>      






  <?php 


if (!empty($_SESSION['orderplaced'])) {
 echo '<h1><center>'.$_SESSION['orderplaced'].'</center></h1>'; 
  echo '<small><center>Kindly wait for an sms/or email notification<br>for the delivery details.</center></small>'; 
  echo '<br><center><button type="button" onclick="shop()" style="border-radius: 0px !important;" class="btn btn-outline-primary m-1">CONTINUE SHOPPING <i class="fa fa-shopping-cart"></i></a></button></center>';
  unset($_SESSION['orderplaced']);
}
else
{
   echo '<h3><center><br><br>Session Expired ...</center></h3>'; 
}

  ?>






<?php } ?>


      <br><br><br><br><br><br>
<?php include "footer.php"; ?>
     <!-- footer -->








   <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->






<script type="text/javascript">

    function shop()
    {
        window.location.replace("home.php")
    }



 $('#dataTable').dataTable({
    "bSort": false,
    "searching": false,
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false,
})
</script>



  
</body>
</html>

