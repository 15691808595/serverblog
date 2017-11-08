<?php

include_once "dbConnect.php";

$t1=$_REQUEST['t1'];
$t2=$_REQUEST['t2'];


$sql = "select * from article2 where createTime<'$t2' && createTime>='$t1'  order by createTime desc ";

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