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
$pharm_id = $_SESSION['id_pharm'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $lot = $_POST["lot"];
    $amount = $_POST["amount"];
    $counter = count($id);

    for ($i = 0; $i < $counter; $i++) {
        $id_list = $id[$i];
        $l = $lot[$i];
        $a = $amount[$i];  
        $sql =
        "SELECT * FROM `prodoit` WHERE `list_prodoit`='$id_list' AND `pharm`='$pharm_id' AND `lot`= '$l'";
        $result = $coon->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "UPDATE `prodoit` SET amount=(amount+ $a) WHERE id =" . $row["id"];
                $coon->query($sql);
            }
        } 
        else {
            $sql = "INSERT INTO `prodoit`(`list_prodoit`, `pharm`, `lot`, `amount`)
        VALUES (  $id_list, $pharm_id ,$l , $a  )";
        
            if ($coon->query($sql) === true) {
                // pass some information here like modification 
                echo "add ";
            } else {

                echo "Error: " . $sql . "<br>" . $coon->error;
            }
        }
    }
    // we have to change this for later use 
    header("Location:  ../products.php");
}
