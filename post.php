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

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="editor/css/wangEditor.min.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--    网页加载进度条-->
    <link rel="stylesheet" href="https://unpkg.com/nprogress@0.2.0/nprogress.css">
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
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
                <?php
                    if(!isset($_SESSION['username'])){
                        echo <<<tagname
                    
                <div class="login-tips col-sm-10 " >
                    *登录后可发布文章
                </div>
tagname;

                    }
                ?>
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
                                    <option value="interesting">生活搞笑</option>
                                    <option value="fight">激励向上</option>
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
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea class="form-control" name="short" id="short" placeholder="简短介绍"></textarea>
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="./editor/js/wangEditor.min.js"></script>



<!--在线编辑器初始化-->
<script src="./js/min/editorInit.min.js"></script>
<!--定时器-->
<script src="./js/min/timer.min.js"></script>
<script src="./js/min/common.min.js"></script>
<!--推荐-->
<script src="./js/min/recommend.min.js"></script>
<!--ajax发表文章-->
<script src="./js/min/postArticle.min.js"></script>
<script>
    NProgress.start();
    NProgress.done();
</script>
</body>

</html>