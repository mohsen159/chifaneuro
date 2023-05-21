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
        alert('Please select a valide product name ');
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
            alert('This client not exist in the database please enter his information  !!! ');
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
                targets: [0, 5],
                visible: false
            }

        ],

        order: [
            [0, 'desc']
        ]
    });
    
    $('#search-input').on('keyup', function() {
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
                        '<a tyle="text-decoration: none; color: black;" href="profail.php?id=' + row.client_id + '">' + row.client_name + '</a>',
                        "<pre>" + (row.medication_info + (row.non_completed_info == null ? "" : ("\nrest : \n" +
                            row.non_completed_info))) + "</pre>",
                        row.ord_date,
                        row.next_date,
                        row.dure, 
                        $("<button>")
                            .addClass("delete-btn")
                            .append($("<i>").addClass("fas fa-trash-alt"))
                            .text("Delete")
                            .prop("outerHTML") // Convert the button element to HTML string great not bad 
                    ];
                    table.row.add(rowData);
                });
                table.draw();

                
                const dbutton = document.querySelectorAll('.delete-btn');
                dbutton.forEach(btn => {
                    btn.addEventListener('click', () => {
                          var currentRow = btn.closest("tr");
                          var rowIdx = table.row(currentRow).index();
                          var rowData = table.row(rowIdx).data();
                          var id = rowData[0]; // the id is the first column in the table 
                         // alert(id);   // just for test this is good enough 
                        if (confirm(' this will return the inventory to his old location ?  ')) {
                            // Perform the delete operation
                            const saleId = id ; 
                            $.ajax({
                                url: 'actions/delet_sales.php',
                                type: 'POST',
                                data: {
                                    saleId: saleId
                                },
                                success: function () {
                                    // Refresh the sales table
                                    currentRow.remove();
                                    
                                },
                                error: function () {
                                    alert('Error deleting the sale.');
                                }
                            });
                        }
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