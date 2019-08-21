<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class OtherController extends BaseController {

	public function delete(){
		$id=I("id");
        $mysql=I("sql");
        $sql=M($mysql);
       /* exit($mysql);*/
		$find=$sql->find($id);
        $dela=unlink($find['imageurl']);
        $result=$sql->delete($id);
		
        if ($result>0) {
			$data=1;
          $this->ajaxReturn($data);
		}
	}

    public function jump()
    {
        header("Location:/admin.php/ShitiList/index");
    }

	
    /*public function delete_all(){
        $id = I("form");
        $mysql=I("sql");
        $sql=M($mysql);
        if($sql->delete($id)){
              $data=1;
              $this->ajaxReturn($data);
          }
    }*/
    // 批量删除
    public function delete_all(){
    	
        $id = I("form");
        $mysql=I("sql");
		
        $sql=M($mysql);
        $query=$sql->select($id);
        if ($id>0){
            foreach($query as $key=>$val){
                $result = $sql->delete($val['id']);
                $dela=unlink($query[$key]['imageurl']);
            }
            $data=1;
            $this->ajaxReturn($data);
        }
    }







	//排序ID修改
    public function edit_sequence_id(){
        $sort=$_POST['sort'];
        $id = $_POST['id'];
        $mysql = I("mysql");
        $sql=M($mysql);
        $sequence_id = $sql->where("id = $id")->save(array("SortID"=>$sort));
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
        if($mysql=='product'){
            $result=$sql->where("id={$id}")->setField('is_show',$edit_status);
        }else{
            $result=$sql->where("id={$id}")->setField('status',$edit_status);
        }

            if ($result>0) {
                $data="ok";
            }else {
                $data="error";
            }
        exit($data);
    }

    // 状态改变
    public function edit_recommend(){
        $id = I("id");
        $mysql = I("mysql");
        $ziduan = I("ziduan");
        $sql=M($mysql);
        $status=I("status");
        if($status==1){
            $edit_status=0;
        }else if($status==0){
            $edit_status=1;
        }
        
        $result=$sql->where("id={$id}")->setField($ziduan,$edit_status);
        
        if ($result>0) {
            $data="ok";
        }else {
            $data="error";
        }
        exit($data);
    }

}