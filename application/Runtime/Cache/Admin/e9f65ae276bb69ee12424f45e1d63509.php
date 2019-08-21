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
<script type="text/javascript" src="/yixue/public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<!--[if IE 6]>
<script type="text/javascript" src="/yixue/public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加章节</title>
</head>
<body>
<div class="page-container">
	<form method="post" class="form form-horizontal" id="form-zhangjie-add" enctype="multipart/form-data">
		<input type="hidden" id="caozuo" value="<?php echo ($caozuo); ?>" />
		<input type="hidden" value="<?php echo ($class["id"]); ?>" name="id" />
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>章节名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="<?php echo ($zhangjie["title"]); ?>" placeholder="请填写章节名称" id="title" name="title" style="width:250px">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>课程名称：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<select id="class" name="class" class="input-text" style="width:200px;">
						<option value="0">--请选择--</option>
						<?php if(is_array($className)): $i = 0; $__LIST__ = $className;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($class["id"]); ?>" <?php if($class['id'] == $zhangjie['classID']): ?>selected<?php endif; ?> ><?php echo ($class["class_title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>视频地址：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<input type="hidden" class="img" value="<?php echo ($zhangjie["video_path"]); ?>" name="videourl">
                    <input type="file" id="filePicker" name="filePicker" value=""/>
                    <span class="jindutiao"></span>
                    <br><br>
                    <input type="button" id="btn-star" class="btn btn-default btn-uploadstar radius ml-10" value="开始上传" />
				</div>
			</div>
		</div>
		<script>
            $(".btn-uploadstar").click(function () {
                var data = new FormData($("#form-zhangjie-add")[0]);
                console.log(data);
                $.ajax({
                    type:"POST",
                    url : "/yixue/admin.php/zhangjieAdd/start_upload",
                    data : data,
                    async:true,
                    // cache:false,
                    // contentType:"multipart/form-data",
                    processData:false,
                    contentType:false,
                    xhr: function()
                    {
                        myXhr = $.ajaxSettings.xhr();
                        if(myXhr.upload) {
                            myXhr.upload.addEventListener('progress',function (e) {
                                var loaded = e.loaded;
                                var total = e.total;
                                var percent = Math.floor(100 * loaded / total);
                                // $(".p").css("width",percent+'%');
                                $(".jindutiao").text('已上传'+percent+'%');
                            })
                        }
                        return myXhr;
                    },
                    success:function(data) {
                        if(data['code'] == "200")
                        {
                            $(".img").attr("value",data.path);
                            layer.msg("上传成功");
                        }else if(data == "no")
                        {
                            layer.msg("上传失败");
                        }
                    },
                    error:function() {
                        layer.msg("保存失败！");
                    }

                })
            });
        </script>

		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>课程简介：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="form_control">
					<textarea cols="50" rows="10" name="content"><?php echo ($class["content"]); ?></textarea>
				</div>
			</div>
		</div> -->
 
		<!--<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo ($class["content"]); ?></script> 
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
			$('#form-zhangjie-add').attr('action','/yixue/admin.php/ZhangjieAdd/add');
		}else if(caozuo=="edit"){
			$('#form-zhangjie-add').attr('action','/yixue/admin.php/ZhangjieAdd/edit');
		}
		$('#form-zhangjie-add').submit();
	})
})
</script>

</body>
</html>