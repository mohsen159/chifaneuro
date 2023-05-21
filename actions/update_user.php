<?php
include "../includes/coon.php";
include "../includes/session.php";
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $id = $_POST['id_user'];
  $name = $_POST['name'];
  $username = $_POST['username'];
  $role = $_POST['role'];
  $pwd =   $_POST['pwd']; /// password should be hashed before insering beacuse it would not work 
  $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
  // Perform necessary validation and sanitization on the form data

  // Check if the username is already used by a different user ID
  $query = "SELECT id FROM users WHERE username = '$username' AND id <> $id";
  $result = mysqli_query($coon, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    // Username is already used by a different user ID
    $response = array('success' => false, 'message' => 'Username is already taken');
  } else {
    // Update the user in the database
    $query = "UPDATE `users` SET `name`='$name',`username`='$username',`pwd`='$hashed_password',`role`='$role'  WHERE id = '$id'";
    $result = mysqli_query($coon, $query);

    if ($result) {
      // User update successful
      $response = array('success' => true);
    } else {
      // User update failed
      $response = array('success' => false, 'message' => 'Failed to update user');
    }
  }

  // Close the database connection
  mysqli_close($coon);

  // Send the JSON response
  header('Content-Type: application/json');
  echo json_encode($response); /// deal with the error message 
  header("Location:  ../premision.php");
}
?>
