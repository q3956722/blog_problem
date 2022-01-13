<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>使用者登入</title>
</head>
<body>
    <h1>使用者登入</h1>
    <caption>
        <?php 
            if(isset($_GET['error'])&&$_GET['error']=1){
                echo "帳號或密碼錯誤";
            }
        ?>
    </caption>
    <form action="process.php" method="POST">
        <label for="uid">帳號</label>
        <input type="text" name="uid" id="uid">
        <br>
        <label for="upass">密碼</label>
        <input type="password" name="upass" id="upass">
        <br>
        <input type="submit" name="action" value="登入帳號">
    </form>
    <a href="index.php">回列表</a>
</body>
</html>