<?php
$page_name = "Products";
include "includes/session.php";
include "includes/coon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "includes/head.php"; ?>
</head>

<body>
	<div class="wrapper">
		<!--navbar -->
		<?php include "includes/navbar.php"; ?>
		<div class="main">
			<!--stat navbar here -->
			<?php include "includes/stat_navbar.php"; ?>
			<!--end navbar here -->


			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><?php echo $page_name;  ?> </h1>
					<div style="color: black;" class="row">
						<table id="prducts" style="width:100%" class="display" class="display table table-hover my-0">
							<thead>
								<tr>
									<th>id</th>
									<th>Name</th>
									<th>lot</th>
									<th>amount</th>
									<th>Exp</th>
									<th>Info</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<?php include "model/products_model.php"; ?>
					</div>



				</div>
			</main>

			<!--footer start here -->
			<?php include "includes/footer.php"; ?>
			<!--end  here -->
		</div>
	</div>
	<script>
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
				success: function(response) {
					for (let i = 0; i < response.length; i++) {
						products.push({
							id_p: response[i].id_p,
							name: response[i].name,
							dosage: response[i].dosage,
							full_name: response[i].name + ' ' + response[i].dosage
						});
					}
				},
				error: function(error) {
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
    <input type="number"  class="order-3 p-2" style="width:90px" placeholder="Amount" name="amount[]" required>
    <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick="delet_p(this)">
      <br>
    </li>
  `;

			const formElement = document.querySelector('form');
			const inputElement = document.getElementById('0');
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
		/// the autocomplete 
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
				if (full_name == '') {
					$('#add').modal('hide');
					// this is a new product submit to product list and use the data 
					// to update the product list show model #addproductlist
					$('#addproductlist').modal('show'); // open the modal and fetch the input value in the name 
				}

			}
		}
		// not working yet 
		const dbutton = document.querySelectorAll('.delete-btn');
		dbutton.forEach(btn => {
			btn.addEventListener('click', () => {
				const row = btn.closest('tr');
				//const id = row.querySelector('td:first-child').textContent; // this will take the id 
				row.remove();
			});
		});
		$(document).ready(function() {
			$.ajax({
				url: "actions/get_products.php",
				type: "GET",
				dataType: "json",
				success: function(data) {
					// Loop through the data and add each row to the table.
					var table = $('#prducts').DataTable({
						responsive: true,
						paging: false,
						dom: 'Bfrtip',
						buttons: [{
								text: 'add',
								action: function() {

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
					for (var i = 0; i < data.length; i++) {
						var row = [
							data[i]['id'],
							data[i]['name_dosage'],
							data[i]['lot'],
							data[i]['amount'],
							moment(data[i]['Expiration']).format('DD/MM/YYYY'),
							'<td><button class="delete-btn"><i class="fas fa-trash-alt"></i> Delete</button>  <button class="info-btn"><i class="fas fa-info-circle" ></i> Info</button> </td>'
						];
						table.row.add(row);
					}
					// Draw the table to show the added data.
					table.draw();
				},
				error: function() {
					alert("Error retrieving product data.");
				}
			});
		});
	</script>
</body>

</html>