<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$item_id = $_POST['item_id'];
 	$item_name = $_POST['item_name'];
 	$price = $_POST['price'];

	$sql = "UPDATE inventory_items SET item_name = '$item_name' , price = '$price' WHERE item_id = '$item_id'";

	if($connect->query($sql) === TRUE) {
	 	
		header('location: http://localhost/inventory/inventory.php');	


	} else {
	 	
		echo 'Failed!';

	}
	 
	$connect->close();
}