<?php
include "../includes/coon.php";
include "../includes/session.php";

$pharm_id = $_SESSION['id_pharm'];

// Execute SQL query
$sql = "SELECT
  o.id,
  GROUP_CONCAT(CONCAT(REPLACE(lp.name, '(', ''), ' ', REPLACE(lp.dosage, ')', ''), ' : ', c.amount) SEPARATOR '\n') AS medication_info,
  GROUP_CONCAT(CONCAT(REPLACE(nlp.name, '(', ''), ' ', REPLACE(nlp.dosage, ')', ''), ' : ', nc.amount) SEPARATOR '\n') AS non_completed_info,
  CONCAT(cl.fname, ' ', cl.name) AS client_name,
  cl.id AS client_id,
  u.name AS user_name,
  u.id AS user_id,
  o.id_pharm,
  DATE_FORMAT(o.created, '%d/%m/%Y') AS order_created,
  DATE_FORMAT(o.ord_date, '%d/%m/%Y') AS ord_date,
  DATE_FORMAT(o.next_date, '%d/%m/%Y') AS next_date,
  o.dure,
  o.ModifiedDate,
  o.complited
FROM `prescription` o
LEFT JOIN `changement` c ON o.id = c.id_ord
LEFT JOIN `inventory` p ON c.id_prodoit = p.id
LEFT JOIN `list_prodoit` lp ON p.list_prodoit = lp.id
LEFT JOIN `noncompliant` nc ON o.id = nc.ord_id
LEFT JOIN `list_prodoit` nlp ON nc.list_prodoit = nlp.id
LEFT JOIN `client` cl ON o.id_client = cl.id
LEFT JOIN `users` u ON o.id_user = u.id
WHERE o.id_pharm = $pharm_id
GROUP BY o.id
"; 
$result = mysqli_query($coon, $sql);

// Convert result set to JSON
$rows = array();
while($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
header('Content-Type: application/json');
echo json_encode($rows);
