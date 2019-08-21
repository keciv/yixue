<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class ShitiAddController extends BaseController {
	public function index(){
		$special=M("special")->where("parentID != 0")->select();
		$kecheng_type=M("class_type")->select();
		$this->assign("caozuo",'add');
		$this->assign("special",$special);
		$this->assign("kecheng_type",$kecheng_type);
		$this->display();
	}
	public function add(){
		if (!empty($_POST)){
            $answer = I("post.answer");
            $select = I("post.sele");
            $newsSele = array_filter($select);
            $newsAnswer = array_filter($answer);
            for ($i = 0; $i <= count($newsAnswer); $i++) {
                $newsArr[] = $newsSele[$i] . "," . $newsAnswer[$i] . "||";
            }
            array_pop($newsArr);
            $str = implode($newsArr);
            $array = array(
                "question" => I("post.question"),
                "list" => $str,
                "answer" => I("post.daan"),
                "specialty" => I("post.special"),
                "jiexi" => htmlspecialchars_decode(I("post.content")),
                "datetime" => time()
            );
            if (M("daily_problem")->add($array)) {
                jump("添加成功！", __APP__ . "/ShitiAdd/index");
            }
		}
		else
		{
			$this->success("请输入内容后再添加");
		}
	}
	
	public function Info(){
		$id=I('get.id');
        $resData = M("daily_problem")->where("id = {$id}")->find();
        $special = M("special")->where("parentID != 0")->select();
        $list = $resData['list'];
        $newList = explode("||", $list);
        array_pop($newList);
//        $abc = implode(",",$newList);
//        $newsAbc = explode(",",$abc);
//        for ($i=0;$i<=count($newsAbc);$i++){
//            $abcd[] = $newsAbc[$i*2];
//        }
//        $newsAbcD = array_filter($abcd);
//        array_pop($newList);
//        $newArr = array_merge($newList,$newsAbcD);
//        for($i=0;$i<=count($newList);$i++){
//            $resultData[] = $newsAbcD[$i] . $newList[$i];
//        }
//        dump($resultData);
//        dump($newList);
        foreach ($newList as $v) {
            $na[] = mb_substr($v, 0, 1);
        }
        $this->assign("ab", $na);
        $this->assign("list", $newList);
        $this->assign("special", $special);
        $this->assign("problem", $resData);
        $this->assign("num", count($newList));
        $this->display('ShitiAdd/edit');
	}

	public function edit(){
        $answer = I("post.answer");
        $select = I("post.sele");
        unset($select['9']);
        unset($select['10']);
        $newsSele = array_values(array_filter($select));
        $newsAnswer = array_values(array_filter($answer));
        $id = I("post.valueid");
        for ($i = 0; $i <= count($newsAnswer); $i++) {
            $newsArr[] = $newsSele[$i] . "," . $newsAnswer[$i] . "||";
        }
        array_pop($newsArr);
        $str = implode($newsArr);
        $array = array(
            "question" => I("post.question"),
            "list" => $str,
            "answer" => I("post.daan"),
            "specialty" => I("post.special"),
            "jiexi" => htmlspecialchars_decode(I("post.content")),
            "datetime" => time()
        );
        $res = M("daily_problem")->where("id = {$id}")->find();
        if (
            $res['list'] == $array['list']
            && $res['answer'] == $array['answer']
            && $res['jiexi'] == $array['content']
            && $res['specialty'] == $array("specialty")
            && $res['question'] == $array("question")
            && $res['answer'] == $array('answer')
        ) {
            jump("您没有做任何更改", __APP__ . "/Other/jump");
        } else {
            if (M("daily_problem")->where("id = {$id}")->save($array)) {
                jump("更新成功", __APP__ . "/ShitiList/index");
            } else {
                echo M()->getLastSql();
            }
        }
	}

	public function del(){
		$id=$_GET['id'];
		if($id!=null)
		{
			$result=M("banner")->where("id=$id")->delete();
			if ($result>0) {
				jump("删除成功！",__APP__."/BannerList/index");
			}else {
				jump("删除失败！",__APP__."/BannerList/index");
			}
		}
		else
		{
			jump("请选择要删除的数据");
		}
	}

	// 批量删除
    public function delete_all(){
        $id = I("form");
        $mysql=I("sql");
        $sql=M($mysql);
        if($sql->delete($id)){
              $data=1;
              $this->ajaxReturn($data);
          }
    }

	//排序ID修改
    public function edit_sequence_id(){
        $sort=$_POST['sort'];
        $id = $_POST['id'];
        $sequence_id = M("banner")->where("id = $id")->save(array("SortID"=>$sort));
        if($sequence_id>0){
            exit("ok");
        }else{
            exit("error");
        }
    } 

    // 状态改变
    public function edit_status(){
        $id = I("id");
        $mysql = I("mysql");
        $sql=M($mysql);
        $status=I("status");
        if($status==1){
            $edit_status=0;
        }else if($status==0){
            $edit_status=1;
        }
        $result=$sql->where("id={$id}")->setField('status',$edit_status);
            if ($result>0) {
                $data="ok";
            }else {
                $data="error";
            }
        exit($data);    
    }

}