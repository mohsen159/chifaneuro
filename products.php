<?php
// TODO: Implement count(amount) method on simelier products type 
// TODO: no goood solotion t odo this ins sql query maybe it will be better to implement in php code this stuff 
$page_name = "Medications";
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




						<?php
						if (isset($_SESSION["role"]) && $_SESSION["role"] == "owner") {
							// Access the 'role' key only if it's defined
							include "model/products_model.php";
						} ?>
					</div>



				</div>
			</main>

			<!--footer start here -->
			<?php include "includes/footer.php"; ?>
			<!--end  here -->
		</div>
	</div>
	<script src="js/products.js"></script>
</body>

</html>