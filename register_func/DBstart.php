<?php
session_start();
//include_once 'dbconnect.php';
include 'dbconnect.php';

if(!isset($_SESSION['user'])) {
	header("Location: index.php");
}

?>
