<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>sc</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
	</head>

	<body>
		<header class="clearfix">
			<div class="fl left">
				<a href="/yixue/index.php/MeSet.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				意见反馈
			</div>
			<div class="fr right" id="bainji1">
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="yi_jain">
			<form>
				<textarea name="content" rows="" cols="" placeholder="请填写您的意见" id="textarea"></textarea>
				<p>还可输入200个字</p>
				<button class="mima">提交反馈</button>
			</form>
		</div>
	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/js/layer/mobile/layer.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(".mima").click(function(){
			var len=$("#textarea").val();
			if(len.length<1){
				layer.open({
				    content: '内容不能为空',
				    skin: 'msg',
				    time: 2 //2秒后自动关闭
				});
			}else{
				$.ajax({
					url:"/yixue/index.php/Idea/add",
					data:{content:len},
					type:"post",
					success:function(data){
						if(data=='ok'){
							layer.open({
							    content: '提交成功',
							    skin: 'msg',
							    time: 2 //2秒后自动关闭
							});
							location.href="/yixue/index.php/MeSet.html";
						}else if(data=='error'){
							layer.open({
							    content: '提交失败',
							    skin: 'msg',
							    time: 2 //2秒后自动关闭
							});
						}else{
							layer.open({
							    content: '内容不能为空',
							    skin: 'msg',
							    time: 2 //2秒后自动关闭
							});
						}
					}
				})
			}
			return false;
		})
	</script>

</html>