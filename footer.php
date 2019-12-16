


<style type="text/css">
    /* Footer */
section {
    padding: 20px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#footer {
    background: black !important;
}
#footer h5{
    border-bottom: 3px solid darkred;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:white;
}
#footer h6{
    color:white;
}
#footer p{
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer b{
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
  padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
  font-size:25px;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}
#footer ul.social li:hover a i {
  font-size:30px;
  margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
  color:#ffffff;
}
#footer ul.social li a:hover{
  color:#eeeeee;
}
#footer ul.quick-links li{
  padding: 3px 0;
  -webkit-transition: .5s all ease;
  -moz-transition: .5s all ease;
  transition: .5s all ease;
}
#footer ul.quick-links li:hover{
  padding: 3px 0;
  margin-left:5px;
  font-weight:700;
}
#footer ul.quick-links li a i{
  margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
  #footer h5 {
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}
</style>




<small>
<!-- Footer -->
  <section id="footer">
    <div class="container">
      <div class="row text-center text-xs-center text-sm-left text-md-left">
        <div class="col-lg">
          <h5>Northway Bicycle Store</h5>
          <b>Business Hours:</b>
            <p>Monday - Saturday<br>
              9:00 AM - 6:00 PM
            </p>
          <b>Online Shop - Business Hours:</b>
            <p>24/7</p>
          <b>Main address:</b>
            <p>
              4 A. Pablo St, Valenzuela,<br>
               1441 Metro Manila<br>
            Tel: +632  926-7243<br>
            Globe: 0917-5038506 / 0917-6541853<br>
            Smart: 0998-5685701<br>
            Sun: 0925-8825369<br>
            E-mail: northwaybicyclestore@gmail.com
          </p>
        </div>
        <div class="col-lg">
          <h5>Shorcut links</h5>
          <ul class="list-unstyled quick-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="viewcart.php">Cart</a></li>
            <li><a href="terms_and_conditions.php">Terms and Conditions</a></li>
            <li><a href="terms_and_conditions.php">Terms of Agreement</a></li>
          </ul>
          <br><br>
          <p><i class="fa fa-user"></i> Online : <?php echo $count_user_online; ?> <span class="online"></span></p>
          <h6>Payment Methods</h6>
          <br>
         <img src="library/images/paypal.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 50px;"/>
         <img src="library/images/visa.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 50px;"/>
         <img src="library/images/cod.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 50px;"/>
         <img src="library/images/dragonpay.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 50px;"/>
        </div>
        <div class="col-lg">
           <h5>Location Map</h5>
         <center><img src="library/images/loc.png" class="img-thumbnail" style="border:none;background-color:transparent; width: 300px;"/></center>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
          <ul class="list-unstyled list-inline social text-center">
            <li class="list-inline-item"><a href="https://www.facebook.com/northwaybicyclestore" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
            <li class="list-inline-item"><a href="https://www.twitter.com/northwaybicyclestore" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/northwaybicyclestore" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="https://plus.google.com/northwaybicyclestore" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
        </hr>
      </div>  
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
          <p>We provide high quality part, accessories, bicycles, and many more!</p>
          <p>&copy Copyright All right Reserved.<a class="text-green ml-2" href="home.php" target="_blank">Northway Bicycle Store.</a></p>
        </div>
        </hr>
      </div>  
    </div>
  </section>
  <!-- ./Footer -->
</small>




<div class="fb-customerchat"
 page_id="1224979607656611"
 minimized="true">
</div>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.2'
    });
  };
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>






    <!-- malfunction for zoom in image
    <script src="library/vendor/jquery/jquery.min.js"></script>
    <script src="library/js/jquery-3.3.1.js"></script> 
  -->



    <script src="library/js/city.js"></script> 






  <script src="https://www.google.com/recaptcha/api.js"
 async defer>
 </script>
<script>
$(document).ready(function(){
 $(".accessing").submit(function(){
   var response = grecaptcha.getResponse();
      if(response.length == 0){
          alert('Please check the Captcha');
    return false;
 } 
 });
});
</script>





    <script src="library/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="library/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="library/vendor/chart.js/Chart.min.js"></script>
    <script src="library/vendor/datatables/jquery.dataTables.js"></script>
    <script src="library/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->



    <!--
    <script src="library/js/sb-admin.min.js"></script>
     Custom scripts for this page
    <script src="library/js/sb-admin-datatables.min.js"></script>
    <script src="library/js/sb-admin-charts.min.js"></script>-->