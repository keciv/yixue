<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>info</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.eot" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.svg" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.ttf" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.woff" />
		<style>
			.row {
				padding: 20px 0 0 20px;
			}

			.row-pad {
				padding: 20px 0 0 60px;
			}
		</style>
	</head>

	<body>
		<div class="info_head clearfix">
			<a href="/yixue/index.php/MeInfo.html">
				<!--登录成功之后进入   gr_info.html-->
				<div class="fl left">
					<div class="touxiang">
						<img src="/yixue/<?php echo ($user["photo"]); ?>" />
					</div>
				</div>
				<div class="fl center">
					<?php echo ($info["nickname"]); ?>
				</div>
				<div class="fr right">
					<span class="glyphicon glyphicon-menu-right"></span>
				</div>
			</a>
		</div>

		<div class="lpk_five lpkfive_info">
			<ul class="clearfix">
				<li>
					<a href="/yixue/index.php/Huancun.html">
						<figure><img src="/yixue/public/home/img/info1.png" /></figure>
						<figcaption>缓存</figcaption>
					</a>
				</li>
				<li>
					<a href="/yixue/index.php/Collect.html">
						<figure><img src="/yixue/public/home/img/info2.png" /></figure>
						<figcaption>收藏</figcaption>
					</a>
				</li>
				<li>
					<a href="tel://10086">
						<figure><img src="/yixue/public/home/img/info3.png" /></figure>
						<figcaption>客服</figcaption>
					</a>
				</li>
			</ul>
		</div>

		<div class="info_list">
			<ul class="clearfix">
				<li>
					<a href="/yixue/index.php/MyClass.html" class="clearfix">
						<div class="fl left">
							<span class=""><img src="/yixue/public/home/img/i2.png"/></span>
						</div>
						<div class="fl right">
							我的课程 <span class="glyphicon glyphicon-menu-right fr"></span>
						</div>
					</a>
				</li>
				<li>
					<a href="/yixue/index.php/Jilu.html" class="clearfix">
						<div class="fl left">
							<span class=""><img src="/yixue/public/home/img/i1.png"/></span>
						</div>
						<div class="fl right">
							做题记录 <span class="glyphicon glyphicon-menu-right fr"></span>
						</div>
					</a>
				</li>

			</ul>
			<ul class="clearfix">
				<!--<li class="yao">
					<a href="javascript:;" class="clearfix">
						<div class="fl left">
							<span class=""><img src="img/i3.png"/></span>
						</div>
						<div class="fl right">
							邀请好友 <span class="glyphicon glyphicon-menu-right fr"></span>
						</div>
					</a>
				</li>-->
				<li>
					<a href="/yixue/index.php/MeSet.html" class="clearfix">
						<div class="fl left">
							<span class=""><img src="/yixue/public/home/img/i4.png"/></span>
						</div>
						<div class="fl right">
							设置 <span class="glyphicon glyphicon-menu-right fr"></span>
						</div>
					</a>
				</li>

			</ul>
		</div>
		<!--<div class="yaohide">
			<div class="yaohide1">

			</div>
			<div class="row yaohiderow">
				<div id="share-4"></div>
			</div>
		</div>-->
		<footer class="clearfix" style="background: white;">
			<div class="fl">
				<a href="<?php echo U('Tk/index');?>">
					<span class="tubiao"><img src="/yixue/public/home/img/foot1.png"/></span>
					<span class="zi">题库</span>
				</a>
			</div>
			<div class="fl">
				<a href="<?php echo U('index/index');?>">
					<span class="tubiao"><img src="/yixue/public/home/img/foot2.png"/></span>
					<span class="zi" >课程</span>
				</a>
			</div>
			<div class="fl">
				<a href="javascript:;">
					<span class="tubiao"><img src="/yixue/public/home/img/foot3.png"/></span>
					<span class="zi">咨询 </span>
				</a>
			</div>
			<div class="fl">
				<a href="<?php echo U('/Me/index');?>">
					<span class="tubiao"><img src="/yixue/public/home/img/foot4-4.png"/></span>
					<span class="zi"style="color: #3399fe;">我的</span>
				</a>
			</div>
		</footer>
	    </body>
		<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/js/jquery.share.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$('#share-4').share({
				sites: ['wechat', 'qq', 'weibo', 'qzone', ]
			});

			var lpk2 = window.screen.height;
			$('.yaohide1').height(lpk2 - 52);

			$('.yao').click(function() {
				$('.yaohide').show();
			})

			$('.yaohide1').click(function() {
				$('.yaohide').hide();
			})
		</script>

</html>