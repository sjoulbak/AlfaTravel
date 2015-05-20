<?php require_once('includes/mysql_config.php');
 ?>

<?php
if(isset($_POST['title'])){
  $id = $_GET['id'];
  $query = "UPDATE article SET
           title = '".$_POST['title']."',
           subtitle = '".$_POST['subtitle']."',
           intro = '".$_POST['intro']."',
           content = '".$_POST['content']."',
           country = '".$_POST['country']."',
           image_path = '".$_POST['image_path']."'
           WHERE id =".$id."";
  mysqli_query($con, $query);
}
?>
