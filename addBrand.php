<?php 
    require_once "db_connect.php";
    require_once "includes/header.php";


    // if(isset($_SESSION['user_id'])){
    //     header('location: dashboard.php');
    // }

    $errors = array();
    

    if($_POST) {		
        $brand_name = $_POST['brand_name'];
        $brand_id = $_POST['brand_id'];
        

        if(empty($brand_name) || empty($brand_id)) {
            if($brand_name == "") {
                $errors[] = "Brand Name is required";
            } 
            if($brand_id == ""){
                $errors[] = "Brand ID is required";
            }

        }else {

            $sql = "SELECT * FROM brands WHERE brand_name = '$brand_name'";
            $result = $connect->query($sql);

            if($result->num_rows >=1){
                $errors[] = "Brand Name already exsists";
            }
            else{
                if(is_numeric($brand_id)){
                    $sql = "SELECT * FROM brands WHERE brand_id = '$brand_id'";
                    $result = $connect->query($sql);
                    if($result->num_rows ==1){
                        $errors[] = "Brand ID in use already";
                    }
                    else{
                        $sql = "INSERT INTO brands(brand_id, brand_name) VALUES ('$brand_id', '$brand_name')";
                        $connect->query($sql) or die($connect->error);
                        #rediect to brand.php again
	                    header('location: brand.php');
                        
                    }
                }
                else{
                    $errors[] = "Brand Id Assumes only numeric values";
                }
               
            }
            
        }	
    }
?>


<html>

    <head>
        <link rel="stylesheet" href="./customs/css/add.css">
    </head>
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
                        <div class= "form-group">
                            <label>Brand Name</label>
                            <input class = "form-control" type="text" name= "brand_name" placeholder = "Enter Brand Name">
                        </div>
                        <div class= "form-group">
                            <label>Brand Id</label>
                            <input class = "form-control" type="text" name= "brand_id" placeholder = "Enter Brand ID">
                        </div>
                        <div class = "form-group">
                            <button type="submit" class= "btn btn-primary btn-md btn-block">Submit </button>
                        </div> 
                    </form>
            </div>
        </div>
    </body>
</html>