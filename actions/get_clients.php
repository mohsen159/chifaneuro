<?php

/** this file is just to fetch my own client in the pharm  */
include "../includes/coon.php";
include "../includes/session.php";

// Query all clients 
$query = "SELECT id as id_p, `fname`, `name` FROM `client` " ; 
$result = mysqli_query($coon, $query);

// Convert result set to JSON
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
header('Content-Type: application/json');
echo json_encode($rows);
