<?php
/**
 * Created by PhpStorm.
 * User: 73929
 * Date: 2017/11/6
 * Time: 21:03
 */
include_once "dbConnect.php";
$a_id=$_REQUEST['a_id'];
$user=$_REQUEST['user'];
$email=$_REQUEST['email'];
$website=$_REQUEST['website'];
$msg=$_REQUEST['msg'];


$allUser="select `user` from comment where a_id='$a_id'";
$resultAllUser=mysql_query($allUser);
$arrAllUser=[];
while ($rowUser=mysql_fetch_assoc($resultAllUser)){
    $arrAllUser[]=$rowUser;
}
foreach ($arrAllUser as $val){
    if($val['user']===$user){
        echo 3;
        exit;
    }
}

$createTime=time();
$sql="insert into comment(a_id,`user`,email,website,msg,createTime) values ('$a_id','$user','$email','$website','$msg','$createTime')";

$result=mysql_query($sql);
if($result){
    echo 1;
}else{
    echo 0;
}