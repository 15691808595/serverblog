<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--确保IE浏览器始终以最新的引擎渲染页面-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>生活与创作 &raquo; 刘伟波-天天向上</title>
	<!--引入bootstrap css样式文件-->
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/life.css">
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
		include_once "./tpl/header.php";
	?>
	<div class="container main-container animated bounceInRight">
		<div class="container">
			<div class="row">
                <div class="col-sm-9">
                    <div class="life-box">
                        <h2 class="title"><a href="">我的第一篇生活文章</a></h2>
                        <div class="time">2017年10月9日 by 刘伟波 阅读 895 次, 点赞 31 次</div>
                        <div class="short">分享下我认为2017年最佳4月新番和最佳7月新番。</div>
                        <div class="read-all"><a href="">阅读全文...</a></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="myself clearfix">
                        <div class="my-img">
                            <img src="img/user/header-my.jpg" width="80" alt="">
                        </div>
                        <div class="my-info">
                            刘伟波 <sup><a href="">more</a></sup>，16年毕业于
                            <a href="http://www.xawl.org/" title="http://www.xawl.org/" target="_blank">西安文理学院</a>
                            ，现上海，就职于<a href="http://www.dragonsoftbravo.com/" title="http://www.dragonsoftbravo.com/" target="_parent">上海龙帛信息技术有限公司</a>
                            ，专注web前端偏前领域。
                            <p>邮箱：739291780@qq.com</p>
                            <p>关注我：<a href="">新浪微博</a> </p>
                        </div>
                    </div>

                    <div class="tit-good">
                        <strong>前端推荐</strong>
                        <ul>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                        </ul>
                    </div>
                    <div class="tit-good">
                        <strong>生活搞笑</strong>
                        <ul>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                        </ul>
                    </div>
                    <div class="tit-good">
                        <strong>激励向上</strong>
                        <ul>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                            <li><a href="">我心目中2017年4月和7月最佳新番</a><span>(123views)</span></li>
                            <li><a href="">善良有什么用？</a><span>(1231views)</span></li>
                        </ul>
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
</body>
</html>