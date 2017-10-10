<?php
session_start();
include_once "dbConnect.php";
$id = $_REQUEST["id"];
if(!isset($_SESSION["zan".$id])){

    $sql = "update article2 set `like`=`like`+1 where id=$id";

    $result = mysql_query($sql);

    if($result){
        //点赞过一次，不能再点
        $_SESSION["zan".$id] = 1;
        echo 0;  //点赞成功
    }else{
        echo 1; //点赞失败
    }
}else{
    echo 2;      //已经点赞过
}



