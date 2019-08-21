<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class UploadController extends BaseController {
	public function upload(){
		date_default_timezone_set('PRC');
		function extension($n){
			return substr($n, strripos($n, '.')+1);
		}
		function isdate(){
			return md5(date('YmdHis').mt_rand(1000, 9999));
		}
		$name=$_POST['fileID'];
		
		$files =$_FILES['img'];
		

		
		if ($files['type']=="image/gif" ||$files['type']=="image/jpg" ||$files['type']=="image/jpeg" ||$files['type']=="image/png" ||$files['type']=="image/x-png") {
			if($files[error]==0){

				$filename=$files['name'];
				$filepath=$_POST["filePath"];
				$ext=exTension($filename);
				$filename=isdate().'.'.$ext;
				$msg=move_uploaded_file($files['tmp_name'],$filepath.$filename);
				
				if ($msg>0) {
					$json=array(status=>"ok",filename=>$filepath.$filename);
					//数据库更新
					$userID=cookie("userID");
					$result=M("user")->where("id={$userID}")->save(array("photo"=>$filepath.$filename));
					if($result ==1){
						exit(json_encode($json));
					}else{
						exit("数据更新错误");
					}
					
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
    
    
    
    
    
    
    
    
    
    
    
    
    
