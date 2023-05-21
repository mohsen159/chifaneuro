<?php

include "../includes/coon.php";
include "../includes/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $user_id = $_POST['id_user'];
  $response = $user_id;

  // Delete the user from the database
  $query = "DELETE FROM users WHERE id = '$user_id'";
  $result = mysqli_query($coon, $query);

  if ($result) {
    // Check if any rows were affected
    $affected_rows = mysqli_affected_rows($coon);
    if ($affected_rows > 0) {
      // User deleted successfully
      $response = array('success' => true);
    } else {
      // No user was deleted
      $response = array('success' => false, 'message' => 'User found' . $user_id);
    }
  } else {
    // Error in executing the delete query
    $response = array('success' => false, 'message' => 'Failed to delete user');
  }
} else {
  // Invalid request method
  $response = array('success' => false, 'message' => 'Invalid request method');
}
// Close the database connection
mysqli_close($coon);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
header("Location:  ../premision.php");
?>