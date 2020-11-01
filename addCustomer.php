<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());



if($_POST) {	
    $errors = array();

	$customer_name = $_POST['customer_name'];
	$customer_email = $_POST['customer_email'];
	$customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
   
    
    #check if the phone number and email are unique

    $sql = "INSERT INTO customer (customer_name, customer_email, customer_phone, customer_address) VALUES ('$customer_name', '$customer_email', '$customer_phone', '$customer_address')";

    if($connect->query($sql) === TRUE) {
        $errors[] =  "details updated successfully !!";
        $_SESSION['error'] = $errors;
        header('location: http://localhost/inventory/customerDetails.php');	

    }else {
        $errors[] =  "Failed to add details";
        $_SESSION['error'] = $errors;
        header('location : customerDetails.php');
    }


	$connect->close();
 
}

?> 