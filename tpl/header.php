
<nav class="navbar navbar-inverse navbar-fixed-top nav-main">
    <div class="container" >
        <div class="navbar-header">
            <a href="index.php" class="animated navbar-brand my-brand" title="刘伟波的个人博客 &raquo; 刘伟波-天天向上">LOGO</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-responsive" id="my-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="echarts.php" target="_blank">集成图表</a></li>
                <li class="dropdown"><a href="map.php" target="_blank">高德地图</a></li>
                <li class="dropdown"><a href="https://15691808595.github.io/" target="_blank">我的github</a></li>
                <li class="dropdown"><a href="http://47.94.132.72:8084/" target="_blank">node相册</a></li>
                <li class="dropdown"><a href="http://47.94.132.72:8083/" target="_blank">node游戏页面</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right my-login">
                <!-- 通过session动态判断用户是否登录 -->
                <?php
                //判断session是否保存用户名
                if(isset($_SESSION['username'])){
                    //用户已登录，则取出用户名
                    $username = $_SESSION['username'];
                    if($username=="刘伟波"){
                        echo <<<tagName1
                        <li class="right-nav"><a href="admin.php" target="_blank">{$username}</a></li>
                        <li class="right-nav"><a href="logout.php" target="_blank">退出</a></li>
tagName1;
                    }else{
                        echo <<<tagName1
                        <li class="right-nav"><a href="javascript:;">{$username}</a></li>
                        <li class="right-nav"><a href="logout.php" target="_blank">退出</a></li>
tagName1;
                    }

                }else{
                    //未登录
                    echo <<<tagName2
                         <li class="right-nav"><a href="login.php" target="_blank">登录</a></li>
                         <li class="right-nav"><a href="register.php" target="_blank">注册</a></li>
tagName2;
                }
                ?>
            </ul>
        </div>
    </div>
</nav>