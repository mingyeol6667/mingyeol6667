<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .text-right{text-align:right; } 
    </style>
    <script>
        function chkFrm(){
            var a = document.getElementById("name").value;
            if(a==""){
                alert('Enter the name.');
                document.getElementById("name").focus(); 
                return false; 
            }
            return true; 
        }
    </script>
</head>
<body>
  <form action="signup_process.php" method="post" onsubmit="return chkFrm();">
  <div>
        id : <input type="text" name="uid" placeholder="Enter the id">
  <div>
  <div>
        pw : <input type="password" name="pwd" placeholder="Enter the password">
  <div>
  <div>
        name : <input type="text" name="name" id="name" placeholder="Enter the name">
  <div>
       
        <button type="submit">sign-up</button>
</form> 
</body>
</html>
