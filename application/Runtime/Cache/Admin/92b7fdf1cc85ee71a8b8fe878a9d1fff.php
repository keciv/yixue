<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/yixue/public/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/yixue/public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" method="post">
		<input type="hidden" id="caozuo" value="<?php echo ($caozuo); ?>" />
		<input type="hidden" value="<?php echo ($admin["id"]); ?>" name="id" />
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($admin["username"]); ?>" placeholder="请输入账号" id="username" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" value="<?php echo ($admin["password"]); ?>" autocomplete="off" value="" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" value="<?php echo ($admin["password"]); ?>" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
		</div>
	</div>
	
	
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<span class="btn btn-primary radius" id="tijiao">&nbsp;&nbsp;提交&nbsp;&nbsp;</span>
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				maxlength:16
			},
			username:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password"
			},
			working:{
				required:true,
			},
			roleID:{
				required:true,
				
			},
			phone:{
				required:true,
				isPhone:true,
			},
			bumen:{
				required:true,
				
			},
			/*email:{
				required:true,
				email:true,
			},*/
			/*adminRole:{
				required:true,
			},*/
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		// submitHandler:function(){
		

	});

	$('#tijiao').click(function(){
		
		var caozuo=$('#caozuo').val();
		// alert(caozuo);
		if(caozuo=="add"){
			$('#form-admin-add').attr('action','/yixue/admin.php/AdminAdd/add');
		}else if(caozuo=="edit"){
			$('#form-admin-add').attr('action','/yixue/admin.php/AdminAdd/edit');
		}
		
		$('#form-admin-add').submit();
	})

});

/**
 * 验证textarea输入框字数限制,只作提示不作提交限制
 * 1、必须将总数用<am>标签装起来 2、调用本方法
 * 参考：<em class="textarea-length">0</em>/<am>100</am>
 * @param obj
 * @constructor
 */
var Huitextarealength = function (obj){
	
    var html = $(obj).parent();
    var tatal = html.find('am').html();
    var sets = $(obj).val().length;

    if(sets*1>tatal*1){
        var str = '<div style="width: auto;position: absolute; right: 4%;color: red;">内容超出限制</div>';
        $(obj).after(str);
        html.find('em').css({color:'red'});
    }else {
        $(obj).parent().find('div').remove();
        html.find('em').css({color:'black'});
    }
    //设置已输入数量
    html.find('em').html(sets);
}

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>