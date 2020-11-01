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

    #take the minimum and max_availbale quantity
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
            $errors[] = "No discoutn issued, discount out weighs the original price";
        }      
   
        #now insert into transaction
        #insert into customer
        #den update stock and den at last update customer
        try
        {
            $sql = "INSERT INTO `transaction` ( `date`, `mode`, `discount`, `selling_price`, `amount`) VALUES ('$date', '$mode', '$discount', '$price', '$amount')";
            if($connect->query($sql) === TRUE){
                $res = "SELECT `transaction_id` FROM `transaction` WHERE `date` = '$date' AND `mode` = '$mode' AND `discount` = '$discount' AND `selling_price` = '$price' AND `amount` = '$amount' ";
                $result = $connect->query($res);
                $transaction_id = $result->fetch_assoc()['transaction_id'];

                $r = "SELECT customer_name, customer_phone, customer_email, customer_address from customer where customer_name = '$customer_name' AND customer_phone = '$customer_phone' AND customer_email= '$customer_email'";
                $res = $connect->query($r);
                if($res->num_rows == 0){
                    $sql = "INSERT INTO customer (`customer_name`, `customer_email`, `customer_phone`, `customer_address`) VALUES ('$customer_name', '$customer_email', '$customer_phone', '$customer_address')";
            
                    if($connect->query($sql) === TRUE){
                        $result = $connect->query("SELECT `customer_id` FROM customer WHERE `customer_phone` = '$customer_phone'");
                        $customer_id = $result->fetch_assoc()['customer_id'];
                        $result = $connect->query("SELECT `customer_id` FROM customer WHERE `customer_phone` = '$customer_phone'");
                        $customer_id = $result->fetch_assoc()['customer_id'];

                        $sql = "INSERT INTO `purchased`( `item_id`, `customer_id`, `quantity`, `transaction_id`) VALUES ('$item_id', '$customer_id', '$quantity', '$transaction_id')";
                        if($connect->query($sql) === TRUE){
                            $final_sql = "UPDATE item_stocks SET `quantity` = '$old_quantity' -'$quantity' WHERE item_id = '$item_id' ";
                            if($connect->query($final_sql) === TRUE){
                                header('location : purchaseDetails.php');
                            }
                        }  
                    }
                }
            }
        }
        catch(Throwable $e){
            $connect->rollback();
            throw $e;
        }
    }
    else{
        $errors[] = "Item Quantity out of stock!";
        $_SESSION['error'] = $errors;  
        header('location : http://localhost/inventory/purchaseDetails.php');


    }
   
}

$connect->close();

?>


    
