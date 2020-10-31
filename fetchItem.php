<?php 	

require_once 'core.php';

$sql = "SELECT inventory_items.item_id, inventory_items.item_name, inventory_items.brand_id,
 	 inventory_items.category_id, inventory_items.price,
 		brands.brand_name, category.category_name FROM inventory_items 
		INNER JOIN brands ON inventory_items.brand_id = brands.brand_id 
		INNER JOIN category ON inventory_items.category_id = category.category_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 
	
	while($row = $result->fetch_array()) {
		$edit = "<a href='editItem.php?item_id=".$row[0]."'><button class='btn btn-primary'>Edit</button></a>";
		$output['data'][] = array( 		
			$row[0],
			$row[1],
			$row[5],
			$row[6],
			$row[4],
			$edit
		
     	); 	
 	}
}
$connect->close();
echo json_encode($output);
