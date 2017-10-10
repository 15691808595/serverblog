<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--确保IE浏览器始终以最新的引擎渲染页面-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>注册</title>
    <!--引入bootstrap css样式文件-->
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
    <style>

        @media (max-width: 768px) {
            .main-container{
                padding-top:80px;
            }
        }
    </style>
</head>
<body>
<?php
    include_once "./tpl/modal.php";
    include_once "./tpl/header.php";
?>
<div class="container main-container  animated bounceInRight">
    <div class="container">
        <div class="row">
            <div class="col-sm-12  register-form">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">用户注册</h2>
                    </div>
                    <div class="panel-body">
                        <form action="./api/register.php"  method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-3">用户名</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" placeholder="用户名4到32个字符">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nickName" class="form-control" placeholder="昵称2到32个字符">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">常用邮箱</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" placeholder="输入常用邮箱，验证后才能登陆">
                                    <p class="help-block">
                                </div>
                                <div class="col-sm-10 col-sm-offset-2">
                                    <p class="text-danger">【如果您未在收件箱收到验证邮件，请到垃圾箱查收。】</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">密码</label>
                                <div class="col-sm-9">
                                    <input type="password" name="pass" class="form-control" placeholder="密码至少8位">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">重复密码</label>
                                <div class="col-sm-9">
                                    <input type="password" name="repass" class="form-control" placeholder="重复密码，两次输入必须一致">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">验证码</label>
                                <div class="col-sm-3">
                                    <input type="text" name="captcha" id="inputCaptcha" class="form-control" placeholder="验证码">
                                </div>
                                <div class="col-sm-1">
                                    <!--输入正确时的提示信息-->
                                    <span class="right" style="color:green;font-size:20px;display: none;">√</span>
                                    <!--输入错误时的提示信息-->
                                    <span class="error" style="color:red;font-size:20px;display: none;">×</span>
                                </div>
                                <div class="col-sm-2">
                                    <img id="captcha" src="./api/captcha.php" alt="验证码">
                                </div>
                                <div class="col-sm-1">
                                    <button id="reGet" class="btn btn-primary">换一张</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <button id="submit" class="btn btn-success" >注册</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once "./tpl/footer.php";
?>
<!--引入jQuery(bootstap的js插件依赖于jquery)-->
<script type="text/javascript" src="./js/jquery.js"></script>
<!--引入bootstrap.js类库文件-->
<script src="./bootstrap/js/bootstrap.js"></script>
<script src="./js/captcha.js"></script>
<script src="./js/register.js"></script>
</body>
</html>