<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$item_id = $_POST['item_id'];
	$quantity = $_POST['quantity'];
	$minimum_quantity = $_POST['minimum_quantity'];

	$sql = "INSERT INTO item_stocks (item_id, quantity, minimum_quantity) VALUES ('$item_id', '$quantity', '$minimum_quantity')";

	if($connect->query($sql) === TRUE) {

		header('location: http://localhost/inventory/inventory.php');	

	} else {
	 	echo "Failed!";
	}

	$connect->close();

	echo json_encode($valid);
 
}
