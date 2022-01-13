<?php

include_once("index.php");

$flag = 0;

// print_r($_POST);
if(isset($_POST['action'])&&$_POST["action"]=="Article insert") {
    $sql = "INSERT INTO `article` (`arttitle`,`artcontent`,`artposter`) VALUES ('".$_POST['arttitle']."','".$_POST['artcontent']."','".$_SESSION['login']['name']."')";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag = 1;
    }    
}

if(isset($_GET['action'])&&$_GET['action']=="DELETE"){
    $sql = "DELETE FROM `article` WHERE `artid` = '".$_GET['artid']."'";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag = 2;
    }
}

if(isset($_POST['action'])&&$_POST['action']=="儲存編輯"){
    $sql = "UPDATE `article` SET `arttitle`='".$_POST['arttitle']."',`artcontent`='".$_POST['artcontent']."' WHERE `artid` = '".$_POST['artid']."';";
    $query = mysqli_query($_con,$sql);
    if($query){
        $flag = 3;
    }
}
// if(isset($_POST['action'])&&$_POST["action"]=="Message insert") {
//     $rep_sql = "INSERT INTO `reply` (`replyer`,`repcontent`,`repdate`) VALUES ('".$_SESSION['login']['name']."'),'".$_POST['repcontent']."','".$_POST['repdate']."'";
//     $rep_query = mysqli_query($_con,$rep_sql);
//     if($rep_query){
//         $flag = 4;
//     }    
// }

// if(isset($_GET['action'])&&$_GET['action']=="DELETE"){
//     $rep_sql = "DELETE FROM `reply` WHERE `repid` = '".$_GET['repid']."'";
//     $rep_query = mysqli_query($_con,$rep_sql);
//     if($rep_query){
//         $flag = 5;
//     }
// }

if(isset($_POST['action'])&&$_POST['action']=="登入帳號"){
    $sql = "SELECT `uid`,`upass`,`uname`,`uauth` FROM `user` WHERE `uid` = '".$_POST['uid']."'";
    $query = mysqli_query($_con,$sql);
    $row = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query)<1){
        // 查詢資料
        header("Location: index.php?error=1");
        exit;
    }else{
        if($_POST['upass']==$row['upass']){
            $_SESSION['login']['id']=$row['uid'];
            $_SESSION['login']['name']=$row['uname'];
            $_SESSION['login']['auth']=$row['uauth'];

            header("Location: index.php?login=1");
            exit;
        }else{
            header("Location: index.php?error=1");
            exit;
        }
    }
}


header("Location: index.php?success=".$flag);
exit;


?>

<!-- UPDATE `article` SET `artposter` = 'wo' WHERE `article`.`artid` = 2; -->
<!-- `artid`='',`arttitle`='',`artcontent`='',`artposter`='',`artdate`='',`artcount`='' -->