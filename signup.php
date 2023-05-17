<?php
session_start(); // start a session
if (isset($_SESSION["id"])) {
    header("Location: products.php");
    exit();
}
// Check if the registration form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user's input from the form
    $username = $_POST['username'];
    $pharm = $_POST["pharm"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adress = $_POST["adress"];

    // Validate user input
    if (empty($username) || empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else if (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'memo');

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the username or email address is already in use
        $check_user = "SELECT * FROM users WHERE username = '$username' ";
        $result = $conn->query($check_user);
        if ($result->num_rows > 0) {
            $error = "Username or email address already in use.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // Insert the pharm data into the database
            $insert_pharm = "INSERT INTO `pharm`(`name`, `adress`, `email`) VALUES ('$username','$adress' ,'$email');";
            $conn->query($insert_pharm);
            $pharm_id = mysqli_insert_id($conn);
            // Insert the user's data into the database
            $role = "owner";

            /// after the owner of the pharm sigin form you have to send email white the user name and password 
            $temp = $username . strval($pharm_id); // i don't need to keep this in mind the "." make a syntax error so no need to complecat this 
            $insert_user = "INSERT INTO `users`( `id_pharm`, `name`, `username`, `pwd`, `role`) VALUES ('$pharm_id','$username','$temp','$hashed_password','$role')";
            if ($conn->query($insert_user) === TRUE) {
                // give this user the owner ship of the pharm 
                $owner_id = mysqli_insert_id($conn);
                $insert_owner = "UPDATE `pharm` SET `owner`='$owner_id' WHERE  id= ' $pharm_id' ";
                $conn->query($insert_owner);
                header("Location: login.php");
                exit;
            } else {
                die("Error: " . $conn->error);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mohssen Boulahbal ">
    <meta name="keywords" content="">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Sign Up</title>

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
                            <h1 class="h2">Get started</h1>
                            <p class="lead">
                                Start creating the best possible user experience for you pharm
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form id="sign_up" action="signup.php" method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input class="form-control form-control-lg" type="text" name="username"
                                                placeholder="Enter your name" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pharm name</label>
                                            <input class="form-control form-control-lg" type="text" name="pharm"
                                                placeholder="Enter your company name" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Adress</label>
                                            <input class="form-control form-control-lg" type="text" name="adress"
                                                placeholder="Enter your company name" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email"
                                                placeholder="Enter your email" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="Enter password" />
                                        </div>

                                        <div class="text-center mt-3">

                                            <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                        </div>
                                    </form>
                                    <?php
                                    // Display error message if there is an error
                                    if (isset($error)) {
                                        echo '<div class="error">' . $error . '</div>';
                                    }

                                    // Display success message if there is a success
                                    if (isset($success)) {
                                        echo '<div class="success">' . $success . '</div>';
                                    }
                                    ?>
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