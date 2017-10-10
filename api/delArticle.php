<?php
session_start();
include_once "dbConnect.php";
//获取页码
//判断用户是否登录
if(isset($_SESSION['username'])) {

    //已登录
    $username = $_SESSION['username'];
    $id = $_REQUEST['id'];  //页码

    $sql = "delete from article2 where id=$id";
    $result = mysql_query($sql);
    echo "id为".$id."的文章已经删除";
}else{
    echo "只有博客的主人刘伟波才可以修改哦";
}