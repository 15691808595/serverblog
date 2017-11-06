<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->
</head>
<body>
<?php
//导航条-
include_once "./tpl/header.php";
//模态框
include_once "./tpl/modal.php";
?>
<h2 class="page-header text-center" style="margin-top: 100px">后台管理系统</h2>
<div class="container col-sm-8 col-sm-offset-2">
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li  class="active"><a href="#home"   data-toggle="tab">文章管理</a></li>
            <li><a href="#profile"   data-toggle="tab">留言管理</a></li>
            <li><a href="#visitor"   data-toggle="tab">浏览记录</a></li>
            <li><a href="#video"   data-toggle="tab">视频添加</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <table id="article" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>

                    </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="tab-pane fade" id="profile">
                <table id="msg" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>

                    </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="visitor">
                <div class="visitor clearfix">
                    <h4>总记录：<span>您无权限...</span></h4>
                    <h4>月记录：<span>您无权限...</span></h4>
                    <h4>昨日记录：<span>您无权限...</span></h4>
                    <h4>今日记录：<span>您无权限...</span></h4>
                </div>
                <table id="visit" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>

                    </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade " id="video">

                <form id="videoForm" action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="videoTitle" placeholder="视频标题" value="">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="videoUrl" placeholder="视频url" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button id="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </form>

                <table id="videoShow" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>

                    </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>

            </div>
        </div>

    </div>


</div>

<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!--<script src="js/admin.js"></script>-->
<script src="js/adminMessage.js"></script>
<script src="js/adminVisitor.js"></script>
<script src="js/adminAllVisitor.js"></script>
<script src="js/postVideo.js"></script>
<script src="js/adminVideoShow.js"></script>
<script src="js/lazyArticleTitle.js"></script>
</body>
</html>