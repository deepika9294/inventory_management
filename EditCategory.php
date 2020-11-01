<?php 
    require_once 'db_connect.php';
    require_once 'includes/header.php';
?>


<?php    
   
    $id = 0;
    $brand_name = "";
    $brand_id = "";

    if (isset($_GET['edit']))
    {
        $id = $_GET['edit'];
        $result = $connect->query("SELECT * FROM category WHERE category_id = '$id' ") or die($connect->error());
        if ($result->num_rows == 1){
            $row = $result->fetch_array();
            $category_name = $row['category_name'];
            $category_id = $row['category_id'];

        }
    }

    #edit works but error hanlng for cases yet to done more precisely
    $errors = array();
    if($_POST){
        $id = $_POST['id'];
        $new_category_name = $_POST['category_name'];
        $new_category_id = $_POST['category_id'];

        if($new_category_name == ""){
            $errors[] = "category Name is required";
        }
        else if($new_category_id == ""){
            $errors[] = "category ID is required";
        }

        else{
            $result = $connect->query("SELECT category_name FROM category WHERE category_id = '$id'");
            $old_category_name = $result->fetch_assoc()['category_name'];


            if($id == $new_category_id && $new_category_name == $old_category_name){
                header('location: category.php');
            }
            else if($id != $new_category_id && $new_category_name == $old_category_name){
                $result = $connect->query("SELECT * from category where category_id = '$new_category_id'");
                if($result->num_rows == 0 ){
                   $sql = "UPDATE category SET category_id = '$new_category_id' WHERE category_id = '$id'"; //or die($connect->error());
                   if($connect->query($sql) === TRUE) {
                        header('location: http://localhost/inventory/category.php');	
                    } else {
                        echo 'Failed!';
                    }
                }
                else{
                    $errors[] = "category ID already in use";
                }

            }
            else if ($id == $new_category_id && $new_category_name != $old_category_name){
                $result = $connect->query("SELECT * from category where category_name = '$new_category_name'");
                if($result->num_rows == 0 ){
                    $sql = "UPDATE category SET category_name = '$new_category_name' WHERE category_id = '$id'"; //or die($connect->error());
                    if($connect->query($sql) === TRUE) {
                        header('location: http://localhost/inventory/category.php');	
                    } else {
                        echo 'Failed!';
                    }  
                }
                else{
                    $errors[] = "category Name already in use";
                }

            }
            else if($id != $new_category_id && $new_category_name != $old_category_name){
                $result = $connect->query("SELECT * from category where category_id = '$new_category_id'");
                $sresult = $connect->query("SELECT * from category where category_name = '$new_category_name'");
                if($result->num_rows == 0 && $sresult->num_rows == 0 ){ 
                    $sql = "UPDATE category SET category_id = '$new_category_id', category_name = '$new_category_name' WHERE category_id = '$id'";// or die($connect->error());
                    if($connect->query($sql) === TRUE) {
                        header('location: http://localhost/inventory/category.php');	
                    } else {
                        echo 'Failed!';
                    }  
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
            <h1 style = "text-align:center;"> Update a category </h1><br><br>
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
                            <label>category Name</label>
                            <input class = "form-control" type="text" name= "category_name" value = "<?php echo $category_name; ?>">
                        </div>
                        <div class= "form-group">
                            <label>category Id</label>
                            <input class = "form-control" type="text" name= "category_id" value = "<?php echo $category_id; ?> ">
                        </div>
                        <div class = "form-group">
                            <button type="submit" value = "update" class= "btn btn-primary btn-md btn-block">Update </button>
                        </div> 
                    </form>
            </div>
        </div>
    </body>
</html>