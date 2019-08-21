<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class NewListController extends BaseController {
	public function index(){
		// $totalRow = M("news")->count();
		$totalRow=M('news')->order('SortID desc')->count();
		$page = new Page($totalRow,2);

		$news=M('news')->order('SortID desc')->limit("$page->firstRow,$page->listRows")->select();
		foreach ($news as $key => $val) {
			$lanmu = M('lanmu')->where("id={$val['parentID']}")->find();
			$news[$key]['lanmu_type']=$lanmu['title'];
		}
		// print_r($page->pageNow);//当前页
        $this->assign("pagelist",$page->show());    
		$this->assign("news",$news);
		
		$this->assign("totalRow",$totalRow);
		$this->assign("pagelist",$page->show());
		$this->display();
	}
}