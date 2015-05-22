<?php require_once('includes/mysql_config.php'); ?>
<?php
session_start();
if(isset($_POST['submit'])){
    $login = mysqli_query($con, "SELECT * FROM  administrator WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
    $user = mysqli_fetch_array($login);
    if(!$user) {
        echo "Er zijn geen resultaten gevonden met deze gebruikersnaam/wachtwoord";
    } else {
        $_SESSION['id'] = $user['id'];
        header('location: admin/');
    }
}
?>
<?php require_once('header.php'); ?>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <div class="site-heading">
          <section class="main">
            <form class="form-4" method="post">
              <h1>Login</h1>
              <p>
                <label for="login">Username</label>
                <input type="text" name="username" placeholder="Username" required>
              </p>
              <p>
                <label for="password">Password</label>
                <input type="password" name='password' placeholder="Password" required>
              </p>
              <p>
                <input type="submit" name="submit" value="submit">
              </p>
            </form>​
          </section>
        </div>
      </div>
    </div>
  </div>
</header>
