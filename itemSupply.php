<?php
    require_once("includes/header.php");
    require_once("db_connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./customs/css/dashboard.css">
</head>
<body>

<?php if($_GET) {
        if($_GET['error']) {
          $value = $_GET['error'];
          echo '<div style= "width: 40%; margin-top:30px; left: 30%;" class="alert alert-danger alert-dismissible fade show" "row justify-content-center" role="alert">
          '.$value.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';			
        }
         							
    
} ?>

<div class="container">
    

    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItemSupplyModal">
            Add
        </button>
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Details </h4>
            <div class="card-text">
                <table class ="tables" id ="manageItemSupplyTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Supplier Name</th>
                        <th style="text-align: center;">Supplier Phone</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Brand</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Supply Date</th>
                        <th style="text-align: center;">Delivered Date</th>
                        <th style="text-align: center;">Price</th>
                        <th style="text-align: center;">Quantity</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    
</div>




<!-- Modal -->
<div class="modal fade" id="addItemSupplyModal" tabindex="-1" role="dialog" aria-labelledby="itemSupplyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemSupplyModalLabel">Add item in a stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="submitItemSupply" action="createItemSupply.php" method="POST">


            <div class="form-group">
                <label class="control-label col-sm-9" for="supplier_id">Supplier Name:</label>
                    <div class="col-sm-9">
                    <select class="form-control" id="supplier_id" name="supplier_id" required>
                        <option value="">---Select---</option>
                        <?php
                        $sql = "SELECT supplier_id, supplier_name FROM supplier";
                        $result = $connect->query($sql);
                        while ($row = $result->fetch_array()){
                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                        ?>
                    </select>
                    
                    </div>
            </div>

            <div class="form-group">
            <label class="control-label col-sm-9" for="item_id">Item Name:</label>
                <div class="col-sm-9">
                <select class="form-control" id="item_id" name="item_id" required>
                    <option value="">---Select---</option>
                    <?php
                    $sql = "SELECT item_id, item_name FROM inventory_items";
                    $result = $connect->query($sql);
                    while ($row = $result->fetch_array()){
                    echo "<option value='".$row[0]."'>".$row[1]."</option>";
                    }
                    ?>
                </select>
                
                </div>
            </div>


          <div class="form-group">
            <label class="control-label col-sm-9" for="quantity">Quantity:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-9" for="price">Price:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="price" name="price" placeholder="Price per piece" required>
            </div>
          </div>
            
          <div class="form-group">
            <label for="supplied_date" class="col-2 col-form-label">Supplied Date</label>
            <div class="col-10">
                <input class="form-control" type="date" name="supplied_date" id="supplied_date" required>
            </div>
      </div>


        <div class="form-group">
            <label for="delivered_date" class="col-2 col-form-label">Delivered Date</label>
            <div class="col-10">
                <input class="form-control" type="date" name="delivered_date" id="delivered_date" required>
            </div>
        </div>

          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="createItemSupplyBtn">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
 




</body>
</html>
<script type="text/javascript" src="customs/js/itemSuppliers.js"></script>
