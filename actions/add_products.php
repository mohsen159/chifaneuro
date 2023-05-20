<?php
include "../includes/coon.php";
include "../includes/session.php";

$pharm_id = $_SESSION['id_pharm'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $lot = $_POST["lot"];
    $amount = $_POST["amount"];
    $exp = $_POST["exp"];
    $counter = count($id);

    for ($i = 0; $i < $counter; $i++) {
        $id_list = $id[$i];
        $l = $lot[$i];
        $a = $amount[$i];
        $e = $exp[$i]; 
        $sql =
            "SELECT * FROM `inventory` WHERE `list_prodoit`='$id_list' AND `pharm`='$pharm_id' AND `lot`= '$l'";
        $result = $coon->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "UPDATE `inventory` SET amount=(amount+ $a) WHERE id =" . $row["id"];
                $coon->query($sql);
            }
        } else {
            $sql = "INSERT INTO `inventory`(`list_prodoit`, `pharm`, `lot`, `amount`, `Expiration`)
        VALUES ('$id_list', '$pharm_id', '$l', '$a', '$e')";



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
