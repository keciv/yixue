<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class ClassAddController extends BaseController {
	public function index(){
		$special=M("special")->where("parentID != 0")->select();
		$kecheng_type=M("class_type")->select();
		$this->assign("caozuo",'add');
		$this->assign("special",$special);
		$this->assign("kecheng_type",$kecheng_type);
		$this->display();
	}
	public function add(){
		if (!empty($_POST)){
			$class_title=$_POST['class_name'];
			$special=$_POST['special'];
    		$class_type=$_POST['class_type'];
			$imageurl=$_POST['hidden_filePicker'];
			$price=$_POST['price'];
			$cat_id=$_POST['cat_id'];
			$content=$_POST['content'];
			$result=M("class")->data(array('class_title'=>$class_title,'specialty'=>$special,'class_type'=>$class_type,'imageurl'=>$imageurl,'price'=>$price,"content"=>$content,"cat_id"=>$cat_id))->add();
			if ($result>0){
				jump("添加成功！",__APP__."/ClassAdd/index");
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
		$special=M("special")->where("parentID != 0")->select();
		$kecheng_type=M("class_type")->select();
		$this->assign("special",$special);
		$this->assign("kecheng_type",$kecheng_type);
		$class = M("class")->where("id='{$id}'")->find();
		$this->assign('class',$class);

		$this->assign("caozuo",'edit');

		$this->display('ClassAdd/index');
	}

	public function edit(){
		if (!empty($_POST)){
			$id=$_POST['id'];
			$class_name=$_POST['class_name'];
			$special=$_POST['special'];
    		$class_type=$_POST['class_type'];
    		if($class_type==0){
    			$price=0;
    		}else{
    			$price=$_POST['price'];
    		}
			$imageurl=$_POST['hidden_filePicker'];
			$content=$_POST['content'];
            $arr = array(
                'class_title' => $class_name,
                'specialty' => $special,
                'class_type' => $class_type,
                'imageurl' => $imageurl,
                'price' => $price,
                'content' => $content
            );
            $result = M("class")->where("id='{$id}'")->save($arr);
			if (false!==$result){
				$this->success("修改成功！",__APP__."/Class_edit_$id.html");
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