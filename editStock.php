<?php require_once 'includes/header.php'; 
        require_once 'core.php';
?>

<?php
if($_GET) {
      $item_id = $_GET["item_id"];
      $item_name = $_GET["item_name"];
      $result = "SELECT * FROM item_stocks WHERE item_id = '$item_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>

<div class="container mt-4">
<form class="form-horizontal " id="submitOrderForm" action="editStockQuery.php" method="POST"> 
    <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="item_id" name="item_id" value="<?php echo $row['item_id'];?>">
  </div>
    <h4>Edit Details</h4><hr style="margin-top: 30px;">
    
 
    <div class="form-group">
  <label class="control-label col-sm-2" for="item_name">Item Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="item_name" name="item_name" readonly value="<?php echo $item_name;?>" required>
    </div>
  </div>

    <div class="form-group">
  <label class="control-label col-sm-2" for="quantity">Quantity:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity'];?>" required>
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="minimum_quantity">Minimum Quantity:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="minimum_quantity" name="minimum_quantity" placeholder="minimum quantity" value="<?php echo $row['minimum_quantity'];?>" required>
    </div>
  </div>

<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success">Update</button>
</form>
</div>