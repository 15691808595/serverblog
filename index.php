<?php
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

    <title>刘伟波的个人介绍 &raquo; 刘伟波-天天向上</title>

    <!--引入bootstrap css样式文件-->
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->

</head>

<body>

<?php
include_once "./api/dbConnect.php";
include_once "./tpl/header.php";

//每次浏览网站时，浏览次数加1

$sql = "update visitor_counter set `all`=`all`+1 where id=1";

mysql_query($sql);


$createTime=time();
$sql="insert into visitor_ip(address,ip,createTime) values ('上海','127.7.7.7','$createTime')";

mysql_query($sql);
?>
<div class=" main-container">
    <div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="home ">
                    <div class="box">
                        <div class="row">
                            <div id="video-box" class="col-md-8 col-sm-12">
                                <div class="row">
                                    <div id="media" class="col-md-7" >
                                        <video src="mp4/420style.mp4" controls></video>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="intro">
                                            <div class="my-line">
                                                <h3 > TOP 10</h3>
                                                <ul id="video-title" class="recommend flash">


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="intro">
                                    <div class="line">
                                        <h3>刘伟波<sup><a href="detail.php?id=146">more</a></sup></h3>

                                        <div class="rw-words">
                                            <span>励志成为Full Stack Developer</span>
                                            <span>喜欢酷炫的Web Skills</span>
                                            <span>极其爱折腾，安静！</span>
                                            <span>喜欢下棋，LOL</span>
                                            <span>爱旅游，梦想走遍万水千山</span>
                                            <span>志同道合的小伙伴快来认亲</span>
                                        </div>
                                        <!--<hr class="split-line">-->
                                        <ul class="split-line">
                                            <li>
                                                <ul  class="line-inblock">
                                                    <li>qq</li>
                                                    <li>739291780</li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="line-inblock">
                                                    <li>就职</li>
                                                    <li><a href="http://www.dragonsoftbravo.com/" title="http://www.dragonsoftbravo.com/" target="_blank">上海龙帛信息技术有限公司</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="line-inblock">
                                                    <li>邮箱</li>
                                                    <li>739291780@qq.com</li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="line-inblock">
                                                    <li>学校</li>
                                                    <li><a href="http://www.xawl.org/" title="http://www.xawl.org/" target="_blank">西安文理学院</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="line-inblock">
                                                    <li>github</li>
                                                    <li class="address"><a href="https://15691808595.github.io/" title="https://15691808595.github.io/" target="_blank">点击进入</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="recommend-box" class="row mt30">

                            <div class="col-md-4 col-sm-12">
                                <div class="my-intro">
                                    <div class="my-line">
                                        <h3 class="text-center">激励向上</h3>
                                        <ul id="fight" class="recommend recommend-height fight-and-interesting">


                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="my-intro">
                                    <div class="my-line">
                                        <h3 class="text-center">前端推荐</h3>
                                        <ul id="recommend" class="recommend recommend-height ">

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="intro">
                                    <div class="my-line">
                                        <h3 class="text-center">生活搞笑</h3>
                                        <ul id="interesting" class="recommend  recommend-height fight-and-interesting">


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="phone768">
    使用电脑会看到更多内容哦！
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
<!--推荐-->
<script src="./js/recommend.js"></script>
<!--视频控制-->
<script src="./js/video.js"></script>
<!--搞笑和激励-->
<script src="./js/fightAndInteresting.js"></script>
</body>
</html>