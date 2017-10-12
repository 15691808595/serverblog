﻿<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="description" content="刘伟波-天天向上" />
    <meta name="Keywords" content="刘伟波, 个人博客, 个人网站, web前端" />
    <meta name="Description" content="刘伟波的个人博客，刘伟波的技术作品，刘伟波的生活成长" />
    <meta name="author" content="刘伟波,liuweibo" />

    <title>联系我 &raquo; 刘伟波-天天向上</title>

    <!--引入bootstrap css样式文件-->
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->

</head>

<body>
<?php
    include_once "./tpl/header.php";

?>

<div class="container main-container">
    <div class="contact">
        <h1>联系我</h1>
        <form method="post" action="#" id='form'>
            <div id="tips" >*请填写以下信息...</div>
            <div class="form-group">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="username" placeholder="名字(必填)" title="名字(必填)">
                    <input type="text" class="form-control" name="email" placeholder="邮箱" title="邮箱"
                           >
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="qq" placeholder="QQ/微信(必填)" title="QQ/微信(必填)"
                            >
                    <input type="text" class="form-control" name="phone" placeholder="手机" title="手机"
                            >
                </div>
                <div class="clear"></div>
                <div class="col-md-12">
						<textarea class="form-control" name="message"  placeholder="欢迎提出您在使用过程中遇到的问题或宝贵建议（400字以内），感谢您对博主的支持。(必填)" title="发送消息...(必填)"
                                   ></textarea>
                </div>
                <div class="col-sm-12">
                    <button id="btn" class="btn btn-info disco">SUBMIT</button></div>
            </div>
        </form>
        <div class="contact-footer">
            <div class="col-md-4">
                <h1>地址</h1>
                <p>陕西西安</p>
            </div>
            <div class="col-md-4">
                <h1> EmailMe</h1>
                <p>739291780@qq.com</p>
            </div>
            <div class="col-md-4">
                <h1>qq</h1>
                <p>739291780</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php
    include_once  "./tpl/footer.php";
?>
<!--引入jQuery(bootstap的js插件依赖于jquery)-->
<script type="text/javascript" src="./js/jquery.js"></script>
<!--引入bootstrap.js类库文件-->
<script src="./bootstrap/js/bootstrap.js"></script>
<script src="./js/zan.js"></script>
<!--定时器-->
<script src="./js/timer.js"></script>
<script src="./js/common.js"></script>
<script src="./js/contact.js"></script>
</body>
</html>