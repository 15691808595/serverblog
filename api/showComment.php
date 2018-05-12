<?php
session_start();
include_once "dbConnect.php";
$a_id=$_REQUEST['a_id'];

date_default_timezone_set('Asia/Shanghai');//设置时区

if($a_id==='all'){
    $sql = "select * from comment  order by createTime desc ";
}else if($a_id==='del_comment'){
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        if($username=='刘伟波'){
            $id=$_REQUEST['id'];
            $sql = "delete from comment where id='$id' ";
            $result = mysql_query($sql);
            echo "id为".$id."的评论已经删除";
            exit;
        }else{
            echo "只有博客的主人刘伟波才可以修改哦";
            exit;
        }
    }else{
        echo "只有博客的主人刘伟波才可以修改哦";
        exit;
    }

}else{
    $sql = "select * from comment where `a_id`='$a_id' order by createTime desc ";
}



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