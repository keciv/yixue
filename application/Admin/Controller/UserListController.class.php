<?php
namespace Admin\Controller;
use Think\Page;
use Admin\Controller\BaseController;
class UserListController extends BaseController {
    public function index(){
    	$totalRow=M('user')->count();
        $page = new Page($totalRow,10);

        $users=M('user')->order('id desc')->limit("$page->firstRow,$page->listRows")->select();
        foreach ($news as $key => $val) {
            $lanmu = M('lanmu')->where("id={$val['parentID']}")->find();
            $news[$key]['lanmu_type']=$lanmu['title'];
        }
        //print_r($page->pageNow);//当前页
        $this->assign("pagelist",$page->show());    
        $this->assign("users",$users);
        
        $this->assign("totalRow",$totalRow);
        $this->assign("pagelist",$page->show());
        $this->display();
    }
    public function welcome(){
    	$this->display();
    }
}