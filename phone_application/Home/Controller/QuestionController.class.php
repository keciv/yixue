<?php 
namespace Home\Controller;
use Home\Controller\BaseController;
class QuestionController extends BaseController {
	public function index(){
		$this->display();
	}


	public function add(){
		$userid=cookie('userID');
		$content=$_POST['content'];
		$val=$_POST['val'];
		$text="";
		foreach ($val as $key => $value) {
			$text.=$value."  ||  ";
		}
		$question=rtrim($text, "  ||  ");
		if($content!=null){
			$result=M("idea")->data(array("userID"=>$userid,'question'=>$question,'content'=>$content,'type'=>'1'))->add();
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