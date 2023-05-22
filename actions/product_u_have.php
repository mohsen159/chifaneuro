<?php
include "includes/session.php";
include "includes/coon.php";


// Retrieve the client ID
$client_id = 134; // Replace with the actual client ID

// Query to retrieve the products the client still has
$sql = "SELECT p.id, lp.name, lp.dosage, c.amount
        FROM `ord` o
        INNER JOIN changement c ON o.id = c.id_ord
        INNER JOIN prodoit p ON c.id_prodoit = p.id
        INNER JOIN list_prodoit lp ON p.list_prodoit = lp.id
        WHERE o.id_client = $client_id 
        AND o.next_date > CURDATE()
        AND c.amount > 0";

$result = mysqli_query($coon, $sql);

if (!$result) {
    // Error occurred during the query
    echo "Error: " . mysqli_error($coon);
    exit;
}

if (mysqli_num_rows($result) > 0) {
    // The client still has some products
    // You can iterate over the rows and process the data as needed
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['id'];
        $name = $row['name'];
        $dosage = $row['dosage'];
        $amount = $row['amount'];

        echo "Client still has the product (ID: $product_id, Name: $name, Dosage: $dosage) with quantity: $amount.<br>";
    }
} else {
    // The client does not have any products
    echo "The client does not have any products.";
}

// Close the database connection
mysqli_close($coon);
?>

