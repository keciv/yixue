<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class UserAddController extends BaseController {
	
    public function index(){
    	//$lanmu=M("lanmu")->where("parentid=0 and controller='NewList'")->order("SortID asc")->select();
        $newlist = getlanmuList('NewList');
    	$this->assign("lanmu",$newlist);
        $this->assign("caozuo",'add');
        $last = M("news")->order('sortid desc')->find();
        $SortID=$last['SortID']+1;
        $this->assign("SortID",$SortID);
    	$this->display();
    }
    	
    public function add(){
        $name = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $exp='/^1[3-9][0-9]{9}$/';
        preg_match($exp, $phone , $have);
        if($have[0]==null){
            exit("phone_no");
        }
    	if (!empty($name) && !empty($password)){
    		$password = md5($password);
            $isHave=M("user")->where("name='{$name}'")->find();
            $time=date("Y-m-d H:i:s");
            
            if($isHave!=null){
                exit("have");
            }else{
                $result=M("user")->data(array('name'=>$name,'time'=>$time,'password'=>$password,'nickname'=>$name,'phone'=>$phone))->add();
                if ($result>0){
                    exit("ok");
                }else{
                    exit("error");
                } 
            }
   		}else{
            $this->success("请填写资料后再添加！");
        }
    }

    public function Info(){
        $id=I('get.id');
        $user = M("user")->where("id={$id}")->find();
        $this->assign('user',$user);

        $this->assign("caozuo",'edit');
        $this->display('UserAdd/index');
    }

    public function edit(){
            $id=$_POST['id'];
            $name=$_POST['name'];
            $password = md5($_POST['password']);
            $phone = $_POST['phone'];
            if($password!=null){
                $result=M("user")->where("id=$id")->save(array('password'=>$password,'phone'=>$phone));
                 if ($result!==false){
                    exit("ok");
                }else{
                    exit("error");
                } 
            }else{
                exit("kong");
            }
    }

    public function del(){
        $newid=$_GET['newid'];
        if($newid!=null)
        {
            $result=M("news")->where("newid={$newid}")->delete();
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

    public function delall(){
        $getid = $_REQUEST['newid']; //获取选择的复选框的值
        if (!$getid)
        {
            $this->error('未选择记录'); 
        }
        //没选择就提示信息
        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值
        //最后进行数据操作,
        $result = M("news")->delete($id);
        if ($result>0) {
            $this->success("删除成功！");
        }else {
            $this->success("删除失败！");
        }
    }
        //排序ID修改
    public function edit_sequence_id(){
        $sort=$_POST['sort'];
        $id = $_POST['id'];
        $sequence_id = M("news")->where("newid = $id")->save(array("SortID"=>$sort));
        if($sequence_id>0){
            exit("ok");
        }else{
            exit("error");
        }
    }      
}