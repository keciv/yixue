<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class DanyeController extends BaseController {
	public function index(){
		$id=$_GET['id'];
		
		$danye=M("danye")->where("lanmuID='{$id}'")->find();
		$this->assign("danye",$danye);
		
		$lanmu=M("lanmu")->where("id={$id}")->find();
		$this->assign("lanmu",$lanmu);	
		
		$this->display();
	}

	public function edit(){
		$lanmuID=$_GET['lanmuID'];
		$content=$_POST['content'];
		$title=$_POST['title'];
		if($lanmuID!=null)
		{
			$new=M("danye")->where("lanmuID='{$lanmuID}'")->find();
			if($new>0)
			{
				//该栏目有内容，修改
				$result=M("danye")->where("lanmuID='{$lanmuID}'")->save(array('content'=>$content,'title'=>$title));
			}
			else
			{
				//该栏目没有内容，添加
				$result=M("danye")->data(array('lanmuID'=>$lanmuID,'content'=>$content,'title'=>$title))->add();
			}
			if (false!==$result){
                jump("修改成功！",__APP__."/Danye_$lanmuID");
            }else {
                $this->success("修改失败！");
            }
		}
        
    }
}