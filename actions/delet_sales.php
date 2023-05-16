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

// Retrieve the order ID
$order_id = $_POST['saleId'];

// Retrieve the sales order details
$sql = "SELECT id_user, id_client, id_pharm FROM `ord` WHERE id = $order_id";
$result = mysqli_query($coon, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id_user'];
    $client_id = $row['id_client'];
    $pharm_id = $row['id_pharm'];

    // Retrieve the changes made in the order from the `changement` table
    $sql = "SELECT id_prodoit, amount FROM `changement` WHERE id_ord = $order_id";
    $result = mysqli_query($coon, $sql);

    // Restore the quantities of the products
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['id_prodoit'];
        $amount = $row['amount'];

        // Update the product quantity in the `prodoit` table by adding the amount
        $sql = "UPDATE `prodoit` SET `amount` = `amount` + $amount WHERE id = $product_id";
        mysqli_query($coon, $sql);
    }

    // Delete the records from the `changement` table
    $sql = "DELETE FROM `changement` WHERE id_ord = $order_id";
    mysqli_query($coon, $sql);

    // Delete the non-completed records from the `noncompliant` table
    $sql = "DELETE FROM `noncompliant` WHERE ord_id = $order_id";
    mysqli_query($coon, $sql);

    // Delete the sales order from the `ord` table
    $sql = "DELETE FROM `ord` WHERE id = $order_id";
    mysqli_query($coon, $sql);

    // Redirect the user back to the sales page or any desired page
    
    exit();
} else {
    // Handle the case when the order with the given ID does not exist
    echo "Invalid order ID: $order_id";
}



?>