<?php
include_once 'dbConnect.php';


$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];
$email = $_REQUEST['email'];
$avatar="head-2.jpg";


$allUsername="select `username` from user";
$resultAllUsername=mysql_query($allUsername);
$arrAllUsername=[];
while ($rowUsername=mysql_fetch_assoc($resultAllUsername)){
    $arrAllUsername[]=$rowUsername;
}
foreach ($arrAllUsername as $val){
    if($val['username']===$username){
        echo '用户名已经存在，请换一个！';
        exit;
    }
}


$sql = "insert into `user`(username,password,email,avatar) values('$username','$pass','$email','$avatar')";
$result = mysql_query($sql);
echo $result ? 0 : 1;