<?php
include "../includes/coon.php";
include "../includes/session.php";
$pharm_id = $_SESSION['id_pharm'];
$clientid = $_POST['clientid'];
$employs = $_POST['employs']; /// session vaibale 
$id = $_POST['id']; /// id of products table 
$amounts = $_POST['amount']; /// amount of the chnage in every prodcuts 
$num_order = $_POST['num_order'];
$sale_date = $_POST['sale_date'];
$dure = $_POST['dure'];
$note = $_POST['note'];
// Check if all products are available in sufficient quantities
$count = count($id); /// this is the id from products table 
$complited = 0;  // number of products not completed
if (isset($_POST['idn'])) {
    $complited = count($_POST['idn']);
}
$available = true;
for ($i = 0; $i < $count; $i++) {
    $productId = $id[$i];
    $requestedAmount = $amounts[$i];
    $sql = "SELECT amount FROM inventory WHERE id = $productId";
    $result = mysqli_query($coon, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $availableAmount = $row['amount'];
        if ($availableAmount < $requestedAmount) {
            echo "Sale cancelled - one or more products not available in sufficient quantities.";
            $available = false;
            break;
        }
    } else {
        echo "Invalid product with ID: $productId";
        $available = false;
        break;
    }
}
if ($available) {    // creat sales 
    $ns = date('Y-m-d', strtotime($sale_date . ' +  ' . $dure . ' days'));
    $temp =   $complited==0;
    $stmt = $coon->prepare("INSERT INTO `prescription` (`id_user`, `id_client`, `id_pharm`, `ord_date`, `next_date`, `order_ord`, `dure`, `complited`, `note`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisssiss", $employs, $clientid, $pharm_id, $sale_date, $ns, $num_order, $dure, $temp, $note);
    $stmt->execute();
    $sale_id = $stmt->insert_id;
    $stmt->close();
    for ($i = 0; $i < $count; $i++) {
        $productId = $id[$i];
        $requestedAmount = $amounts[$i];
        $sql = "UPDATE `inventory` SET `amount` = `amount` - $requestedAmount WHERE id = $productId";
        $result = mysqli_query($coon, $sql);
        $sql = "INSERT INTO `changement` (`amount`, `id_prodoit`, `id_ord`) VALUES ($requestedAmount, $productId, $sale_id)";
        $result = mysqli_query($coon, $sql);
    }
    if ($complited > 0) {
        $idn = $_POST['idn'];  /// id in list  products 
        $amountn = $_POST['amountn']; // the amount of products non complited 
        for ($i = 0; $i < $complited; $i++) {
            $productId = $idn[$i];
            $requestedAmount = $amountn[$i];
            $sql =  $sql = "INSERT INTO `noncompliant`(`list_prodoit`, `ord_id`, `amount`) VALUES ( $productId,$sale_id , $requestedAmount)";
            $result = mysqli_query($coon, $sql);
        }
    }
} else { /// deal with the error here 
}
/// return postion data from 
header("Location:  ../sales.php");
