<?php require_once('update.php');
$query = "SELECT * FROM article WHERE id='".$_GET['id']."' LIMIT 1";
$query = mysqli_query($con, $query);
$row = mysqli_fetch_array($query);
?>


<form action="updateform.php?id=<?php echo $_GET['id']; ?>" method="post">
    <label>Title</label>
    <input type="text" name="title" value="<?php echo $row['title']; ?>">
    <label>Subtitle</label>
    <input type="text" name="subtitle" value="<?php echo $row['subtitle']; ?>">
    <label>Intro text</label>
    <input type="text" name="intro" value="<?php echo $row['intro']; ?>">
    <label>Content</label>
    <input type="text" name="content" value="<?php echo $row['content']; ?>">
    <label>Country</label>
    <input type="text" name="country" value="<?php echo $row['country']; ?>">
    <label>img-path</label>
    <input type="text" name="image_path" value="<?php echo $row['image_path']; ?>">
    <input type="submit">
</form>
