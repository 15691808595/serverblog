<?php
session_start();
include_once 'dbConnect.php';
if(isset($_REQUEST['submit'])){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $isRemember = $_REQUEST['isRemember'];

    $sql = "select count(*) as 'total' from user where username='$username' AND password='$password'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);

    $num = $row['total'];

    if($num == 1){
        //登录成功保存session，记住用户登录状态
        $_SESSION['username'] = $username;
        if($isRemember == 'true'){
            //登录成功并且勾选保存密码
            echo "0";
        }else{
            //登录成功但没有保存密码
            echo "1";
        }
    }else{
        //用户名或密码错误，登录失败
        echo "2";
    }
}