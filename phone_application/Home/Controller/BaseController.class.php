<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	function _initialize(){
		header("Content-Type: text/html;charset=utf-8");
		$parentID=$_GET['id'];
		$contentid=$_GET['contentid'];
		
		$dibu = M("dibu")->order("id desc")->find();
		$this->assign("dibu",$dibu);

		$userID=$_COOKIE['userID'];
		$username=$_COOKIE['username'];
		$this->assign("userID",$userID);
		$this->assign("username",$username);

		//当前活动
		$now_hd = M("huodong")->where("status=0")->order("SortID desc")->find();
		$this->assign("now_hd",$now_hd);

/*		$now_time=date("Y-m-d");
		$huodong_time=$now_hd['time'];
print_r($now_time);
print_r($huodong_time);*/
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
			
		}

		//专家团队
		$zjtd=M("lanmu")->where("parentID=5")->order("SortID asc")->select();
		$this->assign("zjtd",$zjtd);
		//走进中医
		$zjzy=M("lanmu")->where("parentID=1")->order("SortID asc")->select();
		$this->assign("zjzy",$zjzy);
		//健康同行
		$jktx=M("lanmu")->where("parentID=10")->order("SortID asc")->select();
		$this->assign("jktx",$jktx);
		//公司介绍
		$gongsi=M("danye")->where("id=1")->find();
		$this->assign("gongsi",$gongsi);
		
		//Banner图
		$banner=M("banner")->where("type='手机端'")->order("SortID asc")->select();
		$banner_array=array();
		foreach ($banner as $key => $val) {	
			$one="{imgUrl: '{$val['imageurl']}',href: '{$val['specifyurl']}'}";
			array_push($banner_array,$one);
		}
		$banner_array=implode(",",$banner_array);
		
		$this->assign("banner_array",$banner_array);
		$this->assign("banner",$banner);

		if($parentID != null || $contentid != null)
		{
			if($contentid != null)
			{

				$url = $_SERVER['PHP_SELF'];

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