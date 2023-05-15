<?php


//just for test it works fine 

$sql = "SELECT
  o.id,
  GROUP_CONCAT(CONCAT(REPLACE(lp.name, '(', ''), ' ', REPLACE(lp.dosage, ')', ''), ' : ', c.amount) SEPARATOR '\n') AS medication_info,
  GROUP_CONCAT(CONCAT(REPLACE(nlp.name, '(', ''), ' ', REPLACE(nlp.dosage, ')', ''), ' : ', nc.amount) SEPARATOR '\n') AS non_completed_info
FROM `ord` o
LEFT JOIN `changement` c ON o.id = c.id_ord
LEFT JOIN `prodoit` p ON c.id_prodoit = p.id
LEFT JOIN `list_prodoit` lp ON p.list_prodoit = lp.id
LEFT JOIN `noncompliant` nc ON o.id = nc.ord_id
LEFT JOIN `list_prodoit` nlp ON nc.list_prodoit = nlp.id
GROUP BY o.id;
"; 


/// v2 the hole stuff is here homi 

$sql2 = "SELECT
  o.id,
  GROUP_CONCAT(CONCAT(REPLACE(lp.name, '(', ''), ' ', REPLACE(lp.dosage, ')', ''), ' : ', c.amount) SEPARATOR '\n') AS medication_info,
  GROUP_CONCAT(CONCAT(REPLACE(nlp.name, '(', ''), ' ', REPLACE(nlp.dosage, ')', ''), ' : ', nc.amount) SEPARATOR '\n') AS non_completed_info,
  CONCAT(cl.fname, ' ', cl.name) AS client_name,
  cl.id AS client_id,
  u.name AS user_name,
  u.id AS user_id,
  o.id_pharm,
  o.created AS order_created,
  o.ord_date,
  o.next_date,
  o.dure,
  o.ModifiedDate,
  o.complited
FROM `ord` o
LEFT JOIN `changement` c ON o.id = c.id_ord
LEFT JOIN `prodoit` p ON c.id_prodoit = p.id
LEFT JOIN `list_prodoit` lp ON p.list_prodoit = lp.id
LEFT JOIN `noncompliant` nc ON o.id = nc.ord_id
LEFT JOIN `list_prodoit` nlp ON nc.list_prodoit = nlp.id
LEFT JOIN `client` cl ON o.id_client = cl.id
LEFT JOIN `users` u ON o.id_user = u.id
GROUP BY o.id
LIMIT 0, 25;
"


?>