<?php
    require_once 'db_connect.php';
    require_once 'includes/header.php';
?>

<?php

if(isset($_POST['delete_brand']))
{
    $id = $_POST['brand_id'];

    $query = "DELETE FROM brands WHERE brand_id='$id' ";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        header('Location: brand.php');
    }
    else
    {
        header('Location: brand.php');
    }
}
?>


