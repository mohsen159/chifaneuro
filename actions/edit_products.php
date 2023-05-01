<?php
$servername = "localhost";
$username = "root";
$password = "";
$ndbname = "memo";
// Create connection
$coon = new mysqli($servername, $username, $password, $ndbname);
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}




?>


