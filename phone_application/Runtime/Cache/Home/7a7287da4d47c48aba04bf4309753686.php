<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta="format-detection" content="telephone=no">
			<meta nnameame="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="black">
			<meta name="format-detection" content="telephone=no">
			<title>个人信息</title>
			<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
			<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
			<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
			<link rel="stylesheet" type="text/css" href="/yixue/public/js/layer/mobile/layer.css" />
	</head>

	<body style='background:white;'>
		<header class="clearfix" >
			<div class="fl left">
				<a href="javascript:history.go(-1);"> <span class="glyphicon glyphicon-remove" ></span></a>
			</div>
			<div class="fl center">
				密码登录
			</div>
			<div class="fr right" id="">
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="denglu">
			<form action="" method="post">
				<div class="">
					<input type="text" name="name" id="name" value="" placeholder="请输入账号" />
				</div>
				<div class="">
					<input type="password" name="password" id="password" value="" placeholder="请输入密码" />
				</div>
				<button class="login">登录</button>
			</form>
		</div>
	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript"></script>
	<script src="/yixue/public/js/layer/mobile/layer.js" type="text/javascript"></script>
	<script type="text/javascript">
		// $(function(){
			$(".login").click(function(){
				var name=$("#name").val();
				var password=$("#password").val();
				if(name.length<6){
					layer.open({
					    content: '请输入6-12位的账号',
					    skin: 'msg',
					    time: 2 //2秒后自动关闭
					});
				}else if(password.length<6){
					layer.open({
					    content: '请输入6位以上的密码',
					    skin: 'msg',
					    time: 2 //2秒后自动关闭
					});
				}else{
					$.ajax({
						url:"/yixue/index.php/Login/dispose",
						type:"post",
						data:{name:name,password:password},
						success:function(data){
							if(data=='ok'){
								layer.open({
								    content: '登陆成功',
								    skin: 'msg',
								    time: 2 //2秒后自动关闭
								});
								window.location.href="/yixue/index.php/Me.html";
							}else if(data=='error'){
								layer.open({
								    content: '账号和密码不匹配',
								    skin: 'msg',
								    time: 2 //2秒后自动关闭
								});
							}else if(data=='kong'){
								layer.open({
								    content: '账号和密码不能为空',
								    skin: 'msg',
								    time: 2 //2秒后自动关闭
								});
							}
						}
					})
				}
				return false;
			})
		// });
	</script>


</html>