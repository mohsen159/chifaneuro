<?php
$page_name = "User And Permission";
include "includes/session.php";
include "includes/coon.php";

// Function to fetch users from the database
function getUsers()
{
  include "includes/coon.php"; // Include database connection
  $pharm_id = $_SESSION['id_pharm'];
  // Query to retrieve users
  $query = "SELECT `id`, `id_pharm`, `name`, `username`, `pwd`, `role`, `created` FROM `users` WHERE `id_pharm` = $pharm_id";
  $result = mysqli_query($coon, $query);

  // Check if the query was successful
  if ($result) {
    // Fetch all rows as an associative array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free the result set
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($coon);

    return $users;
  } else {
    // Handle query error
    echo "Error: " . mysqli_error($coon);
    // Close the database connection
    mysqli_close($coon);
    return null;
  }
}

// Handle form submissions for user creation or modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle new user creation
  if (isset($_POST['create'])) {
    // Add code to create a new user in the database
    // Retrieve the form data and perform necessary validation and sanitization
    // After creating the user, you can redirect the user to the updated user list or display a success message
  }
  // Handle user modification
  elseif (isset($_POST['update'])) {
    // Add code to update an existing user in the database
    // Retrieve the form data and perform necessary validation and sanitization
    // After updating the user, you can redirect the user to the updated user list or display a success message
  }
  // Handle user deletion
  elseif (isset($_POST['delete'])) {
    // Add code to delete the user from the database
    // Retrieve the user ID from the form data and delete the corresponding user
    // After deleting the user, you can redirect the user to the updated user list or display a success message
  }
}

// Fetch users from the database
$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "includes/head.php"; ?>
</head>

<body>
  <div class="wrapper">
    <!-- Navbar -->
    <?php include "includes/navbar.php"; ?>
    <div class="main">
      <!-- Stat navbar here -->
      <?php include "includes/stat_navbar.php"; ?>
      <!-- End navbar here -->

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h1 mb-1 h1-size">
            <?php echo $page_name; ?>
          </h1>
          <br>
          <br>
          <div style="color: black;" class="row">
            <!-- User form -->

            <div class="col-md-12">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#adduser">Add
                User</button>
            </div>

            <!-- User list -->
            <div class="col-md-12 mt-4">
              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Iterate over the users and display them in the table
                  foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . $user['name'] . "</td>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['role'] . "</td>";
                    echo "<td>" . $user['created'] . "</td>";
                    echo '<td>
                                                <button type="button" class="btn btn-primary edit-user-btn" data-bs-toggle="modal" data-bs-target="#updateuser" data-id="' . $user['id'] . '" data-name="' . $user['name'] . '" data-username="' . $user['username'] . '" data-role="' . $user['role'] . '">Edit</button>
                                                <button type="button" class="btn btn-danger delet-user-btn"  data-bs-toggle="modal" data-bs-target="#deleteUser" data-id="' . $user['id'] . '">Delete</button>
                                            </td>';
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
              <?php include "model/permission_model.php"; ?>
            </div>
          </div>
        </div>
      </main>

      <!-- Footer -->
      <?php include "includes/footer.php"; ?>
      <!-- End footer -->
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get the update user modal
      var updateModal = document.getElementById('updateuser');
      var deleteModal = document.getElementById('deleteUser');
      // Get the input fields in the update user modal
      var idInput = updateModal.querySelector('#id_user');
      var nameInput = updateModal.querySelector('#name');
      var usernameInput = updateModal.querySelector('#username');
      var roleInput = updateModal.querySelector('#role');

      // Get the edit user buttons
      var editButtons = document.querySelectorAll('.edit-user-btn');
      // Attach event listeners to each edit user button
      editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
          // Get the data attributes from the button
          var id = button.dataset.id;
          var name = button.dataset.name;
          var username = button.dataset.username;
          var role = button.dataset.role;

          // Set the values of the input fields in the update user modal
          idInput.value = id;
          nameInput.value = name;
          usernameInput.value = username;
          roleInput.value = role;

        });
      });

      // Get the delete user buttons
      var deleteButtons = document.querySelectorAll('.delet-user-btn');

      // Attach event listeners to each delete user button
      deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
          // Get the data attributes from the button
          var id = button.dataset.id;
          // Get the delete user form and user ID input
          var deleteUserForm = document.getElementById('deleteUserForm');
          var deleteUserIdInput = document.getElementById('deleteUserId');

          // Set the user ID in the delete form
          deleteUserIdInput.value = id;

          // Show the delete user modal
          var deleteUserModal = new bootstrap.Modal(document.getElementById('deleteUser'));
          deleteUserModal.show();
        });
      });

    });



  </script>
</body>

</html>