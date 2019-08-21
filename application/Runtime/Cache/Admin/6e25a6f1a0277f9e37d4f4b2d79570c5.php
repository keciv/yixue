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
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/yixue/public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加分类</title>
</head>
<body>
<div class="page-container">
	<form method="post" class="form form-horizontal" id="form-type-add">
		<input type="hidden" id="caozuo" value="<?php echo ($caozuo); ?>" />
		<input type="hidden" value="<?php echo ($lanmu["id"]); ?>" name="id" />
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="请填写分类名称" id="user-name" name="type" style="width:250px">
			</div>
		</div>

		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>父级栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<select id="ParentLanmu" name="parentID" class="input-text" style="width:200px;">
						<option value="0">顶级</option>
						<?php echo ($optionStr); ?>
					</select>
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>栏目类型：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<select id="LanmuType" name="controller" class="input-text" style="width:200px;">
						<option value="Danye">单页</option>
				        <option value="PictureList">图文</option>
				        <option value="NewList">文章</option>
					</select>
				</div>
			</div>
		</div> -->
		
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" id="tijiao" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
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
<script type="text/javascript" src="/yixue/public/js/jqueryForm.js"></script>
<script type="text/javascript" src="/yixue/public/js/myJS.js"></script>
<script type="text/javascript">
$(function(){	
	// $('#ParentLanmu').val("<?php echo ($parentlanmu["id"]); ?>");
	// $('#LanmuType').val("<?php echo ($lanmu["controller"]); ?>");

	$('#tijiao').click(function(){
		var caozuo=$('#caozuo').val();
		if(caozuo=="add"){
			$('#form-type-add').attr('action','/yixue/admin.php/TypeAdd/type_add');
		}else if(caozuo=="edit"){
			$('#form-type-add').attr('action','/yixue/admin.php/TypeAdd/type_edit');
		}
		$('#form-type-add').submit();
	})
})
</script>

</body>
</html>