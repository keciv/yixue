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
<title>图文列表</title>
<link rel="stylesheet" href="/yixue/public/admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
</head>
<body class="pos-r">
<div>
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图文管理 <span class="c-gray en">&gt;</span> 图文列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="page-container">
		<!-- <div class="text-c">
			<input type="text" name="" id="" placeholder=" 图文名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜图文</button>
		</div> -->
		<div class="cl pd-5 bg-1 bk-gray mt-20"> 
			<span class="l">
				<a href="javascript:;" onclick="news_delete_all()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
				<a class="btn btn-primary radius" onclick="news_add('添加图文','/yixue/admin.php/Picture_add.html')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加图文</a>
			</span> 
			<span class="r">共有数据：<strong><?php if($totalRow == null): ?>0<?php else: echo ($totalRow); endif; ?></strong> 条</span> 
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-bg table-hover table-sort">
				<thead>
					<tr class="text-c">
						<th width="40"><input name="" type="checkbox" value=""></th>
						<th width="40">ID</th>
						<th width="120">图文名称</th>
						<th width="60">图文分类</th>
						<th width="80">排序ID</br>(点击数字排序)</th>
						<th width="80">添加时间</th>
						<th width="80">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($picture)): $i = 0; $__LIST__ = $picture;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$picture): $mod = ($i % 2 );++$i;?><tr class="text-c va-m">
							<td><input name="id" type="checkbox" value="<?php echo ($picture["id"]); ?>"></td>
							<td><?php echo ($picture["id"]); ?></td>
							<td><?php echo ($picture["title"]); ?></td>
							<td><?php echo ($picture["lanmu_type"]); ?></td>
							<td onclick="sort(<?php echo ($picture["SortID"]); ?>,<?php echo ($picture["id"]); ?>);"><?php echo ($picture["SortID"]); ?></td>
							<td><?php echo ($picture["dateandtime"]); ?></td>
								
							<td class="td-manage">
								<a style="text-decoration:none" class="ml-5" onClick="news_edit('图文编辑','/yixue/admin.php/Picture_edit_<?php echo ($picture["id"]); ?>.html',<?php echo ($picture["id"]); ?>)" href="javascript:;" title="编辑">
									<i class="Hui-iconfont">&#xe6df;</i>
								</a>
								
								<a style="text-decoration:none" class="ml-5" onClick="news_delect(<?php echo ($picture["id"]); ?>)" href="javascript:;" title="删除">
									<i class="Hui-iconfont">&#xe6e2;</i>
								</a>
							</td>
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
	</div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/yixue/public/admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
<script type="text/javascript" src="/yixue/public/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*Banner-删除*/
function news_delect(id){
    if(confirm("是否删除该数据")){
		var sql = "picture";
		$.post('/yixue/admin.php/Other/delete/',{id:id,sql:sql},function(data){
			if(data == 1){
				location.reload();
				alert("删除成功！");
			}	
		});
    }
}

/*管理员-批量删除 */
function news_delete_all(){
    if(confirm("是否删除这些数据？")){
		var arr = Array();
		var sql = "picture";

		// 定义一个数组
		$('input[name="id"]:checked').each(function(){
			value = $(this).val();
			arr.push(value);
		});
		arrstr = arr.join(",");
		// alert(arrstr);
		$.post('/yixue/admin.php/Other/delete_all/',{form:arrstr,sql:sql},function(data){
			if(data == 1){
				location.reload();
				alert("删除成功！");
			}	
		});
	}
}
		


$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"orderable":false,"aTargets":[0,7]} 制定列不参与排序
	]
});
/*图文-添加*/
function news_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图文-查看*/
function news_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

//排序
function sort(sortid,id){
	layer.prompt({title: '排序操作', formType: 3,value:sortid}, function(pass, index){
        var sort = $('.layui-layer-input').val();
        var mysql = 'picture';
        $.ajax({
            url:"/yixue/admin.php/Other/edit_sequence_id",
            data:{sort:sort,id:id,mysql:mysql},
            type:"post",
            success:function(msg){
            	// alert(msg);
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



/*图文-申请上线*/
function product_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*图文-编辑*/
function news_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}


</script>
</body>
</html>