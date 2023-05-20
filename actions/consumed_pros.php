
<?php

include "../includes/coon.php";
include "../includes/session.php";

// Retrieve the client ID and product list ID /// the values are just for the testing 
$client_id = 134;

//  
$sql = "SELECT p.id, lp.name, lp.dosage, c.amount, o.next_date
        FROM `prescription` o
        INNER JOIN changement c ON o.id = c.id_ord
        INNER JOIN `inventory` p ON c.id_prodoit = p.id
        INNER JOIN list_prodoit lp ON p.list_prodoit = lp.id
        WHERE o.id_client = $client_id 
        AND o.next_date > CURDATE()";

$result = mysqli_query($coon, $sql);

if (mysqli_num_rows($result) > 0) {
    // The client has already purchased similar products with the next sale date passed
    // You can iterate over the rows and process the data as needed
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['id'];
        $name = $row['name'];
        $dosage = $row['dosage'];
        $amount = $row['amount'];
        $next_date = $row['next_date'];
        echo "Client has purchased a similar product $name $dosage with the next sale date ($next_date) <br>";
    }
} else {
    // The client can buy the products in the list
    echo "The client can buy the products in the list.";
}

// Close the database connection
mysqli_close($coon);
