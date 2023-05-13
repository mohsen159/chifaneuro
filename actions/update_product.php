<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "memo";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $expDate = $_POST["exp"];
    $amount = $_POST["amount"];
    $lot = $_POST["lot"];

    // Prepare and execute the SQL query to update the fields in the database
    $stmt = $connection->prepare("UPDATE prodoit SET lot = ?, amount = ?, Expiration = ? WHERE id = ?");
    $stmt->bind_param("sisi", $lot, $amount, $expDate, $id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        $response = array("success" => true, "message" => "Product updated successfully");
    } else {
        $response = array("success" => false, "message" => "Product update failed");
    }

    // Return the response as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Return an error response if the form data is not submitted
    $response = array("success" => false, "message" => "Form data not submitted");
    header("Content-Type: application/json");
    echo json_encode($response);
}

// Close the database connection
$connection->close();


?>