<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class GetDataController extends BaseController {
    public function index(){
        $id= I("post.id");
        $CurrentPage=$_POST['page'];
        $paginalNum=$_POST['paginalNum'];
        if($CurrentPage==null||$CurrentPage<=0)
        {
            $CurrentPage=1;
        }
        $childrenID=getAllChildrenID($id);
        $childrenID=substr($childrenID,0,mb_strlen($childrenID)-1);
        if($childrenID==null)
       {
           $childrenID=$id;
       }
        // $data=M("special")->where("id='{$id}'")->find();
        // if($data['controller']=="NewList")
        // {
        //     $table="news";
        // }
        // else if($data['controller']=="PictureList")
        // {
        //     $table="Picture";
        // }
       
        $news=M("special")->where("parentID = {$id}")->order("SortID asc")->select();
        
        // foreach($news as $k =>$val){
        //     $news[$k]['content'] =msubstr($val['content'],0,65);
        // }
        // if($news!=null)
        // {
            $news=json_encode($news);
        // }
        // else
        // {
        //     $news=json_encode(array());
        // }
        exit($news);
        
    }
    
}