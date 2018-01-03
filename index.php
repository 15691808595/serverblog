<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta class="meta-ctrl-pc" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="description" content="刘伟波-天天向上" />
    <meta name="Keywords" content="刘伟波, 个人博客, 个人网站, web前端" />
    <meta name="Description" content="刘伟波的个人博客，刘伟波的技术作品，刘伟波的生活成长" />
    <meta name="author" content="刘伟波,liuweibo" />

    <title>刘伟波的个人博客 &raquo; 刘伟波-天天向上</title>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->
    <script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>

</head>

<body>

<?php
include_once "./api/dbConnect.php";
include_once "./tpl/header.php";

//每次浏览网站时，浏览次数加1

$sql = "update visitor_counter set `all`=`all`+1 where id=1";

mysql_query($sql);

?>
<div class=" main-container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="home ">
                    <div class="box">
                        <div class="row">
                            <div id="video-box" class="col-md-8 col-sm-12">
                                <div class="row">
                                    <div id="media" class="col-md-7" >
                                        <video poster="" src="" controls>您的浏览器不支持最新html标签，请使用最新浏览器！</video>
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
                                        <h3 class="more-info"><a href="detail.php?id=146"><span>刘伟波</span> <sup>more</sup></a></h3>

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
                                            <li class="hide-github">
                                                <ul class="line-inblock">
                                                    <li>github</li>
                                                    <li class="address"><a href="https://15691808595.github.io/" title="https://15691808595.github.io/" target="_blank">点击进入</a></li>
                                                </ul>
                                            </li>
                                            <li class="hide-github">
                                                <ul class="line-inblock">
                                                    <li>github小游戏</li>
                                                    <li class="address"><a href="https://15691808595.github.io/project/jq_pull_box.html" title="https://15691808595.github.io/project/jq_pull_box.html" target="_blank">点击进入</a></li>
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
<div class="tab-pc text-center">
    <button class="btn btn-danger btn-sm">电脑端</button>
</div>

<?php
    include_once  "./tpl/footer.php";
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<script src="./js/min/timer.min.js"></script>
<script src="./js/min/common.min.js"></script>
<!--推荐-->
<script src="./js/min/recommend.min.js"></script>
<!--搞笑和激励-->
<script src="./js/min/fightAndInteresting.min.js"></script>

<script src="./js/min/index.min.js"></script>
</body>
</html>