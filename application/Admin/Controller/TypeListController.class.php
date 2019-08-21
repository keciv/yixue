<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class TypeListController extends BaseController {
	public function index(){
		//获取所有分类，递归,拼tr td

		// $trStr=getTypeByTr_lanmu();
		$trStr="";
		$types=M('type')->select();
		if(is_array($types)){
			foreach($types as $value){
				$trStr.="<tr  class='text-c'>
							<td><input type='checkbox' value='{$value['id']}' name='id'></td>
							<td >{$value['id']}</td>
							<td width='150' style='text-align: center'>{$value['name']}</td>
							<td>{$value['password']}</td>
							<td><a href='".U('TypeAdd/Info/',array('id'=>$value['id']))."'>修改</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onClick=("."article_del({$value['id']})".")>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
			}

		}
		$this->assign("trStr",$trStr);
		
		$this->display();
	}
}
