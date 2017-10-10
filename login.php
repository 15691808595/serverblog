<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--确保IE浏览器始终以最新的引擎渲染页面-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>登录</title>
	<!--引入bootstrap css样式文件-->
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/global.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="shortcut icon" href="./img/favicon.ico">
	<!--引入html5shiv.js 和 respond.js 是IE8支持HTML5新标签和媒体查询-->
	 <!--[if lt IE 9]>
		<script src="./js/html5shiv.js"></script>
		<script src="./js/respond.js"></script>
    <![endif]-->
    <style>

        @media (max-width: 768px) {
            .main-container{
                padding-top:80px;
            }
        }
    </style>
</head>
<body>
	<?php
		include_once "./tpl/modal.php";
		include_once "./tpl/header.php";
	?>
	<div class="container main-container animated bounceInRight">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 login-form">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">用户登录</h2>
						</div>
						<div class="panel-body">
							<form action="checkLogin.php" method="post" class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-sm-2">用户名</label>
									<div class="col-sm-10">
										<input type="text" name="username" class="form-control" placeholder="请输入用户名...">
									</div>
								</div>
								<div class="form-group">
									<label  class="control-label col-sm-2">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
									<div class="col-sm-10">
										<input type="password" name="password" class="form-control" placeholder="请输入密码...">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<div class="checkbox">
											<label>
												<input name="isRemember" type="checkbox">记住密码
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">	
										<button id="submit" class="btn btn-success" type="sbumit">登录</button>
										<button class="btn btn-danger">忘记密码？</button>
									</div>
								</div>
							</form>
						</div>
					</div>
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
	<script src="./js/login.js"></script>
</body>
</html>