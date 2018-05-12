<?php
session_start();
include_once "dbConnect.php";
//获取页码
//判断用户是否登录
if(isset($_SESSION['username'])) {

    //已登录
    $username = $_SESSION['username'];
    if($username=='刘伟波'){
        $id = $_REQUEST['id'];  //页码
        $bool = $_REQUEST['bool']; // 推荐判断

        if($bool){
            $sql = "update article2 set recommend=1 where id=$id";
        }else{
            $sql = "update article2 set recommend=0 where id=$id";
        }
        mysql_query($sql);
        echo "1";
    }else{
        echo "0";
    }

}else{
    echo "0";
}