<?php include 'nav.php';
$session_errno = $_SESSION['errno'] = 'notlogin'; // to remove pop up message
?>


<br>


<div class="container">
              <h4>For further information or if you have any questions please do not hesitate to contact.</h4>
          <br>
 
       
            <form method="post" action ="process.php">
              <input type="hidden" data-form-email="true">
              <div class="form-group">
                <input type="text" class="form-control" name="name" required="true" placeholder="Name*" data-form-field="Name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" required="true" placeholder="Email*" data-form-field="Email">
              </div>
              <div class="form-group">
                <input type="tel" class="form-control" name="phone" placeholder="Phone" data-form-field="Phone">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Message" rows="7" data-form-field="Message"></textarea>
              </div>
              <div>
                <button type="submit" name="contact" class="btn btn-sm btn-dark">Submit</button>
              </div>
            </form>
          <br><br><br>
</div>









<?php include "footer.php"; ?>
     <!-- footer -->








    <!--
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 Scroll to Top Button-->




  
</body>
</html>


