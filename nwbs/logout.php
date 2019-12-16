<?php session_start(); ?>
<?php




include '../db.php';
 date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO history (details, date_)
        VALUES ('". $_SESSION['first_name']." ".$_SESSION['last_name']." has Logout in the system using  ".$_SERVER['HTTP_USER_AGENT']." last ','".date("F j, Y, g:i a")."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');


foreach($_SESSION as $key => $val)
{

    if ($key !== 'session_cart' && $key !== 'customer_username' && $key !== 'customer_fullname' && $key !== 'errno')
    {

      unset($_SESSION[$key]);

    }

}
echo '<script>window.location.replace("login.php")</script>';
?>

