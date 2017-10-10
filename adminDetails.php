<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理修改页面</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="editor/css/wangEditor.min.css"><link rel="stylesheet" href="css/global.css">
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

//模态框
include_once "./tpl/modal.php";
//导航条-
include_once "./tpl/header.php";
?>
<?php
include_once "./api/dbConnect.php";
//根据传入的id从数据库获取相应文章的信息
$id = $_REQUEST['id'];
$sql = "select * from article2 where id=$id";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

//对文章内容进行一次urldecode()解密

$row['content'] = urldecode($row['content']);
//将时间戳转化成时间日期格式
date_default_timezone_set('prc');
$row['createTime'] = date("Y-m-d H:i",$row['createTime']);
//$row -->id , user ,title,content,url,visitor,like,createTime
?>
<h2 class="page-header text-center" style="margin-top: 100px">后台管理系统</h2>
<div class="container col-sm-8 col-sm-offset-2">
    <?php
    echo <<<tagName1
    <form action="" method="post" class="form-horizontal">
                    <!--文章标题-->
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="文章标题" value="{$row['title']}">
                        </div>
		     <!-- 文章分类-->
                       <div class="form-group">
                            <div class="col-sm-2">
                                <select class="form-control" name="articleType"  id="">
                                    <option value="0">文章类型</option>
                                    <option value="h5">html</option>
                                    <option value="css">css</option>
                                    <option value="js">javascript</option>
                                    <option value="php">php</option>
                                    <option value="mysql">mysql</option>
                                    <option value="server">服务器</option>
                                    <option value="others">其他</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--原文url链接地址-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="url" placeholder="原文的URL链接地址" value="{$row['url']}">
                        </div>
                    </div>
                    <!--原文其他信息-->
                    <div class="form-group">
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="id" readonly  placeholder="原文的id" value="{$row['id']}">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="user" readonly placeholder="原文的user" value="{$row['user']}">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="createTime" readonly placeholder="原文的createTime" value="{$row['createTime']}">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="visitor" placeholder="原文的visitor" title="原文的visitor" value="{$row['visitor']}">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="like" placeholder="原文的like" title="原文的like" value="{$row['like']}">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="img" readonly placeholder="原文的img" value="{$row['img']}">
                        </div>
                    </div>
                    <!--文章内容在线编辑器-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <!--将id为editor的div变成在线编辑器-->
                            <div id="editor" style="min-height: 500px;">
                                {$row['content']}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success pull-right" type="submit" id="submit">修改文章</button>
                        </div>
                    </div>
                </form>
tagName1
    ?>
</div>

<script src="js/jquery.js"></script>
<script src="./bootstrap/js/bootstrap.js"></script>
<script src="./editor/js/wangEditor.min.js"></script>
<!--在线编辑器初始化-->
<script src="./js/editorInit.js"></script>

<!--ajax更新文章-->
<script src="./js/adminUpdateArticle.js"></script>
</body>
</html>