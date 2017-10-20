
<nav class="navbar navbar-inverse navbar-fixed-top nav-main">
    <div class="container" >
        <div class="navbar-header">
            <a href="index.php" target="_parent" class="animated navbar-brand my-brand logoname " title="刘伟波的个人博客 &raquo; 刘伟波-天天向上">LWB</a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-collapse-responsive" id="my-collapse">
            <ul class="nav navbar-nav" style="margin-left: 30px">
                <li class="dropdown"><a href="index.php">网站首页</a></li>
                <li class="dropdown"><a href="blog.php">前端技术</a></li>
                <li class="dropdown"><a href="life.php">生活与创作</a></li>
                <li class="dropdown"><a href="contact.php">建议与反馈</a></li>
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
                        <li class="right-nav"><a href="admin.php" >{$username}</a></li>
                        <li class="right-nav"><a href="logout.php" >退出</a></li>
tagName1;
                    }else{
                        echo <<<tagName1
                        <li class="right-nav"><a href="javascript:;">{$username}</a></li>
                        <li class="right-nav"><a href="logout.php" >退出</a></li>
tagName1;
                    }

                }else{
                    //未登录
                    echo <<<tagName2
                         <li class="right-nav"><a href="login.php" >登录</a></li>
                         <li class="right-nav"><a href="register.php" >注册</a></li>
tagName2;
                }
                ?>
            </ul>
        </div>
    </div>
</nav>