<?php 	

require_once 'core.php';

$sql = "SELECT inventory_items.item_id, inventory_items.item_name, item_stocks.quantity, item_stocks.minimum_quantity
 	 	 FROM inventory_items 
		INNER JOIN item_stocks ON inventory_items.item_id = item_stocks.item_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 
 while($row = $result->fetch_array()) {
 	$output['data'][] = array( 		
        $row[0],
        $row[1],
        $row[2],
        $row[3],
     ); 	
 }
}
$connect->close();
echo json_encode($output);