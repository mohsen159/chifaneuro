<?php


include "../includes/coon.php";
include "../includes/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the end date from the AJAX request
    $end_date = $_POST['end_date'];

    // Call the getPredictionData function to retrieve the updated prediction data
    $predictionData = getPredictionData($end_date, $coon);
    $predictionTableBody = '';
    if (empty($predictionData)) {
        $predictionTableBody .= '<tr><td colspan="2" class="text-center">No products needed for the selected date.</td></tr>';
    } else {
        foreach ($predictionData as $prediction) {
            $product_name = $prediction['product_name'];
            $product_dosage = $prediction['product_dosage'];
            $quantity = $prediction['quantity'];

            $predictionTableBody .= "<tr>";
            $predictionTableBody .= "<td>$product_name $product_dosage</td>";
            $predictionTableBody .= "<td>$quantity</td>";
            $predictionTableBody .= "</tr>";
        }
    }

    echo $predictionTableBody;
    exit;
}

function getPredictionData($end_date, $coon)
{
    $id_pharm = $_SESSION['id_pharm'];
    $start_date = date("Y-m-d");
    // Query the database to fetch prediction data
    $sql = "SELECT p.id, lp.id AS list_id, lp.name, lp.dosage, SUM(c.amount) AS total_amount
            FROM `changement` c
            INNER JOIN inventory p ON c.id_prodoit = p.id
            INNER JOIN list_prodoit lp ON p.list_prodoit = lp.id
            WHERE c.id_ord IN (
                SELECT id
                FROM `prescription`
                WHERE next_date >= '$start_date' AND next_date < '$end_date' AND id_pharm = $id_pharm
            )
            GROUP BY p.id";
    $result = mysqli_query($coon, $sql);

    $predictionData = array();

    // Fetch prediction data and store it in an array
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['id'];
        $list_product_id = $row['list_id'];
        $product_name = $row['name'];
        $product_dosage = $row['dosage'];
        $quantity = $row['total_amount'];

        // Check if the product already exists in the inventory for the given list ID
        $existingQuantity = getExistingQuantity($list_product_id, $id_pharm, $coon);

        // Subtract the existing quantity from the prediction
        $quantity -= $existingQuantity;

        // If the quantity is less than or equal to zero, skip adding it to the prediction
        if ($quantity > 0) {
            // Add the prediction data to the array
            $predictionData[] = array(
                'product_id' => $product_id,
                'list_product_id' => $list_product_id,
                'product_name' => $product_name,
                'product_dosage' => $product_dosage,
                'quantity' => $quantity
            );
        }
    }
    //after 
    /// you have to add the prdocut from noncompilte table too because they should be served too 
    return $predictionData;
}
function getExistingQuantity($list_product_id, $pharm_id, $coon)
{
    // Query the database to get the existing quantity of a product in the inventory for the given list ID
    $sql = "SELECT SUM(amount) AS existing_quantity 
            FROM inventory 
            WHERE list_prodoit = $list_product_id AND pharm = $pharm_id";
    $result = mysqli_query($coon, $sql);
    $row = mysqli_fetch_assoc($result);
    $existingQuantity = $row['existing_quantity'];

    return $existingQuantity;
}

?>