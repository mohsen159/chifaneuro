<?php

 include "coon.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products </title>
    <script type="text/javascript" src="jquery-3.5.1.js"></script>
    <script src="//cdn.asprise.com/scannerjs/scanner.js" type="text/javascript"></script>
    <style>
    #donate tr{
        border: 2.3px solid black;
        color :aliceblue ; 
        background-color:  #0f0f0f;
    }
    </style>
</head>

<body>



    <div>
        <table id="donate" >
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Dci</th>
                    <th>lot</th>
                    <th>amount</th>
                    <th class='operation'>More</th>


                </tr>
            </thead>
            <tbody>
                <!-- after the load we will use this -->
            </tbody>
        </table>

    </div>
</body>
<script type="text/javascript">
let products = []; /// for demo purposes only 
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        products = JSON.parse(this.responseText);
       // console.table(products);
        $.each(products, function(i, item) {
            $('<tr>').html(

                "<td>" + products[i].id + "</td><td>" + products[i].name + "</td><td>" + products[i]
                .dci + "</td><td>" + products[i].lot + "</td><td>" +
                products[i].amount + "</td> <td class='operation'><button  onclick=\"drug_edit('" + i +
                "')\" class='btn btn-info btn-sm edit btn-flat'  data-bs-toggle='modal' data-bs-target='#edit'    >Info</button> </td> </tr>"
            ).appendTo('#donate tbody');
        });
    }
};
xmlhttp.open("GET", "http://localhost:3000/fetch.php");
xmlhttp.send();
</script>

</html>