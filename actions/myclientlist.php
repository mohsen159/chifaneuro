<?php
/**/

include "../includes/coon.php";
include "../includes/session.php";

$id_pharm = $_SESSION['id_pharm'] ; 

$sql= "SELECT DISTINCT c.id, c.name ,c.fname 
FROM client c
INNER JOIN prescription o ON o.id_client = c.id
WHERE o.id_pharm =$id_pharm;"
// you can use this for the count for the dashbord to 
?>