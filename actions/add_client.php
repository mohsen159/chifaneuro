<?php


///TODO: please add est here if the client allardy exits before inserting 
include "../includes/coon.php";
include "../includes/session.php";

//Check if the form data is received
if (isset($_POST['name'], $_POST['fname'])) {
    $name = $_POST['name'];
    $fname = $_POST['fname'];
   
    // prepare statement
    $stmt = $coon->prepare("INSERT INTO `client`( `fname`, `name`) VALUES (?, ?)");
    $stmt->bind_param("ss", $fname, $name);
    $stmt->execute();

    // get the ID of the newly inserted record
    $newId = $stmt->insert_id;

    // close statement and database coonection
    $stmt->close();
    $coon->close();

    // return the ID of the new insert
    echo $newId;
} else {
    // handle the case when form data is not received properly
    echo "Error: Form data is missing.";
}
