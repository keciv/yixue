<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class GetDatavoteController extends BaseController {
    public function index(){
        $id=$_POST['id'];
        //exit($id);
        $CurrentPage=$_POST['page'];
        $paginalNum=$_POST['paginalNum'];
        $cha=$_POST['cha'];
        if($CurrentPage==null||$CurrentPage<=0)
        {
            $CurrentPage=1;
        }

        if($cha!=null){
            $news=M("cansai")->where("name='$cha' and status=0 and huodongID = {$id}")->order("num desc")->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();
            if($cha!==null){
                if($news==null){
                    $news=M("cansai")->where("cansaiID='$cha' and status=0 and huodongID = {$id}")->order("num desc")->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();
                    
                }
                
            }
        }else{
          $news=M('cansai')->where("huodongID = {$id} and status=0")->order("num desc")->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();  
        }
        
        /*foreach($news as $k =>$val){
        $news[$k]['content'] =strip_tags($val['content']);
            // strip_tags("<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20180313/1520933506138770.jpg\" title=\"1520933506138770.jpg\" alt=\"yigeyuetuibian.jpg\"/></p><p>这会在看刚来时的你们，满脸的青涩，天天环绕在耳边的都是你们的怨言。太累了、太苦了、我的腿都青了、我的胯肿了、我都没法蹲坑、我都上不去床、我……</p><p>其实，一个月也没有那么长，大家都熬下来了，不是么?</p>");
        }*/
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