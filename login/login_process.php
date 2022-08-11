<?php
    session_start();

    $conn = mysqli_connect('localhost','root','JU9!ziqVBghv[Gck','opentutorials');

    $uid = $_POST['uid'];

    $pwd = hash('sha512',$_POST['pwd']);


    $uid = mysqli_real_escape_string($conn,$uid);
    $pwd = mysqli_real_escape_string($conn,$pwd);

    $query = "select * from members where uid='$uid' and pwd='$pwd' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);
    
    if($data){
        $_SESSION['islogin'] = time();
    ?>
    <script>
            location.href='../notice_board/index.php';
        </script>
    <?php }
    else{
        echo "wrong please again<br>";
        ?>
        <a href="login.php">back</a>
    <?php }?>