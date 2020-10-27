<?php 
    require_once 'db_connect.php';
    require_once 'includes/header.php';
?>


<?php    
   
    $id = 0;
    $brand_name = "";
    $brand_id = "";

    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $result = $connect->query("SELECT * FROM brands WHERE brand_id = '$id' ") or die($connect->error());
        if ($result->num_rows == 1){
            $row = $result->fetch_array();
            $brand_name = $row['brand_name'];
            $brand_id = $row['brand_id'];

        }
    }

    #edit works but error hanlng for cases yet to done more precisely
    $errors = array();
    if($_POST){
        $id = $_POST['id'];
        $new_brand_name = $_POST['brand_name'];
        $new_brand_id = $_POST['brand_id'];

        if($new_brand_name == ""){
            $errors[] = "Brand Name is required";
        }
        else if($new_brand_id == ""){
            $errors[] = "Brand ID is required";
        }

        else{
            $result = $connect->query("SELECT brand_name FROM brands WHERE brand_id = '$id'");// or die($connect->error());
            $old_brand_name = $result->fetch_assoc()['brand_name'];


            if($id == $new_brand_id && $new_brand_name == $old_brand_name){
                header('location: brand.php');
            }
             else if($id != $new_brand_id && $new_brand_name == $old_brand_name){
                $result = $connect->query("SELECT * from brands where brand_id = '$new_brand_id'");
                if($result->num_rows == 0 ){
                    $connect->query("UPDATE brands SET brand_id = '$new_brand_id' WHERE brand_id = '$id'"); //or die($connect->error());
                    header('location : brand.php');  
                }
                else{
                    $errors[] = "Brand ID already in use";
                }
            }
            else if ($id == $new_brand_id && $new_brand_name != $old_brand_name){
                $result = $connect->query("SELECT * from brands where brand_name = '$new_brand_name'");
                if($result->num_rows == 0 ){
                    $connect->query("UPDATE brands SET brand_name = '$new_brand_name' WHERE brand_id = '$id'"); //or die($connect->error());
                    header('location : brand.php');  
                }
                else{
                    $errors[] = "Brand Name already in use";
                }
            }
            else if($id != $new_brand_id && $new_brand_name != $old_brand_name){
                $result = $connect->query("SELECT * from brands where brand_id = '$new_brand_id'");
                $sresult = $connect->query("SELECT * from brands where brand_name = '$new_brand_name'");
                if($result->num_rows == 0 && $sresult->num_rows == 0 ){ 
                    $connect->query("UPDATE brands SET brand_id = '$new_brand_id', brand_name = '$new_brand_name' WHERE brand_id = '$id'");// or die($connect->error());
                    header('location : brand.php');  
                }
                else{
                    $errors[] = "Invalid update request";
                }
            }
        }
        
    }

?>

<html>
    <body>
        <div style="margin-top: 8%;" class = "container">
            <h1 style = "text-align:center;"> Add a new Brand </h1><br><br>
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
                            <label>Brand Name</label>
                            <input class = "form-control" type="text" name= "brand_name" value = "<?php echo $brand_name; ?>">
                        </div>
                        <div class= "form-group">
                            <label>Brand Id</label>
                            <input class = "form-control" type="text" name= "brand_id" value = "<?php echo $brand_id; ?> ">
                        </div>
                        <div class = "form-group">
                            <button type="submit" value = "update" class= "btn btn-primary btn-md btn-block">Update </button>
                        </div> 
                    </form>
            </div>
        </div>
    </body>
</html>