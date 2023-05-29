<?php
include "../includes/coon.php";
include "../includes/session.php";

// Retrieve the client ID and product list IDs
$client_id = $_POST['clientID'];
$product_ids = $_POST['productIDs'];

// Convert the product IDs array to a comma-separated string
$product_ids_str = implode(",", $product_ids);

// Get the name and dosage of the products in the product list
$sql = "SELECT name, dosage FROM list_prodoit WHERE id IN ($product_ids_str)";
$result = mysqli_query($coon, $sql);
$product_list = array();
while ($row = mysqli_fetch_assoc($result)) {
    $product_list[] = $row;
}

if (!empty($product_list)) {
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
                WHERE lp2.id IN ($product_ids_str)
            )
            AND o.next_date > CURDATE()";

    $result = mysqli_query($coon, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // The client has already purchased similar products with the next sale date passed
            // You can iterate over the rows and generate the table rows dynamically
            $table_data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $table_data[] = array(
                    'name' => $row['name'] ." " .$row['dosage'],
                    'amount' => $row['amount'],
                    'next_date' => date('d/m/Y', strtotime($row['next_date']))
                );
            }
            echo json_encode($table_data); // Send the table data as JSON response
        } else {
            // The client can buy the products in the list
            echo "The client can buy the products in the list.";
        }
    } else {
        // Handle the error if the query execution fails
        echo "Error: " . mysqli_error($coon);
    }
} else {
    echo "No products found.";
}

mysqli_close($coon);
?>
