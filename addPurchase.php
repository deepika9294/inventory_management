<?php
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customer_name = $_POST['customer_name'];
	$customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $customer_address = $_POST['customer_address'];
    $date = $_POST['date'];
    $item_id = $_POST['ItemName'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $mode = "cash";
    
    $min_quantity = 1;

    $errors = array();

    $price_query = "SELECT price from `inventory_items` WHERE item_id = '$item_id'";
    $res = $connect->query($price_query);
    $price = $res->fetch_assoc()['price'];
    $qry = "SELECT `quantity`, `minimum_quantity` from `item_stocks` where item_id = '$item_id' ";
    $re = $connect->query($qry);
    $row = $re->fetch_array();
    $old_quantity = $row[0];
    $min_quantity = $row[1]; 

    if($old_quantity - $quantity >= $min_quantity && $old_quantity - $quantity >= 0){
        if($discount < $price){
            $amount =  ( $price * $quantity ) - $discount;
        }
        else{
            $amount = $price * $quantity;
            $errors[] = "No discount issued, discount out weighs the original price";
        }
        try
        {
            $sql2 = 0; 
            $sql = "INSERT INTO `transaction` ( `date`, `mode`, `discount`, `selling_price`, `amount`) VALUES ('$date', '$mode', '$discount', '$price', '$amount')";
            if($connect->query($sql) === TRUE){
                $result = $connect->query("SELECT `transaction_id` FROM `transaction` WHERE `date` = '$date' AND `mode` = '$mode' AND `discount` = '$discount' AND `selling_price` = '$price' AND `amount` = '$amount' ");
                $transaction_id = $result->fetch_assoc()['transaction_id'];

                $r = "SELECT customer_phone, customer_email from customer where  customer_phone = '$customer_phone' OR customer_email= '$customer_email'";
                $res = $connect->query($r);
                if($res->num_rows == 0){
                    $sql2 = "INSERT INTO customer (`customer_name`, `customer_email`, `customer_phone`, `customer_address`) VALUES ('$customer_name', '$customer_email', '$customer_phone', '$customer_address')";
                    $connect->query($sql2);
                }

                $result = $connect->query("SELECT `customer_id` FROM customer WHERE `customer_phone` = '$customer_phone' OR customer_email = '$customer_email'");
                $customer_id = $result->fetch_assoc()['customer_id'];

                $sql3 = "INSERT INTO `purchased`( `item_id`, `customer_id`, `quantity`, `transaction_id`) VALUES ('$item_id', '$customer_id', '$quantity', '$transaction_id')";
                if($connect->query($sql3) === TRUE){
                    $sql4 = "UPDATE item_stocks SET `quantity` = '$old_quantity' -'$quantity' WHERE item_id = '$item_id' ";
                    if($connect->query($sql4) === TRUE){
                        $errors[] = "Details updated successfully!!";
                    }
                    
                }
            }   
           
        }
        catch(\Throwable $e){
                $connect->rollback();
                throw $e;
        }
    }
    else{
        $errors[] = "selected Quantity is out of stock";
    }
    $_SESSION['error'] = $errors;
    $connect->close();
    header('location: http://localhost/inventory/purchaseDetails.php');
}                                     