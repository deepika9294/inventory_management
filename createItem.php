<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$item_name = $_POST['item_name'];
	$price = $_POST['price'];
	$brand_id = $_POST['brandName'];
	$category_id = $_POST['categoryName'];

	$sql = "INSERT INTO inventory_items (item_name, price, brand_id, category_id) VALUES ('$item_name', '$price', '$brand_id', '$category_id')";

	if($connect->query($sql) === TRUE) {

		header('location: http://localhost/inventory/inventory.php');	

	} else {
	 	echo "Failed!";
	}

	$connect->close();

	echo json_encode($valid);
 
}