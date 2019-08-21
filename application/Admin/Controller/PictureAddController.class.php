<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class PictureAddController extends BaseController {
	
    public function index(){
    	//$lanmu=M("lanmu")->where("parentid=0 and controller='NewList'")->order("SortID asc")->select();
        $picturelist = getlanmuList('PictureList');
    	$this->assign("lanmu",$picturelist);
        $this->assign("caozuo",'add');
        $last = M("picture")->order('sortid desc')->find();
        $SortID=$last['SortID']+1;
        $this->assign("SortID",$SortID);
    	$this->display();
    }

    public function getChildren(){
		$id=$_POST['id'];
		$json=M("lanmu")->where("parentID={$id} and (controller='PictureList')")->order("SortID asc")->select();

		$lanmu2=json_encode($json);
		exit(json_encode($json));
	}
    	
    public function add(){
    	if (!empty($_POST)){
    		$title = $_POST['title'];
            // $type = $_POST['type'];
            $parentID=$_POST['lanmu'];
            $imageurl=$_POST['hidden_filePicker'];
            $content = $_POST['content'];
            $dateandtime=date("Y-m-d");

            /*下载文件上传-开始*/
            $file=$_FILES['down'];//接收图片name值
            $ext=strrpos($file['name'], ".");
            $str=substr($file['name'], $ext);
            $name=time().$str;//随机数-拼接上传后图片名称
            $des="./public/upload/Download/".$name;
            move_uploaded_file($file['tmp_name'],$des);
            $down=$des;//图片变量赋值
            /*下载文件上传-结束*/



            $last = M("picture")->order('sortID desc')->find();
            $SortID=$last['SortID']+1;
            $result=M("picture")->data(array('title'=>$title,'dateandtime'=>$dateandtime,'down'=>$down,'parentID'=>$parentID,'imageurl'=>$imageurl,'content'=>$content,'SortID'=>$SortID))->add();
            if ($result>0){
                jump("添加成功！",__APP__."/Picture_add.html");
                
            }else{
                    jump("添加失败！");
            } 
   		}
   		else
        {
            $this->success("请填写资料后再添加！");
        }
    }

    public function Info(){
        $id=I('get.id');
        $picture = M("picture")->where("id={$id}")->find();
        $this->assign('picture',$picture);

        $lanmuNow=M("lanmu")->where("id={$picture['parentID']}")->find();
        $parentlanmu=M("lanmu")->where("id={$lanmuNow['parentID']}")->find();
        $this->assign("parentlanmu",$parentlanmu);
        
        $newlist = getlanmuList('PictureList');
        $this->assign("lanmu",$newlist);

        $location = location($picture['parentID']);
        $parentLanmu = $location["LocationAll"];

        $parentID="";
        foreach ($parentLanmu as $lanmu) {
            $parentID=$parentID.$lanmu['id'].",";
        }
        $parentID = substr($parentID,0,mb_strlen($parentID)-1);
        $this->assign("parentID",$parentID);



        $this->assign("caozuo",'edit');
        $this->display('PictureAdd/index');
    }

    public function edit(){
        if (!empty($_POST)){
            $id=$_POST['id'];
            $title=$_POST['title'];
            $parentID=$_POST['lanmu'];
            $imageurl=$_POST['hidden_filePicker'];
            $content = $_POST['content'];
            // $dateandtime=date("Y-m-d");

            /*下载文件上传-开始*/
            if($_FILES['down']['error']==0){
                $file=$_FILES['down'];//接收图片name值
                $ext=strrpos($file['name'], ".");
                $str=substr($file['name'], $ext);
                $name=time().$str;//随机数-拼接上传后图片名称
                $des="./public/upload/Download/".$name;
                move_uploaded_file($file['tmp_name'],$des);
                $down=$des;//图片变量赋值
            /*下载文件上传-结束*/
            }else{

                $cha=M("picture")->find($id);
                $down=$cha['down'];

            }


            $result=M("picture")->where("id='{$id}'")->save(array('title'=>$title,/*'dateandtime'=>$dateandtime,*/'down'=>$down,'parentID'=>$parentID,'imageurl'=>$imageurl,'content'=>$content));
            if (false!==$result){
                jump("修改成功！",__APP__."/Picture_edit_$id");
            }else {
                jump("修改失败！");
            }
        }
        else
        {
            $this->success("请输入内容后再修改");
        }
    }

    
}