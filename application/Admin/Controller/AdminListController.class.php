<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
use ORG\Net\IpLocation;
class AdminListController extends BaseController {
	public function index(){
		
		$totalRow=M("admin")->where("roleID!=0")->count();
		$page = new Page($totalRow,10);
		$admins=M('admin')->where("roleID!=0")->select();
		$this->assign("admin",$admins);
		$this->display();
	}
}