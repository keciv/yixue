<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class FriendLinkListController extends BaseController {
    public function index(){
    	$totalRow=M("friendlink")->where("type='友情链接'")->count();
		$page = new Page($totalRow,10);
		$friendLink=M("friendlink")->where("type='友情链接'")->order("SortID asc")->limit("$page->firstRow,$page->listRows")->select();
		$this->assign("friendLink",$friendLink);
        
		$this->assign("pagelist",$page->show());
		$this->display();
    }

    public function indexqy(){
    	$totalRow=M("friendlink")->where("type='合作企业'")->count();
		$page = new Page($totalRow,10);
		$friendLink=M("friendlink")->where("type='合作企业'")->order("SortID asc")->limit("$page->firstRow,$page->listRows")->select();
		$this->assign("friendLink",$friendLink);
		$this->assign("pagelist",$page->show());
		$this->display();
    }
    
    
}