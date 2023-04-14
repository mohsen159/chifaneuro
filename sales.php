<?php
$page_name = "Sales";
include "includes/session.php";
include "includes/coon.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php"; ?>

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
                    
					</div>

				</div>
			</main>
			<!--footer start here -->
			<?php include "includes/footer.php"; ?>
			<!--end  here -->
		</div>
	</div>

	<script src="js/app.js"></script>
</body>

</html>