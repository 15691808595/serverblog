
<?php
session_start();
include_once "dbConnect.php";

    $sql1 = "select id,title,visitor,`type` from article2 where `type`='interesting'  order by createTime desc";
    $result1 = mysql_query($sql1);
    $sql2 = "select id,title,visitor,`type` from article2 where  `type`='fight' order by createTime desc";
    $result2 = mysql_query($sql2);


    $resArr = array(
        "interesting"=>array(),
        "fight"=>array()
    );

//遍历结果集
while($row1 = mysql_fetch_assoc($result1)){
    $resArr['interesting'][] = $row1;
}
while($row2 = mysql_fetch_assoc($result2)){
    $resArr['fight'][] = $row2;
}




    echo json_encode($resArr);  //返回结果集json字符串



