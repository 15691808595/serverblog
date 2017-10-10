<div class="col-sm-3">
    <div class="social-channel-container">
        <!--个人资料-->
        <?php
            if(isset($_SESSION['username'])){
                $username = $_SESSION["username"];
                //引入连接数据库文件
                include_once "./api/dbConnect.php";

                $sql = "select username,avatar,origin,zhuan from user where username='$username'";
                $result = mysql_query($sql);
                //在用户名唯一的情况下，查找出来用户只能有一个
                $user = mysql_fetch_assoc($result);

                echo <<<user
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">个人资料</h3>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item text-center">
                            <a href="index.php" target="_blank" ><img src="./img/user/{$user['avatar']}" alt="avatar" style="border-radius:8px;" width="135" height="135"/></a>
                            <p class="h3  text-muted text-center">{$user['username']}</p>
                        </div>
                        <div class="list-group-item  text-center">
                            <a href="index.php"><strong>原创：{$user['origin']}篇</strong></a>
                        </div>
                        <div class="list-group-item  text-center">
                            <a href="index.php"><strong>转载：{$user['zhuan']}篇</strong></a>
                        </div>
                        <div class="list-group-item  text-center">
                            <a href="index.php" class="btn btn-success btn-sm" style="color:#fff!important;"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;加关注</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="https://15691808595.github.io/" target="_blank" class="btn btn-success btn-sm" style="color:#fff!important;"><i class="fa fa-envelope"></i>&nbsp;&nbsp;github</a>
                        </div>
                    </div>
                </div>
user;

            }
        ?>

    </div>
    <div class="online-contact-container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">文章分类</h3>
            </div>
            <div class="list-group">
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=all"><img src="./img/all.png" alt />&nbsp;&nbsp;&nbsp;所有文章</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=h5"><img src="./img/h5.png" alt />&nbsp;&nbsp;&nbsp;HTML</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=css"><img src="./img/css.png" alt />&nbsp;&nbsp;&nbsp;CSS</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=js"><img src="./img/js.png" alt />&nbsp;&nbsp;&nbsp;Javascript</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=php"><img src="./img/php.png" width="20" alt />&nbsp;&nbsp;&nbsp;PHP</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=mysql"><img src="./img/mysql.png" width="20" alt />&nbsp;&nbsp;&nbsp;mysql</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=server"><img src="./img/server.png" width="20" alt />&nbsp;&nbsp;&nbsp;server</a>
                </div>
                <div class="list-group-item animated article-type">
                    <a href="index.php?type=others"><img src="./img/node.png" alt />&nbsp;&nbsp;&nbsp;others</a>
                </div>
            </div>
        </div>
    </div>
    <div class="site-state-container">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title time">2017-05-13 17:37:19</h3>
            </div>
            <div class="list-group">
                <div class="list-group-item">
                    <a href="#">&nbsp;访问总数：16742169</a>
                </div>
                <div class="list-group-item">
                    <a href="#">&nbsp;文章总数：2458</a>
                </div>
                <div class="list-group-item">
                    <a href="#">&nbsp;评论总数：7880</a>
                </div>
                <div class="list-group-item">
                    <a href="#">&nbsp;会员总数：12772</a>
                </div>
                <div class="list-group-item">
                    <a href="#">&nbsp;在线访客：187</a>
                </div>
                <div class="list-group-item">
                    <a href="#">&nbsp;在线会员：2</a>
                </div>
                <div class="list-group-item">
                    <a href="#">&nbsp;在线记录：268</a>
                </div>
            </div>
        </div>
    </div>
</div>