<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* this file will empliment the logic for  update and complite the precerition */

    include "../includes/coon.php";
    include "../includes/session.php";
    print_r($_POST);
    $sale_id = $_POST['salesid'];
    $clientid = $_POST['clientid'];
    $employs = $_POST['employs'];
    $order = $_POST['num_order'];
    $sale_date = $_POST['sale_date'];
    $dure = $_POST['dure'];
    $note = $_POST['note'];

    $complited = 1;
    $available = true;
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $lot = $_POST['lot'];
        $count = count($id); /// this is the id from products table 
        // first check if the product available 
        for ($i = 0; $i < $count; $i++) {
            if ($lot[$i] !== "0") {
                $sql = "SELECT amount FROM inventory WHERE list_prodoit = $id[$i]";
                $result = mysqli_query($coon, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $availableAmount = $row['amount'];
                    if ($availableAmount < $amount[$i]) {
                        echo "Sale cancelled - one or more products not available in sufficient quantities.";
                        $available = false;
                        break;
                    }
                } else {
                    echo "Invalid product";
                    $available = false;
                    break;
                }
            }
        }
        if ($available) {
            /// delet all existing noncomplited products for this sale 
            $sql = "DELETE FROM `noncompliant` WHERE ord_id = $sale_id";
            $result = mysqli_query($coon, $sql);
            /// after insert in changment  chnages and  insert noncomplite if exists 
            for ($i = 0; $i < $count; $i++) {

                if ($lot[$i] === "0") {
                    $productId = $id[$i];
                    $requestedAmount =   $amount[$i];
                    $sql =  $sql = "INSERT INTO `noncompliant`(`list_prodoit`, `ord_id`, `amount`) VALUES ( $productId,$sale_id , $requestedAmount)";
                    $result = mysqli_query($coon, $sql);
                    $complited = 0;
                } else {
                    $productId = $id[$i];
                    $requestedAmount =   $amount[$i];


                    $sql = "UPDATE `inventory` SET `amount` = `amount` - $requestedAmount WHERE list_prodoit = $productId AND lot = $lot[$i]";
                    $result = mysqli_query($coon, $sql);

                    if ($result) {
                        $affectedRows = mysqli_affected_rows($coon);

                        if ($affectedRows > 0) {
                            // Fetch the ID of the updated element
                            $sql = "SELECT id FROM `inventory` WHERE list_prodoit = $productId AND lot = $lot[$i]";
                            $result = mysqli_query($coon, $sql);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $updatedId = $row['id'];

                                $sql = "INSERT INTO `changement` (`amount`, `id_prodoit`, `id_ord`) VALUES ($requestedAmount, $updatedId , $sale_id)";
                                $result = mysqli_query($coon, $sql);
                            } else {
                                // Error handling for the SELECT query
                                echo "Failed to fetch the ID of the changed element.";
                            }
                        } else {
                            // No rows were affected
                            echo "No element was updated.";
                        }
                    } else {
                        // Error handling for the UPDATE query
                        echo "Failed to update the element.";
                    }
                }
            }
        }
    }
    // Update sales
    $ns = date('Y-m-d', strtotime($sale_date . ' + ' . $dure . ' days'));
    $stmt = $coon->prepare("UPDATE `prescription` SET `id_user` = ?, `id_client` = ?, `ord_date` = ?, `next_date` = ?, `order_ord` = ?, `dure` = ?, `complited` = ?, `note` = ? WHERE `id` = ?");
    $stmt->bind_param("iissssssi", $employs, $clientid, $sale_date, $ns, $order, $dure, $complited, $note, $sale_id);
    $stmt->execute();
    $stmt->close();
    header("Location: ../sales.php");
} else {
    // fix this later
}
