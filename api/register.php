<?php
include_once 'dbConnect.php';


$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];
$email = $_REQUEST['email'];
$avatar="head-2.jpg";





$sql = "insert into `user`(username,password,email,avatar) values('$username','$pass','$email','$avatar')";
$result = mysql_query($sql);
echo $result ? 0 : 1;