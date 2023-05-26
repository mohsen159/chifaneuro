<?php


/// prototype of the prediction script 
$servername = "localhost";
$username = "root";
$password = "";
$ndbname = "memo";

// Create connection
$coon = new mysqli($servername, $username, $password, $ndbname);

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

// Retrieve the start and end dates for the period
$start_date = date("Y-m-d");
$end_date = date('Y-m-d', strtotime($start_date . ' + 2 month')); // Adjust the interval as needed

// Query the database to find the products purchased in potential orders within the time period
$sql = "SELECT p.id, lp.id AS list_id, lp.name, lp.dosage, SUM(c.amount) AS total_amount
        FROM `changement` c
        INNER JOIN prodoit p ON c.id_prodoit = p.id
        INNER JOIN list_prodoit lp ON p.list_prodoit = lp.id
        WHERE c.id_ord IN (
            SELECT id
            FROM `ord`
            WHERE next_date >= '$start_date' AND next_date < '$end_date'
        )
        GROUP BY p.id";
$result = mysqli_query($coon, $sql);

// Create an array to store the predicted products and their quantities
$predicted_products = array();
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['id'];
    $list_product_id = $row['list_id'];
    $product_name = $row['name'];
    $product_dosage = $row['dosage'];
    $amount = $row['total_amount'];
    $predicted_products[$product_id] = array(
        'list_id' => $list_product_id,
        'name' => $product_name,
        'dosage' => $product_dosage,
        'quantity' => $amount
    );
}

// Display the predicted products needed
if (!empty($predicted_products)) {
    echo "Predicted products needed within the period from $start_date to $end_date:<br>";
    foreach ($predicted_products as $product_id => $product_data) {
        $list_product_id = $product_data['list_id'];
        $product_name = $product_data['name'];
        $product_dosage = $product_data['dosage'];
        $quantity = $product_data['quantity'];
        echo "Product ID: $product_id, List Product ID: $list_product_id, Name: $product_name, Dosage: $product_dosage, Quantity: $quantity<br>";
    }
} else {
    echo "No predicted products needed within the period from $start_date to $end_date.";
}
