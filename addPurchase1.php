<?php
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$customer_id = $_POST['customer_id'];
    $date = $_POST['date'];
    $item_id = $_POST['ItemName'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $mode = "cash";
    
    $errors = array();
    $price = 80;
    $amount = 80;
    $sql = "INSERT INTO `transaction` ( `date`, `mode`, `discount`, `selling_price`, `amount`) VALUES ('$date', '$mode', '$discount', '$price', '$amount')";
    if($connect->query($sql) === TRUE) {
        // header('location: http://localhost/inventory/purchaseDetails.php');	
        // $result = $connect->query("SELECT `transaction_id` FROM `transaction` WHERE `date` = '$date' AND `mode` = '$mode' AND `discount` = '$discount' AND `selling_price` = '$price' AND `amount` = '$amount' ");
        // $transaction_id = $result->fetch_assoc()['transaction_id'];

        // $result_customer = $connect->query("SELECT `customer_id` FROM customer WHERE `customer_id` = '$customer_id'");
        // $customer_id = $result_customer->fetch_assoc()['customer_id'];

        $sql3 = "INSERT INTO `purchased`( `item_id`, `customer_id`, `quantity`, `transaction_id`) VALUES ('$item_id', '2', '$quantity', '53')";
        if($connect->query($sql3) === TRUE) {
            header('location : http://localhost/inventory/purchaseDetails.php');

        }
        else {
            echo "f";
        }
    }
    else {
        echo "f";
    }
    
    
    // try
        // {
        //     $sql = "INSERT INTO `transaction` ( `date`, `mode`, `discount`, `selling_price`, `amount`) VALUES ('$date', '$mode', '$discount', '$price', '$amount')";
        //     $connect->query($sql);

        //     // $result = $connect->query("SELECT `transaction_id` FROM `transaction` WHERE `date` = '$date' AND `mode` = '$mode' AND `discount` = '$discount' AND `selling_price` = '$price' AND `amount` = '$amount' ");
        //     // $transaction_id = $result->fetch_assoc()['transaction_id'];


        //     // $result_customer = $connect->query("SELECT `customer_id` FROM customer WHERE `customer_id` = '$customer_id'");
        //     // $customer_id = $result_customer->fetch_assoc()['customer_id'];

        //     // $sql3 = "INSERT INTO `purchased`( `item_id`, `customer_id`, `quantity`, `transaction_id`) VALUES ('$item_id', '$customer_id', '$quantity', '$transaction_id')";
        //     // $connect->query($sql3);

        //     // $sql4 = "UPDATE item_stocks SET `quantity` = '$old_quantity' -'$quantity' WHERE item_id = '$item_id' ";
        //     // $connect->query($sql4);
        //     header('location : http://localhost/inventory/purchaseDetails.php');
            
            
            
        // }
        // catch(Throwable $e){
        //         $connect->rollback();
        //         throw $e;
        //         echo "ISSUE";
        // }
        


        $connect->close();
        echo json_encode($valid);
     
    }
?>