<?php
include "../includes/coon.php";
include "../includes/session.php";



$pharm_id = $_SESSION['id_pharm'];
// Retrieve the form data
$clientid = $_POST['clientid'];
$employs = $_POST['employs']; /// session vaibale 
$id = $_POST['id']; /// id of products table 
$amounts = $_POST['amount']; /// amount of the chnage in every prodcuts 
$num_order = $_POST['num_order'];
$sale_date = $_POST['sale_date'];
$dure = $_POST['dure'];
$note = $_POST['note'];

// Check if all products are available in sufficient quantities
// Assuming $id is the array of product IDs and $amounts is the array of corresponding amounts
$count = count($id); /// this is the id from products table 

$complited = 0;  // number of products not completed
if (isset($_POST['idn'])) {
    $complited = count($_POST['idn']);
}

$available = true;
for ($i = 0; $i < $count; $i++) {
    $productId = $id[$i];
    $requestedAmount = $amounts[$i];

    // Retrieve the product from the database using the ID
    $sql = "SELECT amount FROM inventory WHERE id = $productId";
    $result = mysqli_query($coon, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $availableAmount = $row['amount'];

        if ($availableAmount < $requestedAmount) {
            // The data is not valid, handle the insufficient amount case
            echo "Sale cancelled - one or more products not available in sufficient quantities.";
            $available = false;
            break;
        }
    } else {
        // The product does not exist in the database, handle the invalid product case
        echo "Invalid product with ID: $productId";
        $available = false;
        break;
    }
}

// If the loop completes without encountering any issues, the data is valid for the sale

if ($available) {

    // creat sales 
    $ns = date('Y-m-d', strtotime($sale_date . ' +  ' . $dure . ' days'));
    $temp =  ($complited == 0);
    $stmt = $coon->prepare("INSERT INTO `prescription` (`id_user`, `id_client`, `id_pharm`, `ord_date`, `next_date`, `order_ord`, `dure`, `complited`, `note`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisssiss", $employs, $clientid, $pharm_id, $sale_date, $ns, $num_order, $dure, $temp, $note);
    $stmt->execute();
    $sale_id = $stmt->insert_id;
    $stmt->close();
    //insert change date 
    // data using id and amount varbales  
    for ($i = 0; $i < $count; $i++) {
        $productId = $id[$i];
        $requestedAmount = $amounts[$i];

        // change the amount of  the product from the database using the ID
        $sql = "UPDATE `inventory` SET `amount` = `amount` - $requestedAmount WHERE id = $productId";
        $result = mysqli_query($coon, $sql);

        // Insert the change into the `changement` table
        $sql = "INSERT INTO `changement` (`amount`, `id_prodoit`, `id_ord`) VALUES ($requestedAmount, $productId, $sale_id)";
        $result = mysqli_query($coon, $sql);
    }
    // Insert non-completed if exist
    if ($complited > 0) {
        $idn = $_POST['idn'];  /// id in list  products 
        $amountn = $_POST['amountn']; // the amount of products non complited 
        for ($i = 0; $i < $complited; $i++) {
            $productId = $idn[$i];
            $requestedAmount = $amountn[$i];
            // Insert the change into the `changement` table
            $sql =  $sql = "INSERT INTO `noncompliant`(`list_prodoit`, `ord_id`, `amount`) VALUES ( $productId,$sale_id , $requestedAmount)";
            $result = mysqli_query($coon, $sql);
        }
    }
} else {
    // entry mistak deal with the product with ID: $productId 
}



/// return postion data from 


header("Location:  ../sales.php");
