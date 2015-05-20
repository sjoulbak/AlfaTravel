<?php require_once('includes/mysql_config.php'); ?>

<?php
$query ="INSERT INTO article (title,subtitle,intro,content,country,image_path,administrator_id) VALUES ('title','subtitle','intro','content','country','image_path',1)";
mysqli_query($con, $query);
?>
