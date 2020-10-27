<?php 
    require_once "db_connect.php";
    require_once "includes/header.php";


    if(isset($_SESSION['user_id'])){
        header('location: dashboard.php');
    }

    $errors = array();
    

    if($_POST) {		
        $category_name = $_POST['category_name'];
        $category_id = $_POST['category_id'];
        

        if(empty($category_name) || empty($category_id)) {
            if($category_name == "") {
                $errors[] = "category Name is required";
            } 
            if($category_id == ""){
                $errors[] = "category ID is required";
            }

        }else {

            $sql = "SELECT * categorycategory WHERE category_name = '$category_name'";
            $result = $connect->query($sql);

            if($result->num_rows >=1){
                $errors[] = "category Name already exsists";
            }
            else{
                if(is_numeric($category_id)){
                    $sql = "SELECT * FROM bcategory WHERE category_id = '$category_id'";
                    $result = $connect->query($sql);
                    if($result->num_rows ==1){
                        $errors[] = "category ID in use already";
                    }
                    else{
                        $sql = "INSERT INTO category(category_id, category_name) VALUES ('$category_id', '$category_name')";
                        $connect->query($sql) or die($connect->error);
                        #rediect to brand.php again
	                    header('location: category.php');
                        
                    }
                }
                else{
                    $errors[] = "category Id Assumes only numeric values";
                }
               
            }
            
        }	
    }
?>


<html>
    <body>
        <div style="margin-top: 8%;" class = "container">
            <h1 style = "text-align:center;"> Add a new Category </h1><br><br>
            <?php if($errors) {
            foreach ($errors as $key => $value) {
                echo '<div style= "width: 40%; margin-top:30px; left: 30%;" class="alert alert-danger alert-dismissible fade show" "row justify-content-center" role="alert">
                '.$value.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';										
                }   
    
            } ?>
            <div class = "row justify-content-center">
                <div style= "width: 40%;" class = "form-group">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method = "POST">
                        <div class= "form-group">
                            <label>Category Name</label>
                            <input class = "form-control" type="text" name= "category_name" placeholder = "Enter category Name">
                        </div>
                        <div class= "form-group">
                            <label>Category Id</label>
                            <input class = "form-control" type="text" name= "category_id" placeholder = "Enter category ID">
                        </div>
                        <div class = "form-group">
                            <button type="submit" class= "btn btn-primary btn-md btn-block">Submit </button>
                        </div> 
                    </form>
            </div>
        </div>
    </body>
</html>