<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = @$_SESSION['islogin'];

$_SESSION['islogin'] ="";

if(!$islogin){
    echo "please login"?>
    <br>
    <a href="/login/login.php">login</a><br>
    <a href="/signup/signup.php">signup</a>
<?php }
else {?>
    <a href="/notice_board/index.php">notice_board</a>
<?php } ?>