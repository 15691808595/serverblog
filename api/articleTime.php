<?php
include_once "dbConnect.php";

$sql = "select createTime from article2  order by createTime desc ";




$result = mysql_query($sql);

$resArr = array(
    "list"=>array()
);

//遍历结果集
while($row = mysql_fetch_assoc($result)){
    $resArr['list'][] = $row;
}



echo json_encode($resArr);  //返回结果集json字符串