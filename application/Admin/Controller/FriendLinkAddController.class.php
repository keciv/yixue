<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class FriendLinkAddController extends BaseController {
    public function index(){
        $this->assign("caozuo",'add');
    	$this->display();
    }
    
    public function add(){
    	if (!empty($_POST)){
            $type=$_POST['type'];
    		$title=$_POST['title'];
    		$linkurl=$_POST['linkurl'];
    		$imageurl=$_POST['hidden_filePicker'];

            /*if($title==null||$linkurl==null)
            {
                $this->success("请填写名称和网址");
            }*/
            $last = M("friendlink")->where("type='$type'")->order('sortid desc')->find();
            $SortID=$last['SortID']+1;
    		$result=M("friendlink")->data(array('title'=>$title,'type'=>$type,'imageurl'=>$imageurl,'linkurl'=>$linkurl,'SortID'=>$SortID))->add();
			
			if ($result>0){
				$this->success("添加成功！");
			}else {
				$this->success("添加失败！");
			}
    	}
        else
        {
            $this->success("请填写信息后再添加！");
        }

    }
    public function Info(){

        $id=I('get.id');
        $friendlink = M("friendlink")->where("id='{$id}'")->find();
        $this->assign('friendlink',$friendlink);
        $this->assign("caozuo",'edit');

        $this->display('FriendLinkAdd/index');
    }

    public function edit(){
        if (!empty($_POST)){
            $type=$_POST['type'];
            $id=$_POST['id'];
            $title=$_POST['title'];
            $linkurl=$_POST['linkurl'];
            $imageurl=$_POST['hidden_filePicker'];
            if($id==null)
            {
                $this->success("请选择要修改数据！");
            }
           /* if($title==null||$linkurl==null)
            {
                $this->success("请填写名称和网址");
            }*/
            $result=M("friendlink")->where("id='{$id}'")->save(array('title'=>$title,'type'=>$type,'linkurl'=>$linkurl,'imageurl'=>$imageurl));
            if (false!==$result){
                $this->success("修改成功！");
            }else {
                $this->success("修改失败！");
            }
        }
        else
        {
            $this->success("请输入内容后再修改");
        }
    }

    public function del(){
        $newid=$_GET['newid'];
        if($newid!=null)
        {
            $result=M("friendlink")->where("newid={$newid}")->delete();
            if ($result>0) {
                $this->success("删除成功！");
            }else {
                $this->success("删除失败！");
            }
        }
        else
        {
            $this->success("请选择要删除的数据");
        }
    }

    //排序ID修改
    public function edit_sequence_id(){
        $sort=$_POST['sort'];
        $id = $_POST['id'];
        $sequence_id = M("friendlink")->where("newid = $id")->save(array("SortID"=>$sort));
        if($sequence_id>0){
            exit("ok");
        }else{
            exit("error");
        }
    }      
}