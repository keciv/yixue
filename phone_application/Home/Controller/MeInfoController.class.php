<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class MeInfoController extends BaseController {
	public function index(){
		$info=cookie();
		$user=M("user")->where("id={$info['userID']}")->find();
		$specialty=M("special")->where("id={$user['specialty']}")->find();
		$this->assign("specialty",$specialty);
		$this->assign("user",$user);
		$this->assign("info",$info);
		$this->display();

	}

	public function editPhone(){
		$userID=cookie("userID");
		$phone=$_POST['phone'];
		
		echo $phone;
		
		die();
		
		if($phone!=null){
			$result=M("user")->where("id={$userID}")->save(array("phone"=>$phone));
			if($result!==false){
				exit("ok");
			}else{
				exit("cuowu");
			}
		}elseif(strlen($phone)<11){
			exit("error");
		}else{
			exit("kong");
		}
	}

	public function editNickName(){
		$userID=cookie("userID");
		$nickname=$_POST['nickname'];
		if($nickname!=null){
			$result=M("user")->where("id={$userID}")->save(array("nickname"=>$nickname));
			if($result!==false){
				exit("ok");
			}else{
				exit("cuowu");
			}
		}else{
			exit("kong");
		}
	}
	public function upload(){
		date_default_timezone_set('PRC');
		function extension($n){
			return substr($n, strripos($n, '.')+1);
		}
		function isdate(){
			return md5(date('YmdHis').mt_rand(1000, 9999));
		}
		$name=$_POST['fileID'];
		
		
		if ($_FILES[$name]['type']=="image/gif" ||$_FILES[$name]['type']=="image/jpg" ||$_FILES[$name]['type']=="image/jpeg" ||$_FILES[$name]['type']=="image/png" ||$_FILES[$name]['type']=="image/x-png") {
			if($_FILES[$name][error]==0){

				$filename=$_FILES[$name][name];
				$filepath=$_POST["filePath"];
				$ext=exTension($filename);
				$filename=isdate().'.'.$ext;
				$msg=move_uploaded_file($_FILES[$name]['tmp_name'],$filepath.$filename);
				if ($msg>0) {
					$json=array(status=>"ok",filename=>$filepath.$filename);
					exit(json_encode($json));
				}else{
					$json=array(status=>"error");
					exit(json_encode($json));
				}
			}  
		}
		else{
			$json=array(status=>"null");
				exit(json_encode($json));
		}
	}
}
    
    
    
    
    
    
    
    
    
    
    
    
    
