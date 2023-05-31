<?php
function generateInvoice($title, $lines, $items)
{
    $invoiceContent = $title . "\n\n";

    // Add lines of text
    foreach ($lines as $line) {
        $invoiceContent .= $line . "\n";
    }

    $invoiceContent .= "\nItem\t\tQuantity\n";

    // Add items with quantities
    foreach ($items as $item => $quantity) {
        $invoiceContent .= $item . "\t\t" . $quantity . "\n";
    }

    return $invoiceContent;
}

if (isset($_GET['title']) && isset($_GET['lines']) && isset($_GET['items'])) {
    $title = $_GET['title'];
    $lines = explode(',', $_GET['lines']);
    $items = json_decode($_GET['items'], true);

    // Generate the invoice content
    $invoiceContent = generateInvoice($title, $lines, $items);

    // Save the invoice as a file
    $file = 'invoice.txt';
    $handle = fopen($file, 'w');
    fwrite($handle, $invoiceContent);
    fclose($handle);

    // Provide the file as a download
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile($file);
} else {
    echo 'Invalid request. Please provide the necessary parameters.';
}
?>
