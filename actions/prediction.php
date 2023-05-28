<?php


include "../includes/coon.php";
include "../includes/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the end date from the AJAX request
    $end_date = $_POST['end_date'];

    // Call the getPredictionData function to retrieve the updated prediction data
    $predictionData = getPredictionData($end_date, $coon);

    // Generate the prediction table body HTML
    $predictionTableBody = '';
    foreach ($predictionData as $prediction) {
        $product_name = $prediction['product_name'];
        $product_dosage = $prediction['product_dosage'];
        $quantity = $prediction['quantity'];

        $predictionTableBody .= "<tr>";
        $predictionTableBody .= "<td>$product_name $product_dosage</td>";
        $predictionTableBody .= "<td>$quantity</td>";
        $predictionTableBody .= "</tr>";
    }

    // Return the prediction table body HTML
    echo $predictionTableBody;
    exit;
}

function getPredictionData( $end_date, $coon)
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

        $predictionData[] = array(
            'product_id' => $product_id,
            'list_product_id' => $list_product_id,
            'product_name' => $product_name,
            'product_dosage' => $product_dosage,
            'quantity' => $quantity
        );
    }
   // print_r($predictionData);
    return $predictionData;
}
?>