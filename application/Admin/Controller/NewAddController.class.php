<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class NewAddController extends BaseController {
	
    public function index(){
    	//$lanmu=M("lanmu")->where("parentid=0 and controller='NewList'")->order("SortID asc")->select();
        $newlist = getlanmuList('NewList');
    	$this->assign("lanmu",$newlist);
        $this->assign("caozuo",'add');
        $last = M("news")->order('sortid desc')->find();
        $SortID=$last['SortID']+1;
        $this->assign("SortID",$SortID);
    	$this->display();
    }

    public function getChildren(){
		$id=$_POST['id'];
		$json=M("lanmu")->where("parentid={$id} and (controller='NewList' or controller='Other')")->order("SortID asc")->select();

		$lanmu2=json_encode($json);
		exit(json_encode($json));
	}
    	
    public function add(){
    	if (!empty($_POST)){
    		$title = $_POST['title'];
            // $type = $_POST['type'];
            $parentID=$_POST['lanmu'];
            // $imageurl=$_POST['hidden_filePicker'];
            $source = $_POST['source'];
            $dateandtime=date("Y-m-d");
            $content = $_POST['content'];
            $last = M("news")->order('sortID desc')->find();
            $SortID=$last['SortID']+1;
            $result=M("news")->data(array('title'=>$title,'source'=>$source,'dateandtime'=>$dateandtime,'parentID'=>$parentID,/*'imageurl'=>$imageurl,*/'content'=>$content,'SortID'=>$SortID))->add();
            if ($result>0){
                jump("添加成功！",__APP__."/New_add.html");
                
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
        $news = M("news")->where("id={$id}")->find();
        $this->assign('news',$news);

        $lanmuNow=M("lanmu")->where("id={$news['parentID']}")->find();
        $parentlanmu=M("lanmu")->where("id={$lanmuNow['parentID']}")->find();
        $this->assign("parentlanmu",$parentlanmu);
        
        $newlist = getlanmuList('NewList');
        $this->assign("lanmu",$newlist);

        $location = location($news['parentID']);
        $parentLanmu = $location["LocationAll"];

        $parentID="";
        foreach ($parentLanmu as $lanmu) {
            $parentID=$parentID.$lanmu['id'].",";
        }
        $parentID = substr($parentID,0,mb_strlen($parentID)-1);
        $this->assign("parentID",$parentID);


        $this->assign("caozuo",'edit');
        $this->display('NewAdd/index');
    }

    public function edit(){
        if (!empty($_POST)){
            $id=$_POST['id'];
            $title=$_POST['title'];
            $parentID=$_POST['lanmu'];
            // $imageurl=$_POST['hidden_filePicker'];
            $content = $_POST['content'];
            $source = $_POST['source'];
            // $dateandtime=date("Y-m-d");
            $result=M("news")->where("id='{$id}'")->save(array('title'=>$title,'source'=>$source,/*'dateandtime'=>$dateandtime,*/'parentID'=>$parentID,/*'imageurl'=>$imageurl,*/'content'=>$content));
            if (false!==$result){
                jump("修改成功！",__APP__."/New_edit_$id");
            }else {
                jump("修改失败！");
            }
        }
        else
        {
            $this->success("请输入内容后再修改");
        }
    }

    public function del(){
        $newid=$_GET['newid'];
        if($newid!=null)
        {
            $result=M("news")->where("newid={$newid}")->delete();
            if ($result>0) {
                $this->success("删除成功！");
            }else {
                $this->success("删除失败！");
            }
        }
        else
        {
            $this->success("请选择要删除的数据");
        }
    }

    public function delall(){
        $getid = $_REQUEST['newid']; //获取选择的复选框的值
        if (!$getid)
        {
            $this->error('未选择记录'); 
        }
        //没选择就提示信息
        $getids = implode(',', $getid); //选择一个以上，就用,把值连接起来(1,2,3)这样
        $id = is_array($getid) ? $getids : $getid; //如果是数组，就把用,连接起来的值覆给$id,否则就覆获取到的没有,号连接起来的值
        //最后进行数据操作,
        $result = M("news")->delete($id);
        if ($result>0) {
            $this->success("删除成功！");
        }else {
            $this->success("删除失败！");
        }
    }
        //排序ID修改
    public function edit_sequence_id(){
        $sort=$_POST['sort'];
        $id = $_POST['id'];
        $sequence_id = M("news")->where("newid = $id")->save(array("SortID"=>$sort));
        if($sequence_id>0){
            exit("ok");
        }else{
            exit("error");
        }
    }      
}