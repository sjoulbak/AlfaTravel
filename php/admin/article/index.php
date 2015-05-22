<?php
session_start();
require_once('../../includes/mysql_config.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : header('location: /php/login.php');
$user = mysqli_query($con, "SELECT id FROM administrator WHERE id =".$_SESSION['id']);
if(!$user){
  header('location: /php/login.php');
}
?>
<br>
<a href="new.php">Create new article</a>
