
<!-- Edit a sales -->
<div class="modal fade bd-example-modal-sm" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Edit Sales</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form autocomplete="off" action="actions/Edit_sale.php" method="post" class="was-validated" id="edit_sales" name="edit_sales">
                    <!-- Insert sales id here -->
                    <div class="mb-3 mt-3 autocomplete">
                        <input type="hidden" name="salesid" id="salesid">
                        <input type="hidden" name="clientid">
                        <input type="text" onfocus="find_client(this)" onblur="find_clientid(this)" class="form-control" id="input_client" placeholder="client" name="client" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <br>
                    <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="employs">
                        <!--fetch user -->
                        <?php
                        // Assuming you have a database connection established
                        $pharm = $_SESSION['id_pharm'];

                        // Query to retrieve the users from the database
                        $query = "SELECT `id`, `name` FROM `users` WHERE `id_pharm` = $pharm";

                        // Execute the query
                        $result = mysqli_query($coon, $query);

                        // Check if the query was successful
                        if ($result) {
                            // Iterate over the result and generate the HTML options
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['name'];

                                // Check if the current user is selected
                                $selected = ($id == $_SESSION['id']) ? 'selected' : '';

                                // Generate the HTML option element
                                echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                            }
                        }

                        // Close the database connection
                        mysqli_close($coon);
                        ?>

                    </select>
                    <br />
                    <!-- This is just for the sales data medication_info in data that represents sales -->
                    <pre id="medication_info">

                    </pre>
                    <br />
                    <br />

                    <!-- Don't delete this input, we use it to add new div before -->
                    <input type="hidden" id="noncomplited">
                    <br>
                    <button style="margin-top:10px" type="button" onclick="addnElementc()" class="fa fa-plus btn btn-primary">Add</button>
                    <!-- Num order  -->
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="num_order" placeholder="num_order" name="num_order" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <!--sales date -->
                    <div class="mb-3">
                        <label for="sale_date" class="form-label">Sale date</label>
                        <input type="date" placeholder="DD/MM/YYYY" id="sale_date" name="sale_date" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Enter a valid date.</div>
                    </div>
                    <!--dure date -->
                    <div class="mb-3 mt-3">
                        <input type="number" class="form-control" id="dure" placeholder="dure" name="dure" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <!--sales note-->
                    <div class="mb-3 mt-3">
                        <textarea class="form-control" id="note" placeholder="note" name="note"></textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>