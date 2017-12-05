<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--确保IE浏览器始终以最新的引擎渲染页面-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<title>生活与创作 &raquo; 刘伟波-天天向上</title>
	<!--引入bootstrap css样式文件-->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   


    <<link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/life.css">
	<link rel="shortcut icon" href="./img/favicon.ico">
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
                <div id="life-list" class="col-sm-9 col-xs-12">

                </div>
                <div id="my-msg" class="col-sm-3 col-xs-12">
<!--                    个人介绍-->
                    <div class="myself clearfix">
                        <div class="my-img">
                            <img src="img/user/header-my.jpg" width="80" alt="">
                        </div>
                        <div class="my-info">
                            刘伟波 <sup><a href="detail.php?id=146">more</a></sup>，16年毕业于
                            <a href="http://www.xawl.org/" title="http://www.xawl.org/" target="_blank">西安文理学院</a>
                            ，现上海，就职于<a href="http://www.dragonsoftbravo.com/" title="http://www.dragonsoftbravo.com/" target="_blank">上海龙帛信息技术有限公司</a>
                            ，专注web前端偏前领域。
                            <p>邮箱：739291780@qq.com</p>
                            <p>关注我：<a href="">新浪微博</a> </p>
                        </div>
                    </div>

                    <div class="sidebar-time">
                        <strong>文章存档</strong>
                        <ul id="timeArticle" class="clearfix">

                        </ul>
                    </div>
<!--                    推荐内容-->
                    <div id="tit-good-box">
                        <div class="tit-good">
                            <strong>前端推荐</strong>
                            <ul id="recommend">

                            </ul>
                        </div>
                        <div class="tit-good">
                            <strong>生活搞笑</strong>
                            <ul id="interesting" class="fight-and-interesting">

                            </ul>
                        </div>
                        <div class="tit-good">
                            <strong>激励向上</strong>
                            <ul id="fight" class="fight-and-interesting">

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
		</div>
	</div>
	<?php
		include_once "./tpl/footer.php";
	?>

    <script src="js/common.js"></script>
    <script src="js/life.js"></script>
    <!--推荐-->
    <script src="./js/recommend.js"></script>
    <!--搞笑和激励-->
    <script src="./js/fightAndInteresting.js"></script>
    <!--    文章归档-->
    <script src="./js/articleTime.js"></script>

</body>
</html>