<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<title>课程列表</title>
<link rel="stylesheet" href="/yixue/public/admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body class="pos-r">
<!-- <div class="pos-a" style="width:200px;left:0;top:0; bottom:0; height:100%; border-right:1px solid #e5e5e5; background-color:#f5f5f5; overflow:auto;">
	<ul id="treeDemo" class="ztree"></ul>
</div> -->
<!-- <div style="margin-left:200px;"> -->
<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 课程管理 <span class="c-gray en">&gt;</span> 课程列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<!-- <div class="text-c">
			<input type="text" name="" id="" placeholder=" 产品名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜产品</button>
		</div> -->
		<div class="cl pd-5 bg-1 bk-gray mt-20"> 
			<span class="l">
				<a href="javascript:;" onclick="delete_all()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
				<a class="btn btn-primary radius" onclick="class_add('添加课程','/yixue/admin.php/Class_add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加课程</a>
			</span> 
			<span class="r">共有数据：<strong><?php if($totalRow == null): ?>0<?php else: echo ($totalRow); endif; ?></strong> 条</span> 
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="10"><input name="" type="checkbox" value=""></th>
						<th width="10">ID</th>
						<th width="20">课程名称</th>
						<th width="20">专业</th>
						<th width="20">资费类型</th>
						<th width="20">价格</th>
						<th width="30">封面图</th>
						<th width="20">介绍</th>
						<th width="20">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($kecheng)): $i = 0; $__LIST__ = $kecheng;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kecheng): $mod = ($i % 2 );++$i;?><tr>
							<td style="text-align: center"><input type="checkbox" value="<?php echo ($kecheng["id"]); ?>" name="id"></td>
							<td style="text-align: center"><?php echo ($kecheng["id"]); ?></td>
							<td style="text-align: center"><?php echo ($kecheng["class_title"]); ?></td>
							<td style="text-align: center"><?php echo ($kecheng["type_name"]); ?></td>
							<?php if($kecheng["class_type"] == 2): ?><td style="text-align: center">免费课程</td><?php endif; ?>
							<?php if($kecheng["class_type"] == 1): ?><td style="text-align: center">付费课程</td><?php endif; ?>

							<?php if($kecheng["class_type"] == 3): ?><td style="text-align: center">公开课程</td><?php endif; ?>
							<td style="text-align: center"><?php echo ($kecheng["price"]); ?></td>
							<td style="text-align: center"><img src="/yixue/<?php echo ($kecheng["imageurl"]); ?>" style="width:50px"></td>
							<td style="text-align: center"><?php echo (msubstr($kecheng["content"],0,20)); ?></td>
							<td style="text-align: center"><a style='text-decoration:none' href='javascript:void(0)'  title='编辑' onclick="product_show('课程编辑','/yixue/admin.php/Class_edit_<?php echo ($kecheng["id"]); ?>',<?php echo ($kecheng["id"]); ?>)")>编辑</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style='text-decoration:none' href='javascript:void(0)'  title='删除' onclick="article_del(<?php echo ($kecheng["id"]); ?>)")>删除</a></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div id="fenye" style="float: right;margin-top: 8px;margin-bottom: 10px;"><?php echo ($pagelist); ?></div>
		</div>
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/yixue/public/admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*分类-删除*/
function article_del(id){
    if(confirm("是否删除这条数据")){
		var sql = "class";
		$.post('/yixue/admin.php/Other/delete/',{id:id,sql:sql},function(data){
			if(data == 1){
				location.reload();
				alert("删除成功！");
			}	
		});
    }
}

/*分类-批量删除 */
function delete_all(){
    if(confirm("是否删除这些数据？")){
		var arr = Array();
		var sql = "class";

		// 定义一个数组
		$('input[name="id"]:checked').each(function(){
			value = $(this).val();
			arr.push(value);
		});
		arrstr = arr.join(",");
		$.post('/yixue/admin.php/Other/delete_all/',{form:arrstr,sql:sql},function(data){
			if(data == 1){
				location.reload();
				alert("删除成功！");
			}	
		});
		// console.log(arrstring);
		//js打印
	}
}
//排序
function sort(sortid,id){
	layer.prompt({title: '排序操作', formType: 3,value:sortid}, function(pass, index){
        var sort = $('.layui-layer-input').val();
        var mysql = 'lanmu';
        $.ajax({
            url:"/yixue/admin.php/Other/edit_sequence_id",
            data:{sort:sort,id:id,mysql:mysql},
            type:"post",
            success:function(msg){
               if(msg=="ok"){
                 layer.msg("排序操作成功");
                 location.reload();
               }else{
                 layer.msg("请重新操作");
               }
            }
        }) 
	});
}
/*产品-添加*/
function class_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-查看*/
function product_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-下架*/
function product_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*产品-发布*/
function product_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}

/*产品-编辑*/
function product_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*产品-删除*/
function product_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
</body>
</html>