<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--确保IE浏览器始终以最新的引擎渲染页面-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<!--确保页面在移动端下保持页面窗口大小设备视口大小，初始页面缩放比例1-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<title>登录</title>
	<!--引入bootstrap css样式文件-->

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/global.css">
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

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="./js/common.js"></script>
	<script src="./js/login.js"></script>
</body>
</html>