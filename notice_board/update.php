
<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = $_SESSION['islogin'];

if(!$islogin){?>
    please login <br>
    <a href="/login/login.php">login</a> 
    <?php }
else{
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
$update_link ='';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic Where id=($filtered_id)";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);
    $article['description'] = htmlspecialchars($row['description']);
    $update_link = '<a href="update.php"?id='.$_GET['id'].'">update</a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1><a href="index.php">WEB</a></h1>
    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <p><input type="text" name="title" value="<?=$article['title']?>"></p>
        <p><textarea name="description"><?php echo$article['description']?></textarea></p>
        <p><input type="submit"></p>
</form>
    <a href="index.php">back</a>
</body>
</html>
<?php
}
?>