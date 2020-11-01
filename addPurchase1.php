<?php
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$check = 0;
if($_POST) {	
    $errors = array();
	$customer_id = $_POST['customer_id'];
    $date = $_POST['date'];
    $item_id = $_POST['ItemName'];
    $quantity = $_POST['quantity'];
    $discount = $_POST['discount'];
    $mode = "cash";

    // fetching price of that item
    $price_query = "SELECT price from `inventory_items` WHERE item_id = '$item_id'";
    $res = $connect->query($price_query);
    $price = $res->fetch_assoc()['price'];
    $selling_price = $price * $quantity;
    $amount = $selling_price - $discount;

    $qry = "SELECT `quantity`, `minimum_quantity` from `item_stocks` where item_id = '$item_id' ";
    $re = $connect->query($qry);
    $row = $re->fetch_array();
    $old_quantity = $row[0];

        try {
            $sql = mysqli_query($connect,"INSERT INTO `transaction` ( `date`, `mode`, `discount`, `selling_price`, `amount`) VALUES ('$date', '$mode', '$discount', '$selling_price', '$amount')");
            // fetching last details
            $transaction_id = mysqli_insert_id($connect);
            $sql3 = mysqli_query($connect, "INSERT INTO `purchased`(`item_id`, `customer_id`, `quantity`, `transaction_id`) VALUES ('$item_id', '$customer_id', '$quantity', '$transaction_id')");
            // updating it 
            $sql4 = mysqli_query($connect, "UPDATE item_stocks SET `quantity` = '$old_quantity' -'$quantity' WHERE item_id = '$item_id' ");
            if($sql4) {
                $connect->close();

                header('location:http://localhost/inventory/purchaseDetails.php');
                return;
            }

            else {
                echo "Failed";
            }
        }
        catch (\Throwable $e){
            $connect->rollback();
            throw $e;
    
        }
        
        echo json_encode($valid);
        
    
    }

       
?>