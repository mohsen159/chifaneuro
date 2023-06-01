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
    const newDiv = document.createElement('div');
    newDiv.className = 'mt-3 autocomplete d-flex flex-nowrap justify-content-between space';
    newDiv.innerHTML = `
<input type="hidden" name="idn[]">
<input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="namen[]" required>
<li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)">
<br>
</li>
`;

    const formElement = document.getElementById('smilarty');
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
function delet_p(element) {
    if (element.parentElement === document.getElementById("1")) {
        /// no need for the form to be visible
        alert("This fieald can not be deleted ");
    } else {
        element.parentElement.remove();
    }
}


function checkSimilarity() {
    const userId = document.querySelector('input[name="id_user"]').value;
    const productIds = document.querySelectorAll('input[name="idn[]"]');
    
    const productIDsArray = Array.from(productIds).map((input) => input.value);
    const tableElement = document.getElementById('resultTable');
    tableElement.innerHTML = "";
    findSimilarProducts(userId, productIDsArray);
}

function findSimilarProducts(userId, productIds) {
    $.ajax({
        url: 'actions/find_similar_products.php',
        type: 'POST',
        data: { clientID: userId, productIDs: productIds },
        dataType: 'json',
        success: function (response) {
            if (response.length > 0) {
                // Generate the table dynamically
                let tableHtml = "<table>";
                tableHtml += "<tr><th>Product</th><th>Amount</th><th>Next Date</th></tr>";
                for (let i = 0; i < response.length; i++) {
                    const row = response[i];
                    tableHtml += "<tr>";
                    tableHtml += `<td>${row.name}</td>`;
                    tableHtml += `<td>${row.amount}</td>`;
                    tableHtml += `<td>${row.next_date}</td>`;
                    tableHtml += "</tr>";
                }
                tableHtml += "</table>";

                // Display the table result in the same modal
                const tableElement = document.getElementById('resultTable');
                tableElement.innerHTML = tableHtml;
            } else {
                // No similar products found
                const tableElement = document.getElementById('resultTable');
                tableElement.innerHTML = "No similar products found.";
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}
