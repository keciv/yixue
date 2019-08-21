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
				做题记录
			</div>
			<div class="fr right">
				<a href="javascript:;" id="" class="bainji">编辑</a>
			</div>
		</header>
		<div type="text/css" style="height: 10.2rem;"></div>

		<div class="ck_togg clearfix">
			<div class="fl">
				<a href="javascript:;" class="ck_toggcolor">练习记录</a>
			</div>
			<div class="fl">
				<a href="javascript:;">考试记录</a>
			</div>
		</div>
		<div class="ck_togg_main jilu">
			<ul class="" style="display: block;">
				<li class="clearfix">
					<h4 class="">2018-08-24</h4>
					<div class="jilu_main clearfix">
						<div class="fl lpk_l">
							<input type="checkbox" name="" id="" value="" class="lpkinput" />
						</div>
						<div class="fr lpk_r">
							<div class="clearfix" style="margin-bottom: 0.5rem;">
								<div class="fl l_l">
									每日一练
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">继续答题</a>
								</div>
							</div>
							<div class="clearfix">
								<div class="fl l_l">
									<span style="color: orangered;">0</span>/20题
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">重新答题</a>
								</div>
							</div>
						</div>
					</div>

				</li>
				<li class="clearfix">
					<h4 class="">2018-08-24</h4>
					<div class="jilu_main clearfix">
						<div class="fl lpk_l">
							<input type="checkbox" name="" id="" value="" class="lpkinput" />
						</div>
						<div class="fr lpk_r">
							<div class="clearfix" style="margin-bottom: 0.5rem;">
								<div class="fl l_l">
									每日一练
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">继续答题</a>
								</div>
							</div>
							<div class="clearfix">
								<div class="fl l_l">
									<span style="color: orangered;">0</span>/20题
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">重新答题</a>
								</div>
							</div>
						</div>
					</div>
					<div class="jilu_main clearfix">
						<div class="fl lpk_l">
							<input type="checkbox" name="" id="" value="" class="lpkinput" />
						</div>
						<div class="fr lpk_r">
							<div class="clearfix" style="margin-bottom: 0.5rem;">
								<div class="fl l_l">
									每日一练
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">继续答题</a>
								</div>
							</div>
							<div class="clearfix">
								<div class="fl l_l">
									<span style="color: orangered;">0</span>/20题
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">重新答题</a>
								</div>
							</div>
						</div>
					</div>

				</li>
			</ul>

			<ul class="">
				<li class="clearfix">
					<h4 class="">2018-08-24 18:11:56</h4>
					<div class="jilu_main clearfix">
						<div class="fl lpk_l">
							<input type="checkbox" name="" id="" value="" />
						</div>
						<div class="fr lpk_r">
							<div class="clearfix" style="margin-bottom: 0.5rem;">
								<div class="fl l_l">
									每日一练
								</div>
								<div class="fr l_r">
									<a href="jvaascript:;">继续答题</a>
									<!--进入考试-->
								</div>
							</div>
							<div class="clearfix">
								<div class="fl l_l">
									<span><img src="/yixue/public/home/img/time.png"/></span>01:29:58
								</div>

							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<!--点重新答题出来-->
		<div class="tishi">
			<div class="tishi_posi">
				<p>你一共做了5道题，做对1道，做错4道，您确定清空该试卷所有做的记录？</p>
				<div class=" clearfix">
					<div class="fl left" style="border-right: 1px solid #ccc;">
						取消
					</div>
					<div class="fl left">
						确定
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix quan_del">
			<div class="fl quan" style="border-right: 1px solid #ccc;" id="quan">全选</div>
			<div class="fr">
				确认删除
			</div>
		</div>

	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(".quan").click(function() {
			var a = $(this).text();
			if(a == '全选') {
				$("#quan").text('反选')
				$(".lpkinput").prop('checked', true)

			} else {
				$(".lpkinput").removeAttr("checked")
				$(".quan").text("全选");

			}
		})
	</script>

	<script type="text/javascript">
		$('.ck_togg div a').click(function() {
			$(this).addClass('ck_toggcolor').parent().siblings().children().removeClass('ck_toggcolor')
			var index = $('.ck_togg div a').index(this);
			$('.ck_togg_main>ul').eq(index).show().siblings().hide()
		})
		$('.bainji').click(function() {
			$('.jilu ul li .jilu_main .lpk_l').toggle();
			$('.quan_del').toggle();

		})
		var heigh1t = $('.tishi_posi').height();
		$('.tishi_posi').height(heigh1t);
		var martop = heigh1t / 2
		$('.tishi_posi').css('margin-top', -martop);
		$('.tishi_posi .left').click(function() {
			$('.tishi').hide();
		})
	</script>

</html>