<?php
session_start();
require_once('../../includes/mysql_config.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : header('location: /php/login.php');
$user = mysqli_query($con, "SELECT id FROM administrator WHERE id =".$_SESSION['id']);
if(!$user){
  header('location: /php/login.php');
}

if (!empty($_POST['title'])) {
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $intro = $_POST['intro'];
  $content = $_POST['content'];
  $country = $_POST['country'];
  $image_path = $_POST['image_path'];
  $administrator_id = $_POST['administrator_id'];

  $result = mysqli_query($con, "INSERT INTO article (title, subtitle, intro, content, country, image_path, administrator_id) VALUES ('$title', '$subtitle', '$intro', '$content', '$country', '$image_path', '$administrator_id')");
  if ($result) {
    header("Location: edit.php?id=".mysqli_insert_id($con)."&created=true");
  }
}
?>
<a href="../../admin"><?php echo "< Back"; ?>  New article</a><br><br>
<form action="" method="post">
  <label>Title</label><br>
  <input type="text" name="title"><br><br>

  <label>Subtitle</label><br>
  <input type="text" name="subtitle"><br><br>

  <label>Intro</label><br>
  <input type="text" name="intro"><br><br>

  <label>Content</label><br>
  <input type="text" name="content"><br><br>

  <label>Country</label><br>
  <input type="text" name="country" maxlength="2"><br><br>

  <label>Image</label><br>
  <input type="text" name="image_path"><br><br>

  <label>Administrator</label><br>
  <input type="text" name="administrator_id"><br><br>

  <input type="submit" value="save">
</form>
