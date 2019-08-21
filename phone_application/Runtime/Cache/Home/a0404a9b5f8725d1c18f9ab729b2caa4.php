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
		<link rel="stylesheet" type="text/css" href="/yixue/public/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/css/index.css" />
	</head>

	<body>
		<header class="clearfix" style="z-index: 1000;">
			<div class="fl left">
				<a href="/yixue/index.php/Tk.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				每日一练
			</div>
			<div class="fr right">
				<a href="j_false.html">纠错</a>
			</div>
		</header>
		<div style="height: 15rem;" id="lpk"></div>

		<div class="biaoti clearfix">
			<div class="fl left">
				单选题
			</div>
			<div class="right fr">
				<span>1</span>/20
			</div>
		</div>

		<!--切换-->
		<!--题-->
		<div class="_ti">
			<!--所有题-->
			<div class="_ti_list clearfix">
				<!--每一道-->
				<div class="_ti_list_">
					<div class="timu_info">
						1.年经恒牙深龋最常用的治疗方法是
					</div>
					<div class="">
						<div class="abcd">
							<ul class="">
								<li class="clearfix">
									<p class="p1 fl">A</p>
									<p class="fl p2">医生的行为使某个患者受益，但却给别的患者带来了损害</p>
									<p class="fr glyphicon glyphicon-ok p3"></p>
								</li>
								<li class="clearfix">
									<p class="p1 fl">B</p>
									<p class="fl p2">医生的行为使某别的患者带来了损害</p>
									<p class="fr glyphicon glyphicon-ok p3"></p>
								</li>
								<li class="clearfix">
									<p class="p1 fl">C</p>
									<p class="fl p2">医生的行为使某别的患者带来了损害</p>
									<p class="fr glyphicon glyphicon-ok p3"></p>
								</li>
								<li class="clearfix">
									<p class="p1 fl">D</p>
									<p class="fl p2">医生的行为使某别的患者带来了损害</p>
									<p class="fr glyphicon glyphicon-ok p3"></p>
								</li>
							</ul>
						</div>
						<!--点击错误 会出来-->
						<div class="jianxi" style="display: none;">
							<h3>正解答案是B,您的答案是A</h3>
							<h4>解析</h4>
							<p>略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略略</p>
						</div>
						<!--<p class="my">
							我也是有底线的
						</p>-->
						<div class="shang_x">
							<div class="fl">
								<a href="javascript:;">上一题</a>
							</div>
							<div class="fl">
								<a href="javascript:;">下一题</a>
							</div>
						</div>
					</div>
				</div>
				<!--每一道完-->
			</div>
			<!--所有题完-->
		</div>
		<!--题完-->
		<!--切换完-->
		<div class="" style="height: 5rem;width: 100%;"></div>
		<div class="lpk_f clearfix">
			<div class="fl left">
				<span class="glyphicon glyphicon-star-empty" style="font-size: 2.4rem;"></span><br />
				<span>收藏</span>
			</div>
			<div class="fr right" id="over">
				<span class="glyphicon glyphicon-th-large" style="font-size: 2.4rem;"></span><br />
				<span>1/20</span>
			</div>
		</div>
		<div class="menu">
			<div class="to"></div>
			<div class="bo">
				<div class="menu_one clearfix">
					<div class="fl left">
						正确<span>0</span>错误<span>0</span>
					</div>
					<div class="fr right">
						<span class="glyphicon glyphicon-th-large" style="font-size: 2.4rem;color: #3399FE;"></span>
						<span style="margin-left: 0.5rem;">1/20</span>
					</div>
				</div>
				<div class="menu_two">
					<div class="fl left">
						每日一练
					</div>
					<div class="fr right">
						<span class="glyphicon glyphicon-trash" style="font-size: 1.6rem;"></span>
						<span style="margin-left: 0.5rem;">删除</span>
					</div>
				</div>
				<div class="menu_three">
					<div class="fl left">
						单选题
					</div>
				</div>
				<div class="menu_main clearfix">
					<a href="">1</a>
					<a href="">2</a>
					<a href="">3</a>
					<a href="">4</a>
					<a href="">5</a>
					
				</div>
				<div class="lpk_fo clearfix">
					<div class="fl le" style="border-right: 0.5px solid #F2F2F2;">
						<a href="javascript:;">错题解析</a>
					</div>
					<div class="fl ri">
						<a href="javascript:;">全部解析</a>
					</div>
				</div>
			</div>

		</div>
		
		<!--如果退出考试时出来--> 
		<div class="fx" style="z-index: 1000;">
			<div class="fx_btn1">
				<h3>答题尚未完成确定现在交卷？</h3>
				<p>
					<a href="javascript:;" style="border-right: 0.5px solid #999;" class="xiao">继续答题</a>
					<a href="javascript:;" >现在交卷</a>
				</p>
			</div>
		</div>
	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/js/TouchSlide.1.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/js/tiku.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var lpk2 = window.screen.height;
		$('.fx').height(lpk2);
		$('.fx_btn1 .xiao').click(function(){
			$('.fx').hide();
			
		})
	</script>
	<script type="text/javascript">
		var scrwidth = window.screen.width;
		$('._ti').width(scrwidth);
		$('._ti_list_').width(scrwidth);
		var divlist = $('._ti_list>div');
		var divnum = scrwidth * divlist.length;
		$('._ti_list').width(divnum);
		var divheight = $('._ti_list').height();
		//		console.log(divheight)
	</script>
	<!--<script>
		var aLi = document.querySelectorAll("_ti_list_");
		var box = document.querySelector('._ti_list');
		var wrap = document.querySelector('._ti');
		var aLiWidth = box.offsetWidth;
		wrap.style.height = divheight;
		// 设置盒子的宽度
		box.style.width = scrwidth;
		for(var i = 0; i < aLi.length; i++) {
			aLi[i].style.width = 1 / aLi.length * 100 + '%';
		};
		// 初始化手指坐标点
		var startPoint = 0;
		var startEle = 0;
		//手指按下
		wrap.addEventListener("touchstart", function(e) {
			startPoint = e.changedTouches[0].pageX;
			startEle = box.offsetLeft;
		});
		//手指滑动
		wrap.addEventListener("touchmove", function(e) {
			var currPoint = e.changedTouches[0].pageX;
			var disX = currPoint - startPoint;
			var left = startEle + disX;
			box.style.left = left + 'px';
		});
		//当手指抬起的时候，判断图片滚动离左右的距离，当
		wrap.addEventListener("touchend", function(e) {
			var left = box.offsetLeft;
			// 判断正在滚动的图片距离左右图片的远近，以及是否为最后一张或者第一张
			var currNum = Math.round(-left / aLiWidth);
			currNum = currNum >= (aLi.length - 1) ? aLi.length - 1 : currNum;
			currNum = currNum <= 0 ? 0 : currNum;
			box.style.left = -currNum * wrap.offsetWidth + 'px';
		})
	</script>-->

</html>