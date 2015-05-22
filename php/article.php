<?php
require_once('includes/mysql_config.php');
require_once('./header.php');

$id = $_GET['id'];
$query = "SELECT * FROM article WHERE id = $id";
$result = mysqli_query($con, $query);
$amount = mysqli_affected_rows($con);

for ($i = 0; $i < $amount; $i++) {
  $article = mysqli_fetch_array($result);

  $query2 = "SELECT * FROM administrator WHERE id = ". $article['administrator_id'];
  $result2 = mysqli_query($con, $query2);
  $author = mysqli_fetch_array($result2);
?>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->

<header class="intro-header" style="background-image: url(<?php echo $article['image_path'];?>)">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="post-heading">
            <h1> <?php echo $article['title'] . "<br />";?></h1>
            <h2 class="subheading"> <?php echo $article['subtitle'] . "<br />";?></h2>
            <span class="meta">Posted by <?php echo $author['firstname']." ".$author['lastname'];?> on <?php echo $article['created'] . "<br />";?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<?php require_once('./navigation.php'); ?>
<!-- Post Content -->
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="post-preview">
              <?php echo $article['content'] . "<br />";?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</article>
<hr>
<?php require_once('./footer.php'); ?>
