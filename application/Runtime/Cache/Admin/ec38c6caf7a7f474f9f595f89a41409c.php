<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<title>H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.1</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<!-- <ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
					</ul>
				</li>
							</ul> -->
		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li><?php echo ($admin_info["r_title"]); ?></li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A"><?php echo ($admin_info["name"]); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<!-- <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li> -->
						<!-- <li><a href="#">切换账户</a></li> -->
						<li><a href="/yixue/admin.php/Login/out">退出</a></li>
				</ul>
			</li>
				<!-- <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li> -->
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
						<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
						<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
						<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	
	<div class="menu_dropdown bk_2">
		
		
			<dl id="menu-article">
				<dt><i class="Hui-iconfont">&#xe616;</i>资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/NewList.html" data-title="资讯管理" href="javascript:void(0)">资讯管理</a></li>

					</ul>
				</dd>
			</dl>
			
			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 图文管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li>
							<a data-href="/yixue/admin.php/PictureList.html" data-title="图文管理" href="javascript:void(0)">图文管理</a>
						</li>
					</ul>
				</dd>
			</dl>
		
			<!-- <dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 楼层管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/Level.html" data-title="楼层管理" href="javascript:void(0)">楼层管理</a></li>
					</ul>
				</dd>
			</dl> -->
		
			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 单页管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<?php if(is_array($danyelist)): $i = 0; $__LIST__ = $danyelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
								<a data-href="/yixue/admin.php/Danye_<?php echo ($v["id"]); ?>.html" data-title="<?php echo ($v["title"]); ?>" href="javascript:void(0)"><?php echo ($v["title"]); ?></a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>		
					</ul>
				</dd>
			</dl>

			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 问题反馈<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>				
						<li>
							<li><a data-href="/yixue/admin.php/QuestionList.html" data-title="问题反馈" href="javascript:void(0)">问题反馈</a></li>
						</li>		
					</ul>
				</dd>
			</dl>


			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 意见反馈<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>				
						<li>
							<li><a data-href="/yixue/admin.php/IdeaList.html" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>
						</li>		
					</ul>
				</dd>
			</dl>

			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 课程管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>				
						<li>
							<li><a data-href="/yixue/admin.php/ClassList.html" data-title="课程管理" href="javascript:void(0)">课程管理</a></li>
						</li>
						<li>
							<li><a data-href="/yixue/admin.php/ZhangjieList.html" data-title="章节管理" href="javascript:void(0)">章节管理</a></li>
						</li>
						<li>
							<li><a data-href="/yixue/admin.php/ClassTypeList.html" data-title="课程分类" href="javascript:void(0)">课程分类</a></li>
						</li>
					</ul>
				</dd>
			</dl>

			<dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 试题管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>				
						<li>
							<li><a data-href="/yixue/admin.php/ShitiList.html" data-title="试题管理" href="javascript:void(0)">试题管理</a></li>
						</li>		
					</ul>
				</dd>
			</dl>	
		
			<!-- <dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 地域管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/Address.html" data-title="地域管理" href="javascript:void(0)">地域管理</a></li>
					</ul>
				</dd>
			</dl> -->
		
			<!-- <dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 订单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li>
							<a data-href="/yixue/admin.php/Order.html" data-title="订单管理" href="javascript:void(0)">订单管理</a>
						</li>
					</ul>
				</dd>
			</dl>	 -->														
			
			<!-- <dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> Banner管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/Banner.html" data-title="Banner管理" href="javascript:void(0)">Banner管理</a></li>
					</ul>
				</dd>
			</dl> -->
			
			<!-- <dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 图文管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li>
							<a data-href="/yixue/admin.php/PictureList.html" data-title="图文管理" href="javascript:void(0)">图文管理</a>
						</li>
					</ul>
				</dd>
			</dl> -->
			<!-- <dl id="menu-product">
				<dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>
							<li><a data-href="/yixue/admin.php/Product_brand.html" data-title="品牌管理" href="javascript:void(0)">品牌管理</a></li>
							<li><a data-href="/yixue/admin.php/Product_category.html" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>
							<li><a data-href="/yixue/admin.php/Product_zfcategory.html" data-title="政府分类管理" href="javascript:void(0)">政府分类管理</a></li>
							<li><a data-href="/yixue/admin.php/Product_shuidian.html" data-title="税点管理" href="javascript:void(0)">税点管理</a></li>
							<li><a data-href="/yixue/admin.php/Jisuan.html" data-title="价格计算" href="javascript:void(0)">价格计算器</a></li>
							<li><a data-href="/yixue/admin.php/Product.html" data-title="产品管理" href="javascript:void(0)">产品管理</a></li>
						</ul>
					</dd>
			</dl> -->
		
			<dl id="menu-comments">
				<dt><i class="Hui-iconfont">&#xe622;</i> 栏目管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/Lanmu.html" data-title="栏目管理" href="javascript:;">栏目管理</a></li>
						
					</ul>
				</dd>
			</dl>

			<dl id="menu-comments">
				<dt><i class="Hui-iconfont">&#xe622;</i> 专业管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/SpecialList.html" data-title="专业管理" href="javascript:;">专业管理</a></li>
					</ul>
				</dd>
			</dl>	
		
			<!-- <dl id="menu-comments">
				<dt><i class="Hui-iconfont">&#xe622;</i> 求职管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/Liuyan.html" data-title="求职列表" href="javascript:;">求职列表</a></li>
						<li><a data-href="feedback-list.html" data-title="意见反馈" href="javascript:void(0)">意见反馈</a></li>
					</ul>
				</dd>
			</dl> -->
			
			<dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/UserList.html" data-title="会员列表" href="javascript:;">会员列表</a></li>
						
					</ul>
				</dd>
			</dl>
			<?php if($admin_info['username'] == 'tygytc'): ?><dl id="menu-article">
					<dt><i class="Hui-iconfont">&#xe616;</i> 公司信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>
							<li><a data-href="/yixue/admin.php/WebInfo/index" data-title="公司信息" href="javascript:void(0)">公司信息</a></li>
							
						</ul>
					</dd>
				</dl><?php endif; ?>
		
			<dl id="menu-admin">
				<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<!-- <li><a data-href="/yixue/admin.php/Admin_role.html" data-title="角色管理" href="javascript:void(0)">角色管理</a></li> -->
						<!-- <li><a data-href="/yixue/admin.php/Admin_permission.html" data-title="权限管理" href="javascript:void(0)">权限管理</a></li> -->
						<li><a data-href="/yixue/admin.php/Admin_list.html" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
						<!-- <li><a data-href="/yixue/admin.php/Admin_bumen.html" data-title="部门列表" href="javascript:void(0)">部门列表</a></li> -->
						<!-- <li><a data-href="/yixue/admin.php/Admin_working.html" data-title="岗位管理" href="javascript:void(0)">岗位管理</a></li> -->
					</ul>
				</dd>
			</dl>
			
			<!-- <dl id="menu-member">
				<dt><i class="Hui-iconfont">&#xe60d;</i> 联系方式（底部）<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/WebInfo/lianxi" data-title="联系方式（底部）" href="javascript:;">联系方式（底部）</a></li>
						
					</ul>
				</dd>
			</dl>

			<dl id="menu-comments">
				<dt><i class="Hui-iconfont">&#xe622;</i> 友情链接/合作企业<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a data-href="/yixue/admin.php/FriendLink.html" data-title="友情链接" href="javascript:;">友情链接</a></li>
						<li><a data-href="/yixue/admin.php/FriendLinkqy.html" data-title="合作企业" href="javascript:;">合作企业</a></li>
					</ul>
				</dd>
			</dl> -->

		<!-- <dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="charts-1.html" data-title="折线图" href="javascript:void(0)">折线图</a></li>
					<li><a data-href="charts-2.html" data-title="时间轴折线图" href="javascript:void(0)">时间轴折线图</a></li>
					<li><a data-href="charts-3.html" data-title="区域图" href="javascript:void(0)">区域图</a></li>
					<li><a data-href="charts-4.html" data-title="柱状图" href="javascript:void(0)">柱状图</a></li>
					<li><a data-href="charts-5.html" data-title="饼状图" href="javascript:void(0)">饼状图</a></li>
					<li><a data-href="charts-6.html" data-title="3D柱状图" href="javascript:void(0)">3D柱状图</a></li>
					<li><a data-href="charts-7.html" data-title="3D饼状图" href="javascript:void(0)">3D饼状图</a></li>
			</ul>
		</dd>
			</dl> -->
		<!-- <dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="system-base.html" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
					<li><a data-href="system-category.html" data-title="栏目管理" href="javascript:void(0)">栏目管理</a></li>
					<li><a data-href="system-data.html" data-title="数据字典" href="javascript:void(0)">数据字典</a></li>
					<li><a data-href="system-shielding.html" data-title="屏蔽词" href="javascript:void(0)">屏蔽词</a></li>
					<li><a data-href="system-log.html" data-title="系统日志" href="javascript:void(0)">系统日志</a></li>
			</ul>
		</dd>
			</dl> -->
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.html">我的桌面</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="/yixue/admin.php/Index/welcome.html"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/yixue/public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/yixue/public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/yixue/public/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}

/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*产品-添加*/
function product_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}


</script> 

<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>