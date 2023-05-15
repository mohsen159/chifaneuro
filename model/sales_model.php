<!--add a sales -->
<div class="modal fade bd-example-modal-sm" id="add">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">New Sales </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form autocomplete="off" action="actions/insert_sale.php" method="post" class="was-validated" id="form_sales" name="form_sales">
                    <div class="mb-3 mt-3 autocomplete">
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
                    <br>

                    <div id="1" class="mt-3 autocomplete d-flex flex-nowrap justify-content-between space">
                        <input type="hidden" name="id[]">
                        <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="name[]" required>
                        <input type="text" class="order-2 p-2" style="width:80px" onblur="findmax(this)" placeholder="Lot" name="lot[]" required>
                        <input type="number" class="order-3 p-2" min="1" style="width:100px" placeholder="Amount" name="amount[]" required>
                        <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick=" delet_p(this)">
                            <br>
                    </div>
                    <!-- don't delet this input we use it to add new div before  -->
                    <input type="hidden" id="complited">
                    <br>
                    <button style="margin-bottom:30px" type="button" onclick="addElement()" class="fa fa-plus btn btn-primary"></button>
                    <!-- noncomplited part -->

                    <!-- don't delet this input we use it to add new div before  -->
                    <input type="hidden" id="noncomplited">
                    <br>
                    <button style="margin-top:10px" type="button" onclick="addnElement()" class="fa fa-plus btn btn-primary">Add noncomplited</button>
                    <!-- num order  -->
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="num_order" placeholder="num_order" name="num_order" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label for="sale_date" class="form-label">Sale date</label>
                        <input type="date" id="sale_date" name="sale_date" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Enter a valid date.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="number" class="form-control" id="dure" placeholder="dure" name="dure" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
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





<!--edit-->
<div class="modal fade bd-example-modal-sm" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">update sales information </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form autocomplete="off" action="/operation/update_sale.php" method="post" class="was-validated" id="sale_update" name="sale_update">
                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" id="id" name="id" required>
                        <!-- this on soo we can know wich sales id -->
                    </div>
                    <div class="mb-3 mt-3">
                        <textarea class="form-control" id="medication" placeholder="medication" name="medication" required>
                               </textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="num_order" placeholder="num_order" name="num_order" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label for="sale_date" class="form-label">sale date</label>
                        <input type="date" id="sale_date" name="sale_date" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Enter a valid date.</div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <select id="select" class="form-select form-select-sm" aria-label="Default select example" name="employs">
                            <option value="1">wissam</option>
                            <option value="2">mohssen</option>
                            <option value="3">hakim</option>
                            <option value="4">rafik</option>
                            <option value="5">khouloud</option>
                            <option value="6">mehdi</option>
                            <option value="7">wided</option>
                        </select>
                    </div>
                    <br>
                    <div class="mb-3 mt-3">
                        <input type="text" min="1" max="100" class="form-control" id="dure" placeholder="dure" name="dure" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <textarea class="form-control" id="note_fix" placeholder="note" name="note_fix">
                               </textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Edit</button>
                    <button type="submit" class="btn btn-outline-danger" onclick='delet( document.forms["sale_update"]["id"].value ,"sales")' style="float:right">Delete</button>
                </form>

            </div>
        </div>
    </div>

</div>




<!--add new client -->
<div class="modal" id="addclient">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add a client </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" class="was-validated" id="new_client">
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="fname" placeholder="Enter family name" name="fname" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

</div>