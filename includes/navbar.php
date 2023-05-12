<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="">
			<span class="align-middle">Pharm </span>
		</a>
		<!--sidebar-nav-->
		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Pages
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="index.php">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="products.php">
					<i class="align-middle" data-feather="package"></i> <span class="align-middle">Products </span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="sales.php">
					<i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Sales </span>
				</a>
			</li>

			<li class="sidebar-item">
				<a class="sidebar-link" href="clients.php">
					<i class="align-middle" data-feather="users"></i> <span class="align-middle">Clients</span>
				</a>
			</li>


			<li class="sidebar-item">
				<a class="sidebar-link" href="expiration.php">
					<i class="align-middle" data-feather="trash"></i> <span class="align-middle">Expiration</span>
				</a>
			</li>
			<!-- just the owner could see this part -->
			<?php

		
			if (isset($_SESSION["role"]) && $_SESSION["role"] == "owner") {
				// Access the 'role' key only if it's defined
				include "tools.php";
			}
			?>

			<li class="sidebar-item">
				<a class="sidebar-link" href="lougout.php">
					<i class="align-middle" data-feather="log-out"></i> <span class="align-middle">log-out</span>
				</a>
			</li>


		</ul>

		<!--div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">help</strong>
						<div class="mb-3 text-sm">
							
						</div>
						<div class="d-grid">
							<a href="" class="btn btn-primary">more</a>
						</div>
					</div>
				</div-->
	</div>
</nav>