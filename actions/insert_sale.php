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

// Retrieve the form data
$clientid = $_POST['clientid'];
$employs = $_POST['employs']; /// session vaibale 
$names = $_POST['name'];
$amounts = $_POST['amount'];
$lots = $_POST['lot'];
/// this part is for non complet 
$namen = $_POST['namen'];
$amountn = $_POST['amountn'];

$num_order = $_POST['num_order'];
$sale_date = $_POST['sale_date'];
$dure = $_POST['dure'];
$note = $_POST['note'];

/// check is prdocuts exit in the right formate 


// creat sales 


//insert change date 



// insert noncomplet if exist



/// return postion data from 



?>