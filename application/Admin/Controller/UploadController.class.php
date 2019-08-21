<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
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
		// print_r($name);
		/*fileID*//*$_FILES[$name]['type']=="video/mp4" ||$_FILES[$name]['type']=="video/x-matroska"*/
		//上传 1
		if ($_FILES[$name]['type']=="image/gif" ||$_FILES[$name]['type']=="image/jpg" ||$_FILES[$name]['type']=="image/jpeg" ||$_FILES[$name]['type']=="image/png" ||$_FILES[$name]['type']=="image/x-png" ||$_FILES[$name]['type']=="video/x-matroska" ||$_FILES[$name]['type']=="video/mp4" ||$_FILES[$name]['type']=="video/avi" ||$_FILES[$name]['type']=="audio/mp3") {
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
				exit(json_encode($_FILES[$name]));
		}


	}
}
    
    
    
    
    
    
    
    
    
    
    
    
    
