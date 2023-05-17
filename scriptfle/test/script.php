<?php

// Read the JSON data from a file
$data = json_decode(file_get_contents('sales.json'), true);

// Define an associative array to store medication names and their amounts
$medications = array();

// Loop through each row of data
foreach ($data as $row) {
  // Extract medication names and amounts using regex
  preg_match_all('/\b([a-zA-Z]+) +(\d+) bts\b/', $row['medication'], $matches, PREG_SET_ORDER);
  // Loop through the matches and add them to the $medications array
  foreach ($matches as $match) {
    $med_name = $match[1];
    $med_amount = $match[2];
    $medications[$med_name] = $med_amount;
  }
}

// Remove duplicates from the $medications array
$medications = array_unique($medications);

// Output the results
print_r($medications);
