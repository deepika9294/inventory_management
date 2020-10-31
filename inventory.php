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

    
<div class="container">
    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStockModal">
            Add
        </button>
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Stock in Inventory </h4>
            <div class="card-text">
                <table class ="tables" id ="manageStockTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Item ID</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Minimum Quantity</th>
                        <th style="text-align: center;">Action</th>

                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>




    <div class="card mt-4 ml-3 mr-3">
    <h5 class="card-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal">
            Add
        </button>

</h5>
        
    
        <div class="card-body">
            <h4 class="card-title"> Items Details </h4>
            <div class="card-text">
                <table class ="tables" id ="manageItemTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Item ID</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Brand</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Price</th>
                        <th  style="text-align: center;">Action</th>

                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>
</div>


<!-- modal for stock -->
<!-- need to add constraint for not adding existing ones -->
<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add item in a stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="submitStockForm" action="createStock.php" method="POST">
                <div class="form-group">
          <label class="control-label col-sm-9" for="item_id">Item Name:</label>
            <div class="col-sm-9">
              <select class="form-control" id="item_id" name="item_id" required>
                <option value="">---Select---</option>
                <?php
                $sql = "SELECT i.item_id, item_name FROM inventory_items as i LEFT JOIN item_stocks as s ON i.item_id = s.item_id WHERE s.item_id is NULL
                ";
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
            <label class="control-label col-sm-9" for="minimum_quantity">Minimum Quantity:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="minimum_quantity" name="minimum_quantity" placeholder="Minimum Quantity" required>
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="createStockBtn">Save changes</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
 




<!-- Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itemModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form class="form-horizontal" id="submitItemForm" action="createItem.php" method="POST"> 
      <div class="modal-body">
        <div id="add-item-messages"></div>

       <div class="form-group">
  <label class="control-label col-sm-9" for="item_name">Item Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter item name" required>
    </div>
  </div>


   <div class="form-group">
    <label class="control-label col-sm-9" for="price">Price:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="price" name="price" placeholder="Rate (price per piece)" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="brandName" required>Brand Name:</label>
    <div class="col-sm-9"> 
      <select class="form-control" id="brandName" name="brandName" required>
        <option value="">---Select---</option>
        <?php
        $sql = "SELECT brand_id, brand_name FROM brands";
        $result = $connect->query($sql);
        while ($row = $result->fetch_array()){
          echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
        ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-9" for="categoryName" required>Category Name:</label>
    <div class="col-sm-9"> 
      <select class="form-control" id="categoryName" name="categoryName" required>
        <option value="">---Select---</option>
        <?php
        $sql = "SELECT category_id, category_name FROM category";
        $result = $connect->query($sql);
        while ($row = $result->fetch_array()){
          echo "<option value='".$row[0]."'>".$row[1]."</option>";
        }
        ?>
      </select>
    </div>
  </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="createItemBtn" >Save changes</button>
      </div>

    </div>
  </div>
</div>
 








</body>
</html>
<script type="text/javascript" src="customs/js/item.js"></script>
<script type="text/javascript" src="customs/js/stock.js"></script>
