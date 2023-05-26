<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  ///TODO : the page shoult have the charts better and to tables recomandation  and wait list number of total sales and client and user count 
  $page_name = "Dashboard";
  include "includes/session.php";
  include "includes/coon.php";
  include "includes/head.php"; ?>
  <!-- Add Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .card-icon {
      font-size: 3rem;
      color: #007bff;
    }
    .card-primary {
      background-color: #007bff;
      color: #fff;
      height: 200px;
    }
    .card-success {
      background-color: #28a745;
      color: #fff;
      height: 200px;
    }
    .card-danger {
      background-color: #dc3545;
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

          <h1 class="h1 mb-1 h1-size"><?php echo $page_name; ?></h1>

          <div style="color: black;" class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-body">
                  <h5 class="card-title">
                    <i class="fas fa-users card-icon"></i> Customers
                  </h5>
                  <p class="card-text">Number of customers: 100</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-success">
                <div class="card-body">
                  <h5 class="card-title">
                    <i class="fas fa-pills card-icon"></i> Medications
                  </h5>
                  <p class="card-text">Number of medications: 50</p>
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
              <h3>Product Completion</h3>
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

          <div class="row mt-5">
            <div class="col-md-12">
              <h3>Prediction for Next Month</h3>
              <div class="prediction-date">
                <label for="prediction-date">Date:</label>
                <input type="date" id="prediction-date" value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
              </div>
              <table class="table table-striped prediction-table">
                <thead>
                  <tr>
                    <th>Medication</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Medication 1</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Medication 2</td>
                    <td>5</td>
                  </tr>
                  <!-- Add more table rows dynamically with JavaScript or server-side code -->
                </tbody>
              </table>
            </div>
          </div>

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
