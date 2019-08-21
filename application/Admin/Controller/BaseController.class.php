<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
	function _initialize(){
		if(!isset($_SESSION['admin'])){
		$this->redirect('__APP__/Login/index');
			exit();
		}

		/*权限相关--开始*/
		$roleID=$_SESSION['admin']['roleID'];
        $role = M("role")->where("id=$roleID")->find();
        $admin_quanxian=explode(',',$role['quanxian']);
        $this->assign("admin_quanxian",$admin_quanxian);
		/*权限相关--结束*/

		/*获取当前登陆用户*/
		$admin_info=$_SESSION['admin'];
		$role_title=M("role")->where("id={$admin_info['roleID']}")->find();
        $admin_info['r_title']=$role_title['r_title'];
        $this->assign("admin_info",$admin_info);
	}
}