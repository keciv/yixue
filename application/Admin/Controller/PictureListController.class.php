<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class PictureListController extends BaseController {
	public function index(){
		// $totalRow = M("picture")->count();
		$totalRow=M('picture')->order('SortID desc')->limit("$page->firstRow,$page->listRows")->count();
		$page = new Page($totalRow,10);

		$picture=M('picture')->order('SortID desc')->limit("$page->firstRow,$page->listRows")->select();
		foreach ($picture as $key => $val) {
			$lanmu = M('lanmu')->where("id={$val['parentID']}")->find();
			$picture[$key]['lanmu_type']=$lanmu['title'];
			
		}

        $this->assign("pagelist",$page->show());    
		$this->assign("picture",$picture);

		
		$this->assign("totalRow",$totalRow);
		$this->assign("pagelist",$page->show());
		$this->display();
	}
}