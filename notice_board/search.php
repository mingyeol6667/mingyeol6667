
<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = $_SESSION['islogin'];

if(!$islogin){?>
    please login <br>
    <a href="/login/login.php">login</a> 
<?php }
else{
?>
<!DOCTYPE html>
<html>
<body>
<form action="search_process.php" method="get">
        <p><input type="text" name="title" placeholder="Search the title"></p>
        <p><input type="submit"></p>
</body>
</html>
<?php
}
?>

