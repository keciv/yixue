<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	function index(){//展现登录页面
		$this->display();	
	}
	function check(){
		//检查用户名密码是否正确
		$admin=M('admin');
		$username=$_POST['username'];
		$password=$_POST['password'];
		// $result=$admin->where("username='%s' and password='%s'",$username,$password)->find();
		$result=$admin->where("username='$username' and password='$password'")->find();

		$status=$result['status'];
		$code=I('code');
		$verify = new \Think\Verify();
		if(check_code($code) === false)
		{
			// $this->success("验证码错误");
			jump("验证码错误",__APP__."/Login.html");
			die;
		}

		if($status==0){
			if($result){
				/*登录时间*/
				$login_time=date("Y-m-d H:i:s");
				$time=M('admin')->where("id={$result['id']}")->setField('time',$login_time);
				/*登录时间*/


				$_SESSION['admin']=$result;
				$this->redirect('__APP__/Index/index');
			}else{
				// $this->success("用户名或密码不正确");
				jump("用户名或密码不正确",__APP__."/Login.html");
			}
		}else{
			jump("该账号已被禁用！",__APP__."/Login.html");
		}

		
		
	}
	
	

	function out(){
		session('username',null);
                        session('id',null);
                        session_unset();
            $this->redirect('__APP__/Login/index');
	}
	public function verify(){
		ob_clean();
		$verify = new \Think\Verify();
		$verify->fontSize=20;
		$verify->useCurve=false;
		$verify->imageH=50;
		$verify->imageW=160;
		$verify->length=4;
		$verify->entry();
	
	}
}