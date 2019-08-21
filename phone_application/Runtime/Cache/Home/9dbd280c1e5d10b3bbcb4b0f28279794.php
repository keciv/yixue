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

	<body>
		<header class="clearfix" style="z-index: 1000;">
			<div class="fl left">
				<a href="/yixue/index.php/MeSet.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				疑问反馈
			</div>
			<div class="fr right">
			</div>
		</header>
		<div style="height: 5rem;" id="lpk"></div>

		<div class="lpk_fa">
			<form>
				<div class="inpu">
					<div class="">
						<input type="checkbox" class="" value="1" data-value="答案有疑问"/>答案有疑问</input>
					</div>
					<div class="">
						<input type="checkbox" class="" value="2" data-value="答案与解析不符合"/>答案与解析不符合</input>
					</div>
					<div class="">
						<input type="checkbox" class="lpk" value="3" data-value="有错别字"/>有错别字</input>
					</div>
					<div class="">
						<input type="checkbox" class="" value="4" data-value="选项有问题"/>选项有问题</input>
					</div>
					<div class="">
						<input type="checkbox" class="lpk" value="5" data-value="其他问题" />其他问题</input>
					</div>
					<textarea name="" rows="" cols="" placeholder="问题描述越精确，得到的回复越精确" id="textarea"></textarea>
				</div>
				<p> 还可输入200个字</p>
				<button class="tijiao">提交反馈</button>
			</form>

		</div>

	</body>
	<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/yixue/public/js/layer/mobile/layer.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(".tijiao").click(function(){
		    var $checkbox = $('input[type="checkbox"]');
		    var $checked = $('input[type="checkbox"]:checked');
		    if($checkbox){
		        	// var arr = Array();
		        	var val = Array();
		            $('input[type="checkbox"]:checked').each(function(){
						// value = $(this).val();
						var text = $(this).data("value");
						// arr.push(value);
						val.push(text);
					});
					var content = $("#textarea").val();
					$.ajax({
						type : "post",
						// dataType : "json",
						data : {val:val,content:content},
						url : "/yixue/index.php/Question/add",
						success : function(data){
							if(data=="ok"){
								layer.open({
								    content: '提交成功',
								    skin: 'msg',
								    time: 2 //2秒后自动关闭
								});
								location.href="/yixue/index.php/MeSet.html";
							}else if(data=="error"){
								layer.open({
								    content: '提交失败',
								    skin: 'msg',
								    time: 2 //2秒后自动关闭
								});
							}
						}
					});
		    }
		    return false;
		})
	</script>
</html>