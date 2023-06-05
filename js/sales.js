/// it's the same in the prodcuts js this varibale is used there 
let counter = 1;
let ncounter = 1;

function getProducts() {
    const products = [];
    $.ajax({
        url: 'actions/get_product_list.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            for (let i = 0; i < response.length; i++) {
                products.push({
                    id_p: response[i].id_p,
                    name: response[i].name,
                    dosage: response[i].dosage,
                    full_name: response[i].name + ' ' + response[i].dosage
                });
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
    return products;
}
let data = getProducts();

function addElement() {
    counter++;
    const newDiv = document.createElement('div');
    newDiv.id = counter + "p";
    newDiv.className = 'mt-3 autocomplete d-flex flex-nowrap justify-content-between space';
    newDiv.innerHTML = `
    <input type="hidden" name="id[]">
    <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="name[]" required>
    <input type="text" class="order-2 p-2" style="width:80px" onblur="findmax(this)" placeholder="Lot" name="lot[]" required>
    <input type="number"  class="order-3 p-2" min="1" style="width:100px" placeholder="Amount" name="amount[]" required>
    <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)">
      <br>
    </li>
  `;

    const formElement = document.getElementById('form_sales');
    const inputElement = document.getElementById('complited');
    formElement.insertBefore(newDiv, inputElement);
}
// function to add new input element
function delet_p(element) {
    if (element.parentElement === document.getElementById("1")) {
        /// no need for the form to be visible
        alert("this fieald can not be deleted ");
    } else {
        element.parentElement.remove();
    }
}
/// noncmplited part of the code 
function addnElement() {
    ncounter++;
    const newDiv = document.createElement('div');
    newDiv.id = ncounter;
    newDiv.className = 'mt-3 autocomplete d-flex flex-nowrap justify-content-between space';
    newDiv.innerHTML = `
    <input type="hidden" name="idn[]">
    <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="namen[]" required>
    <input type="number"  class="order-3 p-2" min="1" style="width:100px" placeholder="Amount" name="amountn[]" required>
    <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)">
      <br>
    </li>
  `;

    const formElement = document.getElementById('form_sales');
    const inputElement = document.getElementById('noncomplited');
    formElement.insertBefore(newDiv, inputElement);
}

function find_product(element) {
    let names = data.map(p => p.full_name);
    autocomplete(element, names);
}

function find_productid(input) {
    const parentDiv = input.parentNode;
    const full_name = input.value.toLowerCase();
    const product = data.find((p) => p.full_name.toLowerCase() === full_name);
    if (product) {
        const idInput = parentDiv.querySelector('input[type="hidden"]');
        const productId = product.id_p;
        idInput.value = productId;
    } else {
        if (full_name.length > 1) {
            alert('Please select a valide product name ');
        }
    }
}

function findmax(inputElement) {

    var parentDiv = inputElement.parentNode;
    var hiddenIdInput = parentDiv.querySelector('input[name="id[]"]');
    var amount = parentDiv.querySelector('input[name="amount[]"]');
    find_productid(parentDiv.querySelector('input[name="name[]"]'));
    $.ajax({
        url: 'actions/get_product.php', // Replace with your actual API endpoint URL
        method: 'POST', // Adjust the HTTP method if necessary
        data: {
            id: hiddenIdInput.value,
            lot: inputElement.value
        },
        success: function (response) {
            if (response.length > 0) {
                var data = response[0]; // Assuming there is only one result
                hiddenIdInput.value = "";
                hiddenIdInput.value = data.id;
                amount.max = "";
                amount.max = data.max;
                // Set the placeholder of the amount input
                amount.placeholder = "";
                amount.placeholder = data.max;
            } else {

                amount.max = "-1";
                amount.placeholder = "-1"; // this mean that the product with the lot and name thoese not exist yet 
                alert("this mean that the product with the lot and name thoese not exist yet ");
            }

        },
        error: function () {
            // Handle any errors that occur during the AJAX request
            console.log('Error occurred during AJAX request');
        }
    });
}
/// this part is just for sales 
function getclients() {
    const clients = [];
    $.ajax({
        url: 'actions/get_clients.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            for (let i = 0; i < response.length; i++) {
                clients.push({
                    id_p: response[i].id_p,
                    name: response[i].name,
                    fname: response[i].fname,
                    full_name: response[i].fname + ' ' + response[i].name
                });
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
    return clients;
}
let clients = getclients(); // list of clients and their id 

/// as you see there is reptiation of code here we will fix this after if the logic is right  

function find_client(element) {
    let names = clients.map(p => p.full_name);
    autocomplete(element, names);
}

function find_clientid(input) {
    const parentDiv = input.parentNode;
    const idInput = parentDiv.querySelector('input[type="hidden"]');
    const full_name = input.value.toLowerCase();
    if (full_name.length < 1) {
        alert("Please select a client ");
        //TODO: make the client fiald focus on 
    } else {

        const client = clients.find((p) => p.full_name.toLowerCase() === full_name);
        if (client) {

            const clientId = client.id_p;
            idInput.value = clientId;

        } else {
            // this means the client is new we have to creat a new one update the clients array and call the findclientid again 
            // use the model addclient
            alert('The name of the client does not match in pleae insert his information in the database');
            $('#add').modal('hide');
            $('#addclient').modal('show');
            $('#new_client').submit(function (e) {
                e.preventDefault(); // prevent default form submission
                // Gather form data
                var name = $('[name="name"]').val();
                var fname = $('[name="fname"]').val();
                // make AJAX request
                $.ajax({
                    url: 'actions/add_client.php', // replace with your script file
                    type: 'POST',
                    data: {
                        name: name,
                        fname: fname
                    },
                    success: function (response) {
                        // handle success
                        var newId = response; // ID of the new insert
                        input.value = fname + ' ' + name;
                        $('[name="name"]').val("");;
                        $('[name="name"]').val("");;
                        $('#addclient').modal('hide');
                        clients = getclients();
                        idInput.value = newId;
                        $('#add').modal('show');

                        /// find_clientid(input);   /// stupid method *


                        // perform any additional actions with the new ID
                    },
                    error: function () {
                        // handle error
                        alert("Error occurred during insert.");
                    }
                });
            });
        }
    }

}



let sales;


$(document).ready(function () {
    var table = $('#Sales').DataTable({
        responsive: true,
        paging: false,
        dom: 'Bfrtip',
        buttons: [{
                text: 'Add',
                action: function () {
                    $('#add').modal('show');
                }
            },
            {
                extend: 'print',
                messageTop: ' ',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'current'
                    }
                }
            },
            'colvis'
        ],
        columnDefs: [{
                targets: -1,
                visible: true
            },
            {
                targets: [0, 6],
                visible: false
            }

        ],

        order: [
            [0, 'desc']
        ]
    });

    $('#search-input').on('keyup', function () {
        table.search(this.value).draw();
    });

    function getSalesData() {
        $.ajax({
            url: 'actions/get_sales.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                sales = data;
                table.clear().draw();
                $.each(data, function (index, row) {
                    var rowData = [
                        row.id,
                        '<a style="text-decoration: none; color: black;" href="profail.php?id=' + row.client_id + '">' + row.client_name + '</a>',
                        "<pre style='font-weight: bold; font-size: larger;'>" + (row.medication_info + (row.non_completed_info == null ? " " : (" \nrest : \n" +
                            row.non_completed_info))) + "</pre>",
                        row.order_ord,
                        row.ord_date,
                        row.next_date,
                        row.dure,
                        $("<button>")
                        .addClass("btn btn-secondary btn-info")
                        .append($("<i>").addClass("fas fa-trash-alt"))
                        .text("Action")
                        .prop("outerHTML") // Convert the button element to HTML string great not bad 
                    ];
                    table.row.add(rowData);
                });
                table.draw();
                const ebutton = document.querySelectorAll('.btn-info');
                ebutton.forEach(btn => {
                    btn.addEventListener('click', () => {
                        var currentRow = btn.closest("tr");
                        var rowIdx = table.row(currentRow).index();
                        var rowData = table.row(rowIdx).data();
                        var id = rowData[0];
                        // Perform the delete operation
                        const saleId = sales.findIndex(p => p.id == id);
                        if (saleId == -1) {
                            alert("the data for this sales odes not found mybe deleted from anthor user or in modifaied ")
                        }

                        var form = document.getElementById("edit_sales");
                        form.elements["salesid"].value = sales[saleId].id;
                        form.elements["clientid"].value = sales[saleId].client_id;
                        form.elements["client"].value = sales[saleId].client_name;
                        form.elements["employs"].value = sales[saleId].user_id;
                        form.elements["medication_info"].value = sales[saleId].medication_info;
                        form.elements["num_order"].value = sales[saleId].order_ord;
                        form.elements["note"].value = sales[saleId].note;
                        form.elements["dure"].value = sales[saleId].dure;
                        let temp = sales[saleId].ord_date;
                        var parts = temp.split("/");
                        var formattedDate = parts[2] + "-" + parts[1] + "-" + parts[0];
                        form.elements["sale_date"].value = formattedDate;

                        /// this part is just to clean the data for noncomplit from the form element 

                        const elements = form.querySelectorAll('.fetchclean');

                        elements.forEach((element) => {
                            element.remove();
                        });
                        /* here add noncomplite valus  */
                        if (sales[saleId].non_completed_info !== null) {
                            fetchnoncomplited(sales[saleId].non_completed_info); // test data if working properly
                        } else {
                            console.log(saleId);
                        }
                        $('#edit').modal('show');
                    });
                });


            },
            error: function () {
                alert('Error retrieving sales data.');
            }
        });
    }

    getSalesData();

});

function addElementc() {
    const newDiv = document.createElement('div');
    let d = "0";
    newDiv.className = 'mt-3 autocomplete d-flex flex-nowrap justify-content-between space fetchclean';
    newDiv.innerHTML = `
            <input type="hidden" name="id[]" >
            <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="name[]" required>
          
            <input type="text" class="order-2 p-2" style="width:80px"  placeholder="Lot" name="lot[]" value="${d}" >
            <input type="number" class="order-3 p-2" min="1" style="width:100px" placeholder="Amount" name="amount[]" required>
            <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)"></li>`;

    const container = document.getElementById('addnewinputs');
    container.parentNode.insertBefore(newDiv, container);

}

function fetchnoncomplited(noncomplited) {

    // before fetch cleal previose valus in the form 

    const sampleData = convertTextToArray(noncomplited);

    // Loop through the sample data and create div elements
    sampleData.forEach((p) => {
        const newDiv = document.createElement('div');
        /// find the default id to use it later on 
        let fullname = p.name.toLowerCase();
        const product = data.find((m) => m.full_name.toLowerCase() === fullname);
        let d = "0";
        newDiv.id = p.id + 'p';
        newDiv.className = 'mt-3 autocomplete d-flex flex-nowrap justify-content-between space fetchclean';
        newDiv.innerHTML = `
        <input type="hidden" name="id[]" value="${product.id_p}">
        <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="name[]" value="${p.name}" required>
        <input type="text" class="order-2 p-2" style="width:80px" placeholder="Lot" name="lot[]" value="${d}" >
        <input type="number" class="order-3 p-2" min="1" style="width:100px" placeholder="Amount" name="amount[]" value="${p.amount}" required>

        <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)"></li>`;

        const container = document.getElementById('addnewinputs');
        container.parentNode.insertBefore(newDiv, container);
    });
}

function convertTextToArray(text) {
    const dataArray = [];

    // Split the text into individual lines
    const lines = text.trim().split('\n');

    // Iterate over each line and extract product name and amount
    lines.forEach((line) => {
        // Extract product name and amount using regular expression
        const regex = /(.*?)\s*:\s*(\d+)/;
        const matches = line.match(regex);

        if (matches && matches.length === 3) {
            const productName = matches[1].trim();
            const amount = parseInt(matches[2]);

            // Create an object with product name and amount
            const data = {
                name: productName,
                amount: amount
            };

            // Push the object into the dataArray
            dataArray.push(data);
        }
    });

    return dataArray;
}

function deletsales() {
    var form = document.getElementById("edit_sales");
    let id = form.elements["salesid"].value;
    if (confirm(' All products will be return to there previos amounts  ')) {
        // Perform the delete operation
        const saleId = id;
        $.ajax({
            url: 'actions/delet_sales.php',
            type: 'POST',
            data: {
                saleId: saleId
            },
            success: function () {
                // Refresh the sales table
                location.reload();

            },
            error: function () {
                alert('Error deleting the sale.');
            }
        });
    }
}