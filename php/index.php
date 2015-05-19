<?php require_once('includes/database.php'); ?>
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
            $query = "SELECT * FROM article";
            $result = mysqli_query($con, $query);
            $amount = mysqli_affected_rows($con);

            for ($i = 0; $i < $amount; $i++) {
              $article = mysqli_fetch_array($result);

              $query2 = "SELECT * FROM administrator WHERE id = ". $article['administrator_id'];
              $result2 = mysqli_query($con, $query2);
              $author = mysqli_fetch_array($result2);
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




<?php require_once('./footer.php'); ?>
