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
		<header class="clearfix" style="z-index: 1000;">
			<div class="fl left">
				<a href="/yixue/index.php/Me.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				设置
			</div>
			<div class="fr right" id="bainji1">
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="s_zhi">
			<form action="" method="post">
				<ul>
					<li>
						<a href="/yixue/index.php/EditPassword.html" style="border-bottom: 0.5px solid #ccc;">修改密码 <span class="fr glyphicon glyphicon-menu-right"></span></a>
					</li>
					<!--<li class="qing">
						<a href="javascript:;">清除缓存 <span class="fr">3.71MB</span></a>
					</li>-->
					<!--<li class="banbeng">
						<a href="javascript:;" style="border-bottom: 0.5px solid #ccc;">版本信息 <span class="fr">5.2.2</span></a>
					</li>-->
					<li>
						<a href="/yixue/index.php/Danye_44.html" style="border-bottom: 0.5px solid #ccc;">使用说明 <span class="fr glyphicon glyphicon-menu-right"></span></a>
					</li>
					<li>
						<a href="/yixue/index.php/Idea.html" style="border-bottom: 0.5px solid #ccc;">意见反馈 <span class="fr glyphicon glyphicon-menu-right"></span></a>
					</li>
					<li>
						<a href="/yixue/index.php/Question.html" style="border-bottom: 0.5px solid #ccc;">疑问反馈 <span class="fr glyphicon glyphicon-menu-right"></span></a>
					</li>
					<li>
						<a href="/yixue/index.php/About.html">关于我们 <span class="fr glyphicon glyphicon-menu-right"></span></a>
					</li>
				</ul>
				<button class="tui_btn">退出登录</button>
			</form>
		</div>
		<div class="tishi tishi2" style="">
			<div class="tishi_posi" style="background: white;">
				<p>确认浮空缓存</p>
				<div class=" clearfix">
					<div class="fl left" style="border-right: 1px solid #ccc;">
						是
					</div>
					<div class="fl left">
						否
					</div>
				</div>
			</div>
		</div>
		<div class="tishi tishi1">
			<div class="tishi_posi" style="background: white;">
				<p>当前以是最新版本</p>
			</div>
		</div>

	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/js/layer/mobile/layer.js" type="text/javascript"></script>
	<script type="text/javascript">
		var heigh1t = $('.tishi_posi').height();
		//		$('.tishi_posi').height(heigh1t);
		var martop = heigh1t / 2
		$('.tishi_posi').css('margin-top', -martop);
		$('.qing').click(function() {
			$('.tishi2').show();
		})
		$('.tishi .tishi_posi .clearfix .left').click(function() {
			$('.tishi2').hide();
		})

		$('.banbeng').click(function() {
			$('.tishi1').show();
			setTimeout(function() {
				$('.tishi1').fadeOut();
			}, 1000);

		})

		$('.tui_btn').click(function(){
			var out="1";
			$.ajax({
				url:'/yixue/index.php/Login/login',
				type:"post",
				data:{out : out},
				success : function (data){
					if(data=='ok'){
						layer.open({
						    content: '退出成功',
						    skin: 'msg',
						    time: 2 //2秒后自动关闭
						});
						location.href="/yixue/index.php/Login/index";
					}
				}
			})
			return false;
		})
	</script>

</html>