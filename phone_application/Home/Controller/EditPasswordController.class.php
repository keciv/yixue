<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class EditPasswordController extends BaseController {
	public function index(){
		$this->display();
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

	public function edit(){
		$pass=I("oldpass");
		$password=I("newpassword");
		$password1=I("newpassword1");
		$oldpass=md5($pass);
		$id=cookie("userID");
		$result=M("user")->where("id={$id} and password='{$oldpass}'")->find();
		// var_dump($result);
		if($result!=null){
			if($password===$password1){
				$newpass=md5($password);
				$res=M("user")->where("id={$id}")->save(array('password'=>$newpass));
				if($res!==false){
					cookie('phone',null);
		            cookie('userID',null);
		            cookie('nickname',null);
					exit("1");
				}else{
					exit("no");
				}
			}else{
				exit("noteq");
			}
		}else{
			exit("kong");
		}
	}
}
    
    
    
    
    
    
    
    
    
    
    
    
    
