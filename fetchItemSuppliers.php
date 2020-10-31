<?php 	

require_once 'core.php';

$sql = "SELECT supplier_name, supplier_phone, item_name, brand_name, category_name,supplied_date,delivered_date, item_suppliers.price, item_suppliers.quantity  from 
inventory_items inner join brands on brands.brand_id = inventory_items.brand_id 
inner join category on category.category_id = inventory_items.category_id 
inner join item_suppliers on inventory_items.item_id = item_suppliers.item_id 
inner join supplier on supplier.supplier_id = item_suppliers.supplier_id";


$result = $connect->query($sql);

$output = array('data' => array());



if($result->num_rows > 0) { 
 while($row = $result->fetch_array()) {
 	$output['data'][] = array( 		
        $row[0],
        $row[1],
        $row[2],
        $row[3],
        $row[4],
        $row[5],
        $row[6],
        $row[7],
        $row[8]
     ); 	
 }
}
$connect->close();
echo json_encode($output);