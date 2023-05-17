<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<h2>Signup</h2>
	<form action="signup-process.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br>

		<input type="submit" value="Signup">
	</form>
</body>
</html>
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the form data
    if (empty($username) || empty($password) || empty($confirm_password)) {
        echo "Please fill in all fields.";
        exit;
    }
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store the user in the database
    $servername = "localhost";
    $username = "yourusername";
    $password = "yourpassword";
    $dbname = "yourdatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the user into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Login</h2>
	<form action="login-process.php" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<input type="submit" value="Login">
	</form>
</body>
</html>
<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the form data
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Retrieve the user from the database
    $servername = "localhost";
    $username_db = "yourusername";
    $password_db = "yourpassword";
    $dbname = "yourdatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the user from the database
    $sql = "SELECT * FROM users WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User found, check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Password matches, set session variables and redirect to home page
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            // Password does not match
            echo "Incorrect username or password.";
        }
    } else {
        // User not found
        echo "Incorrect username or password.";
    }

    mysqli_close($conn);
}
?>

<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate the form data
    if (empty($username) || empty($new_password) || empty($confirm_password)) {
        echo "Please fill in all fields.";
        exit;
    }

    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $servername = "localhost";
    $username_db = "yourusername";
    $password_db = "yourpassword";
    $dbname = "yourdatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the username exists
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        // Username does not exist
        echo "Username not found.";
        exit;
    }

    // Update the user's password
    $sql = "UPDATE users SET password='$hashed_password' WHERE username='$username'";

    if (mysqli_query($conn, $sql)) {
        // Password updated successfully
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        // Error updating password
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
</head>
<body>
	<h2>Forgot Password</h2>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username"><br>

		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password"><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br>

		<input type="submit" value="Reset Password">
	</form>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Validate the form data
    if (empty($email)) {
        echo "Please enter your email address.";
        exit;
    }

    // Check if the email exists in the database
    $conn = mysqli_connect("localhost", "yourusername", "yourpassword", "yourdatabase");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "We couldn't find a user with that email address.";
        exit;
    }

    // Generate a random password reset token
    $token = bin2hex(random_bytes(32));
    $created_at = date('Y-m-d H:i:s');

    // Insert the password reset token into the database
    $sql = "INSERT INTO password_resets (email, token, created_at) VALUES ('$email', '$token', '$created_at')";

    if (mysqli_query($conn, $sql)) {
        // Send a password reset link to the user's email address
        $to = $email;
        $subject = "Password Reset Request";
        $message = "Please click the following link to reset your password: https://example.com/reset_password.php?email=$email&token=$token";
        $headers = "From: webmaster@example.com\r\n" .
                   "Reply-To: webmaster@example.com\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "We've sent a password reset link to your email address.";
        } else {
            echo "There was a problem sending the password reset link. Please try again later.";
        }
    } else {
        echo "There was a problem generating a password reset token. Please try again later.";
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
</head>
<body>
	<h2>Forgot Password</h2>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br>

		<input type="submit" value="Reset Password">
	</form>
</body>
</html>
<?php
session_start();
include('db_config.php');

if(isset($_POST['resetpwd'])){
    $email = $_SESSION['reset_email'];
    $token = $_SESSION['reset_token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $error = false;

    if(empty($new_password) || empty($confirm_password)){
        $error = true;
        $errorMsg = "Please fill all fields.";
    }
    elseif($new_password != $confirm_password){
        $error = true;
        $errorMsg = "Password doesn't match.";
    }
    else{
        // Verify the token is valid
        $stmt = $conn->prepare("SELECT * FROM password_reset WHERE email = :email AND token = :token");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result){
            $error = true;
            $errorMsg = "Invalid token.";
        }
        else{
            // Delete the token from the password_reset table
            $delete_token = $conn->prepare("DELETE FROM password_reset WHERE email = :email");
            $delete_token->bindParam(':email', $email);
            $delete_token->execute();

            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the user's password in the database
            $update_password = $conn->prepare("UPDATE users SET password = :password WHERE email = :email");
            $update_password->bindParam(':password', $hashed_password);
            $update_password->bindParam(':email', $email);
            if($update_password->execute()){
                unset($_SESSION['reset_email']);
                unset($_SESSION['reset_token']);
                $successMsg = "Password reset successful.";
            }
            else{
                $error = true;
                $errorMsg = "Password reset failed.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <?php
    if(isset($errorMsg)){
        echo "<div>$errorMsg</div>";
    }
    elseif(isset($successMsg)){
        echo "<div>$successMsg</div>";
    }
    ?>
    <form method="post" action="">
        <h2>Reset Password</h2>
        <label>New Password:</label>
        <input type="password" name="new_password"><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password"><br><br>
        <input type="submit" name="resetpwd" value="Reset Password">
    </form>
</body>
</html>


