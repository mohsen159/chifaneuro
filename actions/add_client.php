<?php
$servername = "localhost";
$username = "root";
$password = "";
$ndbname = "memo";
// Create coonection
$coon = new mysqli($servername, $username, $password, $ndbname);

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
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
