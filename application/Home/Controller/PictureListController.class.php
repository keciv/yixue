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
}