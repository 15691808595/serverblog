<?php
include_once "dbConnect.php";
//获取页码
$num = $_REQUEST['num'];  //页码
$pageNum = 9;  //每页所包含的记录条数
$type = $_REQUEST['type'];
$wd = $_REQUEST['wd'];

//获取特定某一页的数据之前现获取总的页数
if($type == "all"){
    $sql = "select count(*) as 'total' from article2";   //获取表中总记录数sql语句
}else if($type == "title"){
    $sql = "select count(*) as 'total' from article2 where title like '%$wd%'";   //获取表中总记录数sql语句
}else{
    $sql = "select count(*) as 'total' from article2 where type='$type'";   //获取表中总记录数sql语句
}

$result = mysql_query($sql);  //$result只有一条记录，该记录的值就是article2表中总文章篇数

$row = mysql_fetch_assoc($result);

$total = ceil($row['total']/$pageNum);  //向上取整获取总页数


$startIndex =  $pageNum*($num-1);     //获取数据的其实位置

date_default_timezone_set('Asia/Shanghai');//设置时区
if($type == "all"){
    $sql = "select `id`,`title`,`user`,`createTime`,`visitor`,`like`,`img` from article2 order by createTime desc limit $startIndex,$pageNum";
}else if($type == "title"){
    $sql = "select `id`,`title`,`user`,`createTime`,`visitor`,`like`,`img` from article2 where title like '%$wd%' order by createTime desc limit $startIndex,$pageNum";
}else{
    $sql = "select `id`,`title`,`user`,`createTime`,`visitor`,`like`,`img` from article2 where type='$type' order by createTime desc limit $startIndex,$pageNum";
}

$result = mysql_query($sql);

$resArr = array(
    "total"=>0,
    "list"=>array()
);

//遍历结果集
while($row = mysql_fetch_assoc($result)){
    $row['createTime'] = date("Y-m-d H:i",$row['createTime']);
    $resArr['list'][] = $row;
}

$resArr['total'] = $total;  //将总页数添加返回结果集最后一条



echo json_encode($resArr);  //返回结果集json字符串