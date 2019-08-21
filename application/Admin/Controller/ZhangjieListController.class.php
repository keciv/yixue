<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class ZhangjieListController extends BaseController {
	public function index(){
		$totalRow=M('zhangjie')->count();
		$page = new Page($totalRow,10);
		$zhangjie=M("zhangjie")
					->join('class on zhangjie.classID=class.id' )
					->field('class.*,zhangjie.*')
					->limit("$page->firstRow,$page->listRows")->select();
		// dump($zhangjie);
		$this->assign("pagelist",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("zhangjie",$zhangjie);
		$this->display();
	}
}