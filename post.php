<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--确保IE浏览器始终以最新的引擎渲染页面-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>文章发布</title>
    <!--引入bootstrap css样式文件-->
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="editor/css/wangEditor.min.css">
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
    include_once "./tpl/modal.php";
    include_once "./tpl/header.php";
?>
<div class="container main-container">
    <div class="container">
        <div class="row">
            <?php
                include_once "./tpl/aside.php";
            ?>
            <div class="col-sm-9 animated bounceInRight">
                <form action="./api/postArticle.php" method="post" class="form-horizontal">
                    <!--文章标题-->
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="文章标题">
                        </div>
		     <!-- 文章分类-->
                       <div class="form-group">
                            <div class="col-sm-2">
                                <select class="form-control" name="articleType" id="">
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
                            <input type="text" class="form-control" name="url" placeholder="原文的URL链接地址">
                        </div>
                    </div>
                    <!--文章内容在线编辑器-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <!--将id为editor的div变成在线编辑器-->
                            <div id="editor" style="min-height: 500px;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success pull-right" type="submit" id="submit">发布文章</button>
                        </div>
                    </div>
                </form>
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
<script src="./editor/js/wangEditor.min.js"></script>
<!--在线编辑器初始化-->
<script src="./js/editorInit.js"></script>
<!--ajax发表文章-->
<script src="./js/postArticle.js"></script>
<!--定时器-->
<script src="./js/timer.js"></script>
<script src="./js/common.js"></script>
</body>

</html>