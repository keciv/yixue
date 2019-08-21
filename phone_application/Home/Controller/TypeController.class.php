<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class TypeController extends BaseController {
	public function index(){
		$id=cookie("userID");
		$user=M("user")->where("id = {$id}")->find();
		if($user['specialty']!=null){
			//已选专业ID
			$tid=$user['specialty'];
			$this->assign("tid",$tid);
			//上一级ID
			$type=M("special")->where("id={$user['specialty']}")->find();
			$parentID=$type['parentID'];
			//同类
			$types=M("special")->where("parentID=0")->select();
			//上一级
			$type_name=$pname['type_name'];
			
		}else{
			$types=M("special")->where("parentID=0")->select();
			$parentID=$types[0]['id'];
			$type_name=$types[0]['type_name'];
		}

		
		// foreach ($types as $k=>$v) {
		// 	$types[$k]['erji']=M("special")->where("parentID={$v['id']}")->select();
		// }
		
		$this->assign("type_name",$type_name);
		$this->assign("parentID",$parentID);
		$this->assign("types",$types);
		$this->display();
	}

	public function type_add(){
		$userID=cookie("userID");
		$specialty=$_POST['specialty'];
		$result=M("user")->where("id={$userID}")->save(array("specialty"=>$specialty));
		if($result!==false){
		    cookie("special",$specialty);
			exit("ok");
		}
	}
}
    
    
    
    
    
    
    
    
    
    
    
    
    
