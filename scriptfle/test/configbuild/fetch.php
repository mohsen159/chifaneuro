<?php
/// this file resive a sql query and lunch it 

include "coon.php" ; 

$sql = "SELECT * FROM `products` WHERE 1;";

$result = $pharm->query($sql);		
if ($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($row);
    
}

?>