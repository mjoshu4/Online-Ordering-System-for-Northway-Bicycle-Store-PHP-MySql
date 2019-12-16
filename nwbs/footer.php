  <!-- footer -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small class="no-print">Copyright © North Way Bicycle Store <?php echo date("Y"); ?></small>
        </div>
      </div>
    </footer>
     <!-- footer -->







    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
 <!-- Scroll to Top Button-->






    
    <!-- Logout Modal-->
    <div class="modal fade" id="logout">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <p class="modal-title" id="exampleModalLabel">Are you sure you want to Logout?</p>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
<!-- Logout Modal-->




<script type="text/javascript">
  function dateCheck() {

    fDate = Date.parse(document.getElementById("durationstart").value);
    lDate = Date.parse(document.getElementById("durationend").value);

    if(fDate >lDate )   
        {
            alert("Please enter proper duration range");
            return false;
        }   
        else
        {
            return true;
        }

}
</script>



<!-- Boss
<script>
function hidepic() {
    var x = document.getElementById("boss");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
-->




    <!-- Bootstrap core JavaScript-->
   <!-- <script src="../library/vendor/jquery/jquery.min.js"></script> MALFUNCTION FOR ZOOMING IMAGES --> 
    <script src="../library/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../library/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../library/vendor/chart.js/Chart.min.js"></script>
    <script src="../library/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../library/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../library/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../library/js/sb-admin-datatables.min.js"></script>
    <script src="../library/js/sb-admin-charts.min.js"></script>