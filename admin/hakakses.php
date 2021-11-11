<?php 
if(!isset($_SESSION['user'])){
session_start();
}
if(!isset($_SESSION['user'])){
header("location:index.php");
}
?>