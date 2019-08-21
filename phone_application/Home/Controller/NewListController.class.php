<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\PageE;
use Think\Page;
class NewListController extends BaseController {
    public function index(){
    	$parentID=$_GET['id'];
    	$CurrentPage=$_GET['page'];
    	$childrenID=getAllChildrenID($parentID);
        // print_r($parentID);
        $childrenID=substr($childrenID,0,mb_strlen($childrenID)-1);
        if($childrenID==null)
        {
            $childrenID=$parentID;
        }
    	
        //页面显示数据
    	$pageData=PageData($parentID,$CurrentPage,6,$where);
    	$this->assign("pageData",$pageData);
    	$this->display();
    }

    public function chaxun(){
        
        $chaxun=$_POST['chaxun'];
        $this->assign("chaxun",$chaxun);


        $this->display();
    }
 
    
}