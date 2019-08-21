<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	 \<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>公开课</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
		<script>
			var url = "<?php echo U('GkClass/returnGkData');?>";
		</script>
	</head>

	<body>
		<div class="head clearfix">
			<div class="fl left">
				<a class="glyphicon glyphicon-chevron-left" href="/yixue/index.php/index.html"></a>
			</div>
			<div class="fl center">
				公开课列表
			</div>
		</div>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="" id="wrapper">
			<div class="course_video clearfix lpkgd" id="gkklist" style="padding: 1.5rem 0;">
			</div>
		</div>
	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/list.js"></script>
	
	<script>
					
		gkklist.gkklist();
	</script>

</html>