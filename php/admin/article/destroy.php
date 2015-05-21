<?php
require_once('../../includes/mysql_config.php');
mysqli_query($con, "DELETE FROM article WHERE id =".$_GET['id']);
header("Location: ../../admin?destoyed=true&destroyed_id=".$_GET['id']);
?>
