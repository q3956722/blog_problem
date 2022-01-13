<?php

include_once("article.php");

$flag = 0;


if(isset($_POST['action'])&&$_POST["action"]=="Message insert") {
    $rep_sql = "INSERT INTO `reply` (`replyer`,`repcontent`,`repdate`) VALUES ('".$_SESSION['login']['name']."'),'".$_POST['repcontent']."','".$_POST['repdate']."'";
    $rep_query = mysqli_query($_con,$rep_sql);
    if($rep_query){
        $flag = 4;
    }    
}

if(isset($_GET['action'])&&$_GET['action']=="DELETE"){
    $rep_sql = "DELETE FROM `reply` WHERE `repid` = '".$_GET['repid']."'";
    $rep_query = mysqli_query($_con,$rep_sql);
    if($rep_query){
        $flag = 5;
    }
}

header("Location: article.php?success="."'".$_GET['repid']."'".$flag);
exit;

?>