<?php
$page_name = "";
include "includes/session.php";
include "includes/coon.php";
$pharm_id = $_SESSION['id_pharm'];

// Check if the user ID is set
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    $salles_result = null;
    // Fetch user data from the client table
    $sql = "SELECT *  FROM `client` WHERE `id` = $user_id";
    $result = mysqli_query($coon, $sql);
    $row = mysqli_fetch_assoc($result);

    // SQL query for sales
    $salles = "SELECT
        o.id,
        GROUP_CONCAT(CONCAT(REPLACE(lp.name, '(', ''), ' ', REPLACE(lp.dosage, ')', ''), ' : ', c.amount) SEPARATOR '\n') AS medication_info,
        GROUP_CONCAT(CONCAT(REPLACE(nlp.name, '(', ''), ' ', REPLACE(nlp.dosage, ')', ''), ' : ', nc.amount) SEPARATOR '\n') AS non_completed_info,
        CONCAT(cl.fname, ' ', cl.name) AS client_name,
        cl.id AS client_id,
        u.name AS user_name,
        u.id AS user_id,
        o.id_pharm,
        o.created AS order_created,
        o.ord_date,
        o.next_date,
        o.dure,
        o.ModifiedDate,
        o.complited
    FROM `prescription` o
    LEFT JOIN `changement` c ON o.id = c.id_ord
    LEFT JOIN `inventory` p ON c.id_prodoit = p.id
    LEFT JOIN `list_prodoit` lp ON p.list_prodoit = lp.id
    LEFT JOIN `noncompliant` nc ON o.id = nc.ord_id
    LEFT JOIN `list_prodoit` nlp ON nc.list_prodoit = nlp.id
    LEFT JOIN `client` cl ON o.id_client = cl.id
    LEFT JOIN `users` u ON o.id_user = u.id
    WHERE cl.id = $user_id
    GROUP BY o.id";

    // Execute the sales query
    $salles_result = mysqli_query($coon, $salles);

    // SQL query for products still in use
    $using = "SELECT CONCAT(lp.name, ' ', lp.dosage) AS medication, c.amount, o.next_date AS next_sale_date
    FROM `prescription` o
    INNER JOIN changement c ON o.id = c.id_ord
    INNER JOIN inventory p ON c.id_prodoit = p.id
    INNER JOIN list_prodoit lp ON p.list_prodoit = lp.id
    WHERE o.id_client = $user_id
    AND o.next_date > CURDATE();";

    // Execute the products still in use query
    $using_result = mysqli_query($coon, $using);
}

else 
{
    // this is not excteple beacuse there is no id !! 
}
// Close the database connection
mysqli_close($coon);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/head.php"; ?>
    <style>
        .profile {
            width: 70%;
            height: auto;
            max-width: 100%;
        }
        th , td {
            text-align: center ;
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
                <div class="container">
                    <h1 class="h1 mb-1 h1-size">
                        <?php echo $page_name; ?>
                    </h1>

                    <!-- User Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <form id="edit-form" action="actions/update_client.php" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your name" required
                                        value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="family-name" class="form-label">Family Name</label>
                                    <input type="text" class="form-control" id="family-name" name="family_name"
                                        placeholder="Enter your family name" required
                                        value="<?php echo isset($row['fname']) ? $row['fname'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" required
                                        value="<?php echo isset($row['Date_of_Birth']) ? $row['Date_of_Birth'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="id-card-photo" class="form-label">Identity Card Photo</label>
                                    <input type="file" class="form-control" id="id-card-photo" name="id_card_photo"
                                        accept="image/*" required>
                                </div>
                                <div class="mb-3">
                                    <label for="adress" class="form-label">Adress</label>
                                    <input type="text" class="form-control" id="adress" name="adress"
                                        placeholder="Enter your name" required
                                        value="<?php echo isset($row['adress']) ? $row['adress'] : ''; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="button" id="similarity-btn" class="btn btn-primary"
                                    onclick="openModal()">Similarity</button>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <?php
                                if (isset($row['card']) && !empty($row['card'])) {
                                    echo '<img src="actions/img/' . $row['card'] . '" alt="ID Card" class="img-fluid profile">';
                                } else {
                                    echo '<img src="img/user_null.jpg" alt="ID Card" class="img-fluid profile">';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tables -->
                    <!-- Tables -->
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">Pharm</th>
                                        <th scope="col">Prescription</th>
                                        <th scope="col">Next Sales</th>
                                        <th scope="col">Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Initialize $salles_result variable
                                 
                                    // Check if $salles_result is not null before accessing its values
                                    if ($salles_result) {
                                        while ($salles_row = mysqli_fetch_assoc($salles_result)) {
                                            echo "<tr>";
                                            if($pharm_id!=$salles_row['id_pharm'])
                                            {
                                                echo "<td>  <i class='fas fa-clone fa-beat' style='font-size:19px;color:red'></i></td>";
                                            }
                                            else 
                                            {
                                                echo "<td>  <i class='fas fa-clone' style='font-size:19px;color:green'></i></td>";
                                            }
                                          
                                           
                                            echo "<td>{$salles_row['medication_info']}</td>";
                                            echo "<td>" . date('d/m/Y', strtotime($salles_row['next_date'])) . "</td>";
                                            echo "<td>{$salles_row['dure']}</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        // Handle the case when there is no result
                                    }
                               
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Medication</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Ends</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($using_row = mysqli_fetch_assoc($using_result)) {
                                        echo "<tr>";
                                        echo "<td>{$using_row['medication']}</td>";
                                        echo "<td>{$using_row['amount']}</td>";
                                        echo "<td>" . date('d/m/Y', strtotime($using_row['next_sale_date'])) . "</td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php include "model/profail_model.php"; ?>
                        </div>
                    </div>


                </div>
            </main>

            <!--footer start here -->
            <?php include "includes/footer.php"; ?>
            <!--end  here -->
        </div>
    </div>
    <script>
        function openModal() {
            // Code to open the modal, e.g., using Bootstrap modal functionality
            // Example using Bootstrap modal:
            $('#myModal').modal('show');
        }
    </script>
</body>

</html>