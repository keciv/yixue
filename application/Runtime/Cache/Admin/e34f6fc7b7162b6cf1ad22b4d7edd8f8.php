<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<!--[if IE 6]>
<script type="text/javascript" src="/yixue/public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c"> 
		
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div> -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="javascript:;" onclick="delete_all()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a href="javascript:;" onclick="admin_add('添加管理员','/yixue/admin.php/Admin_add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
		</span> 
		<span class="r">共有数据：<strong><?php if($totalRow == null): ?>0<?php else: echo ($totalRow); endif; ?></strong> 条</span> 
	</div>
	<!-- <table class="table table-border table-bordered table-bg"> -->
	<table class="table table-border table-bordered table-bg table-hover table-sort">	
		<thead>
			<tr>
				<th scope="col" colspan="12">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">用户账号</th>
				<th width="100">用户密码</th>
				<th width="90">登录时间</th>
				<th width="100">是否启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?><tr class="text-c">
					<td><input type="checkbox" value="<?php echo ($admin["id"]); ?>" name="id"></td>
					<td><?php echo ($admin["id"]); ?></td>
					<td><?php echo ($admin["username"]); ?></td>
					<td><?php echo ($admin["password"]); ?></td>
					<td><?php echo ($admin["time"]); ?></td>
					<td class="td-status">
						<?php if($admin['status'] == 0): ?><span class="label label-success radius">已启用</span><?php else: ?><span class="label label-default radius">已禁用</span><?php endif; ?>
					</td>
					<!-- <td><?php echo ($admin["dateandtime"]); ?></td> -->
					<td class="td-manage">
						<?php if($admin['status'] == 0): ?><a style="text-decoration:none" onClick="admin_stop(this,<?php echo ($admin["id"]); ?>,<?php echo ($admin["status"]); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
						<?php else: ?>
							<a onClick="admin_start(this,<?php echo ($admin["id"]); ?>,<?php echo ($admin["status"]); ?>)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a><?php endif; ?>
						<a title="编辑" href="javascript:;" onClick="admin_edit('管理员编辑','/yixue/admin.php/Admin_edit_<?php echo ($admin["id"]); ?>.html','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
						<a title="删除" href="javascript:;" onClick="article_del(<?php echo ($admin["id"]); ?>)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>	
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
		<style type="text/css">
			#fenye{
				
			}
			#fenye span{
				padding:3px 10px;
				border: 1px solid #ccc;
				background: #5a98de;
				color: white;
			}
			#fenye a{
				padding:3px 10px;
				border: 1px solid #ccc;
				
			}
			#fenye span:hover{
				background: #5a98de;
				color: white;
			}
			#fenye a:hover{
				background: #5a98de;
				color: white;
			}
		</style>

		<div id="fenye" style="float: right;margin-top: 8px;margin-bottom: 10px;"><?php echo ($pagelist); ?></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/yixue/public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function article_del(id){
    if(confirm("是否删除该数据？")){
		var sql = "admin";
		$.post('/yixue/admin.php/Other/delete/',{id:id,sql:sql},function(data){
			if(data == 1){
				location.reload();
				alert("删除成功！");
			}	
		});
    }
}

/*管理员-批量删除 */
function delete_all(){
    if(confirm("是否删除这些数据？")){
		var arr = Array();
		var sql = "admin";

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
 

/*管理员-编辑*/
function admin_edit(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id,status){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
	    var mysql = 'admin';
	    $.ajax({
            url:"/yixue/admin.php/AdminAdd/edit_status",
            data:{id:id,status:status,mysql:mysql},
            type:"post",
            success:function(data){
            	// alert(msg);
               if(data=="ok"){
               	$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+id+',1)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
               }else{
                 layer.msg("请刷新页面后重新操作！");
               }
            }
        })
	});
}

/*管理员-启用*/
function admin_start(obj,id,status){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var mysql = 'admin';
		$.ajax({
            url:"/yixue/admin.php/AdminAdd/edit_status",
            data:{id:id,status:status,mysql:mysql},
            type:"post",
            success:function(data){
            	// alert(msg);
               if(data=="ok"){
               		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+id+',0)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
					$(obj).remove();
					layer.msg('已启用!', {icon: 6,time:1000});
               }else{
                 layer.msg("请刷新页面后重新操作！");
               }
            }
        })
	});
}

// 点击表头排序
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
		{"orderable":false,"aTargets":[0,0]}  //制定列不参与排序
	]
});
</script>
</body>
</html>