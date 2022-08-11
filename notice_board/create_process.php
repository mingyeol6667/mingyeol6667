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
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn,$_POST['description'])
);

$sql = "
    insert into topic
    (title, description, created)
    values('{$filtered['title']}','{$filtered['description']}',now())
";

$result = mysqli_multi_query($conn, $sql);
    if($result === false){
    echo 'failed';
}
else{
    echo 'success';
}
?>
<div>
    <a href="index.php">back</a>
</div>
<?php
}
?>