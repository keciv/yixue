<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class DanyeController extends BaseController {
    public function index(){
		$parentID=$_GET['id'];
    	$content=M("danye")->where("lanmuID={$parentID}")->find();
    	$this->assign("content",$content);
    	
    	$this->display();
    }
    
    public function vote(){
        $huodongID=$_GET['huodongID'];
        $huodong=M("huodong")->where("id={$huodongID}")->find();
        $this->assign("huodong",$huodong);
        
        $cha_cansai=$_POST['cha_cansai'];
        $this->assign("cha_cansai",$cha_cansai);


        $cansai=M("cansai")->where("name='$cha_cansai' and status=0")->select();
        if($cha_cansai!==null){
            
            if($cansai==null){
                $cansai=M("cansai")->where("cansaiID='$cha_cansai' and status=0")->select();
                if($cansai==null){
                    $data_msg='很抱歉，您查询的人不存在！';
                    $this->assign("data_msg",$data_msg);
                }
            }
            
        }
        
        $this->assign("cansai",$cansai);
    	$this->display();
    }

    public function voteinfo(){
		$cansaiID=$_GET['cansaiID'];
    	$new=M("cansai")->where("id={$cansaiID}")->find();
        $this->assign("new",$new);

    	$this->display();
    }

    public function numadd(){
		$id=$_POST['id'];
        $find=M("cansai")->where("id={$id}")->find();
        $userID=$_COOKIE['userID'];
        $day=date("d");;
        $find_user=M("user")->where("id={$userID}")->find();
        $find_vote=M("vote")->where("userID={$userID} and day=$day")->count();
        
        $data=array();

        if($find_vote<3){
            $num=$find['num']+1;
        }else{
            $num=$find['num'];
            $data['status']="man";
            $data['num']=$num;
            exit(json_encode($data));
        }
        
// exit($num);
    	$result=M("cansai")->where("id={$id}")->save(array('num'=>$num));
    	if($result>0){
            $data['status']="ok";
            $data['num']=$num;
            exit(json_encode($data));
        }else{
            $data['status']="no";
            $data['num']=$num;
            exit(json_encode($data));
        }
    }

	public function yu_yue(){
		$name=I('name');
    	$phone=I('phone');
        $data=array();
        $data['name']=$name;
        $data['phone']=$phone;
        
        if($name!=null || $phone!=null){
            $find_liuyan=M("liuyan")->where("name='$name' and phone='$phone'")->find();
            if($find_liuyan!=null){
                exit('you');
            }else{
                $liuyan_add=M("liuyan")->add($data);
                if($liuyan_add>0){
                    exit('ok');
                }else{
                    exit('error');
                }
            }
        }else{
            exit('kong');
        }
    }

}