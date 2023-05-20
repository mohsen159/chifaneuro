<?php
$page_name = "User Profail";
include "includes/session.php";
include "includes/coon.php";
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
                <h1 class="h1 mb-1 h1-size"><?php echo $page_name; ?></h1>

                    <!-- User Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="family-name" class="form-label">Family Name</label>
                                    <input type="text" class="form-control" id="family-name" name="family_name" placeholder="Enter your family name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="date_of_birth" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id-card-photo" class="form-label">Identity Card Photo</label>
                                    <input type="file" class="form-control" id="id-card-photo" name="id_card_photo" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <button type="submit" class="btn btn-primary">Samilarity</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <img src="img/user_null.jpg" alt="ID Card" class="img-fluid profile">
                            </div>
                        </div>
                    </div>

                    <!-- Tables -->
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Table 1 Header 1</th>
                                        <th scope="col">Table 1 Header 2</th>
                                        <th scope="col">Table 1 Header 3</th>
                                        <th scope="col">Table 1 Header 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Value 1</td>
                                        <td>Value 2</td>
                                        <td>Value 3</td>
                                        <td>Value 4</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Table 2 Header 1</th>
                                        <th scope="col">Table 2 Header 2</th>
                                        <th scope="col">Table 2 Header 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Value A</td>
                                        <td>Value B</td>
                                        <td>Value C</td>
                                    </tr>
                                    <!-- Add more rows as needed -->
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
    <script>

    </script>
</body>

</html>
