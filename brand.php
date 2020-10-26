<?php
    require_once 'includes/header.php';
    require_once "db_connect.php";
?>

<?php 
    $result = $connect->query("SELECT * FROM brands") or die($connect->error);
?>
<div class = "container">
    <div>
        <h1 style="position: relative;margin-top: 8%;">Manage Brands</h1>
    </div>
    <br><br>  
    <div class = "row justify-content-center">
        <table class= "table">
            <thead>
                <tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th colspan ="2">Action<th>
                </tr>
            </thead>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['brand_id'] ?></td>
                <td><?php echo $row['brand_name'] ?></td>
                <td><button></button> <button></button></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div> 
</div>
