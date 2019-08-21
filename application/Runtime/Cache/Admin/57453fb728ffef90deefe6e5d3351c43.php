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
<title>添加课程</title>
</head>
<body>
<div class="page-container">
	<form method="post" class="form form-horizontal" id="form-class-add">
		<input type="hidden" id="caozuo" value="<?php echo ($caozuo); ?>" />
		<input type="hidden" value="<?php echo ($class["id"]); ?>" name="id" />
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>课程名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="<?php echo ($class["class_title"]); ?>" placeholder="请填写课程名称" id="class_name" name="class_name" style="width:250px">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>专业名称：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<select id="special" name="special" class="input-text" style="width:200px;">
						<option value="0">--请选择--</option>
						<?php if(is_array($special)): $i = 0; $__LIST__ = $special;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$special): $mod = ($i % 2 );++$i;?><option value="<?php echo ($special["id"]); ?>" <?php if($class['specialty'] == $special['id']): ?>selected<?php endif; ?>><?php echo ($special["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>资费类型：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<select id="class_type" name="class_type" class="input-text" style="width:200px;">
						<option value="2" <?php if($class["class_type"] == 2): ?>selected<?php endif; ?>>免费</option>
						<option value="1" <?php if($class["class_type"] == 1): ?>selected<?php endif; ?>>收费</option>
						<option value="3" <?php if($class["class_type"] == 3): ?>selected<?php endif; ?>>公开课</option>
					</select>
				</div>
			</div>
		</div>

		<div class="row cl" <?php if($class["class_type"] != 1): ?>style="display: none"<?php endif; ?> id="price_div">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>课程价格：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<input type="text" class="input-text" value="<?php echo ($class["price"]); ?>" placeholder="价格" id="price" name="price" style="width:100px">&nbsp;元
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>课程类型：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<select id="kecheng_type" name="cat_id" class="input-text" style="width:200px">
						<option value="0">--请选择--</option>
						<?php if(is_array($kecheng_type)): $i = 0; $__LIST__ = $kecheng_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kecheng_types): $mod = ($i % 2 );++$i;?><option value="<?php echo ($kecheng_types["id"]); ?>" <?php if($class['cat_id'] == $kecheng_types['id']): ?>selected<?php endif; ?>><?php echo ($kecheng_types["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>封面图：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<input type="file" id="filePicker" name="filePicker"/>
					<div id="fileList" class="uploader-list">
						<img id="img_filePicker" src="/yixue/<?php echo ($class["imageurl"]); ?>" width="80px;" />
					</div>
					<input type="hidden" id="hidden_filePicker" name="hidden_filePicker" value="<?php echo ($class["imageurl"]); ?>"/>
					<input type="button" id="btn-star" class="btn btn-default btn-uploadstar radius ml-10" value="开始上传" onClick="upload('/yixue/admin.php/Upload/upload','filePicker','form-class-add','Class');" />
				</div>
			</div>
		</div>

		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>课程简介：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<textarea cols="50" rows="10" name="content"><?php echo ($class["content"]); ?></textarea>
				</div>
			</div>
		</div> -->

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo ($class["content"]); ?></script> 
			</div>
		</div>
		
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
<script type="text/javascript" src="/yixue/public/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/ueditor/1.4.3/ueditor.all.min.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" src="/yixue/public/js/jqueryForm.js"></script>
<script type="text/javascript" src="/yixue/public/js/myJS.js"></script>
<script type="text/javascript">
$(function(){	
	// $('#ParentLanmu').val("<?php echo ($parentlanmu["id"]); ?>");
	// $('#LanmuType').val("<?php echo ($lanmu["controller"]); ?>");
	//编辑器
	var ue = UE.getEditor('editor');

	$('#tijiao').click(function(){
		var caozuo=$('#caozuo').val();
		if(caozuo=="add"){
			$('#form-class-add').attr('action','/yixue/admin.php/ClassAdd/add');
		}else if(caozuo=="edit"){
			$('#form-class-add').attr('action','/yixue/admin.php/ClassAdd/edit');
		}
		$('#form-class-add').submit();
	})

	$('#price').blur(function(){
		var price=$("#price").val();
		var exp=/^[0-9]+([.]{1}[0-9]+){0,1}$/;
		if(price.length>0 && price.length<7){
			if(!exp.test(price)){
				$("#price").val(null);
				alert("请输入整数或小数");
			}
		}
	})

	$("#class_type option").click(function(){
		var num=$("#class_type").val();
		if(num==1){
			$("#price_div").css("display","block");
		}else{
			$("#price_div").css("display","none");
		}
	})
})
</script>

</body>
</html>