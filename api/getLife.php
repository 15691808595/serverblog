<?php
include_once "dbConnect.php";

date_default_timezone_set('Asia/Shanghai');//设置时区

$sql = "select `id`,`title`,`user`,`createTime`,`visitor`,`like`,`img`,`type`,`short` from article2 where `type`='interesting' or `type`='fight' order by createTime  ";


$result = mysql_query($sql);

$resArr = array(
    "list"=>array()
);

//遍历结果集
while($row = mysql_fetch_assoc($result)){
    $row['createTime'] = date("Y-m-d H:i",$row['createTime']);
    $resArr['list'][] = $row;
}



echo json_encode($resArr);  //返回结果集json字符串