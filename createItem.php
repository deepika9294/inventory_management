<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$errors = "";
$check = 0;
if($_POST) {	

	$item_name = $_POST['item_name'];
	$price = $_POST['price'];
	$brand_id = $_POST['brandName'];
	$category_id = $_POST['categoryName'];

	$sql1 = "SELECT item_name, brand_id, category_id FROM inventory_items";
	$result = $connect->query($sql1);
	while ($row = $result->fetch_array()){
		if($row[0] == $item_name && $row[1] == $brand_id && $row[2] == $category_id){
			$errors = "Cannot add duplicate data";
			$check = 1;
			header('location: http://localhost/inventory/inventory.php?error='.$errors);	
		}  
			
	}
		
	
	
	if($check == 0) {
		$sql = "INSERT INTO inventory_items (item_name, price, brand_id, category_id) VALUES ('$item_name', '$price', '$brand_id', '$category_id')";

		if($connect->query($sql) === TRUE) {

			header('location: http://localhost/inventory/inventory.php');	

		} else {
			echo "Failed!";
		}
	}
	else {
		echo "Failed";
	}
	

	$connect->close();

	echo json_encode($valid);
 
}