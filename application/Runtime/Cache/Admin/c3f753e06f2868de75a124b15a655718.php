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
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>试题题目：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input type="text" class="input-text" value="<?php echo ($class["class_title"]); ?>" placeholder="请填写试题题目" id="class_name" name="question" style="width:250px">
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
		<!-- 答案列表 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>答案列表：</label>
				<div class="formControls col-xs-6 col-sm-6">
					<br><br>
					<ul id="answer">
						<!--<li>A：<input type="" name="answer1" class="input-text"  style="width:250px"><br><br></li>-->
						<!--<li>B：<input type="" name="answer2" class="input-text"  style="width:250px"><br><br></li>-->
						<!--<li style="display: none">C：<input type="" name="answer3" class="input-text"  style="width:250px"><br><br></li>-->
						<!--<li style="display: none">D：<input type="" name="answer4" class="input-text"  style="width:250px"><br><br></li>-->
						<!--<li style="display: none">E：<input type="" name="answer5" class="input-text"  style="width:250px"><br><br></li>-->
					</ul>
					<button class="btn btn-primary addAnswer">添加选项</button>
				</div>
		</div>
		<!-- 答案选项 -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>答案列表：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="form_control daan">
					<!--<input type="radio" name="answer" value="A"> &nbsp; A &nbsp;&nbsp;&nbsp;&nbsp;-->
					<!--<input type="radio" name="answer" value="B"> &nbsp; B &nbsp;&nbsp;&nbsp;&nbsp;-->
					<!--<input type="radio" name="answer" value="C"> &nbsp; C &nbsp;&nbsp;&nbsp;&nbsp;-->
					<!--<input type="radio" name="answer" value="D"> &nbsp; D &nbsp;&nbsp;&nbsp;&nbsp;-->
				</div>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">试题解析：</label>
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
            $('#form-class-add').attr('action', '/yixue/admin.php/ShitiAdd/add');
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
    var dy = {
        "1": "A",
        "2": "B",
        "3": "C",
        "4": "D",
        "5": "E",
        "6": "F",
        "7": "G",
        "8": "H",
        "9": "I",
        "10": "J",
        "11": "K",
        "12": "L",
        "13": "M",
        "14": "N",
        "15": "O",
        "16": "P",
        "17": "Q",
        "18": "R",
        "19": "S",
        "20": "T",
        "21": "U",
        "22": "V",
        "23": "W",
        "24": "X",
        "25": "Y",
        "26": "Z"
    };
    for (var i = 1; i <= 26; i++) {
        var html = `
	    	<li style="display: none"><input type="hidden" name="sele[]" value="` + dy[i] + `">` + dy[i] + `：<input type="" name="answer[]" class="input-text" style="width:250px"><br><br></li>
	    `;
        var daan = `
	    	<input style="display:none;width:10px;" type="radio" name="daan" value="` + dy[i] + `"> &nbsp; <span style="display:none;">` + dy[i] + `</span> &nbsp;&nbsp;&nbsp;
	    `;
        $(".daan").append(daan);
        $("#answer").append(html);
    }
    $(function () {
        $("#answer li").first().css("display", "block");
        $(".daan input").first().css("display", "inline-block");
        $(".daan input").first().attr("checked", "checked");
        $(".daan span").first().css("display", "inline-block");
        var t = 0;
        $("body").on("click", ".addAnswer", function () {
            t++;
            $("#answer li").eq((t)).css("display", "inline-block");
            $(".daan input").eq((t)).css("display", "inline-block");
            $(".daan span").eq((t)).css("display", "inline-block");
            return false;
        });
    })

})
</script>

</body>
</html>