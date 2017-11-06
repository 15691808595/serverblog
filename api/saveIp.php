<?php
/**
 * Created by PhpStorm.
 * User: 73929
 * Date: 2017/11/6
 * Time: 21:03
 */
include_once "dbConnect.php";
$ip=$_REQUEST['ip'];
$address=$_REQUEST['address'];

$allIp="select `ip` from visitor_ip";
$resultAllIp=mysql_query($allIp);
$arrAllIp=[];
while ($rowIp=mysql_fetch_assoc($resultAllIp)){
    $arrAllIp[]=$rowIp;
}
foreach ($arrAllIp as $val){
    if($val['ip']===$ip){
        echo 3;
        exit;
    }
}

$createTime=time();
$sql="insert into visitor_ip(address,ip,createTime) values ('$address','$ip','$createTime')";

$result=mysql_query($sql);
if($result){
    echo 1;
}else{
    echo 0;
}