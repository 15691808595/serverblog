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

<meta name="baidu-site-verification" content="bujBfBFkgc" />

    <title>刘伟波的个人博客 &raquo; 刘伟波-天天向上</title>

    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/paging.css">
    <link rel="shortcut icon" href="./img/favicon.ico">

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
    //获取文章类型
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "all";
    echo "<span id='type' data-type='{$type}' style='display: none;'></span>";
?>
<div class="container main-container">
    

    <div class="container">
        <div class="row">
            <?php
                include_once "./tpl/aside.php";
            ?>
            <div class="col-sm-9 animated bounceInRight">
                <div class="post-list-container">
                    <?php
                        include_once "./tpl/search.php";
                    ?>
                    <div class="row">
                        <!--文章列表容器--->
                        <div class="col-sm-12 list-container">

                        </div>
                        <!--分页栏-->
                        <div class="col-sm-12 paging">
                            <div id="page" class="page_div"></div>
                        </div>


                    </div>
                </div>
            </div>
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
<script src="./js/jquery.tmpl.js"></script>
<script id="tpl" type="text/x-jquery-tmpl">




    <div class="post-item-container">
        <h4><a href="detail.php?id=${id}" >${title}</a> <img src="./img/${img}" height="24" width="24" class="pull-right"/></h4>
        <p>${content}</p>
        <p class="text-danger">
            ${user}&nbsp;&nbsp;&nbsp;&nbsp; ${createTime}&nbsp;&nbsp;&nbsp;&nbsp;
            <i class="glyphicon glyphicon-eye-open"></i>&nbsp;${visitor}&nbsp;&nbsp;&nbsp;&nbsp;
            <i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;${like}
        </p>
    </div>
</script>
<!--分页-->
<script type="text/javascript" src="js/paging.js"></script>
<script>
</script>
<script src="./js/page.js"></script>
<!--定时器-->
<script src="./js/timer.js"></script>
<!--->
<script src="./js/common.js"></script>
<!--搜索功能-->
<script src="./js/search.js"></script>
<!--推荐-->
<script src="./js/recommend.js"></script>
<!--每日浏览-->
<script src="./js/view/view.js"></script>

</body>
</html>