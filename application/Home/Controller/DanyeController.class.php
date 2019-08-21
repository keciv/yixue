<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class DanyeController extends BaseController {
    public function index(){
		$parentID=$_GET['id'];
    	$content=M("danye")->where("lanmuID={$parentID}")->find();
    	$this->assign("content",$content);
    	
    	$this->display();
    }
    
    public function zxyp(){
        if($_POST!=null){
            $code=I('yzm');
            $verify = new \Think\Verify();
            if(check_code($code) === false)
            {
                // $this->success("验证码错误");
                jump("验证码错误");
                die;
            }

    		$data=array();
            $data['name']=$_POST['name'];
            $data['zhiwei']=$_POST['zhiwei'];
            $data['sex']=$_POST['sex'];
            $data['age']=$_POST['age'];
            $data['address']=$_POST['address'];
            $data['phone']=$_POST['phone'];
            $data['email']=$_POST['email'];
            $data['jianli']=$_POST['jianli'];
            $data['xueli']=$_POST['xueli'];

            $result=M("liuyan")->data($data)->add();
            if($result>0){
                jump("简历提交成功，请耐心等待！",__APP__."/Zxyp_30.html");
            }else{
                jump("简历提交失败，请刷新页面后重试！",__APP__."/Zxyp_30.html");
            }
        }        

    	$this->display();
    }

    public function xiazai(){
        $parentID=$_GET['id'];
		$content=M("picture")->where("parentID={$parentID}")->select();
        $this->assign("content",$content);
    	
    	$this->display();
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