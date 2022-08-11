
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1><a href="index.php">WEB</a></h1>
    <form action="create_process.php" method="post">
        <p><input type="text" name="title" placeholder="Enter the title"></p>
        <p><textarea name="description" placeholder="Enter the description"></textarea></p>
        <p><input type="submit"></p>
</form>
    <a href="index.php">back</a>
</body>
</html>
<?php
}
?>