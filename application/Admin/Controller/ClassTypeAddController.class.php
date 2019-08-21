<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class ClassTypeAddController extends BaseController {
	public function index(){
		// $special=M("special")->where("parentID != 0")->select();
		// $kecheng_type=M("class_type")->select();
		$this->assign("caozuo",'add');
		// $this->assign("special",$special);
		// $this->assign("kecheng_type",$kecheng_type);
		$this->display();
	}
	public function add(){
		if (!empty($_POST)){
			$type_name=$_POST['type_name'];
			$result=M("class_type")->where("type_name ='{$type_name}'")->find();
			if($result){
				jump("该分类已存在！");
			}
			$parentID=0;
			$result=M("class_type")->data(array('parentID'=>$parentID,'type_name'=>$type_name))->add();
			if ($result>0){
				jump("添加成功！",__APP__."/ClassTypeAdd/index");
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
		$type=M("class_type")->where("id={$id}")->find();
		$this->assign('type',$type);

		$this->assign("caozuo",'edit');

		$this->display('ClassTypeAdd/index');
	}

	public function edit(){
		if (!empty($_POST)){
			$id=$_POST['id'];
			$type_name=$_POST['type_name'];
			$result=M("class_type")->where("type_name ='{$type_name}'")->find();
			if($result){
				jump("该分类已存在！");
				die();
			}
			$result=M("class_type")->where("id='{$id}'")->save(array('type_name'=>$type_name));
			if (false!==$result){
				$this->success("修改成功！",__APP__."/ClassType_edit_$id.html");
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