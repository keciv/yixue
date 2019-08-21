<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>ti</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
	</head>

	<body style="background: white;">
		<header class="clearfix" style="z-index: 1000;">
			<div class="fl left">
				<a href="/yixue/index.php/Me.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				我的课程
			</div>
			<div class="fr right">
				<a href="/yixue/index.php/Kebiao.html">课表</a>
			</div>
		</header>
		<div type="text/css" style="height: 10.2rem;"></div>
		<div class="ck_togg clearfix">
			<div class="fl">
				<a href="javascript:;" class="ck_toggcolor">免费课程</a>
			</div>
			<div class="fl">
				<a href="javascript:;">付费课程</a>
			</div>
		</div>
		<div class="ck_togg_main">
			<ul class="" style="display: block;">
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix" onclick="var id = "<?php echo ($vo["id"]); ?>";location.href='<?php echo U('/Video?id="+id+"');?>'">
						<div class="fl left">
							<img src="/yixue/public/home/img/m1.png" />
						</div>
						<div class="fr right">
							<h3><?php echo ($vo["class_title"]); ?></h3>
							<!-- <p>3天前</p> -->
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<ul class="" style="text-align: center;" id="my-fulist">
				<img src="/yixue/public/home/img/cknull.png" />
			</ul>
		</div>
	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$('.ck_togg div a').click(function(){
			$(this).addClass('ck_toggcolor').parent().siblings().children().removeClass('ck_toggcolor')
			var index=$('.ck_togg div a').index(this);
			$('.ck_togg_main>ul').eq(index).show().siblings().hide()
		})
	</script>
	<script>
		$(function(){
			$.ajax({
				type:"get",
				url:"<?php echo U('myClass/fufei_class');?>",
				success:function(data){
					var html='';
					data.forEach(item => {
		    			html += `
		    				<li class="clearfix">
								<div class="fl left">
									<img src="/yixue/public/home/img/m1.png" />
								</div>
								<div class="fr right">
									<h3>${item.class_title}</h3>
								</div>
							</li>
		    			`;
		    		});
		    		$("#my-fulist").empty().html(html);
				}
			});
		})
	</script>

</html>