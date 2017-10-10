<?php
session_start();
include_once "dbConnect.php";
//判断用户是否登录
if(isset($_SESSION['username'])){

    //已登录
    $username=$_SESSION['username'];
    //接收用户发送的文章内容（标题，原文url，文章内容）
    $title = $_REQUEST['title'];
    $id = $_REQUEST['id'];
    $visitor=$_REQUEST['visitor'];
    $like=$_REQUEST['like'];
    $user=$_REQUEST['user'];
    $url=$_REQUEST['url'];
    $type=$_REQUEST['type'];
//    echo $type;
//    exit;

    $content = urlencode($_REQUEST['content']);  //content包含中文的时候

    if($type=="others"){
        $img = "node.png";
    }else{
        $img = $type.".png";
    }


    if($username=="刘伟波"){
        if($type=="0"){
            $sql = "update `article2` set visitor='$visitor',title='$title',`like`='$like',`user`='$user',content='$content',url='$url'  where `id`='$id'";
        }else{
            $sql = "update `article2` set visitor='$visitor',title='$title',`like`='$like',`user`='$user',content='$content',url='$url',`type`='$type',img='$img'  where `id`='$id'";
        }

    }else{
        echo "只有博客的主人刘伟波才可以修改哦！";
        exit;
    }


    $result = mysql_query($sql);
    if($result){


        echo "文章修改成功";
    }else{
        echo "文章修改失败";
    }


}else{
    echo "您还未登录，登录后才可以修改文章";
}


