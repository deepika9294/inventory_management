<?php 	

require_once 'core.php';

$sql = "SELECT supplier_id, supplier_name, supplier_email, supplier_phone, supplier_address FROM supplier"; 

$result = $connect->query($sql);

$output = array('data' => array());



if($result->num_rows > 0) { 
 while($row = $result->fetch_array()) {
 	$output['data'][] = array( 		
        $row[0],
        $row[1],
        $row[2],
        $row[3],
        $row[4]
     ); 	
 }
}
$connect->close();
echo json_encode($output);