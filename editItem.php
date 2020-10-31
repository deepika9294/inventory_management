<?php require_once 'includes/header.php'; 
        require_once 'core.php';
?>

<?php
if($_GET) {
      $item_id = $_GET["item_id"];

      $result = "SELECT * FROM inventory_items WHERE item_id = '$item_id'";
      $resultConn = $connect->query($result);
      $row = $resultConn->fetch_array();
}
?>

<div class="container mt-4">
<form class="form-horizontal " id="submitOrderForm" action="editItemQuery.php" method="POST"> 
    <div style="display:none;" class="form-group">
    <input type="text" class="form-control" id="item_id" name="item_id" value="<?php echo $row['item_id'];?>">
  </div>
    <h4>Edit Product</h4><hr style="margin-top: 30px;">
    
    <div class="form-group">
  <label class="control-label col-sm-2" for="item_name">Item Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Enter item name" value="<?php echo $row['item_name'];?>" required>
    </div>
  </div>


    <div class="form-group">
    <label class="control-label col-sm-2" for="price">Price:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" placeholder="Rate (price per piece)" value="<?php echo $row['price'];?>" required>
    </div>
  </div>

<button style="margin: 30px 0 30px 0;float:left;" type="submit" class="btn btn-success">Update Item Detail</button>
</form>
</div>