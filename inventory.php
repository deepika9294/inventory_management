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
            <h4 class="card-title"> Stock in Inventory </h4>
            <div class="card-text">
                <table class ="tables" id ="manageStockTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Item ID</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">Minimum Quantity</th>
                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>




    <div class="card mt-4 ml-3 mr-3">
        <h5 class="card-header">
            <a href="#" class="btn btn-primary">Add Item</a>
        </h5>
    
        <div class="card-body">
            <h4 class="card-title"> Items Details </h4>
            <div class="card-text">
                <table class ="tables" id ="manageItemTable" style="width:100%;">
                    <thead>
                        <tr>
                        <th style="text-align: center;">Item ID</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Brand</th>
                        <th style="text-align: center;">Category</th>
                        <th style="text-align: center;">Price</th>
                        </tr>
                    </thead>


                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script type="text/javascript" src="customs/js/item.js"></script>
<script type="text/javascript" src="customs/js/stock.js"></script>
