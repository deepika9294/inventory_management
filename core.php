<?php

session_start();

require_once 'db_connect.php';

if(empty($_SESSION['user_id'])){
	header('location: index.php');
}

?>