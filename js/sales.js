var table = $('#Sales').DataTable({
    responsive: true,
    paging: false,
    dom: 'Bfrtip',
    buttons: [{
            text: 'add',
            action: function () {

                //alert("nothing for now ")
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
            text: 'excel',
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
            targets: 0,
            visible: false
        }
    ],

    order: [
        [0, "desc"]
    ]
});
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
    <input type="text" class="order-2 p-2" style="width:80px"  placeholder="Lot" name="lot[]" required>
    <input type="number"  class="order-3 p-2" style="width:100px" placeholder="Amount" name="amount[]" required>
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
    <input type="number"  class="order-3 p-2" style="width:100px" placeholder="Amount" name="amountn[]" required>
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
$('#form_sales').submit(function (e) {
    e.preventDefault(); // prevent default form submission

    // Retrieve form values
    var client = $('#input_client').val();
    var employee = $('#select').val();
    var products = [];

    $('.autocomplete').each(function () {
        var productName = $(this).find('input[name="name[]"]').val();
        var lot = $(this).find('input[name="lot[]"]').val();
        var amount = $(this).find('input[name="amount[]"]').val();

        // Create an object for each product
        var product = {
            name: productName,
            lot: lot,
            amount: amount
        };

        products.push(product);
    });

    var noncomplitedProducts = [];

    $('.autocomplete-n').each(function () {
        var productName = $(this).find('input[name="namen[]"]').val();
        var amount = $(this).find('input[name="amountn[]"]').val();

        // Create an object for each noncomplited product
        var product = {
            name: productName,
            amount: amount
        };

        noncomplitedProducts.push(product);
    });

    var orderNumber = $('#num_order').val();
    var saleDate = $('#sale_date').val();
    var duration = $('#dure').val();
    var note = $('#note').val();

    // Create an object to hold all the form data
    var formData = {
        client: client,
        employee: employee,
        products: products,
        noncomplitedProducts: noncomplitedProducts,
        orderNumber: orderNumber,
        saleDate: saleDate,
        duration: duration,
        note: note
    };

    // Display the form data in an alert
    alert(JSON.stringify(formData));

    // Proceed with form submission
    // Uncomment the following line to submit the form
    // $(this).unbind('submit').submit();
});
