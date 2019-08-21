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
	<form method="post" class="form form-horizontal" id="form-picture-add" enctype="multipart/form-data">
		<input type="hidden" id="caozuo" value="<?php echo ($caozuo); ?>" />
		<input type="hidden" value="<?php echo ($picture["id"]); ?>" name="id" />
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图文分类：</label>
			<div class="formControls col-xs-8 col-sm-9 form_control">
				<select id="lanmu" name="lanmu" class="input-text" style="width:200px;">
					<option value="">--请选择--</option>
					<?php if(is_array($lanmu)): $i = 0; $__LIST__ = $lanmu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yiji): $mod = ($i % 2 );++$i;?><option value="<?php echo ($yiji["id"]); ?>"><?php echo ($yiji["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>  
				</select>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图文标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($picture["title"]); ?>" placeholder="" id="title" name="title">
			</div>
		</div>

		<div class="row cl" id="xiazai" style="display:none">
			<label class="form-label col-xs-4 col-sm-2">上传下载文件：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if($picture["down"] != null): ?><a href="/yixue/<?php echo ($picture["down"]); ?>">点击下载原文件</a><br/><?php endif; ?>
				<input style="width:500px;" type="file" class="input-text" value="<?php echo ($picture["down"]); ?>" id="down" name="down">
				
			</div>
		</div>

		<div class="row cl nodown">
			<label class="form-label col-xs-4 col-sm-2">封面图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
				<input type="file" id="filePicker" name="filePicker"/>
				
				<div id="fileList" class="uploader-list">
					<img id="img_filePicker" src="/yixue/<?php echo ($picture["imageurl"]); ?>" width="30px;" />
				</div>
				<input type="hidden" id="hidden_filePicker" name="hidden_filePicker" value="<?php echo ($picture["imageurl"]); ?>"/>	
					<input type="button" id="btn-star" class="btn btn-default btn-uploadstar radius ml-10" value="开始上传" onClick="upload('/yixue/admin.php/Upload/upload','filePicker','form-picture-add','Picture');" />
				</div>
			</div>
		</div> 
		
		<div class="row cl nodown">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" name="content" type="text/plain" style="width:100%;height:400px;"><?php echo ($picture["content"]); ?></script> 
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
	var caozuo=$('#caozuo').val();
	if(caozuo=="edit")
	{
		var lanmu = $("#lanmu").val()
		if(lanmu==26){
    		$("#xiazai").show();
    		$(".nodown").hide();
    	}

		//获取该数据对应栏目的所有上级栏目
		var lanmuid="<?php echo ($parentID); ?>";
		var lamuArray=lanmuid.split(",");

		$('#lanmu').val(lamuArray['0']);
		for(var i=0;i<lamuArray.length-1;i++)
		{
			//alert(i);
			var selectstr = '<select id="lanmu'+(i+1)+'" name="lanmu" class="input-text" style="width:200px;"></select>';
			$('.form_control:first').append(selectstr);
			$('#lanmu'+(i+1)).on('change',function(){
        		var id = $(this).val();
        		lanmuChange(id,$(this),(i+1));
        	});
        	var select = $('#lanmu'+(i+1));
			if(i==0)
			{
				$('#lanmu').val(lamuArray[i]);
			
			}
			editloadlanmu(lamuArray[i],select,i+1,lamuArray[i+1]);
		}
	}
    $('#tijiao').click(function(){
    	//alert($('[name="lanmu1"]').val());
		var caozuo=$('#caozuo').val();
		if(caozuo=="add")
		{
			$('#form-picture-add').attr('action','/yixue/admin.php/PictureAdd/add');
		}
		else if(caozuo=="edit")
		{
			$('#form-picture-add').attr('action','/yixue/admin.php/PictureAdd/edit');
		}
		$('#form-picture-add').submit();
	})
    $('#lanmu').change(function(){
    	var id = $(this).val();
    	var count = $(this).parent('.form_control').children('select').length;
    	var selectValue=0;

    	if(id==26){
    		$("#xiazai").show();
    		$(".nodown").hide();
    	}



    	lanmuChange(id,$(this),count);
    })
	
})
	function lanmuChange(id,object,count){
		//var id = $('#main_cate').val();
	    $.ajax({
	        //后台获取数据的路径
	        url: '/yixue/admin.php/PictureAdd/getChildren',
	        //参数
	        data: { id: id },
	        //传输方式
	        type: 'post',
	        //获取到的数据类型
	        dataType:'json',
	        //成功获取到数据后
	        success: function (data) {
	        	if(data!=null)
	        	{
	        		if(data.length>0)
		            {
		            	//alert(object.next().length);
		            	var nextLength = object.next().length;
		            	//alert(nextLength);
		            	var result='<option value="0">--请选择--</option>';
		                for (var i = 0; i < data.length; i++) {
		                	result += "<option value='" + data[i].id + "'>" + data[i].title + "</option>";
		                }
		            	if(nextLength<=0)
		            	{
		            		//alert("nextLength<=0");
							var select = '<select id="lanmu'+count+'" name="lanmu" class="input-text" style="width:200px;"></select>';
			            	object.parent('.form_control').append(select);
			            	$('#lanmu'+count).on('change',function(){
			            		var id = $(this).val();
			            		lanmuChange(id,$(this),count+1);
			            	});
			                object.next().append(result);
		            	}
		            	else
		            	{
		            		object.next().html(result).show();
		            		object.next().nextAll().hide();
		            	}
		            }
	        	}
	            else
            	{
            		object.nextAll().hide();
            	}
	        }
	    })
	}
	function editloadlanmu(id,object,count,selectValue){
		$.ajax({
	        //后台获取数据的路径
	        url: '/yixue/admin.php/PictureAdd/getChildren',
	        //参数
	        data: { id: id },
	        //传输方式
	        type: 'post',
	        //获取到的数据类型
	        dataType:'json',
	        //成功获取到数据后
	        success: function (data) {
	        	if(data!=null)
	        	{
	        		if(data.length>0)
		            {
		            	var result='<option value="0">--请选择--</option>';
		                for (var i = 0; i < data.length; i++) {
		                	result += "<option value='" + data[i].id + "'>" + data[i].title + "</option>";
		                }
			            object.append(result);
			            object.val(selectValue);
		            }
	        	}
	        }
	    })
	}
</script>


</body>
</html>