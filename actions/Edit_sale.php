<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* this file will empliment the logic for  update and complite the precerition */

    include "../includes/coon.php";
    include "../includes/session.php";

    $sale_id = $_POST['salesid'];
    $clientid = $_POST['clientid'];
    $employs = $_POST['employs'];
    $order = $_POST['num_order'];
    $sale_date = $_POST['sale_date'];
    $dure = $_POST['dure'];
    $note = $_POST['note'];


    $available = true;

    if ($available) {
        // Update sales
        $ns = date('Y-m-d', strtotime($sale_date . ' + ' . $dure . ' days'));
        $temp = 1;
        $stmt = $coon->prepare("UPDATE `prescription` SET `id_user` = ?, `id_client` = ?, `ord_date` = ?, `next_date` = ?, `order_ord` = ?, `dure` = ?, `complited` = ?, `note` = ? WHERE `id` = ?");
        $stmt->bind_param("iissssssi", $employs, $clientid, $sale_date, $ns, $order, $dure, $temp, $note, $sale_id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Deal with the error here
    }

    header("Location: ../sales.php");
}
{
    // fix this later
}