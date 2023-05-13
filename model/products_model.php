   <!--addproductlist-->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addproductlist">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">add to list drugs </h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form autocomplete="off"  method="post" class="was-validated" id="new_item" name="new_item">
                       <div id="1" class="mt-3 autocomplete d-flex flex-nowrap justify-content-between space">
                           <input type="text" class="form-control order-1 p-2" placeholder="Name" name="name" required>
                           <input type="text" class="form-control order-1 p-2" placeholder="Dci" name="dci" required>
                           <input type="text" class="form-control order-1 p-2" placeholder="Dosage" name="dosage" required>
                           <input type="text" class="form-control order-1 p-2" placeholder="La Forme" name="form" required>
                       </div>
                       <br>
                       <br>
                       <button type="submit" class="btn btn-outline-success">Add</button>
                   </form>
               </div>



           </div>
       </div>

   </div>

   <!--add model-->
   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">Add a medication </h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form autocomplete="off" action="actions/add_products.php" method="post" class="was-validated" id="new_product" name="new_product">
                       <div id="1" class="mt-3 autocomplete d-flex flex-nowrap justify-content-between space">
                           <input type="hidden" name="id[]">
                           <input type="text" onfocus="find_product(this)" onblur="find_productid(this)" class="form-control order-1 p-2" placeholder="Name" name="name[]" required>
                           <input type="text" class="order-2 p-2" style="width:80px" placeholder="Lot" name="lot[]" required>
                           <input type="number" class="order-3 p-2" style="width:100px" placeholder="Amount" name="amount[]" required>
                           <input type="date" class="order-3 p-2" style="width:220px" name="exp[]" required>
                           <li style="margin-right: 10px;" class="btn btn-danger fa fa-trash" aria-hidden="true" onclick=" delet_p(this)">
                               <br>
                       </div>
                       <!-- don't delet this input we use it to add new div before  -->
                       <input type="hidden" id="0">
                       <br>
                       <button style="margin-top:10px" type="button" onclick="addElement()" class="fa fa-plus btn btn-primary"></button>
                       <br>
                       <br>
                       <button type="submit" class="btn btn-outline-success">Add</button>
                   </form>
               </div>



           </div>
       </div>

   </div>
   <!--edit-->
   <div class="modal" id="edit">
       <div class="modal-dialog">
           <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                   <h4 class="modal-title">change drugs information </h4>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <form action="/operation/update_drug.php" method="post" class="was-validated" id="form_edit" name="form_edit">
                       <div class="mb-3 mt-3">
                           <input type="hidden" class="form-control" id="id" name="id" required>
                       </div>
                       <div class="mb-3 mt-3">
                           <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required readonly>
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                       </div>
                       <div class="mb-3">
                           <input type="text" class="form-control" id="lot" placeholder="Enter LOT" name="lot" required>
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                       </div>
                       <div class="mb-3">
                           <label for="number" class="form-label">count</label>
                           <input type="number" id="number" min="1" name="number" required>
                           <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Enter a valid number</div>
                       </div>
                       <button type="submit" class="btn btn-outline-success">Edit</button>
                       <button type="submit" class="btn btn-outline-danger" onclick='delet( document.forms["form_edit"]["id"].value ,"products")' style="float:right">Delete</button>
                   </form>

               </div>



           </div>
       </div>

   </div>