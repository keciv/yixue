<?php
return array(
/* 默认设定 */
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
	'DEFAULT_ACTION'        =>  'index', // 默认操作名称
/* 模板引擎设置 */
	'TMPL_ACTION_ERROR'     =>  'Public:success', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   =>  'Public:success', // 默认成功跳转对应的模板文件
	'URL_MODEL'             =>  1,
/*默认路由规则 针对模块*/
	'URL_ROUTE_RULES'       =>  array(	
		
		// 管理员管理
		'/^Admin_role$/'=>'AdminList/admin_role',	
		'/^Admin_permission$/'=>'AdminList/Admin_permission',
		'/^Admin_role_add$/'=>'AdminAdd/admin_role_add',
		'/^Admin_role_edit_(\d+)$/'=>'AdminAdd/role_info?id=:1',


		'/^Admin_list$/'=>'AdminList/index',
		'/^Admin_add$/'=>'AdminAdd/index',
		'/^Admin_edit_(\d+)$/'=>'AdminAdd/info?id=:1',
		
		'/^Banner$/'=>'BannerList/index',
		'/^Banner_add$/'=>'BannerAdd/index',
		'/^Banner_show$/'=>'BannerList/show',
		'/^Banner_edit_(\d+)$/'=>'BannerAdd/info?id=:1',

		'/^Level$/'=>'LevelList/index',
		'/^Level_add$/'=>'LevelAdd/index',
		'/^Level_show$/'=>'LevelList/show',
		'/^Level_edit_(\d+)$/'=>'LevelAdd/info?id=:1',

		/*商品*/		
		'/^Product$/'=>'ProductList/index',
		'/^Product_add$/'=>'ProductAdd/index',
		'/^Product_show$/'=>'ProductList/show',
		'/^Product_edit_(\d+)$/'=>'ProductAdd/info?id=:1',
		//品牌
		'/^Product_brand$/'=>'ProductList/brand',
		'/^Product_brand_add$/'=>'ProductAdd/brand',
		'/^Product_brand_edit_(\d+)$/'=>'ProductAdd/brand_info?id=:1',
		//分类
		'/^Product_category$/'=>'ProductList/category',
		'/^Product_category_add$/'=>'ProductAdd/category',
		'/^Product_category_edit_(\d+)$/'=>'ProductAdd/category_info?id=:1',
		//政府分类
		'/^Product_zfcategory$/'=>'ProductList/zfcategory',
		'/^Product_zfcategory_add$/'=>'ProductAdd/zfcategory',
		'/^Product_zfcategory_edit_(\d+)$/'=>'ProductAdd/zfcategory_info?id=:1',
		//税点
		'/^Product_shuidian$/'=>'ProductList/shuidian',
		'/^Product_shuidian_add$/'=>'ProductAdd/shuidian',
		'/^Product_shuidian_edit_(\d+)$/'=>'ProductAdd/shuidian_info?id=:1',
		//价格计算器
		'/^Jisuan$/'=>'ProductAdd/jisuan',

		//地域
		'/^Address$/'=>'AddressList/index',
		'/^Address_add$/'=>'AddressAdd/index',
		'/^address_edit_(\d+)$/'=>'ProductAdd/info?id=:1',

		//管理员管理
		'/^Admin_working$/'=>'AdminList/working',
		'/^Admin_working_add$/'=>'AdminAdd/working',
		'/^Admin_working_edit_(\d+)$/'=>'AdminAdd/working_info?id=:1',
		
		//栏目管理
		'/^Lanmu$/'=>'LanmuList/index',
		'/^Lanmu_add$/'=>'LanmuAdd/index',
		'/^Lanmu_edit_(\d+)$/'=>'LanmuAdd/info?id=:1',
		
		//资讯管理
		'/^NewList$/'=>'NewList/index',
		'/^New_add$/'=>'NewAdd/index',
		'/^New_edit_(\d+)$/'=>'NewAdd/info?id=:1',

		//图文管理
		'/^PictureList$/'=>'PictureList/index',
		'/^Picture_add$/'=>'PictureAdd/index',
		'/^Picture_edit_(\d+)$/'=>'PictureAdd/info?id=:1',
		//友情链接/合作企业
		'/^FriendLink$/'=>'FriendLinkList/index',
		'/^FriendLinkqy$/'=>'FriendLinkList/indexqy',
		'/^FriendLink_add$/'=>'FriendLinkAdd/index',
		'/^FriendLink_edit_(\d+)$/'=>'FriendLinkAdd/info?id=:1',

		//资讯管理
		'/^NewList$/'=>'NewList/index',
		'/^New_add$/'=>'NewAdd/index',
		'/^New_edit_(\d+)$/'=>'NewAdd/info?id=:1',

		//会员管理
		'/^UserList$/'=>'UserList/index',
		'/^User_add$/'=>'UserAdd/index',
		'/^User_edit_(\d+)$/'=>'UserAdd/info?id=:1',
		//专业和分类
		'/^SpecialList$/'=>'SpecialList/index',
		'/^Special_add$/'=>'SpecialAdd/index',
		'/^Special_edit_(\d+)$/'=>'SpecialAdd/info?id=:1',
		'/^Type_add$/'=>'TypeAdd/index',
		'/^Admin_permission_edit$/'=>'AdminList/admin_permission_edit',

		//问题管理
		'/^QuestionList$/'=>'QuestionList/index',
		'/^Question_edit_(\d+)$/'=>'Detail/info?id=:1',
		//意见管理
		'/^IdeaList$/'=>'IdeaList/index',
		'/^Idea_edit_(\d+)$/'=>'Detail/yijian?id=:1',
		//单页管理
		'/^Danye_(\d+)$/'=>'Danye/index?id=:1',
		'/^Danye_edit_(\d+)$/'=>'Danye/edit?lanmuID=:1',

		//课程管理
		'/^ClassList_(\d+)$/'=>'ClassList/index?id=:1',
		'/^Class_add$/'=>'ClassAdd/index',
		'/^Class_edit_(\d+)$/'=>'ClassAdd/info?id=:1',
		//课程类型
		'/^ClassTypeList_(\d+)$/'=>'ClassTypeList/index?id=:1',
		'/^ClassType_add$/'=>'ClassTypeAdd/index',
		'/^ClassType_edit_(\d+)$/'=>'ClassTypeAdd/info?id=:1',
		//章节管理
		'/^ZhangjieList_(\d+)$/'=>'ZhangjieList/index?id=:1',
		'/^Zhangjie_add$/'=>'ZhangjieAdd/index',
		'/^Zhangjie_edit_(\d+)$/'=>'ZhangjieAdd/info?id=:1',

		//试题管理
		'/^ShitiList_(\d+)$/'=>'ShitiList/index?id=:1',
		'/^Shiti_add$/'=>'ShitiAdd/index',
		'/^Shiti_edit_(\d+)$/'=>'ShitiAdd/info?id=:1',

		//订单管理
		'/^Order$/'=>'Order/index',
		'/^Order_status_(\d+)$/'=>'Order/index?order_status=:1',
		'/^Order_info_(\d+)$/'=>'OrderInfo/index?id=:1',
		
		//留言管理
		'/^Liuyan$/'=>'Liuyan/index',
		'/^Liuyan_chakan_(\d+)$/'=>'Liuyan/chakan?id=:1',

		'/^PictureShow_(\d+)$/'=>'PictureShow/index?contentid=:1',
		'/^PictureShow_(\d+)_(\d+)$/'=>'PictureShow/index?courseID=:1&zjID=:2',
		
	), 

);