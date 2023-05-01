<?php
$page_name = "Home";
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
						<table id="prducts" class="display">
							<thead>
								<tr>
									<th>Name</th>
									<th>lot</th>
									<th>amount</th>
									<th>Exp</th>
									<th>Info</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Row 1 Data 1</td>
									<td>Row 1 Data 1</td>
									<td>Row 1 Data 1</td>
									<td>Row 1 Data 1</td>
									<td>Row 1 Data 1</td>
								</tr>
								<tr>
									<td>Row 1 Data 2</td>
									<td>Row 1 Data 21</td>
									<td>Row 1 Data 3</td>
									<td>Row 1 Data 4</td>
									<td>Row 1 Data 6</td>
								</tr>
							</tbody>
						</table>

					</div>



				</div>
			</main>

			<!--footer start here -->
			<?php include "includes/footer.php"; ?>
			<!--end  here -->
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#prducts').DataTable();
		});

		// this part is just for your custom search
		$('#search').keyup(function() {
			var table = $('#prducts').DataTable();
			table.search($(this).val()).draw();
		});
	</script>
</body>

</html>