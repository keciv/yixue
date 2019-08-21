<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	function _initialize(){
		$parentID=$_GET['id'];
		$contentid=$_GET['contentid'];
		
		$dibu = M("dibu")->order("id desc")->find();
		$this->assign("dibu",$dibu);

		$yijiData = M("lanmu")->where("parentID=0")->select();
		if($yijiData!=null)
		{
			$array = array();
			foreach ($yijiData as $yijilanmu) {
				$yijiId = $yijilanmu['id'];
				$erjiArray = array();
				$erjiData=M("lanmu")->where("parentID={$yijiId}")->order("id asc")->select();
				if($erjiData!=null)
				{
					foreach ($erjiData as $erjilanmu) {
		                $erjiId = $erjilanmu['id'];
		                $sanjiArray=array();
		                $sanjiData=M("lanmu")->where("parentID={$erjiId}")->order("id asc")->select(); 
		                if($sanjiData!=null)
		                {
		                	foreach ($sanjiData as $sanjilanmu) {
			                	$sanjiId = $sanjilanmu['id'];
			                	$sijiData=M("lanmu")->where("parentID={$sanjiId}")->order("id asc")->select();
			                	if($sijiData!=null)
			                	{
			                		$childrenData = array(sanjilanmu=>$sanjilanmu,sijilanmu=>$sijiData);
			                		array_push($sanjiArray,$childrenData);  
			                	} 
			                	else
			                	{
			                		$sijiData=M("picture")->where("parentID={$sanjilanmu['id']}")->order("id asc")->select();
			                		$childrenData = array(sanjilanmu=>$sanjilanmu,sijilanmu=>$sijiData);
			                		array_push($sanjiArray,$childrenData);  
			                	}  
			                }      
		                }
		                $childrenData = array(erjilanmu=>$erjilanmu,sanjilanmu=>$sanjiArray);
		                array_push($erjiArray,$childrenData);
	            	}
				}
	            
	            $childrenData = array(yijilanmu=>$yijilanmu,erjilanmu=>$erjiArray);
	            array_push($array,$childrenData);
			}
			$array=array(lanmu=>$array);
			$this->assign("lanmu",$array);
			//print_r($array);
			//echo "<pre>";
		}

		//导航
		//产品
		$chanpin_lanmu=M("lanmu")->where("parentID=2")->order("SortID asc")->select();
		$this->assign("chanpin_lanmu",$chanpin_lanmu);

		//新闻资讯
		$xwzx=M("lanmu")->where("parentID=8")->order("SortID asc")->select();
		$this->assign("xwzx",$xwzx);

		//Banner图
		$banner=M("banner")->where("type='电脑端'")->order("SortID asc")->select();
		$this->assign("banner",$banner);

		if($parentID != null || $contentid != null)
		{
			if($contentid != null)
			{

				$url = $_SERVER['REQUEST_URI'];

				$controllerArray = explode("/", $url);
				$controller = array_pop($controllerArray);
				if(strpos($controller,"New")!==false)
				{
					$content=M("news")->where("id={$contentid}")->find();
					$parentID = $content["parentID"];
				}
				if(strpos($controller,"Picture")!==false)
				{
					
					$content=M("picture")->where("id={$contentid}")->find();
					$parentID = $content["parentID"];
				}
				if(strpos($controller,"Danye")!==false)
				{
					$content=M("danye")->where("id={$contentid}")->find();
					$parentID = $content["lanmuID"];
				}
				$this->assign("contentid",$contentid);
			}
			$this->assign("parentID",$parentID);

			//title
			$title = get_title();
			$this->assign("title",$title);
			//当前栏目
			$lanmuNow=M("lanmu")->where("id={$parentID}")->find();
			$this->assign("lanmuNow",$lanmuNow);
			//左侧栏目列表
			$lanmu = left_menu($parentID);
			$this->assign("lanmu",$lanmu);
			
		/**/
			//顶级ID
			$PID=$lanmuNow['parentID'];
			if($PID==0){
				$PID=$lanmuNow['id'];
			}
			$this->assign("PID",$PID);
			//顶级栏目
			$M_lanmu=M("lanmu")->where("id={$PID}")->find();
			$this->assign("M_lanmu",$M_lanmu);
		/**/

			
			//当前位置
			$location = location($parentID);
			$this->assign("location",$location);
		}
		else
		{
			$webInfo = webInfo();
			$this->assign("webInfo",$webInfo);
		}

	}

	
	
}