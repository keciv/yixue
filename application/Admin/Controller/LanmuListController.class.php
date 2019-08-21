<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class LanmuListController extends BaseController {
	public function index(){
		//获取所有分类，递归,拼tr td
		$trStr=getTypeByTr_lanmu();
		$this->assign("trStr",$trStr);
		
		$this->display();
	}
}
