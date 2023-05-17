<?php
include "../includes/coon.php";
include "../includes/session.php";

//Check if the form data is received
if (isset($_POST['name'], $_POST['dosage'], $_POST['la_forme'], $_POST['dci'])) {
    $name = $_POST['name'];
    $dosage = $_POST['dosage'];
    $la_forme = $_POST['la_forme'];
    $dci = $_POST['dci'];

    // prepare statement
    $stmt = $coon->prepare("INSERT INTO `list_prodoit`(`name`, `dosage`, `form`, `dci`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $dosage, $la_forme, $dci);
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

?>