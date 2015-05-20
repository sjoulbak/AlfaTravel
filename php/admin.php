<?php require_once('includes/mysql_config.php'); ?>
<?php require_once('./header.php'); ?>

<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1>Alfa Travel</h1>
            <hr class="small">
          <span class="subheading">Travelblog</span>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="container">
      <div class="row">
        <?php
        $query = "SELECT * FROM article";
        $result = mysqli_query($con, $query);
        $amount = mysqli_affected_rows($con);
         echo "<a href='new.php'>new article</a>";
        for ($i = 0; $i < $amount; $i++) {
          $article = mysqli_fetch_array($result);
?>

<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <div class="post-preview">
      <?php echo "<a href='article.php?id=".$article['id']."'>"; ?>
            <h2 class="post-title">
              <?php echo $article['title'];?>
            </h2>
            <?php echo "<a href='updateform.php?id=".$article['id']."'>update</a>"; ?>
            <?php echo "<a href='delete.php?id=".$article['id']."'>delete</a>"; ?>
        <hr>
    </div>
  </div>

        <?php } ?>

<?php require_once('./footer.php'); ?>
