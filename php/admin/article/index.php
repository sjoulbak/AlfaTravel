<?php
require_once('../../includes/mysql_config.php');
$result = mysqli_query($con, "SELECT id, title FROM article");
while ($article = mysqli_fetch_array($result)) {
  $id = $article['id'];
  $title = $article['title'];
  echo "$title <a href='edit.php?id=$id'>edit</a> <a href='destroy.php?id=$id'>destroy</a><br>";
}
?>
<br>
<a href="new.php">Create new article</a>
