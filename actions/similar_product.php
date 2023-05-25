<?php
include "../includes/coon.php";
include "../includes/session.php";

// Retrieve the client ID and product list ID /// the values are just for the testing 
$client_id = 134;
$product_list_id = 67;

// Get the name and dosage of the product in the product list
$sql = "SELECT name, dosage FROM list_prodoit WHERE id = $product_list_id";
$result = mysqli_query($coon, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$dosage = $row['dosage'];

// Query to check if the client has similar products with the same DCI and next sale date passed
$sql = "SELECT p.id, lp.name, lp.dosage, c.amount, o.next_date
        FROM `prescription` o
        INNER JOIN changement c ON o.id = c.id_ord
        INNER JOIN inventory p ON c.id_prodoit = p.id
        INNER JOIN list_prodoit lp ON p.list_prodoit = lp.id
        WHERE o.id_client = $client_id 
        AND lp.dci IN (
            SELECT lp2.dci
            FROM list_prodoit lp2
            WHERE lp2.id = $product_list_id
        )
        AND o.next_date > CURDATE()";

$result = mysqli_query($coon, $sql);


if (mysqli_num_rows($result) > 0) {
    // The client has already purchased similar products with the next sale date passed
    // You can iterate over the rows and generate the table rows dynamically
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $dosage = $row['dosage'];
        $amount = $row['amount'];
        $next_date = $row['next_date'];

        // Generate the table row dynamically
        echo "<tr>";
        echo "<td>$name $dosage</td>";
        echo "<td>$amount</td>";
        echo "<td>$next_date</td>";
        echo "</tr>";
    }
} else {
    // The client can buy the products in the list
    echo "The client can buy the products in the list.";
}

// ... Your existing PHP code
?>


// Close the database connection
mysqli_close($coon);