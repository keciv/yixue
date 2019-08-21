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
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/css/share.min.css" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.eot" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.svg" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.ttf" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/social-share.js/1.0.16/fonts/iconfont.woff" />
		<script src="/yixue/Public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/yixue/Public/home/js/list.js"></script>
		<script>
			$.ajax({
				url: "<?php echo U('MfClass/mfClass_type');?>",
				type: "get",
				success: function(data) {
					//console.log(data);
					var html = '';
					data.forEach(item => {
						html += '<li myid="' + item.id + '";><a href="javascript:;">' + item.type_name + '</a></li>';
					});
					$(".nav>ul").append(html);
					$(".nav li").eq(0).nextAll().click(function() {
						$(".loadover").remove();
						var myid = $(this).attr("myid");
						var url = "<?php echo U('MfClass/mfClass_typeClass');?>";
						$(this).siblings().find("a").removeClass("video_nr_bg");
						$(this).find("a").addClass("video_nr_bg");
						$("#mflist").empty();
						mflist.myid = myid;
						mflist.url = url;
						mflist.mflist(myid, url);
					})
				}
			})
		</script>
	</head>

	<body>
		<div class="head clearfix">
			<div class="fl left">
				<a class="glyphicon glyphicon-chevron-left" href="/yixue/index.php/index.html"></a>
			</div>
			<div class="fl center">
				免费课程
			</div>
		</div>
		<div type="text/css" style="height: 5rem;"></div>
		<div class="nav">
			<ul class="clearfix">
				<li myid="0">
					<a href="javascript:;" class="video_nr_bg">全部</a>
				</li>
			</ul>
		</div>
		<div id="wrapper">
			<div class="free clearfix lpkmf" id="mflist" style="padding-top: 2rem;">

			</div>
		</div>

	</body>
	<script>
		var x = <?php echo ($user["specialty"]); ?>;

		function mainAjax() {
			$.ajax({
				type: "post",
				data: {
					id: x
				},
				url: "<?php echo U('MfClass/class_video');?>",
				success: function(data) {
					if(data != null && data != '') {
						var html = '';
						data.forEach(item => {
							html += `
		    				<a href="Video/index?id=${item.id}" class="fl">
								<div class="free_main" value="${item.class_type}">
									<h4>2018</h4>
									<h3>护士资格考试</h3>
									<h5>[ 基础考试 ]</h5>
								</div>
								<p>${item.class_title}</p>
								<span>${item.num}人正在学习</span>
							</a>
		    			`;
						});
						
						$(".loadover").remove();
						$("#mflist").empty().html(html);
						var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
						$("#wrapper").append(txt);
					} else {
						$(".loadover").remove();
						var txt = '<div class="loadover"><span>' + '暂无更多视频' + '</span></div>'
						$("#wrapper").append(txt);
					}
				}
			});

		}
		mainAjax();
		$(".nav li").eq(0).click(function() {
			$(".loadover").remove();
			$(this).siblings().find("a").removeClass("video_nr_bg");
			$(this).find("a").addClass("video_nr_bg");
			mainAjax();
		});
	</script>

</html>