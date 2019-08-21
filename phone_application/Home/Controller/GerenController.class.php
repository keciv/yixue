<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class GerenController extends BaseController {
    public function geren(){
        $userID=$_COOKIE['userID'];
		
    	$user=M("user")->where("id={$userID}")->find();
    	$this->assign("user",$user);
    	
        //title
        $title = get_title();
        $this->assign("title",$title);

    	$this->display();
    }

    public function edituser(){
        $userID=$_COOKIE['userID'];
        /*//多图
        $data['picture'] = I('picture'); 
        //多图--结束*/
        $data['nickname']=I('nickname');
        $data['gender']=I('gender');
        $data['turename']=I('turename');
        $data['IDcard']=I('IDcard');
        $data['email']=I('email');
        $data['zhifubao']=I('zhifubao');
        $data['weixin']=I('weixin');
        $data['yinhang']=I('yinhang');
        $data['banknum']=I('banknum');
        $data['kaihuname']=I('kaihuname');


        $result=M('user')->where("id=$userID")->save($data);
        if(false!==$result){     
            exit("ok");
        }else{
            exit("error");
        }

    }

    public function grhuizhi(){
		$phone=$_COOKIE['phone'];
        $this->assign("phone",$phone);
        
        
        //title
        $title = get_title();
        $this->assign("title",$title);
    	
        $product=M('product')->select();
        $this->assign("product",$product);

    	$this->display();
    }

    public function addhuizhi(){
        $data['userID']=$_COOKIE['userID'];
        //多图
        $data['picture'] = I('picture'); 
        //多图--结束
        $data['name']=I('name');
        $data['limits']=I('limits');
        $data['time']=I('date');
        $data['paytype']=I('type');
        $data['phone']=I('phone');
        $data['invite']=I('people');
        $data['weixin']=I('weixin');
        $data['zhifubao']=I('zhifubao');
        $data['truename']=I('truename');
        $data['yinhang']=I('yinhang');
        $data['banknum']=I('banknum');
        $data['productID']=I('productID');
        $people=I('people');
        //判断推荐人是否存在
        $findtuijianren=M('user')->where("phone=$people")->find();

        //判断推荐人是否进行过投资
        $tuijianrenfirst=M('huizhi')->where("phone=$people")->count();
        
        //设定邀请人默认值为‘无’
        $data['invite']='无';

        if($people!=null){    
            if($findtuijianren!=null){
                if($tuijianrenfirst>=1){
                    $data['invite']=$people;
                }else{
                    exit('nodeal');
                }
            }else{
                exit('kong');
            }
        }
        $result=M('huizhi')->add($data);
        if($result>0){

            //判断是否为首次投资
            $first=M('huizhi')->where("phone={$data['phone']}")->count();
            if($first==1){
                //添加新人奖励
                $addshouyi['userID']=$data['userID'];
                $addshouyi['producttitle']='新人注册奖励';
                $addshouyi['type']='新人奖励';
                $findmoney1=M('money')->find(1);
                $addshouyi['money']=$findmoney1['money'];
                /*$addshouyi['status']='未审核';
                $addshouyi['huizhiID']=0;*/
                $addshouyi['time']=date('Y-m-d');
                $shouyi=M('shouyi')->add($addshouyi);
                
                //查找当前用户
                $user=M('user')->where("id={$data['userID']}")->find();
                //查找注册时所填写的邀请人，返回邀请奖励
                $zhuceyaoqing=M('user')->where("phone={$user['inviterID']}")->find();
                

                //添加奖励
                $tuijian['userID']=$zhuceyaoqing['id'];
                $tuijian['producttitle']='邀请新人奖励';
                $tuijian['type']='邀请奖励';
                $findmoney3=M('money')->find(2);
                $tuijian['money']=$findmoney3['money'];
                // $tuijian['status']='未审核';
                $tuijian['huizhiID']=$result;
                $tuijian['time']=date('Y-m-d');
                $shouyi=M('shouyi')->add($tuijian);
            }

            if($findtuijianren!=null){
                $tuijianID=$findtuijianren['id'];
                //添加奖励
                $tuijianshouyi['userID']=$tuijianID;
                $tuijianshouyi['producttitle']='产品推荐奖励';
                $tuijianshouyi['type']='推荐奖励';
                $findmoney2=M('money')->find(2);
                $tuijianshouyi['money']=$findmoney2['money'];
                // $tuijianshouyi['status']='未审核';
                $tuijianshouyi['huizhiID']=$result;
                $tuijianshouyi['time']=date('Y-m-d');
                $shouyi=M('shouyi')->add($tuijianshouyi);
            }    
            exit('ok');
        }else{
            exit('error');
        }
    }

    public function grshouyi(){
		$userID=$_COOKIE['userID'];
        $phone=$_COOKIE['phone'];
        
        //title
        $title = get_title();
        $this->assign("title",$title);

        $shouyi=M('shouyi')
        ->Field('shouyi.id,shouyi.producttitle,shouyi.time,shouyi.status,shouyi.fanxian,shouyi.type,shouyi.money,user.phone,huizhi.limits')
        ->join('huizhi on huizhi.id=shouyi.huizhiID')
        ->join('user on user.id=shouyi.userID')
        // ->where("(shouyi.userID=$userID or user.phone=$phone) and shouyi.status='已审核'")
        ->where("shouyi.userID='$userID' or user.phone='$phone'")
        ->order('shouyi.time desc')
        ->select();

        // $shouyi=M('shouyi')->where("shouyi.userID='$userID'")->order('shouyi.time desc')->select();
       
        $this->assign("shouyi",$shouyi);
	
    	$this->display();
    }

    public function grxgmima(){
		//title
        $title = get_title();
        $this->assign("title",$title);

    	$this->display();
    }


    public function editpwd(){
        $phone=$_COOKIE['phone'];
        $userID=$_COOKIE['userID'];
        $oldpwd=I('oldpwd');
        $newpwd1=I('newpwd1');
        $newpwd2=I('newpwd2');
        $find=M('user')->find($userID);
        if($oldpwd!=$find['password']){
            exit('olderror');
        }
        
        if($newpwd1==$newpwd2){
            $data['password']=$newpwd1;
        }else{
            exit('pwderror');
        }
        
        if($oldpwd!=null and $data['password']!=null){
            $result=M('user')->where("phone=$phone and id=$userID")->save($data);
            if($result>0){
                exit('ok');
            }else{
                exit('error');
            }
        }else{
            exit('kong');
        }
    }

    public function tanchu(){
        $userID=$_COOKIE['userID'];
        $phone=$_COOKIE['phone'];
        $id=I('id');
        $result=M('shouyi')
        ->Field('shouyi.id,shouyi.producttitle,shouyi.time,shouyi.status,shouyi.fanxian,shouyi.type,shouyi.money,huizhi.limits')
        ->join('huizhi on huizhi.id=shouyi.huizhiID')
        ->where("shouyi.id='$id'")
        ->find();
        // $result['datatime']=$result['time'];
        // // $result=M('shouyi')->find($id);
        exit(json_encode($result));
       
    }
}