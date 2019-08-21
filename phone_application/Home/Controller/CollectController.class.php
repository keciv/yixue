<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class CollectController extends BaseController
{
    public function index()
    {
    	try{
    		//多表查询->收藏表->种类表->视频表
    		$db = M('collect_class as a')->join('class on class.id=a.classID')
    									->join('zhangjie on zhangjie.id=a.zhangjieId')
    								->where(['userID'=>$_COOKIE['userID']])->select();
//			echo "<pre>";
//			print_r($db);
//			die();
			$this->assign("data",$db);
    	}catch(customException $e){
    		echo $e->errorMessage();
			die();
		}
        $this->display();
    }
}