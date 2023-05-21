<?php
include "../includes/coon.php";
include "../includes/session.php";
$id_pharm = $_SESSION['id_pharm'] ; 
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $pwd = $_POST['pwd'];
    if ($pwd!==$_POST['cpwd']) {
        $response = array('success' => false, 'message' => 'Failed to create user');
        header('Content-Type: application/json');
        echo json_encode($response);
        exit ; 
    }
    // Perform necessary validation and sanitization on the form data
    // ...

    // Check if the username is already taken
    $query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($coon, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Username is already taken
        $response = array('success' => false, 'message' => 'Username is already taken');
    } else {
        // Hash the password
        $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $query = "INSERT INTO `users` (`id_pharm`, `name`, `username`, `pwd`, `role`) VALUES ('$id_pharm' , '$name', '$username', '$hashed_password', '$role')";
        $result = mysqli_query($coon, $query);

        if ($result) {
            // User creation successful
            $response = array('success' => true);
        } else {
            // User creation failed
            $response = array('success' => false, 'message' => 'Failed to create user');
        }
    }

    // Close the database connection
    mysqli_close($coon);

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);

    header("Location: ../premision.php");
}
?>