<?php
    require_once("includes/header.php");
    require_once "core.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./customs/css/dashboard.css">
</head>
<body>

<div class="container">
    

    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSupplierModal">
                Add
            </button>
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Details </h4>
            <div class="card-text">
                <table class ="tables" id ="manageSupplierTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Supplier ID</th>
                        <th style="text-align: center;">Supplier Name</th>
                        <th style="text-align: center;">Supplier Email</th>
                        <th style="text-align: center;">Supplier Phone</th>
                        <th style="text-align: center;">Supplier Address</th>
                        <th style="text-align: center;">Action</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="SupplierLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SupplierModalLabel">Add Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form class="form-horizontal" id="submitSupplierForm" action="addSupplier.php" method="POST"> 
      <div class="modal-body">
        <div id="add-supplier-messages">
        </div>

       <div class="form-group">
  <label class="control-label col-sm-9" for="supplier_name"> Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Enter Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-9" for="supplier_email">Email</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="supplier_email" name="supplier_email" placeholder="Enter Email" required>
</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-9" for="supplier_phone">Phone Number</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="supplier_phone" name="supplier_phone" placeholder="Enter Phone Number" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-9" for="supplier_address">Address</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="supplier_address" name="supplier_address" placeholder="short Address" required>
    </div>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="supplierBtn" >Save </button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script type="text/javascript" src="customs/js/supplierDetails.js"></script>