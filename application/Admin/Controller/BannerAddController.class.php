<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class BannerAddController extends BaseController {
	public function index(){		
		$this->assign("caozuo",'add');
		$this->display();
	}
	public function add(){
		if (!empty($_POST)){
			$title=$_POST['title'];
			$type=$_POST['type'];
    		$specifyurl=$_POST['specifyurl'];
			$imageurl=$_POST['hidden_filePicker'];
			$last = M("banner")->order('SortID desc')->find();
			$result=M("banner")->data(array('title'=>$title,'specifyurl'=>$specifyurl,'type'=>$type,'imageurl'=>$imageurl,'SortID'=>$last['SortID']+1))->add();
			if ($result>0){
				jump("添加成功！",__APP__."/BannerAdd/index");
			}else {
				jump("添加失败！");
			}
		}
		else
		{
			$this->success("请输入内容后再添加");
		}
	}
	
	public function Info(){
		$id=I('get.id');
		$banner = M("banner")->where("id='{$id}'")->find();
		$this->assign('banner',$banner);

		$this->assign("caozuo",'edit');

		$this->display('BannerAdd/index');
	}

	public function edit(){
		if (!empty($_POST)){
			$id=$_POST['id'];
			$title=$_POST['title'];
			$type=$_POST['type'];
    		$specifyurl=$_POST['specifyurl'];
			$imageurl=$_POST['hidden_filePicker'];
			$result=M("banner")->where("id='{$id}'")->save(array('title'=>$title,'specifyurl'=>$specifyurl,'type'=>$type,'imageurl'=>$imageurl));
			if (false!==$result){
				$this->success("修改成功！",__APP__."/Banner_edit_$id.html");
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
		$id=$_GET['id'];
		if($id!=null)
		{
			$result=M("banner")->where("id=$id")->delete();
			if ($result>0) {
				jump("删除成功！",__APP__."/BannerList/index");
			}else {
				jump("删除失败！",__APP__."/BannerList/index");
			}
		}
		else
		{
			jump("请选择要删除的数据");
		}
	}

	// 批量删除
    public function delete_all(){
        $id = I("form");
        $mysql=I("sql");
        $sql=M($mysql);
        if($sql->delete($id)){
              $data=1;
              $this->ajaxReturn($data);
          }
    }

	//排序ID修改
    public function edit_sequence_id(){
        $sort=$_POST['sort'];
        $id = $_POST['id'];
        $sequence_id = M("banner")->where("id = $id")->save(array("SortID"=>$sort));
        if($sequence_id>0){
            exit("ok");
        }else{
            exit("error");
        }
    } 

    // 状态改变
    public function edit_status(){
        $id = I("id");
        $mysql = I("mysql");
        $sql=M($mysql);
        $status=I("status");
        if($status==1){
            $edit_status=0;
        }else if($status==0){
            $edit_status=1;
        }
        $result=$sql->where("id={$id}")->setField('status',$edit_status);
            if ($result>0) {
                $data="ok";
            }else {
                $data="error";
            }
        exit($data);    
    }

}