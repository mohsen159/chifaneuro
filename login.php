<?php
$expire = 365 * 24 * 3600; // i choose a one year duration
ini_set('session.gc_maxlifetime', $expire);
session_start(); // start a session
setcookie(session_name(), session_id(), time() + $expire);


$user = null; // user
$pwd = null; // password
if (isset($_SESSION["id"])) {
	header("Location: index.php");
	exit();
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get the username and password from the form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Validate the form data
	if (empty($username) || empty($password)) {
		$_SESSION["error"]  = "Please fill in all fields.";
		//echo "Please fill in all fields.";
		exit;
	}

	// Retrieve the user from the database
	$servername = "localhost";
	$username_db = "root";
	$password_db = "";
	$dbname = "memo";

	// Create connection
	$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

	// Check connection
	if (!$conn) {
		$_SESSION["error"]  = "Connection failed: " . mysqli_connect_error();
		die("Connection failed: " . mysqli_connect_error());
	}

	// Retrieve the user from the database
	$sql = "SELECT * FROM users WHERE username='$username'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// User found, check password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row['pwd'])) {
			// Password matches, set session variables and redirect to home page
			$_SESSION['id'] = $row['id'];
			$_SESSION['id_pharm'] = $row["id_pharm"];
			$_SESSION['username'] = $row["username"];
			$_SESSION['name'] = $row["name"];
			$_SESSION['role'] = $row["role"];

			header("Location: index.php");
		} else {
			// Password does not match
			$_SESSION["error"]  = "Incorrect username or password.";;
		}
	} else {
		// User not found
		$_SESSION["error"]  = "Incorrect username or password.";
	}

	mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="	Mohsssne boulahbal">


	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/avatars/img2.jpg" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


	<title>Sign In</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img\avatars\avatar.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form id=" log_in" action="login.php" method="post">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" placeholder="Username" name="username" value="<?php echo "$user" ?>" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" placeholder="password" name="password" value="<?php echo "$pwd" ?>">
											<small>
												<a href="#">Forgot password?</a> <a style="float: right" href="signup.php">creat a new acount</a>
											</small>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	
	</main>
	

	<script src="js/app.js"></script>

</body>



</html>