<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->
</head>
<body>
<?php
//导航条-
include_once "./tpl/header.php";
//模态框
include_once "./tpl/modal.php";
?>
<h2 class="page-header text-center" style="margin-top: 100px">后台管理系统</h2>
<div class="container col-sm-8 col-sm-offset-2">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>

            </tr>
        </thead>
        <tbody class="text-center">

        </tbody>
    </table>
</div>

<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/admin.js"></script>
</body>
</html>