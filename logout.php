<?php session_start(); ?>
<?php




//Include Google client library 
include_once 'library/Google/Google_Client.php';
include_once 'library/Google/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '742380367471-345s82kb33418m9da3of32mu5kofuopr.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'tP0wfXE6PWU2QJL368dhTF9G'; //Google client secret
$redirectURL = 'https://nbws.000webhostapp.com/login.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('North Way Bicycle Store');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//Unset token and user data from session
unset($_SESSION['token']);
unset($_SESSION['userData']);

//Reset OAuth access token
$gClient->revokeToken();






foreach($_SESSION as $key => $val)
{

    if ($key !== 'username' && $key !== 'first_name' && $key !== 'last_name' && $key !== 'user_type' && $key !== 'manages' && $key !== 'reports' && $key !== 'order_list' && $key !== 'errno' )
    {

      unset($_SESSION[$key]); // kaya ganito para hindi maapektuhan yung session ng customer

    }

}
echo '<script>window.location.replace("login.php")</script>';
?>

