<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$ndbname = "memo";
// Create connection
$coon = new mysqli($servername, $username, $password, $ndbname);


// Query all products
$query = "SELECT id as id_p, name, dosage FROM list_prodoit";
$result = mysqli_query($coon, $query);

// Convert result set to JSON
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
header('Content-Type: application/json');
echo json_encode($rows);

