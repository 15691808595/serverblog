

<?php
session_start();
    include_once "./tpl/modal.php";
    include_once "./tpl/header.php";
    include_once "./api/dbConnect.php";
    //根据传入的id从数据库获取相应文章的信息
    $id = $_REQUEST['id'];
    //每次浏览某一篇文章时，根据id将相应的文章浏览次数加1

    $sql = "update article2 set visitor=visitor+1 where id=$id";

    mysql_query($sql);


    //浏览次数+1 visitor   "update article2 set visitor=visitor+1 where id=$id";

    //根据id查询文章信息
    $sql = "select * from article2 where id=$id";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);


    //对文章内容进行一次urldecode()解密

    $row['content'] = urldecode($row['content']);
    //将时间戳转化成时间日期格式
    date_default_timezone_set('prc');
    $row['createTime'] = date("Y-m-d H:i",$row['createTime']);

    if(!$row['lastModify']){
        $row['lastModify'] = $row['createTime'];
    }else{
        $row['lastModify'] = date("Y-m-d H:i",$row['lastModify']);
    }

    //$row -->id , user ,title,content,url,visitor,like,createTime

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit" />

    <?php
                                echo <<<tagName2
                               

                                <meta http-equiv="description" content="{$row['title']}" />
                                <meta name="Keywords" content="{$row['title']}" />
                                <meta name="Description" content="{$row['title']}" />
                                <meta name="author" content="刘伟波,liuweibo" />
                            
                                <title>{$row['title']} &raquo; 刘伟波-天天向上</title>
tagName2
                            ?>




    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="shortcut icon" href="./img/favicon.ico">
    <!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
    <!--[if lt IE 9]>
    <script src="./js/html5shiv.js"></script>
    <script src="./js/respond.js"></script>
    <![endif]-->

    <style>
        .lead{
            overflow-x: hidden;
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
<div class="container main-container">
    <div class="container">
        <div class="row">
            <!--侧边栏-->
            <?php
                include_once "./tpl/aside.php";
            ?>
            <!--文章内容-->
            <div class="detail-p col-sm-9 animated bounceInRight">
                <div class="post-list-container">
                    <div class="row">
                        <div class="col-sm-12 list-container">
                            <?php
                                echo <<<tagName1
                                <h3 class="page-header text-center">{$row['title']}</h3>
                                <!--文章详情-->
                                <div class="article-info">
                                    <ul class="text-muted clearfix">
                                        <li class="pull-left">发布时间：{$row['createTime']}</li>
                                        <li class="pull-left">作者：{$row['user']}</li>
                                        <li class="pull-left">浏览次数：{$row['visitor']}</li>
                                        <li class="pull-left">最后修改：{$row['lastModify']}</li>
                                        <li class="pull-left">修改次数：{$row['modifyCount']}</li>
                                    </ul>
                                </div>
                                <!--文章内容-->
                                <div class="article-content lead" style="font-size:15px;">
                                    {$row['content']}
                                </div>
tagName1
                            ?>
                        </div>
                    </div>
                </div>
                <!--点赞-->
                <div class="row" style="margin: 0;">
                    <?php
                        //data-id 为元素添加自定义属性
                        if($row['url']){
                            echo "<div class='pull-left'><span style='word-break: break-all;'><strong>原文URL：</strong>&nbsp;&nbsp;&nbsp;<a  href='{$row['url']}' target='_blank'>{$row['url']}</a></span></div>";
                        }
                        echo "<div class='pull-right'><span class='num-zan'>{$row['like']}</span><i data-id='{$id}' class='fa fa-thumbs-up fa-2x zan animated'></i></div>";
                    ?>

                </div>
                <!--上一篇 下一篇-->
                <?php
                $prev=$id-1;//上一篇
                $next=$id+1;//下一篇

                $sqlId="select id from article2";
                $resultId=mysql_query($sqlId);
                $arrId=[];
                while ($rowId = mysql_fetch_assoc($resultId)){
                    $arrId[]=$rowId;
                }
                $len=count($arrId);
                $max=$arrId[$len-1]['id'];//id最大值
                $min=$arrId[0]['id'];//id最小值

                //采用递归查找下一篇的title
                function getNext($arrId, $next, $max)
                {
                    global $notFind;
                    if ($next > $max) {
                        $notFind = -999;
                        return;
                    }//已经最大值了 -999
                    foreach ($arrId as $val) {
                        if ($val['id'] == $next) {
                            global $nextId;
                            $nextId = $val['id'];//找到了输出id
                            return;
                        }
                    }
                    getNext($arrId, $next + 1, $max);
                }
                getNext($arrId, $next, $max);

                //采用递归查找上一篇的id
                function getPrev($arrId, $prev, $min)
                {
                    global $notFind;
                    if ($prev < $min) {
                        $notFind = -999;
                        return;
                    }//已经最大值了 -999
                    foreach ($arrId as $val) {
                        if ($val['id'] == $prev) {
                            global $prevId;
                            $prevId = $val['id'];//找到了输出id
                            return;
                        }
                    }
                    getPrev($arrId, $prev - 1, $min);
                }
                getPrev($arrId, $prev, $min);

                if($next<=$max ) {
                    //获取下一篇title
                    $sqlNext = "select title from article2 where id=$nextId";
                    $resultNext = mysql_query($sqlNext);
                    $rowNext = mysql_fetch_assoc($resultNext);

                }
                if($prev>=$min ) {
                    //获取上一篇title
                    $sqlPrev = "select title from article2 where id=$prevId";
                    $resultPrev = mysql_query($sqlPrev);
                    $rowPrev = mysql_fetch_assoc($resultPrev);
                }

                if($next<=$max && $prev>=$min) {
                        echo <<<tagName2
                <div class="row">
                    <a href="detail.php?id=$prevId">上一篇：{$rowPrev["title"]}</a>
                </div>
                <div class="row">
                    <a href="detail.php?id=$nextId">下一篇：{$rowNext["title"]}</a>
                </div>
tagName2;
                }else if($next>$max){
                    echo <<<tagName3
                <div class="row">
                    <a href="detail.php?id=$prevId">上一篇：{$rowPrev["title"]}</a>
                </div>
tagName3;

                }else {
                    echo <<<tagName4
                <div class="row">
                    <a href="detail.php?id=$nextId">下一篇：{$rowNext["title"]}</a>
                </div>
tagName4;

                }

                ?>

                <div class="comment-warp">
                    <p>发表评论</p>
                    <form id="comment-form" action="#" method="post" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" name="user" class="form-control">
                            </div>
                            <div class="col-sm-5"><span>名称(必填)</span></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5 parentCls">
                                <input type="text" name="email" class="form-control inputElem">
                            </div>
                            <div class="col-sm-5"> <span>邮件地址(不会被公开) (必须)</span></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" name="website" class="form-control">
                            </div>
                            <div class="col-sm-5"> <span>网站</span></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8">
                                <textarea class="form-control" name="txt" id=""  rows="5" placeholder="(必填)"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button id="comment-btn" class="btn btn-primary">提交评论</button>
                            </div>
                            <div class="col-sm-6">
                                <span class="" id="comment-tips"></span>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="comment-result">
                    <ul id="showComment">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once  "./tpl/footer.php";
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="./js/emailAutoComplete.js"></script>
<script src="./js/zan.js"></script>
<!--定时器-->
<script src="./js/timer.js"></script>
<script src="./js/common.js"></script>
<!--推荐-->
<script src="./js/recommend.js"></script>
<script src="./js/imageLazyLoad.js"></script>
<!--评论-->
<script src="./js/comment.js"></script>
<!--每日浏览-->
<script src="./js/view/view.js"></script>
</body>
</html>