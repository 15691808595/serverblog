<?php
session_start();
include_once "dbConnect.php";

if(isset($_SESSION['username'])){
    $sql = "select `today`,`yestoday`,mounth,`all` from visitor_counter";

    $result = mysql_query($sql);

    $resArr = array(
        "list"=>array()
    );

//遍历结果集
    while($row = mysql_fetch_assoc($result)){
        $resArr['list'][] = $row;
    }




    echo json_encode($resArr);  //返回结果集json字符串
}else{
    echo 0;
}


