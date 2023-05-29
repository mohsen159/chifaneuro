<?php
///TODO: you should use the order number in order the if should be data-sd in the head make js code simpler 
$page_name = "";
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
              
				<h1 class="h1 mb-1 h1-size"><?php echo $page_name; ?></h1>

				<div class="search-container">
				<form id="search-form">
                            <input type="text" class="search-bar" id="search-input" placeholder="Search">
                            <input type="hidden" id="hidden-input" value="-1">
                        </form>
                    </div>
					<div style="color: black;" class="row">
						<table id="Sales" style="width:100%" class="display" class="display table table-hover my-0">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Client Name</th>
									<th>Medication </th>
									<th>Number Order</th>
									<th>Order Date</th>
									<th>Next Date</th>
									<th>Duration</th>
									<th>Delete</th>

								</tr>
							</thead>
							<tbody id="order-data">
							</tbody>
						</table>
						<?php include "model/sales_model.php"; ?>
					</div>



				</div>
			</main>

			<!--footer start here -->
			<?php include "includes/footer.php"; ?>
			<!--end  here -->
		</div>
	</div>
	<script src="js/sales.js"></script>
</body>

</html>