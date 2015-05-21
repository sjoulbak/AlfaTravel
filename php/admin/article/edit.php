<?php
include_once('../../includes/mysql_config.php');

$status = isset($_GET['created']) ? $_GET['created'] : false;
$article = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM article WHERE id =".$_GET['id']));

if (!empty($_POST['title'])) {
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $intro = $_POST['intro'];
  $content = $_POST['content'];
  $country = $_POST['country'];
  $image_path = $_POST['image_path'];

  $result = mysqli_query($con, "UPDATE article SET title='$title', subtitle='$subtitle', intro='$intro', content='$content', country='$country', image_path='$image_path' WHERE id =".$_GET['id']);
  if ($result) {
    header("Location: edit.php?id=".$_GET['id']);
  }
}

if ($status) { echo 'SUCCES!';}
?>
<a href="../../admin"><?php echo "< Back"; ?></a><br><br>
<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post">
  <label>Title</label><br>
  <input type="text" name="title" value="<?php echo $article['title']; ?>"><br><br>

  <label>Subtitle</label><br>
  <input type="text" name="subtitle" value="<?php echo $article['subtitle']; ?>"><br><br>

  <label>Intro text</label><br>
  <input type="text" name="intro" value="<?php echo $article['intro']; ?>"><br><br>

  <label>Content</label><br>
  <input type="text" name="content" value="<?php echo $article['content']; ?>"><br><br>

  <label>Country</label><br>
  <input type="text" name="country" value="<?php echo $article['country']; ?>"><br><br>

  <label>img-path</label><br>
  <input type="text" name="image_path" value="<?php echo $article['image_path']; ?>"><br><br>

  <input type="submit">
</form>
