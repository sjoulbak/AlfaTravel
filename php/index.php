<?php require_once('includes/mysql_config.php'); ?>
<?php require_once('./header.php'); ?>

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

<!-- Main Content -->
<div class="container">
  <div class="row">
    <?php
    $result = mysqli_query($con, "SELECT * FROM article");
    while ($article = mysqli_fetch_array($result)) {
      $author = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM administrator WHERE id = ". $article['administrator_id']));
    ?>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="post-preview">
        <?php echo "<a href='article.php?id=".$article['id']."'>"; ?>
          <h2 class="post-title">
            <?php echo $article['title'] . "<br />";?>
          </h2>
          <h3 class="post-subtitle">
            <?php echo $article['intro'] . "<br />";?>
          </h3>
        </a>
        <p class="post-meta">Posted by <?php echo $author['firstname']." ".$author['lastname'];?> on <?php echo date("jS F, Y", strtotime($article['created']));?></p>
        <hr>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php " SELECT title
        FROM blog_post
        WHERE author = 'Piet'
        AND published < Now()
        AND deleted = 0
        AND created > 01-04-2015
        AND fb_link IS NOT NULL
        ORDER BY 'slug' ASC" ?>
<?php require_once('./footer.php'); ?>
