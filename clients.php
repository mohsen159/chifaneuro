<?php
///TODO: this is just a page to navigate users profile improve using local storge user  
$page_name = "Clients";
include "includes/session.php";
include "includes/coon.php";

// Query to fetch all clients
$sql = "SELECT `id`, `fname`, `name`, `Date_of_Birth`, `created`, `card`, `adress` FROM `client` WHERE 1";
$result = mysqli_query($coon, $sql);

// Fetch all clients as an associative array
$clients = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($coon);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/head.php"; ?>
    <style>
        /* Add any additional styles for the table if needed */
    </style>
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
                    <h1 class="h1 mb-1 h1-size">
                        <?php echo $page_name; ?>
                    </h1>

                    <div class="search-container">
                        <form id="search-form">
                            <input type="text" class="search-bar" id="search-input" placeholder="Search">
                            <input type="hidden" id="hidden-input" value="-1">
                        </form>
                    </div>

                    <!-- Client Table -->
                    <table class="table client-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Address</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client): ?>
                                <tr>
                                    <td>
                                        <a style="text-decoration: none; color: black;"
                                            href="profail.php?id=<?php echo $client['id']; ?>">
                                            <?php echo $client['name'] . " " . $client['fname']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($client['Date_of_Birth'])); ?>
                                    </td>
                                    <td>
                                        <?php echo $client['adress']; ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($client['created'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>


            </main>

            <!--footer start here -->
            <?php include "includes/footer.php"; ?>
            <!--end  here -->
        </div>
    </div>
    <script src="js/clients.js"></script>
</body>

</html>