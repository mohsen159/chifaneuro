<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    //TODO : the page shoult have the charts better and to tables recomandation  and wait list number of total sales and client and user count 
    $page_name = "Dashboard";
    include "includes/session.php";
    include "includes/coon.php";
    include "includes/head.php"; ?>
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .card-icon {
            font-size: 3rem;
            color: #000bff;
        }

        .card-primary {
            background-color: #000;

            color: #fff;
            height: 200px;
        }

        .card-success {
            background-color: #000;

            color: #fff;
            height: 200px;
        }

        .card-danger {
            background-color: #000;
            color: #fff;
            height: 200px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .table-buttons {
            margin-bottom: 1rem;
        }

        .prediction-table {
            margin-top: 1.5rem;
        }

        .prediction-date {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .card-icon {
            font-size: 4rem;
            /* Increase the font size */
            color: #007bff;
        }

        .card-number {
            font-size: 2rem;
            /* Increase the font size */
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <?php
        $id_pharm = $_SESSION['id_pharm'];
        $sql = "SELECT COUNT(DISTINCT c.id) AS client_count
        FROM client c
        INNER JOIN prescription o ON o.id_client = c.id
        WHERE o.id_pharm = $id_pharm";
        $result = mysqli_query($coon, $sql);
        $row = mysqli_fetch_assoc($result);
        $clientCount = $row['client_count'];

        $monthStart = date('Y-m-01');
        $sql = "SELECT COUNT(*) AS sales_count
        FROM prescription
        WHERE id_pharm = $id_pharm AND ord_date >= '$monthStart'";
        $result = mysqli_query($coon, $sql);
        $row = mysqli_fetch_assoc($result);
        $salesCount = $row['sales_count'];
        ?>
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

                    <div style="color: black;" class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-users card-icon"></i> Customers
                                    </h5>
                                    <p class="card-text card-number">
                                        <?php echo $clientCount; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card card-success">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <i class="fas fa-chart-line card-icon"></i> Sales
                                        <!-- Change the icon to a chart line icon -->
                                    </h5>
                                    <p class="card-text card-number">
                                        <?php echo $salesCount; ?>
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <h3>Customer Medications</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Medication</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Customer 1</td>
                                        <td>Medication 1</td>
                                    </tr>
                                    <tr>
                                        <td>Customer 2</td>
                                        <td>Medication 2</td>
                                    </tr>
                                    <!-- Add more table rows dynamically with JavaScript or server-side code -->
                                </tbody>
                            </table>
                            <div class="table-buttons">
                                <button class="btn btn-primary">Add Medication</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Wait list Products </h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>Product Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product 1</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>Product 2</td>
                                        <td>5</td>
                                    </tr>
                                    <!-- Add more table rows dynamically with JavaScript or server-side code -->
                                </tbody>
                            </table>
                            <div class="table-buttons">
                                <button class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </div>
                    <!-- ... Your HTML code ... -->

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <h3>Prediction for Next Month</h3>
                            <div class="prediction-date">
                                <br/>
                                <input type="date" id="prediction-date"
                                    value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
                            </div>
                            <br\>
                            <table class="table table-striped prediction-table">
                                <thead>
                                    <tr>
                                        <th>Medication</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="prediction-table-body">
                                    <!-- Table body content will be dynamically generated here -->
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <script>
                        // Function to handle date input change event
                        // Function to handle date input change event
                        function handleDateChange() {
                            // Get the selected date value
                            var dateValue = document.getElementById('prediction-date').value;

                            // Create a FormData object and append the date value
                            var formData = new FormData();
                            formData.append('end_date', dateValue);

                            // Send an AJAX request to the prediction PHP file
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Replace the table body with the new prediction data
                                    var predictionTableBody = document.getElementById('prediction-table-body');
                                    predictionTableBody.innerHTML = xhr.responseText;
                                }
                            };
                            xhr.open('POST', 'actions/prediction.php', true);
                            xhr.send(formData);
                        }


                        // Attach the date input change event listener
                        var predictionDateInput = document.getElementById('prediction-date');
                        predictionDateInput.addEventListener('change', handleDateChange);
                        handleDateChange();
                    </script>
                    <?php
                    // Close the database connection
                    mysqli_close($coon);
                    ?>

                </div>
            </main>

            <!--footer start here -->
            <?php include "includes/footer.php"; ?>
            <!--end  here -->
        </div>
    </div>
    <!-- Add Font Awesome JS -->
    <script src="js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>

    </script>
</body>

</html>