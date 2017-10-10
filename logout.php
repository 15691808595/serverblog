<?php
session_start();
unset($_SESSION['username']); //删除session
header("location:index.php"); //跳转到主页