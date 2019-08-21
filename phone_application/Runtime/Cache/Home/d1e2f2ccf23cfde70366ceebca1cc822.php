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
				<a href="javascript:;">护士资格 <span class="glyphicon glyphicon-menu-down"></span></a>
			</div>
			<div class="fl center">
				<!--课程-->
			</div>
			<div class="fr right">
				<a href="" class="glyphicon glyphicon-plus"></a>
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="lpk_head">
			<div class="shuliang">
				<span>0</span>
				<p>累计答题数</p>
			</div>
			<ul class="clearfix">
				<li><span>0</span><br />及格次数</li>
				<li><span>0</span><br />累积考试数</li>
				<li><span>0</span><br />平均得分</li>
			</ul>
		</div>
		<div class="lpk_five">
			<ul class="clearfix">
				<li>
					<a href="/yixue/index.php/TkDayOne.html">
						<figure><img src="/yixue/public/home/img/five1.png" /></figure>
						<figcaption>每日一练</figcaption>
					</a>
				</li>
				<li>
					<a href="#">
						<figure><img src="/yixue/public/home/img/five2.png" /></figure>
						<figcaption>错题本</figcaption>
					</a>
				</li>
				<li>
					<a href="/yixue/index.php/TkTopic.html">
						<figure><img src="/yixue/public/home/img/five3.png" /></figure>
						<figcaption>历年真题</figcaption>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<figure><img src="/yixue/public/home/img/five4.png" /></figure>
						<figcaption>押题摸考</figcaption>
					</a>
				</li>
				<li>
					<a href="javascript:;">
						<figure><img src="/yixue/public/home/img/five5.png" /></figure>
						<figcaption>考题收藏</figcaption>
					</a>
				</li>
			</ul>
		</div>
		<div class="lianyi clearfix">
			<span class="fl"><img src="/yixue/public/home/img/tk.png"/></span>
			<p class="fl">章节练习</p>
		</div>
		<div class="lpk_ti">
			<ul class="clearfix">
				<li>
					<a href="/yixue/index.php/TkList.html" class="clearfix">
						<div class="fl left" id="">
							<div id="box" class="box"></div>
						</div>
						<div class="fl center">
							<p class="top">入学测试</p>
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

		<div class="" style="height: 5rem;width: 100%;">
		</div>
		<footer class="clearfix" style="background: white;">
			<div class="fl">
				<a href="<?php echo U('/Tk');?>">
					<span class="tubiao"><img src="/yixue/public/home/img/foot1_1.png"/></span>
					<span class="zi" style="color: #3399fe;">题库</span>
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
					<span class="tubiao"><img src="/yixue/public/home/img/foot4.png"/></span>
					<span class="zi">我的</span>
				</a>
			</div>
		</footer>

	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/cycle.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/home/js/raphael.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var object = document.getElementById('box')
		var object1 = document.getElementById('box1')
		function loadImg(data,name) {
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
		loadImg(50,object)
		loadImg(90,object1)
	</script>

</html>