<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class MeController extends BaseController {
//  public function __construct()
//  {
//      parent::__construct();
//      if (empty($_COOKIE['userID']) && !isset($_COOKIE['userID'])) {
//          header("Location: /Login/");
//      }
//  }

	public function index(){
		
		$info=cookie();
		$user=M("user")->where("id={$info['userID']}")->find();
		$this->assign("user",$user);
		$this->assign("info",$info);
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
	
//  public function shoucang()
//  {
//	    if(IS_AJAX){
//		    cookie("userID","5");
//		    $resData = M("collect_class as a")
//			    ->join("user on a.userID = user.id")
//			    ->join("class on a.classID = class.id")
//			    ->where("user.id = {$_COOKIE['userID']}")
//				->select();
//			$this->ajaxReturn($resData);
//		}else{
//			$this->display();
//		}
//	}
}