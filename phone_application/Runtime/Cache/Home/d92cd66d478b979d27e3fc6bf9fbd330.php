<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="format-detection" content="telephone=no">
		<title>sc</title>
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
		<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body style="background: white;">
		<header class="clearfix" style="z-index: 1000;">
			<div class="fl left">
				<a href="/yixue/index.php/Me/index"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				收藏
			</div>
			<div class="fr right" id="bainji1">
				<a href="javascript:;">编辑</a>
				<!--课程没有编辑 试题有编辑-->
			</div>
		</header>
		<div type="text/css" style="height: 10.2rem;"></div>
		<div class="ck_togg clearfix">
			<div class="fl">
				<a href="javascript:;" class="ck_toggcolor">课程</a>
			</div>
			<div class="fl">
				<a href="javascript:;">试题</a>
			</div>
		</div>
		<div class="ck_togg_main">
			<ul class="" style="display: block;" id="my-spcollect">
				<!--<img src="img/k.png" />-->
				<!--如果没有课程 后的图片    然后给ul加   style="text-align: center;"-->
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adata): $mod = ($i % 2 );++$i;?><li class="clearfix">
					<a href="">  
						<!--进入课程 详情页-->
						<div class="fl left">
							<img src="/yixue/<?php echo ($adata["imageurl"]); ?>" />
						</div>
						<div class="fr right">
							<h3><?php echo ($adata["title"]); ?></h3>
							<p class="atime"><?php echo ($adata["collect_time"]); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				<!--js转换时间-->
				
				<script type="text/javascript">
					function getDateDiff(dateTimeStamp){
						var minute = 1000 * 60;
						var hour = minute * 60;
						var day = hour * 24;
						var halfamonth = day * 15;
						var month = day * 30;
						var now = new Date().getTime();
						var diffValue = now - dateTimeStamp;
						if(diffValue < 0){return;}
						var monthC =diffValue/month;
						var weekC =diffValue/(7*day);
						var dayC =diffValue/day;
						var hourC =diffValue/hour;
						var minC =diffValue/minute;
						if(monthC>=1){
						    result="" + parseInt(monthC) + "月前";
						}
						else if(weekC>=1){
						    result="" + parseInt(weekC) + "周前";
						}
						else if(dayC>=1){
						    result=""+ parseInt(dayC) +"天前";
						}
						else if(hourC>=1){
						    result=""+ parseInt(hourC) +"小时前";
						}
						else if(minC>=1){
						    result=""+ parseInt(minC) +"分钟前";
						}else
						result="刚刚";
						return result;
						}
						
					$.each($(".atime"), function(dateTimeStamp){
						
						
						
						
						var a =$(this).text($(this).text()*1000);
						getDateDiff(a);
						$(this).text(result);
					});
				</script>
				
				
				
				
				<!--<li class="clearfix">
					<a href="">
						<div class="fl left">
							<img src="/yixue/public/home/img/m1.png" />
						</div>
						<div class="fr right">
							<h3>2018护士2018护士2018护士2018护士</h3>
							<p>3天前</p>
						</div>
					</a>
				</li>-->
			</ul>
			
			<!--点击试题后的页面 去掉上面ul-->
			
			<ul class="shiti">
				<li>
					<a href="javascriipt:;"><input type="checkbox" name="" id="" value="" />1.头面部盘状红斑狼疮典型的皮肤表现... <span class="fr glyphicon glyphicon-menu-right"></span></a>
				</li>
				<li>
					<a href="javascriipt:;"><input type="checkbox" name="" id="" value="" />2.头面部盘状红斑狼疮典型的皮肤表现... <span class="fr glyphicon glyphicon-menu-right"></span></a>
				</li>
			</ul>
		</div>
		<div class="clearfix quan_del">
			<div class="fl quan quan1" style="border-right: 1px solid #ccc;" id="quan1">全选</div>
			<div class="fr">
				确认删除
			</div>
		</div>
	</body>
	
	<script type="text/javascript">
		$('.ck_togg div a').click(function() {
			$(this).addClass('ck_toggcolor').parent().siblings().children().removeClass('ck_toggcolor')
			var index = $('.ck_togg div a').index(this);
			$('.ck_togg_main>ul').eq(index).show().siblings().hide()
		})
		$('#bainji1').click(function() {
			$('.shiti li a input').toggle();
			$('.quan_del').toggle();
		})
		$(".quan1").click(function() {
			var lkinpu = $(this).text();
			if(lkinpu == '全选') {
				$("#quan1").text('反选')
				$(".shiti li a input").prop('checked', true)
			} else {
				$(".shiti li a input").removeAttr("checked")
				$(".quan1").text("全选");
			}
		})
	</script>
	<!--<script>
		$(function(){
			$.ajax({
				type:"get",
				url:"<?php echo U('Me/shoucang');?>",
				success:function(data){
					var html = '';
		    		data.forEach(item => {
		    			html += `
		    				<li class="clearfix">
								<a href="">  
									
									<div class="fl left">
										<img src="${item.imageurl}" />
									</div>
									<div class="fr right">
										<h3>${item.class_title}</h3>
									</div>
								</a>
							</li>
		    			`;
		    		});
		    		$("#my-spcollect").empty().html(html);
				}
			});
		})
	</script>-->

</html>