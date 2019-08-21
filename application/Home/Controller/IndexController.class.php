<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController{
    public function index(){
    	$this->assign("index",'index');
		//内容
		//合作企业
		$hzqy=M("friendlink")->where("type='合作企业'")->order("SortID desc")->select();
		$this->assign("hzqy",$hzqy);
		//产品
		$childrenID=getAllChildrenID(5);
        $childrenID=substr($childrenID,0,mb_strlen($childrenID)-1);
        if($childrenID==null)
        {
            $childrenID=$parentID;
        }
    	$where = "parentID in ($childrenID)";
		$chanpin=M("picture")->where($where)->limit(9)->order("SortID desc")->select();
		$this->assign("chanpin",$chanpin);

		//公司新闻
		$gs_info=M("news")->where("parentID=19")->order("SortID desc")->find();
		$gs_news=M("news")->where("parentID=19 and id!={$gs_info['id']}")->limit(4)->order("SortID desc")->select();
		$this->assign("gs_info",$gs_info);
		$this->assign("gs_news",$gs_news);
		//行业新闻
		$hy_info=M("news")->where("parentID=20")->order("SortID desc")->find();
		$hy_news=M("news")->where("parentID=20 and id!={$hy_info['id']}")->limit(4)->order("SortID desc")->select();
		$this->assign("hy_info",$hy_info);
		$this->assign("hy_news",$hy_news);
		//最新动态
		$js_news=M("news")->where("parentID=21")->limit(4)->order("SortID desc")->select();
		$this->assign("js_news",$js_news);


		//友情链接
		$friendlink=M("friendlink")->where("type='友情链接'")->order("SortID desc")->select();
		$this->assign("friendlink",$friendlink);
		//产品栏目
		$cp_lanmu=M("lanmu")->where("parentID=5")->order("SortID asc")->select();
		$this->assign("cp_lanmu",$cp_lanmu);

		//生产设备
		$yfbm=M("picture")->where("parentID=23")->limit(6)->order("SortID desc")->select();
		$this->assign("yfbm",$yfbm);

		//恒达风貌
		$cjzs=M("picture")->where("parentID=24")->limit(6)->order("SortID desc")->select();
		$this->assign("cjzs",$cjzs);

		//资质荣誉
		$zzry=M("picture")->where("parentID=5")->order("SortID desc")->select();
		$this->assign("zzry",$zzry);
		
		//工程案例
		$gcal=M("picture")->where("parentID=16")->order("SortID desc")->select();
		$this->assign("gcal",$gcal);
		
		//公司介绍
		$gongsi=M("danye")->where("id=1")->find();
		$this->assign("gongsi",$gongsi);

    	$this->display();
    }
}