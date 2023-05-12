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

$name = $_POST['name'];
$dosag = $_POST['dosage'];
$la_forme = $_POST['la_forme'];
// prepare statement
$stmt = $conn->prepare("INSERT INTO `list_prodoit`(`name`, `dosage`, `form`)  VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $dosag, $la_forme);
$stmt->execute();
// close database connection
mysqli_close($coon);
?>