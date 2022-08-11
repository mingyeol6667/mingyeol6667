<?php
session_start();

$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$islogin = $_SESSION['islogin'];

if(!$islogin){?>
    please login <br>
    <a href="/login/login.php">login</a> 
<?php }
else {
settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "
    DELETE  
    FROM topic
    WHERE id = {$filtered['id']}
";
$result = mysqli_query($conn, $sql);
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