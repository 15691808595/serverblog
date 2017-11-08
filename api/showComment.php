<?php
include_once "dbConnect.php";
$a_id=$_REQUEST['a_id'];

date_default_timezone_set('Asia/Shanghai');//设置时区

$sql = "select * from comment where `a_id`='$a_id' order by createTime desc ";


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