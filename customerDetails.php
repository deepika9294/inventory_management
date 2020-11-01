<?php
    require_once("includes/header.php");
    require_once("core.php");
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">
                Add
            </button>
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Customer Details </h4>
            <div>
            <?php
            if(isset($_SESSION['error'])){
              foreach ($_SESSION['error'] as $key) {
                  echo '<div style = "width: 40%;right:1%;margin-top:30px;" class="alert alert-danger alert-dismissible fade show"" role="alert">
                '.$key.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';										
                
              }
               unset($_SESSION['error']);
            }
            ?>
            </div>
            <div class="card-text">
                <table class ="tables" id ="manageCustomerTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Customer ID</th>
                        <th style="text-align: center;">Customer Name</th>
                        <th style="text-align: center;">Customer Email</th>
                        <th style="text-align: center;">Customer Phone</th>
                        <th style="text-align: center;">Customer Address</th>
                        <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="CustomerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CustomerModalLabel">Add Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form class="form-horizontal" id="submitCustomerForm" action="addCustomer.php" method="POST"> 
      <div class="modal-body">
        <div id="add-customer-messages">
        </div>

       <div class="form-group">
  <label class="control-label col-sm-9" for="customer_name"> Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-9" for="custoner_email">Email</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Enter Email" required>
</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-9" for="customer_phone">Phone Number</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter Phone Number" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-9" for="customer_address">Address</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="short Address" required>
    </div>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="customerBtn" >Save </button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script type="text/javascript" src="customs/js/customerDetails.js"></script>