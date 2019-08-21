<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>我的</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
	</head>

	<body>
		<header class="clearfix">
			<div class="fl left">
				<a href="/yixue/index.php/Tk.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				入学测试
			</div>
			<div class="fr right">
				<!--<a href="" class="glyphicon glyphicon-plus"></a>-->
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="lpk_ti">
			<ul class="clearfix">
				<li>
					<a href="javascript:;" class="clearfix">
						<div class="fl left" id="">
							<div id="box" class="box"></div>
						</div>
						<div class="fl center">
							<p class="top">口腔助理医师入学测试</p>
							<p class="bot">共1张试卷</p>
						</div>
						<div class="fr right">
							<span class="glyphicon glyphicon-menu-right"></span>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="clearfix">
						<div class="fl left" id="">
							<div id="box1" class="box"></div>
						</div>
						<div class="fl center">
							<p class="top">医学人文</p>
							<p class="bot">共3张试卷</p>
						</div>
						<div class="fr right">
							<span class="glyphicon glyphicon-menu-right"></span>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/cycle.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/raphael.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var object = document.getElementById('box')
		var object1 = document.getElementById('box1')

		function loadImg(data, name) {
			var i = 0;
			setInterval(function() {
				i++
				if(i > data) {
					i = data
				}
				var imgLeft = -(i * 44 + (i * 10)) + 'px'
				name.style.backgroundPosition = imgLeft + '\t' + '0px'
				name.innerHTML = i + '%';
			}, 50)

		}
		loadImg(50, object)
		loadImg(90, object1)
	</script>

</html>