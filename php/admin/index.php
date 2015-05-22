<?php
require_once('../header.php');
require_once('../includes/mysql_config.php');

$id = isset($_SESSION['id']) ? $_SESSION['id'] : header('location: /php/login.php');
$user = mysqli_query($con, "SELECT id FROM administrator WHERE id =".$_SESSION['id']);
if(!$user){
  header('location: /php/login.php');
}
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('/php/img/home-bg.jpg')">
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
    <a href="article/new.php">Create new article</a>
    <?php
    $result = mysqli_query($con, "SELECT * FROM article");
    while ($article = mysqli_fetch_array($result)) {
      $author = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM administrator WHERE id = ". $article['administrator_id']));
    ?>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
      <div class="post-preview">

          <?php
        $result = mysqli_query($con, "SELECT id, title FROM article");
        while ($article = mysqli_fetch_array($result)) {
          $id = $article['id'];
          $title = $article['title'];
          echo "<h2>$title</h2><a href='article/edit.php?id=$id'>edit</a> <a href='article/destroy.php?id=$id'>destroy</a><br><hr>";
        }
        ?>

      </div>
    </div>
    <?php } ?>
  </div>
</div>
