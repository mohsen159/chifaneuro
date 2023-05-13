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


// Check if the ID parameter is provided
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Perform the update operation based on the ID
  // Replace the following code with your specific update logic

  // Example: Update the product with ID to have a value of 0
  $sql = "UPDATE `prodoit` SET `amount`= 0   WHERE id = ?";
  $stmt = $coon->prepare($sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();

  // Check if the update was successful
  if ($stmt->affected_rows > 0) {
    $response = array('success' => true, 'message' => 'Product updated successfully');
  } else {
    $response = array('success' => false, 'message' => 'Product update failed');
  }

  // Return the response as JSON
  echo json_encode($response);
} else {
  $response = array('success' => false, 'message' => 'ID parameter not provided');
  echo json_encode($response);
}
