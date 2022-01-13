<?php 

include_once("connet.php");

$sql="SELECT `artid`,`arttitle`,`artdate`,`artdate`,`artcount`,`artposter` FROM `article`";
$query = mysqli_query($_con,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>
</head>
<body>
    <?php
        if(isset($_SESSION['login'])){
            echo "您好".$_SESSION['login']['name'];
            echo ' <a href=\'logout.php\'>登出</a>';
        }else{
            echo '<a href=\'login.php\'>登入</a>'; 
        } 
    ?>
    <h1>文章列表</h1>
    <caption>
        <?php 
            $suc= isset($_GET['success'])&&$_GET['success'];
            $log= isset($_GET['login'])&&$_GET['login'];

            switch ($suc) {
                case 1:
                    echo "新增成功";
                    break;
                case 2:
                    echo "刪除成功";
                    break;
                case 3:
                    echo "新增成功";
                    break;
            }

            switch ($log) {
                case 1:
                    echo "登入成功";
                    break;
                case 2:
                    echo "登出成功";
                    break;
            }
            // if(isset($_GET['success'])&&$_GET['success']==1){echo "新增成功";} 
            // if(isset($_GET['success'])&&$_GET['success']==2){echo "刪除成功";} 
            // if(isset($_GET['success'])&&$_GET['success']==3){echo "新增成功";}
            // if(isset($_GET['login'])&&$_GET['login']==1){echo "登入成功";}
            // if(isset($_GET['login'])&&$_GET['login']==0){echo "登出成功";}
        ?>
    </caption>
    <table>
        <thead>
            <tr>
                <th>發布日期</th>
                <th>文章標題</th>
                <th>發佈人</th>
                <th>點擊數</th>
                <th>動作</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?php echo $row['artdate']; ?></td>
                <td><a href="article.php?id=<?php echo $row['artid']; ?>"><?php echo $row['arttitle']; ?></a></td>
                <td><?php echo $row['artposter']; ?></td>
                <td><?php echo $row['artcount']; ?></td>
                <?php if(isset($_SESSION['login'])&& (($_SESSION['login']['auth']=="9") || ($row['artposter']==$_SESSION['login']['name'])) ){ ?> <td><a href="edit.php?id=<?php echo $row['artid'];?>">修改</a>｜<a href="process.php?action=DELETE&artid=<?php echo $row['artid'];?>">刪除</a></td> <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
    <?php if(isset($_SESSION['login'])&&$_SESSION['login']['auth']>"1"){ ?>
    <h2>新增文章</h2>

    <form action="process.php" method="POST">
        <label for="arttitle">文章標題</label>
        <br>
        <input type="text" id="arttitle" name="arttitle" required>
        <br>
        <label for="artcontent">文章內容</label>
        <br>
        <textarea name="artcontent" id="artcontent" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="action" value="Article insert">
    </form>
    <?php } ?>
</body>
</html>
