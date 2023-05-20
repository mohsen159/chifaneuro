<?php
$page_name = "clients";
include "includes/session.php";
include "includes/coon.php";

// Sample client data (replace with your own data)
$clients = array(
    array("John Doe", "johndoe@example.com", "123 Main St", "New York"),
    array("Jane Smith", "janesmith@example.com", "456 Elm St", "Los Angeles"),
    array("Michael Johnson", "michaeljohnson@example.com", "789 Oak St", "Chicago")
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/head.php"; ?>
    <style>
        /* Add any additional styles for the table if needed */
        .search-container {
            text-align: center;
            margin-top: 30px;
        }

        .search-bar {
            width: 400px;
            height: 40px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: width 0.3s ease;
        }

        .search-bar:focus {
            width: 500px;
        }

        .search-button {
            display: inline-block;
            vertical-align: middle;
            transition: transform 0.3s ease;
        }

        .search-button button {
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .search-button button:hover {
            transform: scale(1.1);
        }

        .search-button button:active {
            transform: scale(0.9);
        }

        .client-table {
            margin-top: 30px;
        }
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
                    <h1 class="h3 mb-3"><?php echo $page_name; ?></h1>

                    <div class="search-container">
                        <form id="search-form">
                            <input type="text" class="search-bar" id="search-input" placeholder="Global Search">
                            <div class="search-button">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <input type="hidden" id="hidden-input" value="-1">
                        </form>
                    </div>

                    <!-- Client Table -->
                    <table class="table client-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $client) : ?>
                                <tr>
                                    <td><?php echo $client[0]; ?></td>
                                    <td><?php echo $client[1]; ?></td>
                                    <td><?php echo $client[2]; ?></td>
                                    <td><?php echo $client[3]; ?></td>
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
    <script>
        // Your JavaScript code here
    </script>
</body>

</html>
