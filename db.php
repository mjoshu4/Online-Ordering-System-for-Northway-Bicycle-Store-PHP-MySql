<?php
date_default_timezone_set('Asia/Manila');

$servername = "localhost";
$usernamedb = "root";
$passworddb = "";
$dbname = "northwaydb";


// Create connection
$conn = mysqli_connect($servername, $usernamedb, $passworddb, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>