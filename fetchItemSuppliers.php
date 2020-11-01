<?php 	

require_once 'core.php';

$sql = "SELECT supplier_name, supplier_phone, item_id, supplied_date,delivered_date, item_suppliers.price, item_suppliers.quantity  from item_suppliers 
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
     ); 	
 }
}
$connect->close();
echo json_encode($output);