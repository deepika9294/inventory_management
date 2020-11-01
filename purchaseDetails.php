<?php
    require_once "core.php";
    require_once("includes/header.php");
    $id_chosen = -1;
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPurchaseModal">
                Add
        </button>
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Purchase Details </h4>
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
                <table class ="tables" id ="managePurchaseTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Customer Name</th>
                        <th style="text-align: center;">Customer Phone</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Item Brand</th>
                        <th style="text-align: center;">Item category</th>
                        <th style="text-align: center;">Item price</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Transaction Details</th>
                        

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>



    
    <div class="card mt-4 ml-3 mr-3">
    
        <div class="card-body">
            <h4 class="card-title"> Transaction Details </h4>
            <div class="card-text">
                <table class ="tables" id ="manageTransactionTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Transaction ID</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Mode of Payment</th>
                        <th style="text-align: center;">Discount</th>
                        <th style="text-align: center;">Selling Price</th>
                        <th style="text-align: center;">Amount</th>
                       
                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addPurchaseModal" tabindex="-1" role="dialog" aria-labelledby="PurchaseModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PurchaseModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form class="form-horizontal" id="submitPurchaseForm" action="addPurchase1.php" method="POST"> 
      <div class="modal-body">
        <div id="add-item-messages"></div>

       <!-- <div class="form-group">
  <label class="control-label col-sm-9" for="customer_name">Customer Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name" required>
    </div>
  </div> -->
  <div class="form-group">
                <label class="control-label col-sm-9" for="customer_id">Supplier Name:</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        <option value="">---Select---</option>
                        <?php
                        $sql = "SELECT customer_id, customer_name FROM customer";
                        $result = $connect->query($sql);
                        while ($row = $result->fetch_array()){
                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                        ?>
                    </select>
                    
                    </div>
      </div>

   <!-- <div class="form-group">
    <label class="control-label col-sm-9" for="customer_phone">Phone</label>
    <div class="col-sm-9">
      <input type="number"  class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter Phone Number" required>
    </div>
  </div> -->

  <!-- <div class="form-group">
    <label class="control-label col-sm-9" for="customer_email">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Enter Email" required>
    </div>
  </div> -->

  <!-- <div class="form-group">
    <label class="control-label col-sm-9" for="customer_address">Address</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Enter Address" required>
    </div>
  </div> -->

  <div class="form-group">
    <label class="control-label col-sm-9" for="date">Date</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="date" name="date" placeholder="Choose Date" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-9" for="ItemName" required>Item Name</label>
    <div class="col-sm-9"> 
      <select class="form-control" id="ItemName" name="ItemName" required>
        <option value="">---Select---</option>
        <?php
        $sql = "SELECT s.item_id, i.item_name FROM inventory_items as i INNER JOIN item_stocks as s ON i.item_id = s.item_id";
        $result = $connect->query($sql);
        while ($row = $result->fetch_array()){
          echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
        ?>
      </select>   
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-9" for="quantity" required>Quantity</label>
    <div class="col-sm-9"> 
      <select class="form-control" id="quantity" name="quantity" required>
        <option value="">---Select---</option>
            <?php
            for($i = 1; $i <= 10; $i ++){
                ?>
                <option value="<?php echo $i; ?>"> <?php echo $i ?> </option>
                <?php
            }
            ?>
      </select>
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-9" for="discount">Discount(in total)</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount " required>
    </div>
  </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="createPurchaseBtn" >Save changes</button>
      </div>

    </div>
  </div>
</div>


</body>


<script type="text/javascript" src="customs/js/purchaseDetails.js"></script>
<script type="text/javascript" src="customs/js/TransactionDetails.js"></script>
</html>