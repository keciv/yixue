<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/yixue/public/admin/favicon.ico" >
<link rel="Shortcut Icon" href="/yixue/public/admin/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/yixue/public/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/respond.min.js"></script>

<![endif]-->
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />

<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/yixue/public/admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/yixue/public/css/style.css">
<!--[if IE 6]>
<script type="text/javascript" src="/yixue/public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<link href="/yixue/public/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form method="post" class="form form-horizontal" id="form-danye-add">
		<input type="hidden" id="caozuo" value="edit" />
		<input type="hidden" value="<?php echo ($lanmu["id"]); ?>" id="lanmuID" name="lanmuID" />
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>当前栏目：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($lanmu["title"]); ?>" placeholder="" id="title" name="title" readonly="readonly">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">单页内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo ($danye["content"]); ?></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<span class="btn btn-primary radius" id="tijiao">&nbsp;&nbsp;提交&nbsp;&nbsp;</span>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
<script type="text/javascript" src="/yixue/public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/ueditor/1.4.3/ueditor.all.min.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/yixue/public/js/jqueryForm.js"></script>
<script type="text/javascript" src="/yixue/public/js/myJS.js"></script> 
<script src="/yixue/public/js/jquery-form.js"></script>
<script type="text/javascript">
$(function (){	
	//编辑器
	var ue = UE.getEditor('editor');
	//修改时选中栏目
    $('#tijiao').click(function(){
		
		var lanmuID=$('#lanmuID').val();
		
		$('#form-danye-add').attr('action','/yixue/admin.php/Danye_edit_'+lanmuID);
		
		$('#form-danye-add').submit();
	})
})
	
</script>


</body>
</html>