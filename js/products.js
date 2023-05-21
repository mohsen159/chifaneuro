// this part is just for your custom search
/*$('#search').keyup(function() {
	var table = $('#prducts').DataTable();
	table.search($(this).val()).draw();
});*/
// the add model 
// counter to track number of elements
let counter = 1;

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
    newDiv.id = counter;
    newDiv.className = 'mt-3 autocomplete d-flex flex-nowrap justify-content-between space';
    newDiv.innerHTML = `
    <input type="hidden" name="id[]">
    <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="name[]" required>
    <input type="text" class="order-2 p-2" style="width:80px"  placeholder="Lot" name="lot[]" required>
    <input type="number"  class="order-3 p-2" style="width:100px" placeholder="Amount" name="amount[]" required>
	<input type="date" class="order-3 p-2" style="width:220px" name="exp[]" required>
    <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)">
      <br>
    </li>
  `;

    const formElement = document.getElementById('new_product');
    const inputElement = document.getElementById('0');
    formElement.insertBefore(newDiv, inputElement);

}


let foo;

// function to add new input element
function delet_p(element) {
    if (element.parentElement === document.getElementById("1")) {
        /// no need for the form to be visible
        alert("this fieald can not be deleted ");
    } else {
        element.parentElement.remove();
    }
}
/// the autocomplete 
function find_product(element) {
    let names = data.map(p => p.full_name);
    autocomplete(element, names);
}

function find_productid(input) {
    const parentDiv = input.parentNode;
    const full_name = input.value.toLowerCase();
    const idInput = parentDiv.querySelector('input[type="hidden"]');
    const product = data.find((p) => p.full_name.toLowerCase() === full_name);
    if (product) {
        idInput.value = product.id_p;
    } else {
        if (full_name.length > 0) {
            $('#add').modal('hide');
            $('#addproductlist').modal('show'); // open the modal and fetch the input value in the name 
            $('#new_item').submit(function (e) {
                e.preventDefault(); // prevent default form submission

                // Gather form data
                var name = $('[name="name"]').val();
                var dosage = $('[name="dosage"]').val();
                var la_forme = $('[name="form"]').val();
                var dci = $('[name="dci"]').val();

                // make AJAX request
                $.ajax({
                    url: 'actions/add_productslist.php', // replace with your script file
                    type: 'POST',
                    data: {
                        name: name,
                        dosage: dosage,
                        la_forme: la_forme,
                        dci: dci
                    },
                    success: function (response) {
                        // handle success
                        var newId = response; // ID of the new insert
                        input.value = name + ' ' + dosage;
                        $('[name="name"]').val("");
                        $('[name="dosage"]').val("");
                        $('[name="form"]').val("");
                        $('[name="dci"]').val("");
                        data = getProducts();
                        idInput.value = newId;
                        $('#addproductlist').modal('hide');
                        $('#add').modal('show');
                        // perform any additional actions with the new ID
                    },
                    error: function () {
                        // handle error
                        alert("Error occurred during insert.");
                    }
                });
            });

        } else {
            alert("no empty fiealds here enter data or delete the entry  Please  ");
        }

    }
}

$(document).ready(function () {
 
   let table = $('#prducts').DataTable({
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
    $('#search-input').on('keyup', function() {
        table.search(this.value).draw();
    });
    $.ajax({
        url: "actions/get_products.php",
        type: "GET",
        dataType: "json",
        success: function (data) {
            foo = data;
            // Loop through the data and add each row to the table.


            for (var i = 0; i < data.length; i++) {
                var row = [
                    data[i]['id'],
                    data[i]['name_dosage'],
                    data[i]['lot'],
                    data[i]['amount'],
                    moment(data[i]['exp']).format('DD/MM/YYYY'),
                    '<td><button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>  <button class="info-btn"><i class="fas fa-info-circle" ></i> Info</button> </td>'
                ];
                table.row.add(row);
            }
            // Draw the table to show the added data.
            table.draw();

            // delet button func 
            const dbutton = document.querySelectorAll('.delete-btn');
            dbutton.forEach(btn => {
                btn.addEventListener('click', () => {

                    if (confirm("Are you sure you want to delete this item?")) {


                        //alert('Delete button clicked');
                        var currentRow = btn.closest("tr");
                        var table = $('#prducts').DataTable();
                        var rowIdx = table.row(currentRow).index();
                        var rowData = table.row(rowIdx).data();
                        var id = rowData[0]; // Assuming 'id' is in the first column

                        // delet the row 
                        $.ajax({
                            url: 'actions/delet_products.php', // Replace with the URL that handles the delete operation
                            type: 'POST',
                            data: {
                                id: id
                            }, // Pass the ID of the row to be deleted
                            success: function (response) {
                                // Handle the success response
                                console.log(response);
                                currentRow.remove();
                            },
                            error: function (error) {
                                // Handle the error response
                                console.log(error);
                            }
                        });
                    } else {
                        // User clicked "Cancel", do nothing
                    }
                });
            });

            const editbtn = document.querySelectorAll('.info-btn');
            editbtn.forEach(btn => {
                btn.addEventListener('click', () => {
                    var currentRow = btn.closest("tr");
                    var table = $('#prducts').DataTable();
                    var rowIdx = table.row(currentRow).index();
                    var rowData = table.row(rowIdx).data();
                    var id = rowData[0]; // Assuming 'id' is in the first column
                    var name = rowData[1];
                    var lot = rowData[2];
                    var amount = rowData[3];
                    var exp = rowData[4];

                    // set data in the form 
                    var form = document.getElementById("form_edit");
                    form.elements["id"].value = id;
                    form.elements["name"].value = name;
                    form.elements["lot"].value = lot;
                    form.elements["number"].value = amount;
                    /* please don't change this it works fin it take me 1 h to fix this  */
                    var parts = exp.split("/");
                    var formattedDate = parts[2] + "-" + parts[1] + "-" + parts[0];
                    form.elements["exp"].value = formattedDate;
                    $('#edit').modal('show');

                })

            });

            /// using the info button 
            $(document).ready(function () {
                $('#form_edit').on('submit', function (event) {
                    event.preventDefault(); // Prevent form submission

                    // Get the form data
                    var form = document.getElementById("form_edit");
                    var id = form.elements["id"].value;

                    var lot = form.elements["lot"].value;
                    var amount = form.elements["number"].value;
                    var exp = form.elements["exp"].value;
                    var formData = {
                        id: id,
                        lot: lot,
                        amount: amount,
                        exp: exp
                    };

                    // Perform an AJAX request to update the data in the server-side script
                    $.ajax({
                        url: 'actions/update_product.php', // Replace with the URL of your server-side script
                        method: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            // Check if the update was successful
                            if (response.success) {
                                // Update the data in the row
                                /// this is just for test 
                                location.reload();
                                // Update the expiration date in the row using the expDate value
                            } else {
                                // Handle the case when the update failed
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle the AJAX error
                        }
                    });
                });
            });

        },
        error: function () {
            alert("Error retrieving product data.");
        }
    });
});