<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());


#errors to be formated yet
if($_POST) {	

	$customer_name = $_POST['customer_name'];
	$customer_email = $_POST['customer_email'];
	$customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    
    #check if the phone number and email are unique

    $sql = "INSERT INTO customer (customer_name, customer_email, customer_phone, customer_address) VALUES ('$customer_name', '$customer_email', '$customer_phone', '$customer_address')";

    if($connect->query($sql) === TRUE) {
    header('location: http://localhost/inventory/customerDetails.php');	

    }else {
        echo "Failed";
        header('location : customerDetails.php');
    }


	$connect->close();
 
}