<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>huancun</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
	</head>
	<!--页面有毛病-->
	<body style="background: #fafafa;">
		<header class="clearfix" style="z-index: 1000;">
			<div class="fl left">
				<a href="/yixue/index.php/Me.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				离线缓存
			</div>
			<div class="fr right">
			</div>
		</header>
		<div class="" style="height: 5rem;width: 1005;"></div>

		<div class="lixian">
			<h3>下载中</h3>
			<div class="">
				<a href="<?php echo U('Huancun/index1');?>" class="clearfix">
					<div class="fl left">
						<img src="/yixue/public/home/img/vie.png" />
						<span><?php echo ($download_no); ?></span>
					</div>
					<div class="fl right">
						剩余<?php echo ($download_no); ?>个视频
					</div>
				</a>
			</div>
		</div>

		<div class="wanc">
			<h3>已完成</h3>
			<div class="wanc_main">
				<p style="font-size: 2.0rem;"><?php echo ($download_ok); ?></p>	
			</div>
		</div>

		<div class="vie_jd">

		</div>
		<div class="vie_jd1">
			总容量：10G，可用容量：2G
		</div>

	</body>

</html>