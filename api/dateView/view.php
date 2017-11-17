<?php
/**
 * Created by PhpStorm.
 * User: 73929
 * Date: 2017/11/6
 * Time: 21:03
 */
include_once "../dbConnect.php";


$resArr = array(
    "listToday"=>array(),
    "listAllView"=>array(),
    "total"=>0,
    "comment"=>0,
    "userMsg"=>0,
    "user"=>0,
);

//所有浏览
$sql="select `all` from visitor_counter where id=1";
$result=mysql_query($sql);

while($row = mysql_fetch_assoc($result)){
    $resArr['listAllView'][] = $row;
}

//昨日今日浏览
$sql="select t_view from date_view order by id desc limit 2";
$result=mysql_query($sql);

while($row = mysql_fetch_assoc($result)){
    $resArr['listToday'][] = $row;
}

//所有文章
$sql="select count(*) as total from article2 ";
$result=mysql_query($sql);

$row = mysql_fetch_assoc($result);

$total = $row['total'];
$resArr['total'] = $total;
//所有评论
$sql="select count(*) as total from comment ";
$result=mysql_query($sql);

$row = mysql_fetch_assoc($result);

$total = $row['total'];
$resArr['comment'] = $total;
//所有留言
$sql="select count(*) as total from user_item ";
$result=mysql_query($sql);

$row = mysql_fetch_assoc($result);

$total = $row['total'];
$resArr['userMsg'] = $total;
//所有会员总数
$sql="select count(*) as total from user ";
$result=mysql_query($sql);

$row = mysql_fetch_assoc($result);

$total = $row['total'];
$resArr['user'] = $total;

echo json_encode($resArr);