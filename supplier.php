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
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4 ml-4 mr-4">
                <h5 class="card-header">Listed Suppliers</h5>
                <div class="card-body">
                    <h5 class="card-title">Supplier Details</h5>
                    <a href="supplierDetails.php" class="btn btn-primary">Click Here</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-4 ml-4 mr-4">
                <h5 class="card-header">Supplied Items</h5>
                <div class="card-body">
                    <h5 class="card-title">Details of the items supplied from.</h5>
                    <a href="itemSupply.php" class="btn btn-primary">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>