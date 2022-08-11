<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = $_SESSION['islogin'];

if(!$islogin){?>
    please login <br>
    <a href="/login/login.php">login</a> 
<?php }
else {

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row =  mysqli_fetch_array($result)){
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);
$update_link = '';
$delete_link = '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic Where id=($filtered_id)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $update_link = '<a href="update.php?id='.$row['id'].'">update</a>';
    $delete_link = '
    <form action="delete_process.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
  ';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1><a href="index.php">WEB</a></h1>
    <ol><?=$list?></ol>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <h2><a href="create.php">create</a></h2>
    <h2><a href="search.php">search</a></h2>
    <h2><?=$update_link?></h2>
    <h2><?=$delete_link?></h2>

    <h2> <a href="../login/logout.php">logout</a> <h2>
</body>
</html>
<?php
}
?>