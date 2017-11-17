<?php
/**
 * Created by PhpStorm.
 * User: 73929
 * Date: 2017/11/6
 * Time: 21:03
 */
include_once "../dbConnect.php";
$bool=$_REQUEST['bool'];
date_default_timezone_set('Asia/Shanghai');//设置时区

$y=date('Y');
$month=date('m');
$day=date('d');
$start=mktime(0,0,0,$month,$day,$y);
$end=mktime(23,59,59,$month,$day,$y);
$now=$start;

$resArr = array(
    "list"=>array(),
    "listView"=>array(),
);

$sql="select t_view from date_view order by id desc limit 2";
$result=mysql_query($sql);


//遍历结果集
while($row = mysql_fetch_assoc($result)){
    $resArr['listView'][] = $row;
}

if($bool==1){
    $sql="insert into date_view(date) values ('$now')";

    $result=mysql_query($sql);
    if($result){
        echo 1;
    }else{
        echo 0;
    }
}else{

    $sql='select max(id)as maxId from date_view';
    $result=mysql_query($sql);


//遍历结果集
    while($row = mysql_fetch_assoc($result)){
        $resArr['list'] = $row;
    }

    $maxId=$resArr['list']['maxId'];

    $sql="update date_view set `t_view`=`t_view`+1 where id='$maxId'";
    mysql_query($sql);



    $sql="select `date` from date_view where id = '$maxId'";


    $result=mysql_query($sql);


//遍历结果集
    while($row = mysql_fetch_assoc($result)){
        $resArr['list']['date'] = $row;
    }
    $resArr['list']['now'] = $now;
////
    echo json_encode($resArr);
}
