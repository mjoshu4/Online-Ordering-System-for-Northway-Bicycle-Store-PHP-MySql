<?php


include 'library/Mobile_Detect.php';
$detect = new Mobile_Detect();

// Check for any mobile device.
if ($detect->isMobile()){ ?>



<!DOCTYPE html>
<html lang="en">
<head  id="page-top">
  <title>Northway Bicycle Store</title>
  <link rel='shortcut icon' href='library/images/icon.png' type='image/x-icon' />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap core CSS-->
  <link href="library/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="library/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="library/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="library/css/bs.css" rel="stylesheet">

</head>
<body>







<div class="container" align="center">



<br>
<img src="library/images/banner.png" class="img-thumbnail" style="border:none; width: 200px;">
<br><br>
<small>It seems you are using a mobile device</small>
<br><br>
 <a href="https://s3.amazonaws.com/gonativeio/static/5bc1ce4b4901061346e8d36a/app-release.apk"><img src="library/images/appdownload.svg"  width="70%" /></a>
 <br><br>
 <small>or Proceed to 
 <a href="home.php">Desktop Site.</a> </small>



</div>



<?php } else {
  echo '<script>window.location.replace("home.php")</script>';
} ?>









 






</body>
</html>