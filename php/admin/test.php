<?php require_once('../includes/mysql_config.php'); ?>
<?php require_once('../header.php'); ?>
<?php require_once('../navigation.php'); ?>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="site-heading">
          <h1>Alfa Travel</h1>
          <hr class="small">
          <span class="subheading">Reisblog</span>
        </div>
      </div>
    </div>
  </div>
</header>

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
