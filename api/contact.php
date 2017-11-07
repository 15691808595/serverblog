<?php
session_start();
include_once "dbConnect.php";

$username=$_REQUEST['username'];
$email=$_REQUEST['email'];
$qq=$_REQUEST['qq'];
$phone=$_REQUEST['phone'];
$message=$_REQUEST['message'];


$allUsername="select `name` from user_item";
$resultAllUsername=mysql_query($allUsername);
$arrAllUsername=[];
while ($rowUsername=mysql_fetch_assoc($resultAllUsername)){
    $arrAllUsername[]=$rowUsername;
}
foreach ($arrAllUsername as $val){
    if($val['name']===$username){
        echo '用户名已经存在，请换一个！';
        exit;
    }
}

$createTime = time();

$sql = "insert into user_item(`name`,email,qq,tel,msg,createTime) values('$username','$email','$qq','$phone','$message',$createTime)";

$result = mysql_query($sql);
if($result){
    echo '提交成功,登陆后可以查看留言。';
}else{
    echo '提交失败';
}




