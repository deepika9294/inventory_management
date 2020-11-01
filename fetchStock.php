<?php 	

require_once 'core.php';

$sql = "SELECT inventory_items.item_id, inventory_items.item_name, item_stocks.quantity, item_stocks.minimum_quantity
 	 	 FROM inventory_items 
		INNER JOIN item_stocks ON inventory_items.item_id = item_stocks.item_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 $edit = "<a href='editStock.php?item_id=".$row[0]."&item_name=".$row[1]."'><button class='btn btn-secondary'>Edit</button></a>";
    if($row[2] < $row[3]){
        $row_1 = "<p class = 'text-danger'><b>".$row[1]."</b></p>";
    }
    else {
        $row_1 = "<p class = 'text-success'>".$row[1]."</p>";
    }
 	$output['data'][] = array( 		
        $row[0],
        $row_1,
        $row[2],
        $row[3],
        $edit
     ); 	
 }
}
$connect->close();
echo json_encode($output);
