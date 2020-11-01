<?php
    require_once("includes/header.php");
    require_once("core.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./customs/css/dashboard.css">
</head>
<body>

<div class="container">
    

    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Customer Details </h4>
            <div>
            <?php
            if(isset($_SESSION['msg'])){
                echo '<div style = "width: 40%;right:1%;margin-top:30px;" class="alert alert-success alert-dismissible fade show"" role="alert">
                '.$_SESSION['msg'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div>';										
                
               unset($_SESSION['msg']);
            }
            ?>
            </div>
            <div class="card-text">
                <table class ="tables" id ="manageCustomerTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Customer ID</th>
                        <th style="text-align: center;">Customer Name</th>
                        <th style="text-align: center;">Customer Email</th>
                        <th style="text-align: center;">Customer Phone</th>
                        <th style="text-align: center;">Customer Address</th>
                        <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>




</body>
</html>
<script type="text/javascript" src="customs/js/customerDetails.js"></script>