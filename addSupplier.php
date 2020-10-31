<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());


#errors to be formated yet
if($_POST) {	

	$supplier_name = $_POST['supplier_name'];
	$supplier_email = $_POST['supplier_email'];
	$supplier_phone = $_POST['supplier_phone'];
    $supplier_address = $_POST['supplier_address'];
    
    #check if the phone number and email are unique

    $sql = "INSERT INTO supplier (supplier_name, supplier_email, supplier_phone, supplier_address) VALUES ('$supplier_name', '$supplier_email', '$supplier_phone', '$supplier_address')";

    if($connect->query($sql) === TRUE) {
    header('location: http://localhost/inventory/supplierDetails.php');	

    }else {
        echo "Failed";
        header('location : supplierDetails.php');
    }


	$connect->close();
 
}