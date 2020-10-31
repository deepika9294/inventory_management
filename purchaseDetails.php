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
    

    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
            <a href="#" class="btn btn-primary">Update</a>
        </h5>
        
        <div class="card-body">
            <h4 class="card-title"> Details </h4>
            <div class="card-text">
                <table class ="tables" id ="managePurchaseTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Customer Name</th>
                        <th style="text-align: center;">Customer Phone</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Item Brand</th>
                        <th style="text-align: center;">Item category</th>
                        <th style="text-align: center;">Item price</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Transaction Details</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>



    
    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
            <a href="#" class="btn btn-primary">Update</a>
        </h5>
    
        <div class="card-body">
            <h4 class="card-title"> Transaction Details </h4>
            <div class="card-text">
                <table class ="tables" id ="manageTransactionTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Transaction ID</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Mode of Payment</th>
                        <th style="text-align: center;">Discount</th>
                        <th style="text-align: center;">Selling Price</th>
                        <th style="text-align: center;">Amount</th>
                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script type="text/javascript" src="customs/js/purchaseDetails.js"></script>
<script type="text/javascript" src="customs/js/TransactionDetails.js"></script>
