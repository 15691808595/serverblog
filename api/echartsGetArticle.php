<?php
include_once "dbConnect.php";



$sql = "select count(*) as 'h5' from article2 where `type`='h5'";   //获取表中总记录数sql语句
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$h5 = $row['h5'];

$sql2 = "select count(*) as 'css' from article2 where `type`='css'";   //获取表中总记录数sql语句
$result = mysql_query($sql2);
$row = mysql_fetch_assoc($result);
$css = $row['css'];

$sql2 = "select count(*) as 'css' from article2 where `type`='css'";   //获取表中总记录数sql语句
$result = mysql_query($sql2);
$row = mysql_fetch_assoc($result);
$css = $row['css'];

$sql3 = "select count(*) as 'js' from article2 where `type`='js'";   //获取表中总记录数sql语句
$result = mysql_query($sql3);
$row = mysql_fetch_assoc($result);
$js = $row['js'];

$sql3 = "select count(*) as 'php' from article2 where `type`='php'";   //获取表中总记录数sql语句
$result = mysql_query($sql3);
$row = mysql_fetch_assoc($result);
$php = $row['php'];

$sql4 = "select count(*) as 'mysql' from article2 where `type`='mysql'";   //获取表中总记录数sql语句
$result = mysql_query($sql4);
$row = mysql_fetch_assoc($result);
$mysql = $row['mysql'];

$sql5 = "select count(*) as 'server' from article2 where `type`='server'";   //获取表中总记录数sql语句
$result = mysql_query($sql5);
$row = mysql_fetch_assoc($result);
$server = $row['server'];

$sql6 = "select count(*) as 'others' from article2 where `type`='others'";   //获取表中总记录数sql语句
$result = mysql_query($sql6);
$row = mysql_fetch_assoc($result);
$others = $row['others'];



$resArr = array(
    "h5"=>0,
    "css"=>0,
    "js"=>0,
    "php"=>0,
    "mysql"=>0,
    "server"=>0,
    "others"=>0
);


$resArr['h5'] = $h5;
$resArr['css'] = $css;
$resArr['js'] = $js;
$resArr['php'] = $php;
$resArr['mysql'] = $mysql;
$resArr['server'] = $server;
$resArr['others'] = $others;



echo json_encode($resArr);  //返回结果集json字符串