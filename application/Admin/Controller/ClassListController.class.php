<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class ClassListController extends BaseController {
	public function index(){
		$totalRow=M('class')->count();
		$page = new Page($totalRow,10);
		$kecheng=M("class")
			->join('special on class.specialty=special.id' )
			->field('special.type_name,class.*')
			->order("id desc")->limit("$page->firstRow,$page->listRows")->select();
		$this->assign("pagelist",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("kecheng",$kecheng);
		$this->display();
	}
}
