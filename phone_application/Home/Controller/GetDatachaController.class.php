<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class GetDatachaController extends BaseController {
    public function index(){
        $id=$_POST['id'];
        //exit($id);
        $CurrentPage=$_POST['page'];
        $cha=$_POST['cha'];
        $paginalNum=$_POST['paginalNum'];
        if($CurrentPage==null||$CurrentPage<=0)
        {
            $CurrentPage=1;
        }
        
       
        //exit($table);
        // $news=M("news")->where("title like '%{$cha}%'")->order("SortID desc")->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();
        
        $news_cha=M("news")->where("title like '%{$cha}%'")->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->order("SortID desc")->select();
        foreach ($news_cha as $k => $v) {
           $findnew=M("lanmu")->where("id = {$v['parentID']}")->find();
           if($findnew['controller']=='PictureList'){
                $controller='PictureShow';
           }else{
                $controller='NewShow';
           }
           $news_cha[$k]['controller']=$controller;
        }
        $picture_cha=M("picture")->where("title like '%{$cha}%'")->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->order("SortID desc")->select();
        foreach ($picture_cha as $key => $val) {
           $findpicture=M("lanmu")->where("id = {$val['parentID']}")->find();
           if($findpicture['controller']=='PictureList'){
                $controller='PictureShow';
           }else{
                $controller='NewShow';
           }

           $picture_cha[$key]['controller']=$controller;
        }
        $news=array_merge($news_cha, $picture_cha);

        if($news!=null)
        {
            $news=json_encode($news);
        }
        else
        {
            $news=json_encode(array());
        }
        exit($news);    
    }
    
}