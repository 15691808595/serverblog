<?php
include_once 'dbConnect.php';


$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];
$nickName = $_REQUEST['nickName'];
$email = $_REQUEST['email'];
$avatar="head-2.jpg";





$sql = "insert into `user`(username,password,nickName,email,avatar) values('$username','$pass','$nickName','$email','$avatar')";
$result = mysql_query($sql);
echo $result ? 0 : 1;