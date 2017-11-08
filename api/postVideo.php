<?php
session_start();
include_once "dbConnect.php";

//判断用户是否登录
if(isset($_SESSION['username'])){
    //已登录
    $username = $_SESSION['username'];
    if($username=='刘伟波'){
        //接收用户发送的文章内容（标题，原文url，文章内容）
        $title = $_REQUEST['title'];
        $url = $_REQUEST['url'];

        $createTime = time();



        //将文章内容添加到数据库里
        $sql = "insert into video(`name`,url,createTime) values('$title','$url','$createTime')";

        $result = mysql_query($sql);
        //如果文章发布成功,则相应用户的文章数量加1
        if($result){

            echo "文章发布成功";
        }else{
            echo "文章发布失败";
        }
    }else{
        echo "您没有权限~";
    }


   // echo $result ? '文章发布成功' : '';

}else{
    echo "您没有权限~";
}




//administrator
//2151099