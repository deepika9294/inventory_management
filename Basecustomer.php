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
                <h5 class="card-header">customers</h5>
                <div class="card-body">
                    <h5 class="card-title">customer Details</h5>
                    <p class="card-text">Details(fetched from database)</p>
                    <a href="customerDetails.php" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-4 ml-4 mr-4">
                <h5 class="card-header">Purchases</h5>
                <div class="card-body">
                    <h5 class="card-title">Purchase Details</h5>
                    <p class="card-text">Details(fetched from database)</p>
                    <a href="purchaseDetails.php" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>