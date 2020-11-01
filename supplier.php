<?php
    require_once("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./customs/css/dashboard.css">
</head>
<body>


<div class="container">
    <div class="row justify-content-center" style="margin-top: 80px;">
        <div class="col-md-6">
        <div class="card mt-4 ml-4 mr-4">
                <h5 class="card-header text-light bg-dark">Listed Suppliers</h5>
                <div class="card-body">
                    <h5 class="card-title">Supplier Details</h5>
                    <a href="supplierDetails.php" class="btn btn-info">Click Here</a>
                </div>
        </div>
        </div>
        
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
        <div class="card mt-4 ml-4 mr-4">
                <h5 class="card-header text-light bg-dark">Details of all items supplied from.. </h5>
                <div class="card-body">
                    <h5 class="card-title">Items supplied when and by whom..</h5>
                    <a href="itemSupply.php" class="btn btn-info">Click Here</a>
                </div>
        </div>
        </div>
        
    </div>
</div>


</body>
</html>