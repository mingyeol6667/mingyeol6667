<?php
$conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];
$name = $_POST['name'];

$uid = mysqli_real_escape_string($conn,$uid);
$pwd = mysqli_real_escape_string($conn,$pwd);
$name = mysqli_real_escape_string($conn,$name);

$pwd = hash('sha512', $pwd);

$query = "
    INSERT into members
    (uid, pwd, name)
    values('$uid','$pwd','$name')
";
$result = mysqli_query($conn, $query);

echo "success";
 
?>
<br></br><a href="../index.php">back</a>