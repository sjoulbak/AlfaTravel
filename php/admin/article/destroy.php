<?php
session_start();
require_once('../../includes/mysql_config.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : header('location: ../../login.php');
$user = mysqli_query($con, "SELECT id FROM administrator WHERE id =".$_SESSION['id']);
if(!$user){
  header('location: ../../login.php');
}

mysqli_query($con, "DELETE FROM article WHERE id =".$_GET['id']);
header("Location: ../../admin?destoyed=true&destroyed_id=".$_GET['id']);
?>
