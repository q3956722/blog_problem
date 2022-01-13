<?php 

include_once("connet.php");

// $rep_sql="SELECT `repid`, `artid`, `repcontent`, `replyer`, `repdate` FROM `reply`";
// $rep_query = mysqli_query($_con,$rep_sql);

$sql="SELECT * FROM `article` WHERE `artid` = '".$_GET['id']."'";
$query = mysqli_query($_con,$sql);
$row=mysqli_fetch_assoc($query);


$click_sql="UPDATE `article` SET `artcount` = '".($row['artcount']+1)."' WHERE `article`.`artid` = '".$_GET['id']."';";
$click_query = mysqli_query($_con,$click_sql);

$rep_sql="SELECT * FROM `reply` WHERE `artid` = '".$_GET['id']."'";
$rep_query= mysqli_query($_con,$rep_sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>        
    <h1><?php echo $row['arttitle']; ?></h1>
    <hr>
    <ul>
        <li>發佈人：<?php echo $row['artposter']; ?></li>
        <li>發佈時間：<?php echo $row['artdate']; ?></li>
    </ul>
    <hr>
    <div>
        <?php echo $row['artcontent']; ?>
    </div>
    <li>點擊數：<?php echo $row['artcount']+1; ?></li>
    <hr>
    <h3>留言</h3>
    <caption>
        <?php 
            $suc= isset($_GET['success'])&&$_GET['success'];

            switch ($suc) {
                case 4:
                    echo "新增成功";
                    break;
                case 5:
                    echo "刪除成功";
                    break;
            }
        ?>
    </caption>
    <table>
        <thead>
            <tr>
                <th>回覆者</th>
                <th>回覆內容</th>
                <th>回覆日期</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($rep_query)){ ?>
            <tr>
                <td><a><?php echo $row['replyer']; ?></a></td>
                <td><?php echo $row['repcontent']; ?></td>
                <td><?php echo $row['repdate']; ?></td>
                <?php if(isset($_SESSION['login'])&& (($_SESSION['login']['auth']=="9") || ($row['replyer']==$_SESSION['login']['name'])) ){ ?> <td><a href="edit_rep.php?id=<?php echo $row['repid'];?>">修改</a>｜<a href="process.php?action=DELETE&repid=<?php echo $row['repid'];?>">刪除</a></td> <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <?php if(isset($_SESSION['login'])&&$_SESSION['login']['auth']>"1"){ ?>
    <h2>新增留言</h2>

    <form action="process.php" method="POST">
        <label for="repcontent">文章內容</label>
        <br>
        <textarea name="repcontent" id="repcontent" cols="30" rows="10" required></textarea>
        <br>
        <input type="submit" name="action" value="Message insert">
    </form>
    <?php } ?>

    <!-- <input type="hidden" name="id" value="<?php echo $_GET['artid'];?>"> -->
    <a href="index.php">回列表</a>
</body>
</html>
