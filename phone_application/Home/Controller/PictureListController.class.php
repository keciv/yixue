<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\PageE;
use Think\Page;
class PictureListController extends BaseController {
    public function index(){
        $parentID=$_GET['id'];
        $this->assign("parentID",$parentID);

        $CurrentPage=$_GET['page'];
        $childrenID=getAllChildrenID($parentID);
        $childrenID=substr($childrenID,0,mb_strlen($childrenID)-1);
        if($childrenID==null)
        {
            $childrenID=$parentID;
        }
    	$where = "parentID in ($childrenID)";
        //页面显示数据
        $pageData=PageData($parentID,$CurrentPage,12,$where);
        $this->assign("pageData",$pageData);
        $this->display();
    }

    public function search(){
        $parentID=$_GET['id'];
        $msg=$_POST['msg'];
        $this->assign("msg",$msg);
        $this->assign("parentID",$parentID);
        // $parentID=$_GET['id'];
        $cha_people=M("people")->where("name='$msg'")->select();
        if($msg!==null){
            
            if($cha_people==null){
                $cha_people=M("people")->where("workID='$msg'")->select();
                if($cha_people==null){
                    $data_msg='很抱歉，您查询的人不存在！';
                    $this->assign("data_msg",$data_msg);
                }
            }
            
        }else{
            $data_msg='请输入被查询人的工作号或姓名';
            $this->assign("data_msg",$data_msg);
        }
        
        $this->assign("cha_people",$cha_people);

        $this->display();
    }



}