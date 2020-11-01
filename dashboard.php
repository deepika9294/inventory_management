<?php
    require_once("includes/header.php");
    require_once "core.php"
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./customs/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
</head>
<body>
<!-- ------------------------------------------------------------------------------------------->

<div class="container" style="width: 70%;">
    
    <div class="row" style= "margin-top: 40px">
        <div class="col-md-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 23rem; min-height:10rem">
        <div class="card-header" style="font-size: 1.2rem"><b>CUSTOMERS</b></div>
        <div class="card-body">
            <p class="card-text" >
            <?php 
                $cust_query = "SELECT COUNT(`customer_id`) FROM customer ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: black; text-align: center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?></p>
        </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card bg-light mb-3" style="max-width: 23rem; min-height:10rem">
        <div class="card-header" style="font-size: 1.2rem"><b>SUPPLIERS</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`supplier_id`) FROM supplier ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: black; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?></p>
            </p>
        </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card text-white bg-success mb-3" style="max-width: 23rem; min-height:10rem">
        <div class="card-header" style="font-size: 1.2rem"><b>PURCHASES</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`item_id`) FROM purchased ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: black; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?>
            </p>
        </div>
        </div>
        </div>
        
    </div>

    <div class="row">

        <div class="col-md-6">
        <div class="card text-white bg-dark mb-3" style="max-width: 35rem; min-height:8rem">
        <div class="card-header" style="font-size: 1.2rem"><b>BRANDS</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`brand_id`) FROM brands ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: white; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?>
            </p>
        </div>
        </div>
        </div>
        

        <div class="col-md-6">
        <div class="card text-white bg-dark mb-3" style="max-width: 35rem; min-height:8rem">
        <div class="card-header" style="font-size: 1.2rem"><b>CATEGORY</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`category_id`) FROM category ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: white; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?>
            </p>
        </div>
        </div>
        </div>
      </div>  

      <div class="row ">
        <div class="col-md-4">
        <div class="card text-white bg-success mb-3" style="max-width: 23rem;min-height:10rem">
        <div class="card-header" style="font-size: 1.2rem"><b>INVENTORY ITEMS</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`item_id`) FROM inventory_items ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: black; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?>
            </p>
        </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card bg-light mb-3" style="max-width: 23rem; min-height:10rem">
        <div class="card-header" style="font-size: 1.2rem"><b>INVENTORY STOCK</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`item_id`) FROM item_stocks ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: black; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?>
            </p>
        </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card text-white bg-primary mb-3" style="max-width: 23rem;min-height:10rem">
        <div text-align: center class="card-header" style="font-size: 1.2rem"><b>TRANSACTIONS</b></div>
        <div class="card-body">
            <p class="card-text">
            <?php 
                $cust_query = "SELECT COUNT(`transaction_id`) FROM `transaction` ";
                $result = $connect->query($cust_query);
                $count = $result->fetch_array()[0];
                echo '<div style="font-size: 1.8em; font-family: Times New Roman; color: black; text-align :center"> <strong>COUNT : ';
                echo $count;
                echo '</strong></div>';
            ?>
            </p>
        </div>
        </div>
        </div>
        
    </div>

</div>

</body>
</html>
