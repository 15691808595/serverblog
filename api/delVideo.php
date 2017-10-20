<?php
session_start();
include_once "dbConnect.php";
//获取页码
//判断用户是否登录
if(isset($_SESSION['username'])) {

    //已登录
    $username = $_SESSION['username'];
    $id = $_REQUEST['id'];  //视频的id
    $type = $_REQUEST['type'];  //删除还是修改

    if($type=='del'){
        $sql = "delete from video where id=$id";
        $result = mysql_query($sql);
        echo "id为".$id."的视频已经删除";
    }else{
        $name = $_REQUEST['name'];
        $url = $_REQUEST['url'];
        $sql = "update `video` set `name`='$name',url='$url' where `id`='$id'";
        $result = mysql_query($sql);
        echo "id为".$id."的视频已经修改成功";
    }

}else{
    echo "只有博客的主人刘伟波才可以删除哦";
}