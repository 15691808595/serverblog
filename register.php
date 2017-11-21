<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--确保IE浏览器始终以最新的引擎渲染页面-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>注册</title>
    <!--引入bootstrap css样式文件-->

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
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
        ul,li{list-style:none;}
        /*.inputElem {width:198px;height:22px;line-height:22px;border:1px solid #ff4455;}*/
        /*.parentCls{width:200px;}*/
        .parentCls ul{
            left: 14px;
        }
        .auto-tip li{width:100%;height:22px;line-height:22px;font-size:14px;}
        .auto-tip li em{font-style: normal}
        .auto-tip li.hoverBg{background:#ddd;cursor:pointer;}
        .red{color:#9e9898;}
        .hidden {display:none;}
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
            <div class="col-xs-12  register-form">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">用户注册</h2>
                    </div>
                    <div class="panel-body">
                        <form action="./api/register.php"  method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-xs-3">*用户名</label>
                                <div class="col-xs-9">
                                    <input type="text" name="username" class="form-control" placeholder="用户名4到32个字符 (必填)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">*常用邮箱</label>
                                <div class="col-xs-9 parentCls">
                                    <input type="text" name="email" class="form-control inputElem" placeholder="输入常用邮箱，验证后才能登陆 (必填,不会被公开)">
                                    <p class="help-block">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">*密码</label>
                                <div class="col-xs-9">
                                    <input type="password" name="pass" class="form-control" placeholder="密码至少8位 (必填)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">*重复密码</label>
                                <div class="col-xs-9">
                                    <input type="password" name="repass" class="form-control" placeholder="重复密码，两次输入必须一致 (必填)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">*验证码</label>
                                <div class="col-md-3 col-xs-4">
                                    <input type="text" name="captcha" id="inputCaptcha" class="form-control" placeholder="验证码 (必填)">
                                </div>
                                <div class="col-xs-1 no-pad" >
                                    <!--输入正确时的提示信息-->
                                    <span class="right" style="color:green;font-size:20px;display: none;">√</span>
                                    <!--输入错误时的提示信息-->
                                    <span class="error" style="color:red;font-size:20px;display: none;">×</span>
                                </div>
                                <div class="col-xs-2 no-pad" style="cursor: pointer">
                                    <img id="captcha" src="./api/captcha.php" alt="验证码">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-9 col-xs-offset-3">
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="./js/emailAutoComplete.js"></script>
<script src="./js/common.js"></script>
<script src="./js/captcha.js"></script>
<script src="./js/register.js"></script>
</body>
</html>