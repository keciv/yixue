<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class BannerListController extends BaseController {
	public function index(){
		
		$totalRow=M("banner")->order("SortID desc")->count();
		$this->assign("totalRow",$totalRow);
		$page = new Page($totalRow,10);
		$banner=M("banner")->order("SortID desc")->limit("$page->firstRow,$page->listRows")->select();
		
		$this->assign("pagelist",$page->show());
		$this->assign("banner",$banner);
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
	
		if ($_FILES['filePicker']['type']=="image/gif" ||
	
		$_FILES['filePicker']['type']=="image/jpg" ||
		$_FILES['filePicker']['type']=="image/jpeg" ||
		$_FILES['filePicker']['type']=="image/png" ||
		$_FILES['filePicker']['type']=="image/x-png") {
			;
	
			if ($_FILES['filePicker'][error]==0){
	
	
				$filename=$_FILES['filePicker'][name];
				$ext=exTension($filename);
				$filename=isdate().'.'.$ext;
	
				$msg=move_uploaded_file($_FILES['filePicker']['tmp_name'],'public/upload/images/'.$filename);
					
				if ($msg>0) {
					$json=array(a=>1,b=>$filename);
					exit(json_encode($json));
				}else{
					$json=-1;
					exit(json_encode($json));
				}
			}
		}else{
			$json=0;
			exit(json_encode($json));
		}
	}
	}
	
	
