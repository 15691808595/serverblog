<?php
session_start();
include_once "dbConnect.php";

$username=$_REQUEST['username'];
$email=$_REQUEST['email'];
$qq=$_REQUEST['qq'];
$phone=$_REQUEST['phone'];
$message=$_REQUEST['message'];

$createTime = time();

$sql = "insert into user_item(`name`,email,qq,tel,msg,createTime) values('$username','$email','$qq','$phone','$message',$createTime)";

$result = mysql_query($sql);
if($result){
    echo '提交成功';
}else{
    echo '提交失败';
}




