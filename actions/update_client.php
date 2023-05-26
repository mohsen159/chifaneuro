<?php
include "../includes/coon.php";
include "../includes/session.php";

// Retrieve form data
$id = $_POST['id'];
$name = $_POST['name'];
$familyName = $_POST['family_name'];
$dateOfBirth = $_POST['date_of_birth'];
$adress = $_POST['adress'];

// File upload handling
$card = $_FILES['id_card_photo']['name'];
$card_tmp = $_FILES['id_card_photo']['tmp_name'];

// Move the uploaded file to a desired location
$target_file = "img/" . basename($card);

if (move_uploaded_file($card_tmp, $target_file)) {
    // File upload success
    // Update the user record in the database with the uploaded file name

    // Prepare the SQL statement
    $sql = "UPDATE client SET `fname` = ?, `name` = ?, `Date_of_Birth` = ?, `card` = ?, `adress` = ? WHERE `id` = ?";
    $stmt = mysqli_prepare($coon, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sssssi", $familyName, $name, $dateOfBirth, $card, $adress, $id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Success
        echo "User data updated successfully.";
    } else {
        // Error
        echo "Error updating user data: " . mysqli_error($coon);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // File upload error
    echo "Error uploading file.";
}

// Close the database connection
mysqli_close($coon);

header("Location:  ../profail.php?id=$id");
?>
