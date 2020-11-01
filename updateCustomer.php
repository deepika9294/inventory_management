<?php 
    require_once 'core.php';
    require_once 'includes/header.php';
?>


<?php    
   
    $id = 0;
    $customer_name = "";
    $customer_phone = "";
    $customer_email = "";
    $customer_address = "";

    if (isset($_GET['update']))
    {
        $id = $_GET['update'];

        $result = $connect->query("SELECT * FROM customer WHERE customer_id = '$id' ") or die($connect->error());
        if ($result->num_rows == 1){
            $row = $result->fetch_array();
            $customer_name = $row['customer_name'];
            $customer_phone = $row['customer_phone'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];

        }
    }

    $errors = array();
    if($_POST)
    {
        $id = $_POST['id'];
        $new_customer_name = $_POST['customer_name'];
        $new_customer_phone = $_POST['customer_phone'];
        $new_customer_email = $_POST['customer_email'];
        $new_customer_address = $_POST['customer_address'];

        if($new_customer_name == ""){
            $errors[] = "Name is required";
        }
        if($new_customer_phone == ""){
            $errors[] = "Phone Number is required";
        }
        if($new_customer_email == ""){
            $errors[] = "Customer Email is required";
        }

        else{
            $result = $connect->query("SELECT customer_id FROM customer WHERE customer_phone = '$new_customer_phone' AND customer_id != '$id'");
            if($result->num_rows == 1){
                $errors[] = "Phone number already exsits";
            }
            else{
                $result = $connect->query("SELECT customer_id FROM customer WHERE customer_email = '$new_customer_email' AND customer_id != '$id' ");
                if($result->num_rows == 1){
                    $errors[] = "Email already exsits";
                }
                else{
                    #update the customer into database
                    $sql = " UPDATE customer 
                            SET customer_name = '$new_customer_name', 
                            customer_email = '$new_customer_email', 
                            customer_phone = '$new_customer_phone', 
                            customer_address = '$new_customer_address'
                            WHERE customer_id = '$id' ";

                    if($connect->query($sql) === TRUE) {
                         header('location: http://localhost/inventory/customerDetails.php');	
                    }
                    else {
                         echo 'Failed!';
                    }
    
                }
            }
           
            
        }
        
    }

?>

<html>
    <body>
        <div style="margin-top: 6%;" class = "container">
            <h1 style = "text-align:center;"> Update Details </h1><br><br>
            <?php if($errors) {
            foreach ($errors as $key => $value) {
                echo '<div style= "width: 40%; margin-top:30px; left: 30%;" class="alert alert-danger alert-dismissible fade show" "row justify-content-center" role="alert">
                '.$value.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';										
                }   
    
            } ?>
            <div class = "row justify-content-center">
                <div style= "width: 40%;" class = "form-group">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
                        <input type = "hidden" name="id" value="<?php echo $id; ?> ">
                        <div class= "form-group">
                            <label>Customer Name</label>
                            <input class = "form-control" type="text" name= "customer_name" value = "<?php echo $customer_name; ?>">
                        </div>
                        <div class= "form-group">
                            <label>Customer Phone</label>
                            <input class = "form-control" type="text" name= "customer_phone" value = "<?php echo $customer_phone; ?> ">
                        </div>
                        <div class= "form-group">
                            <label>Customer Email</label>
                            <input class = "form-control" type="text" name= "customer_email" value = "<?php echo $customer_email; ?> ">
                        </div>
                        <div class= "form-group">
                            <label>Customer Address</label>
                            <input class = "form-control" type="text" name= "customer_address" value = "<?php echo $customer_address; ?> ">
                        </div>
                        <div class = "form-group">
                            <button type="submit" value = "update" class= "btn btn-primary btn-md btn-block">Update</button>
                        </div> 
                    </form>
            </div>
        </div>
    </body>
</html>