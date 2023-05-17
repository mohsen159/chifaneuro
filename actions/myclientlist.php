<?php 
/**/
$id_pharm = "" ; 
$sql= "SELECT DISTINCT c.id, c.name
FROM client c
INNER JOIN ord o ON o.id_client = c.id
WHERE o.id_pharm =$id_pharm;"

?>