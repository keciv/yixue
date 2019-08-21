<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta="format-detection" content="telephone=no">
			<meta nnameame="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="black">
			<meta name="format-detection" content="telephone=no">
			<title>个人信息</title>
			<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/reset.css" />
			<link rel="stylesheet" type="text/css" href="/yixue/public/home/lb/css/bootstrap.css" />
			<link rel="stylesheet" type="text/css" href="/yixue/public/home/css/index.css" />
			<script src="/yixue/public/home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="/yixue/public/js/jqueryForm.js" type="text/javascript" charset="utf-8"></script>
			<script src="/yixue/public/js/jquery-form.js" type="text/javascript" charset="utf-8"></script>
	</head>

	<body style="background: white;">
		<header class="clearfix" >
			<div class="fl left">
				<a href="/yixue/index.php/Me.html"> <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>
			<div class="fl center">
				个人信息
			</div>
			<div class="fr right" id="bainji1">
			</div>
		</header>
		<div type="text/css" style="height: 5rem;"></div>

		<div class="gr_main">
			<form action="" method="" id="form-banner-add" enctype="multipart/form-data">
				<div class="clearfix one">
					<div class="fl left">
						头像
					</div>
					<!-- <input type="file" id="filePicker" name="filePicker"/>

					<div id="fileList" class="uploader-list">
						<img id="img_filePicker" src="/yixue/<?php echo ($banner["imageurl"]); ?>" width="80px;" />
					</div>
					<input type="hidden" id="hidden_filePicker" name="hidden_filePicker" value="<?php echo ($banner["imageurl"]); ?>"/>
					<input type="button" id="btn-star" class="btn btn-default btn-uploadstar radius ml-10" value="开始上传" onClick="upload('/yixue/index.php/Upload/upload','filePicker','form-banner-add','Banner');" /> -->
					<div class="fr right">
						<input id="f" type="file" onchange="chooseImg(this)" style="display:none" name="img">
						<img src="/yixue/<?php echo ($user["photo"]); ?>" id="img" onclick="f.click()" />
						<input type="hidden" id="hidden_filePicker" name="hidden_filePicker" value="<?php echo ($banner["imageurl"]); ?>"/>
					</div>
				</div>
				<div class="clearfix two">
					<div class="fl left">
						昵称：
					</div>
					<div class="fr right">
						<input type="text" name="" id="nickname" value="<?php echo ($info["nickname"]); ?>" onblur="editNickName()"/>
					</div>
				</div>
				<div class="clearfix two">
					<div class="fl left">
						专业：
					</div>
					<a href="/yixue/index.php/type.html">
						<div class="fr right">
							<input type="text" name="" id="" value="<?php echo ($specialty["type_name"]); ?>" placeholder="请选择专业" />
						</div>
					</a>
				</div>
				<div class="clearfix two">
					<div class="fl left">
						电话：
					</div>
					<div class="fr right">
						<input type="text" name="" id="phone" value="<?php echo ($user["phone"]); ?>" readonly="readonly" />
					</div>
				</div>
			</form>
		</div>

	</body>
	
	<script src="/yixue/public/js/myJS.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="/yixue/public/js/layer/mobile/layer.js" type="text/javascript"></script>

	<script type="text/javascript">
		function chooseImg(file) { 
			upload('/yixue/index.php/Upload/upload','f','form-banner-add','header');
			// console.log(file)
			// var file = file.files[0];
			// var reader = new FileReader();  
			// reader.readAsDataURL(file);  
			// reader.onload = function() {      
			// 	var img = document.getElementById('img');      
			// 	img.src = this.result
			// };
//			console.log($("#hidden_filePicker").val())
		}

		function editNickName(){
			var nickname=$("#nickname").val();
			if(nickname.length<1){
				layer.open({
				    content: '昵称不能为空',
				    skin: 'msg',
				    time: 2 //2秒后自动关闭
				});
			}else{
				$.ajax({
					url : '/yixue/index.php/MeInfo/editNickName',
					type : "post",
					data : {nickname:nickname},
					success : function (data){
						if(data=='ok'){
							layer.open({
							    content: '昵称修改成功',
							    skin: 'msg',
							    time: 2 //2秒后自动关闭
							});
						}else if(data=='kong'){
							layer.open({
							    content: '昵称不能为空',
							    skin: 'msg',
							    time: 2 //2秒后自动关闭
							});
						}else  if(data=='cuowu'){
							layer.open({
							    content: '昵称修改失败',
							    skin: 'msg',
							    time: 2 //2秒后自动关闭
							});
						}
					}
			    })
			}
		}

		// function editPhone(){
		// 	var phone=$("#phone").val();
		// 	var exp=/^1[3-9]{1}[0-9]{9}$/;
			
		// 	if(phone.length<1){
		// 		layer.open({
		// 		    content: '手机号码为空',
		// 		    skin: 'msg',
		// 		    time: 2 //2秒后自动关闭
		// 		});
		// 	}else if(!exp.test(phone)){
		// 		layer.open({
		// 		    content: '手机号码格式有误',
		// 		    skin: 'msg',
		// 		    time: 2 //2秒后自动关闭
		// 		});
		// 		$("#phone").val().empty();
		// 	}
			// else{
			// 	$.ajax({
			// 		url : '/yixue/index.php/MeInfo/editPhone',
			// 		type : "post",
			// 		data : {phone:phone},
			// 		success : function (data){
			// 			if(data=='ok'){
			// 				layer.open({
			// 				    content: '手机号码修改成功',
			// 				    skin: 'msg',
			// 				    time: 2 //2秒后自动关闭
			// 				});
			// 			}else if(data=='kong'){
			// 				layer.open({
			// 				    content: '手机号码为空',
			// 				    skin: 'msg',
			// 				    time: 2 //2秒后自动关闭
			// 				});
			// 			}else  if(data=='cuowu'){
			// 				layer.open({
			// 				    content: '修改失败',
			// 				    skin: 'msg',
			// 				    time: 2 //2秒后自动关闭
			// 				});
			// 			}else{
			// 				layer.open({
			// 				    content: '手机号码格式有误',
			// 				    skin: 'msg',
			// 				    time: 2 //2秒后自动关闭
			// 				});
			// 			}
			// 		}
			// 	})
			// }
			
		//}
	</script>

</html>