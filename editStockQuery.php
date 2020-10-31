
<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$item_id = $_POST['item_id'];
 	$quantity = $_POST['quantity'];
 	$minimum_quantity = $_POST['minimum_quantity'];

	$sql = "UPDATE item_stocks SET quantity = '$quantity' , minimum_quantity = '$minimum_quantity' WHERE item_id = '$item_id'";

	if($connect->query($sql) === TRUE) {
	 	
		header('location: http://localhost/inventory/inventory.php');	


	} else {
	 	
		echo 'Failed!';

	}
	 
	$connect->close();
}