<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = $_SESSION['islogin'];

if(!$islogin){?>
    please login <br>
    <a href="/login/login.php">login</a> 
<?php }
else {


$sql = "SELECT * FROM topic LIMIT 20";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result)){
    echo '<h1>'.$row['title'].'</h1>';
    echo $row['description'];
}
?>
<?php
}
?>