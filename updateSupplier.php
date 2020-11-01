<?php 
    require_once 'core.php';
    require_once 'includes/header.php';
?>


<?php    
   
    $id = 0;
    $supplier_name = "";
    $supplier_phone = "";
    $supplier_email = "";
    $supplier_address = "";

    if (isset($_GET['update']))
    {
        $id = $_GET['update'];
        $result = $connect->query("SELECT * FROM supplier WHERE supplier_id = '$id' ") or die($connect->error());
        if ($result->num_rows == 1){
            $row = $result->fetch_array();
            $supplier_name = $row['supplier_name'];
            $supplier_phone = $row['supplier_phone'];
            $supplier_email = $row['supplier_email'];
            $supplier_address = $row['supplier_address'];

        }
    }

    $errors = array();
    if($_POST)
    {
        $id = $_POST['id'];
        $new_supplier_name = $_POST['supplier_name'];
        $new_supplier_phone = $_POST['supplier_phone'];
        $new_supplier_email = $_POST['supplier_email'];
        $new_supplier_address = $_POST['supplier_address'];

        if($new_supplier_name == ""){
            $errors[] = "Name is required";
            echo 'F!';

        }
        if($new_supplier_phone == ""){
            $errors[] = "Phone Number is required";
            echo 'F!';

        }
        if($new_supplier_email == ""){
            $errors[] = "Supplier Email is required";
            echo 'F!';

        }

        else{
            $result = $connect->query("SELECT supplier_id FROM supplier WHERE supplier_phone = '$new_supplier_phone' AND supplier_id != '$id'");
            if($result->num_rows == 1){
                $errors[] = "Phone number already exsits";
                echo 'F!';

            }
            else{
                $result = $connect->query("SELECT supplier_id FROM supplier WHERE supplier_email = '$new_supplier_email' AND supplier_id != '$id' ");
                if($result->num_rows == 1){
                    $errors[] = "Email already exsits";
                    echo 'F!';

                }
                else{
                    #update the supplier into database
                    $sql = " UPDATE supplier 
                            SET supplier_name = '$new_supplier_name', 
                            supplier_email = '$new_supplier_email', 
                            supplier_phone = '$new_supplier_phone', 
                            supplier_address = '$new_supplier_address'
                            WHERE supplier_id = '$id' ";

                    if($connect->query($sql) === TRUE) {
                         header('location: http://localhost/inventory/supplierDetails.php');	
                    }
                    else {
                         echo 'Faile!';
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
                            <label>Supplier Name</label>
                            <input class = "form-control" type="text" name= "supplier_name" value = "<?php echo $supplier_name; ?>">
                        </div>
                        <div class= "form-group">
                            <label>Supplier Phone</label>
                            <input class = "form-control" type="text" name= "supplier_phone" value = "<?php echo $supplier_phone; ?> ">
                        </div>
                        <div class= "form-group">
                            <label>Supplier Email</label>
                            <input class = "form-control" type="text" name= "supplier_email" value = "<?php echo $supplier_email; ?> ">
                        </div>
                        <div class= "form-group">
                            <label>Supplier Address</label>
                            <input class = "form-control" type="text" name= "supplier_address" value = "<?php echo $supplier_address; ?> ">
                        </div>
                        <div class = "form-group">
                            <button type="submit" value = "update" class= "btn btn-primary btn-md btn-block">Update</button>
                        </div> 
                    </form>
            </div>
        </div>
    </body>
</html>