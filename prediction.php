<?php
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
$end_date = date('Y-m-d', strtotime($start_date . ' + 1 month')); // Adjust the interval as needed

// Query the database to find the products purchased in potential orders within the time period
$sql = "SELECT id_prodoit, SUM(amount) AS total_amount
        FROM `changement`
        WHERE id_ord IN (
            SELECT id
            FROM `ord`
            WHERE next_date >= '$start_date' AND next_date < '$end_date'
        )
        GROUP BY id_prodoit";
$result = mysqli_query($coon, $sql);

// Create an array to store the predicted products and their quantities
$predicted_products = array();
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['id_prodoit'];
    $amount = $row['total_amount'];
    $predicted_products[$product_id] = $amount;
}

// Display the predicted products needed
if (!empty($predicted_products)) {
    echo "Predicted products needed within the period from $start_date to $end_date:<br>";
    foreach ($predicted_products as $product_id => $amount) {
        echo "Product ID: $product_id, Quantity: $amount<br>";
    }
} else {
    echo "No predicted products needed within the period from $start_date to $end_date.";
}
