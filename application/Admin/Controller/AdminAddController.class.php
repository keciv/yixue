<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class AdminAddController extends BaseController {
	public function index(){
        $this->assign("caozuo",'add');

        /*$role = M("role")->order("id asc")->select();
        $this->assign("role",$role);

        $working = M("working")->order("id asc")->select();
        $this->assign("working",$working);*/


		$this->display();
	}

	public function add(){
		if (!empty($_POST)){
            $name=$_POST['name'];
	    	$username=$_POST['username'];
	    	$password=$_POST['password'];
	    	$password2=$_POST['password2'];
            

            if($username==null||$password==null||$password2==null)
            {
                $this->success("请输入完成内容后再添加！");
            }
            $isHave = M("admin")->where("username='$username'")->find();
            if($isHave>0)
            {
                jump("该账号已存在！",__APP__."/AdminAdd/index");
            }
            if($password==$password2)
            {
                $result=M("admin")->data(array('name'=>$name,'username'=>$username,'password'=>$password))->add();
                if($result>0){
                    jump('添加成功！',__APP__."/AdminAdd/index");
                }else{
                    jump("添加失败！",__APP__."/AdminAdd/index");
                }
            }
            else
            {
               jump("两次密码不一样！",__APP__."/AdminAdd/index"); 
            }
        }
    }
    
    public function Info(){

        $id=I('get.id');
        $admin = M("admin")->where("id='{$id}'")->find();
        $this->assign('admin',$admin);

        $this->assign("caozuo",'edit');
        $this->display('AdminAdd/index');
    }

    public function edit(){
        if (!empty($_POST)){
            $id=$_POST['id'];
            $name=$_POST['name'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            
            if($id==null)
            {
                $this->success("请选择要修改数据！");
                
            }
            if($username==null||$password==null)
            {
                $this->success("请输入完成信息后再修改");
            }
            $result=M("admin")->where("id='{$id}'")->save(array('name'=>$name,'username'=>$username,'password'=>$password));
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
        $id=$_GET['id'];
        if($id!=null)
        {
            $result=M("admin")->where("id={$id}")->delete();
            if ($result>0) {
                jump('删除成功！',__APP__."/AdminList/index");
            }else {
                jump('删除失败！',__APP__."/AdminList/index");
            }
        }
        else
        {
            $this->success("请选择要删除的数据");
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