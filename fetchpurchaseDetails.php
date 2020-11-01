<?php 	

require_once 'core.php';

$sql = "SELECT customer_name, customer_phone, item_name, brand_name, category_name, price, quantity, transaction_id from 
inventory_items inner join brands on brands.brand_id = inventory_items.brand_id 
inner join category on category.category_id = inventory_items.category_id 
inner join purchased on inventory_items.item_id = purchased.item_id 
inner join customer on customer.customer_id = purchased.customer_id";


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
        $row[7]
        
     ); 	
 }
}
$connect->close();
echo json_encode($output);

?>