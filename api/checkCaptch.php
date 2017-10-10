<?php
session_start();
//在此页面进行验证码是否输入正确的验证逻辑

//获取到用户输入的验证码
$captcha = $_REQUEST["captcha"];

//将用户输入字符串和用于产生图片验证码的字符串进行比较

//图片验证码是保存在session
if($captcha === $_SESSION["authcode"]){
    echo 0;  //代表输入正确
}else{
    echo 1; //代表输入错误
}