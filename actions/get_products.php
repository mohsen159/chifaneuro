<?php

include "../includes/coon.php";
include "../includes/session.php";


$pharm_id = $_SESSION['id_pharm'];

// Execute SQL query
$sql = "SELECT p.id , CONCAT(l.name, ' ', l.dosage) AS name_dosage, p.lot, p.amount ,p.Expiration AS exp 
        FROM inventory p 
        JOIN list_prodoit l ON p.list_prodoit = l.id 
        WHERE p.pharm = $pharm_id and p.amount != 0;"; 
$result = mysqli_query($coon, $sql);

// Convert result set to JSON
$rows = array();
while($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
header('Content-Type: application/json');
echo json_encode($rows);

?>