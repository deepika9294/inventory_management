<?php 	

require_once 'core.php';

$sql = "SELECT transaction_id, date, mode, discount, selling_price, amount from transaction";

$result = $connect->query($sql) or die($connect->error());

$output = array('data' => array());



if($result->num_rows > 0) { 
 while($row = $result->fetch_array()) {
 	$output['data'][] = array( 		
        $row[0],
        $row[1],
        $row[2],
        $row[3],
        $row[4],
        $row[5]
     ); 	
 }
}
$connect->close();
echo json_encode($output);