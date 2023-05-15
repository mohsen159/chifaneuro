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
$pharm_id = $_SESSION['id_pharm'];
// Retrieve the form data
$clientid = $_POST['clientid'];
$employs = $_POST['employs']; /// session vaibale 
$id = $_POST['id']; /// id of products table 
$amounts = $_POST['amount']; /// amount of the chnage in every prodcuts 
/// this part is for non complet 
$idn = $_POST['idn'];
$amountn = $_POST['amountn'];

$num_order = $_POST['num_order'];
$sale_date = $_POST['sale_date'];
$dure = $_POST['dure'];
$note = $_POST['note'];

// Check if all products are available in sufficient quantities
// Assuming $id is the array of product IDs and $amounts is the array of corresponding amounts
$count = count($id); /// this is the id from products table 
$complited =count($idn)>0?false : true ;  /// this is the id from list products 
$available = true;
for ($i = 0; $i < $count; $i++) {
    $productId = $id[$i];
    $requestedAmount = $amounts[$i];

    // Retrieve the product from the database using the ID
    $sql = "SELECT amount FROM prodoit WHERE id = $productId";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $availableAmount = $row['amount'];

        if ($availableAmount < $requestedAmount) {
            // The data is not valid, handle the insufficient amount case
            echo "Insufficient amount for product with ID: $productId";
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

if ($available)
{

    // creat sales 
    $ns = date('Y-m-d', strtotime($sale_date . ' +  ' . $dure . ' days'));
    $coon->begin_transaction();
    $sql = "INSERT INTO `ord`( `id_user`, `id_client`, `id_pharm`,  `ord_date`, `next_date`, `desc_ord`, `dure`,`complited`)  
    values ($employs,$clientid,$pharm_id,$sale_date ,$ns ,$num_order,$dure , $complited)";
    $coon->query($sql);
    $sale_id = $coon->insert_id; // Get the ID of the new sale record
    //insert change date 
    // data using id and amount varbales  
    

    // insert noncomplet if exist

} else {
    // entry mistak deal with the product with ID: $productId 
}



/// return postion data from 
