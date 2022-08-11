<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = $_SESSION['islogin'];

if(!$islogin){?>
    please login <br>
    <a href="/login/login.php">login</a> 
<?php }
else{
    $filtered = array(
        'title'=>mysqli_real_escape_string($conn, $_GET['title'])
    );
$query = "SELECT * from topic where title like '%{$filtered['title']}%'";
$result = mysqli_query($conn, $query);
$list='';
while($row = mysqli_fetch_array($result)){
    $escaped_title = htmlspecialchars($row['title']);
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">
    {$escaped_title}</a></li>";
}
?>
<!DOCTYPE html>
<html>
<body>
    <h1>WEB</h1>
    <ol><?=$list?></ol>
</body>
</html>
<?php }?>