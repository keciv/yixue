<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class HuancunController extends BaseController
{
    public function index()
    {
		//判断正在下载的个数
		$db = M('download')->join('zhangjie ON mp4id = zhangjie.id')->where(['uid'=>$_COOKIE['userID']])->select();
		//提取完成的个数
		foreach($db as $k =>$v){
			if($db[$k]['is_download']== 1){
				$download_ok[] = $db[$k]['is_download'];
			}else{
				$download_no[] = $db[$k]['is_download'];
			}
		}
		$this->assign('download_ok',count($download_ok));
		$this->assign('download_no',count($download_no));
        $this->display();
    }
	
	
	 public function index1()
    {
        $this->display();
    }
	
	
}