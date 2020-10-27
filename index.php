<?php

require_once "db_connect.php";

session_start();

if(isset($_SESSION['user_id'])){
	header('location: dashboard.php');
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];
				$_SESSION['user_id'] = $user_id;
				header('location: dashboard.php');	
			} else{
				
				$errors[] = "Incorrect username/password.";
			}
		} else {		
			$errors[] = "Username does not exist!";		
		}
	}	
}

?>

<!DOCTYPE html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./customs/css/index.css">
    </head>
    <body>
        <div class = "container">
            <div>
                <h1 style="left: 50%;position: relative;margin-top: 8%;">Inventory Management</h1>
            </div>
        
            <?php if($errors) {
            foreach ($errors as $key => $value) {
                echo '<div style = "width: 40%;left:50%;margin-top:30px;" class="alert alert-dark alert-dismissible fade show"" role="alert">
                '.$value.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';										
                }   
    
            } ?>			  				
                            
            <div style="width: 50%; left: 50%; position: relative; margin-top: 20px;">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="username">Username</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="password">Password</label>
                        <div class="col-sm-9"> 
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info btn-md btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>	
        </div>
    </body>
</html>

                