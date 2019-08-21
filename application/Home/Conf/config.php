<?php
return array(
/* 默认设定 */
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
	'DEFAULT_ACTION'        =>  'index', // 默认操作名称
/* 模板引擎设置 */
	'TMPL_ACTION_ERROR'     =>  'Index:404', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   =>  'Public:success', // 默认成功跳转对应的模板文件    StudentList
	'URL_MODEL'             =>  2,
	'URL_ROUTE_RULES'       =>  array(		
		'/^NewList_(\d+)$/'=>'NewList/index?id=:1',
		'/^PictureList_(\d+)$/'=>'PictureList/index?id=:1',
		'/^NewShow_(\d+)$/'=>'NewShow/index?contentid=:1',
		'/^PictureShow_(\d+)$/'=>'PictureShow/index?contentid=:1',
		'/^PicturetType_(\d+)$/'=>'PicturetType/index?id=:1',
		'/^Danye_(\d+)$/'=>'Danye/index?id=:1',
		
		'/^NewList_(\d+)_(\d+)$/'=>'NewList/index?id=:1&page=:2',
		'/^PictureList_(\d+)_(\d+)$/'=>'PictureList/index?id=:1&page=:2',
		'/^StudentList_(\d+)$/'=>'StudentList/index?id=:1',
		'/^StudentList_(\d+)_(\d+)$/'=>'StudentList/index?id=:1&page=:2',

		
		'/^Contact_(\d+)$/'=>'Danye/contact?id=:1',
		'/^Join_(\d+)$/'=>'Danye/join?id=:1',
		'/^Profile_(\d+)$/'=>'Danye/profile?id=:1',
		'/^Zxyp_(\d+)$/'=>'Danye/zxyp?id=:1',
		'/^Xiazai_(\d+)$/'=>'Danye/Xiazai?id=:1',
		// '/^PictureType_hangye_(\d+)$/'=>'PictureType/index?type=hangye&id=:1',
		// '/^PictureType_yingyong_(\d+)$/'=>'PictureType/index?type=yingyong&id=:1',
	), // 默认路由规则 针对模块
);