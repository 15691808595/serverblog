<?php
session_start();
include_once "dbConnect.php";

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    if($username=='刘伟波'){
        $num = $_REQUEST['num'];
        $everyNum = $_REQUEST['everyNum'];
        $nums = $num * $everyNum;
        $sql = "select `id`,`title`,`user`,`createTime`,`visitor`,`like`,`img`,`recommend` from article2 order by createTime desc limit $nums";

        $result = mysql_query($sql);

        $resArr = array(
            "list"=>array()
        );

//遍历结果集
        while($row = mysql_fetch_assoc($result)){
            date_default_timezone_set('Asia/Shanghai');//设置时区
            $row['createTime'] = date("Y-m-d H:i",$row['createTime']);
            $resArr['list'][] = $row;
        }




        echo json_encode($resArr);  //返回结果集json字符串
    }else{
        echo 0;
    }
}else{
    echo 0;
}
