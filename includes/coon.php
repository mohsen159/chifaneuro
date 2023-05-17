<?php

$servername = "localhost";
$username = "root";
$password = "";
$ndbname = "memo";
// Create connection
$coon= new mysqli($servername, $username, $password, $ndbname);


if ($coon->connect_error) {

    ///TODO: please do something about this error  i think about moddel resive a link and a message image to show the error
    die("coon failed: " . $coon->connect_error);
}