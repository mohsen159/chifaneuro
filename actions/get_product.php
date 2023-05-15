<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memo";

// Create connection
$coon = new mysqli($servername, $username, $password, $dbname);

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
$pharm_id = $_SESSION['id_pharm'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $lot = $_POST["lot"];
    $sql = "SELECT  `amount` as max, `id` FROM `prodoit` WHERE list_prodoit = $id AND lot = $lot AND pharm = $pharm_id";
    $result = mysqli_query($coon, $sql);
    // Convert result set to JSON
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    
    header('Content-Type: application/json');
    echo json_encode($rows);
    exit;
}
