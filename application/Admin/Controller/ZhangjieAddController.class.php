<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class ZhangjieAddController extends BaseController {
	public function index(){
		$className=M("class")->select();
		$this->assign("caozuo",'add');
		$this->assign("className",$className);
		$this->display();
	}
	public function add(){
		dump($_POST);
		if (!empty($_POST)){
			$title=$_POST['title'];
			$class=$_POST['class'];
			$video_path=$_POST['videourl'];
			$result=M("zhangjie")->data(array('title'=>"{$title}",'classID'=>$class,'video_path'=>$video_path))->add();
			if ($result>0){
				jump("添加成功！",__APP__."/ZhangjieAdd/index");
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
		$zhangjie=M("zhangjie")->where("id=$id")->find();
		$className=M("class")->select();
		$this->assign('zhangjie',$zhangjie);
		$this->assign("className",$className);
		$this->assign("caozuo",'edit');
		$this->display('ZhangjieAdd/index');
	}

	public function edit(){
		if (!empty($_POST)){
			$id=$_POST['id'];
			$title=$_POST['title'];
			$class=$_POST['class'];
			$video_path=$_POST['videourl'];
			$result=M("zhangjie")->where("id='{$id}'")->save(array('title'=>$title,'classID'=>$class,'video_path'=>$video_path));
			if (false!==$result){
				$this->success("修改成功！",__APP__."/Zhangjie_edit_$id.html");
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

    public function start_upload()
    {
        if(IS_AJAX)
        {
            $file = $_FILES['filePicker'];
			
            if(move_uploaded_file($file['tmp_name'],"./Public/upload/Video/".iconv("UTF-8", "gbk", $file['name']))){
                $pathArr = array(
                    "path"      =>      "/Public/upload/Video/".$file['name'],
                    "code"      =>      200
                );
                $this->ajaxReturn($pathArr);
            }else{
                $this->ajaxReturn("no");
            }
        }
    }

}