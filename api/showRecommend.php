<?php
session_start();
include_once "dbConnect.php";

    $sql = "select id,title,visitor from article2 where recommend=1";
    $result = mysql_query($sql);


    $resArr = array();

//遍历结果集
    while($row = mysql_fetch_assoc($result)){
        $resArr[] = $row;
    }




    echo json_encode($resArr);  //返回结果集json字符串



