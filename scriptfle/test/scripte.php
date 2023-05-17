<?php

$servername = "localhost";
$username = "root";
$password = "";
//$ndbname = "try";// Create connection
//$try= new mysqli($servername, $username, $password, $ndbname);

echo "hello world \n";


$handle = fopen("m1.txt", "r");
$dci = array(
    "PRAZEPAM",
    "Clorazépate dipotassique",
    "Buprénorphine",
    "Trihexyphénidyle chlorhydrate",
    "Clidinium bromure + chlordiazépoxide",
    "PREGABALINE",
    "TRAMADOL",
    "lorazepam",
    "Tramadol + Paracétamol",
    "clonazepam",
    "DIAZEPAM",
    "Bromazepam",
    "phénobarbital",
    "ZOLPIDEM"
);

$myfile = fopen("m1connvert.txt", "w") or die("Unable to open file!");
$txt = "";
if ($handle) {
    while (($line = fgets($handle)) !== false) {
       foreach ($dci as $item )
        {
            if (strpos($line, $item ))
            {
                /* $txt =
                     trim(substr($line, 0, 5)) . "," . trim(substr($line, 5, 49)) . "," . trim(substr($line, 49, 51)) . "," . trim(substr($line, 105, 30)) . "," . trim(substr($line, 135, 20)) . "," . trim(substr($line, 155, 20)) . "," .
                     trim(substr($line, 175, 31)) . "," . trim(substr($line, 207, 7)) . "," . trim(substr($line, 264)) . "\n";*/
     
                     $txt =
                     trim(substr($line, 5, 49)) . "_" . trim(substr($line, 49, 51)) . "_" . trim(substr($line, 105, 30))   . "\n";    
     
                 /*trim(substr($line, 5, 49)) . " " . trim(substr($line, 105, 30)) .  "\n";*/
     
                 fwrite($myfile, $txt);
             }
        }         
       
    }
}
fclose($myfile);
fclose($handle);



?>