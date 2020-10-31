<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$check = 0;
if($_POST) {	
    $supplier_id = $_POST['supplier_id'];
    $item_id = $_POST['item_id'];
	$supplied_date = $_POST['supplied_date'];
	$delivered_date = $_POST['delivered_date'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];

    try {
        $sql = "INSERT INTO item_suppliers (`supplier_id`,`supplied_date`,`delivered_date`,`price`,`quantity`,`item_id`) VALUES 
        ('$supplier_id', '$supplied_date', '$delivered_date', '$price', '$quantity', '$item_id')";
    
        $sql1 = "SELECT item_id, quantity FROM item_stocks";
        $result1 = $connect->query($sql1);
        while ($row = $result1->fetch_array()){
            if($row[0] == $item_id){
                $check = 1;
                $sql2 = "UPDATE item_stocks SET quantity = '$row[1]' + '$quantity' WHERE item_id = '$item_id'";// or die($connect->error());
                if($connect->query($sql2) !== TRUE) {
                    echo ' Fail up!';
                }  
                
            }
            
        }
        if($check == 0) {
            $sql2 = "INSERT INTO item_stocks (`item_id`, `quantity`,`minimum_quantity`) VALUES ($item_id, $quantity, 0)";
        }
    

    }
    catch (\Throwable $e){
        $connect->rollback();
        throw $e;

    }

	
    if($connect->query($sql) === TRUE and $connect->query($sql2) === TRUE ) {

		header('location: http://localhost/inventory/itemSupply.php');	

	} else {
	 	echo "Failed!";
	}

	$connect->close();

	echo json_encode($valid);
 
}