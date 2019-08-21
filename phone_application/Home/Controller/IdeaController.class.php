<?php 
namespace Home\Controller;
use Home\Controller\BaseController;
class IdeaController extends BaseController {
	public function index(){
		$this->display();
	}

	public function add(){
		$userid=cookie('userID');
		$content=$_POST['content'];
		if($content!=null){
			$result=M("idea")->data(array("userID"=>$userid,'content'=>$content,'type'=>'0'))->add();
			if($result>0){
				exit('ok');
			}else{
				exit("error");
			}
		}else{
			exit("kong");
		}
	}








}
 ?>