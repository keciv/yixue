<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title></title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/common.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
		
					
	</head>
	
	<body>
		<header class="clearfix">
			<div class="fl left">
				
				<a href="javascript:;">
					<select name="" style="width: 50%; border:none; background-color: transparent; appearance:none;-moz-appearance:none;-webkit-appearance:none; outline: none;">
						<?php if(is_array($special)): $i = 0; $__LIST__ = $special;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): $mod = ($i % 2 );++$i;?><option value=""  style="color:black; font-size: 1.2rem; position: absolute;left: 0.5rem;"><?php echo ($special["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					
					<span class="glyphicon glyphicon-menu-down"></span>
				</a>
				
			</div>
			<div class="fl center">
				课程
			</div>
			<div class="fr right">
				<a href="" class="glyphicon glyphicon-plus"></a>
				<!--没有登录则进入登录页面 denglu.html   登录后则进入 消息页面 xiaoxi.html-->
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>

		<div id="slides" class="slider-focus">
			<div class="bd">
				<ul>
					<li>
						<a href="" style="display: block;width: 100%;height: 100%;"><img src='/yixue/public/home/img/banner.png' /></a>
					</li>
				</ul>
			</div>
			<div class="hd">
				<ul>
				</ul>
			</div>
		</div>
		<div class="course clearfix">
			<div class="fl left">
				付费课
			</div>
			<div class="fr right">
				<a href="/yixue/index.php/SfClass.html">更多<span class="glyphicon glyphicon-menu-right"></span></a>
			</div>
		</div>
		<div class="pay clearfix">
			<?php if(is_array($allClass["fufei"])): $i = 0; $__LIST__ = $allClass["fufei"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fufei): $mod = ($i % 2 );++$i;?><a href="/yixue/Video/index?id=<?php echo ($fufei["id"]); ?>&chapter=<?php echo ($first["id"]); ?>& aa= 0" class="fl">
					<div class="">
						<img src="/yixue<?php echo ($fufei["imageurl"]); ?>" />
					</div>
					<p><?php echo ($fufei["class_title"]); ?></p>
					<div class="clearfix">
						<div class="fl">
							￥<?php echo ($fufei["price"]); ?>
						</div>
						<div class="fr">
							<?php echo ($fufei["num"]); ?>人正在学习
						</div>
					</div>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<div class="course clearfix" style="margin: 1rem auto 0;border-top: 0.1rem solid #cfcfcf;">
			<div class="fl left">
				公开课
			</div>
			<div class="fr right">
				<a href="/yixue/index.php/GkClass.html">更多<span class="glyphicon glyphicon-menu-right"></span></a>
			</div>
		</div>
		<div class="course_video clearfix">
			<?php if(is_array($allClass["gk"])): $i = 0; $__LIST__ = $allClass["gk"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gk): $mod = ($i % 2 );++$i;?><div class="fl left">
					<a href="/yixue/Video/index?id=<?php echo ($gk["id"]); ?>&chapter=<?php echo ($first["id"]); ?>& aa= 0">
						<img src="/yixue<?php echo ($gk["imageurl"]); ?>" />
						<div class="course_video_posi">
							<h5 class=""><span><?php echo ($gk["num"]); ?></span>人在学习</h5>
							<h4 class="">8月20日 19:20-20:40</h4>
							<p class="clearfix">
								<span class="fl left">07日 19:20</span>
								<span class="fr right">回放</span>
							</p>
						</div>
					</a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="course clearfix" style="margin: 1rem auto 0;border-top: 0.1rem solid #cfcfcf;">
			<div class="fl left">
				免费课
			</div>
			<div class="fr right">
				<a href="/yixue/index.php/MfClass.html">更多<span class="glyphicon glyphicon-menu-right"></span></a>
			</div>
		</div>
		<div class="free clearfix">
			<?php if(is_array($allClass["mf"])): $i = 0; $__LIST__ = $allClass["mf"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mf): $mod = ($i % 2 );++$i;?><a href="/yixue/Video/index?id=<?php echo ($mf["id"]); ?>&chapter=<?php echo ($first["id"]); ?>& aa= 0" class="fl">
					<div class="free_main" value="<?php echo ($mf["class_type"]); ?>">
						<h4>2018</h4>
						<h3>护士资格考试</h3>
						<h5>[ 往期回顾 ]</h5>
					</div>
					<p><?php echo ($mf["class_title"]); ?></p>
					<span><?php echo ($mf["num"]); ?>人正在学习</span>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>


		</div>
		<div class="" style="height: 5rem;width: 100%;">

		</div>

		<footer class="clearfix" style="background: white;">
		    <div class="fl">
		      <a href="<?php echo U('/Tk');?>">
		        <span class="tubiao"><img src="/yixue/public/home/img/foot1.png"/></span>
		        <span class="zi">题库</span>
		      </a>
		    </div>
		    <div class="fl">
		      <a href="<?php echo U('index/index');?>">
		        <span class="tubiao"><img src="/yixue/public/home/img/foot2-2.png"/></span>
		        <span class="zi" style="color: #3399fe;">课程</span>
		      </a>
		    </div>
		    <div class="fl">
		      <a href="javascript:void(0);">
		        <span class="tubiao"><img src="/yixue/public/home/img/foot3.png"/></span>
		        <span class="zi">咨询 </span>
		      </a>
		    </div>
		    <div class="fl">
		      <a href="<?php echo U('Me/index');?>">
		        <span class="tubiao"><img src="/yixue/public/home/img/foot4.png"/></span>
		        <span class="zi" >我的</span>
		      </a>
		    </div>
  		</footer>

  	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/TouchSlide.1.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/list.js" type="text/javascript" charset="utf-8"></script>
	<script>

	</script>

	</body>

</html>