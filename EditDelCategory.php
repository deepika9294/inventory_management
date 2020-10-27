<?php
    require_once 'db_connect.php';
    require_once 'includes/header.php';
?>

<?php

if(isset($_POST['delete_category']))
{
    $id = $_POST['category_id'];

    $query = "DELETE FROM category WHERE category_id='$id' ";
    $query_run = mysqli_query($connect, $query);

    if($query_run)
    {
        header('Location: category.php');
    }
    else
    {
        header('Location: category.php');
    }
}
?>


