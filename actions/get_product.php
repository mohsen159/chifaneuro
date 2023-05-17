<?php
include "../includes/coon.php";
include "../includes/session.php";

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
