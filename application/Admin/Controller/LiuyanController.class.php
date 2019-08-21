<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class LiuyanController extends BaseController {
	public function index(){

		//重置筛选
		if($_GET['reset']==1){
			$_POST=null;
			cookie('nickname',null);
			cookie('type',null);
			cookie('number',null);
			cookie('dateandtime',null);
			cookie('phone',null);
		}

		//条件筛选
		/*昵称*/
		if($_POST['nickname']!==null){
			$nickname=$_POST['nickname'];
			cookie('nickname',$nickname);
		}else{
			$nickname=$_COOKIE['nickname'];
		}
		$this->assign("nickname",$nickname);

		/*困惑类型*/
		if($_POST['type']!==null){
			$type=$_POST['type'];
			cookie('type',$type);
		}else{
			$type=$_COOKIE['type'];
		}
		$this->assign("type",$type);

		/*学号*/
		if($_POST['number']!==null){
			$number=$_POST['number'];
			cookie('number',$number);
		}else{
			$number=$_COOKIE['number'];
		}
		$this->assign("number",$number);

		/*时间*/
		if($_POST['dateandtime']!==null){
			$dateandtime=$_POST['dateandtime'];
			cookie('dateandtime',$dateandtime);
		}else{
			$dateandtime=$_COOKIE['dateandtime'];
		}
		$this->assign("dateandtime",$dateandtime);
		
		/*手机号*/
		if($_POST['phone']!==null){
			$phone=$_POST['phone'];
			cookie('phone',$phone);
		}else{
			$phone=$_COOKIE['phone'];
		}
		$this->assign("phone",$phone);

		$totalRow=M("liuyan")->count();
		// $totalRow=M('liuyan')
  //           ->Field('liuyan.id,liuyan.max_type,liuyan.type,liuyan.dateandtime,liuyan.content,user.nickname,user.phone,user.username,user.name,user.number')
  //           ->join('user on user.id=liuyan.userID')
  //           ->where("liuyan.max_type='困惑' and user.nickname like '%{$nickname}%' and user.number like '%{$number}%' and liuyan.type like '%{$type}%' and liuyan.dateandtime like '%{$dateandtime}%' and user.phone like '%{$phone}%'")
  //           ->order('liuyan.userID desc')
  //           ->count();


		$page = new Page($totalRow,10);
// print_r($_POST);
		//多表联查
		/*$list=M('liuyan')
            ->Field('liuyan.id,liuyan.max_type,liuyan.type,liuyan.dateandtime,liuyan.content,user.nickname,user.phone,user.username,user.name,user.number')
            ->join('user on user.id=liuyan.userID')
            ->where("liuyan.max_type='困惑' and user.nickname like '%{$nickname}%' and user.number like '%{$number}%' and liuyan.type like '%{$type}%' and liuyan.dateandtime like '%{$dateandtime}%' and user.phone like '%{$phone}%'")
            ->order('liuyan.userID desc')->limit("$page->firstRow,$page->listRows")
            ->select();*/

		$liuyan=M("liuyan")->order("id desc")->limit("$page->firstRow,$page->listRows")->select();
		
		$this->assign("pagelist",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("liuyan",$liuyan);
		$this->display();
	}

	public function comment(){

		//重置筛选
		if($_GET['reset']==1){
			$_POST=null;
			cookie('nickname',null);
			cookie('number',null);
			cookie('dateandtime',null);
			cookie('phone',null);
		}

		//条件筛选
		/*昵称*/
		if($_POST['nickname']!==null){
			$nickname=$_POST['nickname'];
			cookie('nickname',$nickname);
		}else{
			$nickname=$_COOKIE['nickname'];
		}
		$this->assign("nickname",$nickname);

		/*学号*/
		if($_POST['number']!==null){
			$number=$_POST['number'];
			cookie('number',$number);
		}else{
			$number=$_COOKIE['number'];
		}
		$this->assign("number",$number);

		/*时间*/
		if($_POST['dateandtime']!==null){
			$dateandtime=$_POST['dateandtime'];
			cookie('dateandtime',$dateandtime);
		}else{
			$dateandtime=$_COOKIE['dateandtime'];
		}
		$this->assign("dateandtime",$dateandtime);
		
		/*手机号*/
		if($_POST['phone']!==null){
			$phone=$_POST['phone'];
			cookie('phone',$phone);
		}else{
			$phone=$_COOKIE['phone'];
		}
		$this->assign("phone",$phone);

		// $totalRow=M("liuyan")->where("liuyan.max_type='评论' and user.nickname like '%{$nickname}%' and user.number like '%{$number}%' and liuyan.dateandtime like '%{$dateandtime}%' and user.phone like '%{$phone}%'")->count();
		$totalRow=M('liuyan')
            ->Field('liuyan.id,liuyan.max_type,liuyan.type,liuyan.dateandtime,liuyan.content,user.nickname,user.phone,user.username,user.name,user.number')
            ->join('user on user.id=liuyan.userID')
            ->where("liuyan.max_type='评论' and user.nickname like '%{$nickname}%' and user.number like '%{$number}%' and liuyan.dateandtime like '%{$dateandtime}%' and user.phone like '%{$phone}%'")
            ->order('liuyan.userID desc')
            ->count();
            // print_r($totalRow);

		$page = new Page($totalRow,10);

		//多表联查
		$list=M('liuyan')
            ->Field('liuyan.id,liuyan.max_type,liuyan.type,liuyan.dateandtime,liuyan.content,user.nickname,user.phone,user.username,user.name,user.number')
            ->join('user on user.id=liuyan.userID')
            ->where("liuyan.max_type='评论' and user.nickname like '%{$nickname}%' and user.number like '%{$number}%' and liuyan.dateandtime like '%{$dateandtime}%' and user.phone like '%{$phone}%'")
            ->order('liuyan.userID desc')->limit("$page->firstRow,$page->listRows")
            ->select();

		/*$totalRow=M("liuyan")->count();
		$page = new Page($totalRow,10);
		$list=M("liuyan")->where("max_type='评论'")->order("id desc")->limit("$page->firstRow,$page->listRows")->select();*/
		
		$this->assign("pagelist",$page->show());
		$this->assign("list",$list);
		$this->display();
	}

	public function chakan(){
		$id=I('id');
		$info=M("liuyan")->find($id);
		$this->assign("info",$info);
		$this->display();
	}
	
	public function del(){
		$id=$_GET['id'];
		
		$result=M("liuyan")->where("id={$id}")->delete();
		if ($result>0) {
			$this->success("删除成功！",__APP__."/Liuyan/index");
		}else {
			$this->success("删除失败！");
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
	 
}