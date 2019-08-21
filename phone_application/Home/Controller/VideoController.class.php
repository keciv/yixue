<?php
namespace Home\Controller;
use Home\Controller\BaseController;
use Think\Controller;
class VideoController extends BaseController
{
    public function index()
    {
        if (empty($_COOKIE['userID']) && !isset($_COOKIE['userID'])) {
            header("Location: /Login/");
        }
        $info = cookie();
        $id = I("get.id");
        $class_type = I("get.class_type");
        $memid = $_COOKIE['userID'];
        if (!empty($id) || !empty($class_type)) {
            $user = M("user")->where("id={$info['userID']}")->find();
            $this->assign("info", $info);
            $this->assign("user", $user);
            if ($class_type == "3") {
                echo "公开课";
            } else {
                $join = M("user_join")->where("user_id = {$memid} AND kid = {$id} AND is_join = 1")->select();

                if ($join !== null) {
                    $this->assign("status", array("status" => 1));
                    $resData = M("zhangjie")->where("classID = {$id}")->select();
				
                    $this->assign("first", $resData[0]);
                    $this->assign("zhangjie", $resData);
					//判断是否下载
					$db = M('download')->join('zhangjie ON mp4id = zhangjie.id')->where(['uid'=>$_COOKIE['userID']])->select();
					$db1=i_array_column($db,'title');
					//判断是否下载完成
					$this->assign("download", $db1);
					
					//判断是否收藏
					$collect = M('collect_class')->where(['userID' =>$_COOKIE['userID'],'classID'=>$id])->select();
					$collect1=i_array_column($collect,'zhangjieId');
					$collect1 = implode(',',$collect1);
					$this->assign("collect", $collect1);
					
						
                } else {
                    $this->assign("status", array("status" => 0));
//                    echo "<script>alert('非常抱歉，您浏览的是');location.href='/Index/'</script>";
                }

            }
            $this->assign("class_id", $id);
            $this->display();
        } else {
            exit("非法操作");
        }
    }
	
	public function getname()
	{
		header("Content-type:text/html;charset=utf-8"); 
		
		if(IS_AJAX){
			$id = I("post.id");
			$resData = M("class")->where("id = {$id}")->find();
			//获取mp4 id
			$name = I("post.name");
			//查询MP4
			$mp4 = M("zhangjie")->where(['title'=>$name,'classID'=>$id])->find();
			
			if($mp4 == false){
				$this->ajaxReturn(['code'=>0,'msg'=>"视频下载失败"]);
			}else{
				$db = M("download")->data(array('uid' =>$_COOKIE['userID'], 'classid' => $id ,'mp4id' => $mp4['id']))->add();
				
				//获取决定路径
			    $file_dir=$_SERVER['DOCUMENT_ROOT']."/yixue/".$mp4['video_path'];
			    $file_name = $name;
				// 注意filesize()无法获取远程文件大小
				$headers = get_headers($file_dir, 1);
				$fileSize = filesize( $file_dir );
				$handle = fopen($file_dir,"rb+");
			
				// 因为不知道文件是什么类型的，告诉浏览器输出的是字节流
				header('Content-Type: application/octet-stream');

				// 告诉浏览器返回的文件大小类型是字节
				header('Accept-Ranges:bytes');
	
				// 告诉浏览器返回的文件大小
				header('Content-Length: ' . $fileSize);
		
				// 告诉浏览器文件作为附件处理并且设定最终下载完成的文件名称
				header('Content-Disposition: attachment; filename="' . $filename . '"');
	
				//针对大文件，规定每次读取文件的字节数为4096字节，直接输出数据
				$read_buffer = 4096;
				//总的缓冲的字节数
				$sum_buffer = 0;
				//创建新的名字
				$newfname = "./mp4/".$file_name.".".pathinfo($file_dir,PATHINFO_EXTENSION); 
				//转码
				$newfname = iconv("UTF-8", "GBK", $newfname);
				if($handle){
					$newf = fopen ($newfname,"wb"); 
				}

				if($newf){
					//只要没到文件尾，就一直读取
					while (!feof($handle) && $sum_buffer < $fileSize) {
					//set_time_limit(0);
//				    fread($handle, $read_buffer);
				    $sum_buffer += $read_buffer;
					fwrite($newf,fread($handle, $read_buffer)); 
					}
					//释放文件
					if ($handle) {          
						fclose($handle);          
					} 
					//释放文件
					if($newf){          
						fclose($file);          
					} 
					//判断是否缓存完毕
					if($sum_buffer >= $fileSize){
						$check = M("zhangjie")->where(['classID' => $id ,'title' => $mp4['title']])->data(['is_download'=>'1'])->save();
						if($check){
							$this->ajaxReturn(['code'=>1,'msg'=>"视频下载完成"]);
						}else{
							$this->ajaxReturn(['code'=>0,'msg'=>"视频下载失败"]);
						}
					}else{
						$this->ajaxReturn(['code'=>2,'msg'=>"视频正在下载"]);
					}
				}
				
			}
				
//		        $Http = new \Org\Net\Http();
//				$filename="E:/php/PHPTutorial/WWW/yixue/".$mp4['video_path'];
//				$showname=pathinfo($mp4['video_path'])['basename'];
//		      	$aa =  $Http->download($filename,$showname);

			
		}
	}

    public function saveTime()
    {
        if (IS_AJAX) {
            $kid = I("post.kid");
            $id = $_COOKIE['userID'];
            $start_time = I("post.start_time") ? 0 : 0;
            $end_time = I("post.end_time");
            $chapter = I("post.chapter");
            if ($end_time !== "error") {
                $arrAy = array(
                    "start_time" => $start_time,
                    "end_time" => $end_time,
                    "userID" => $id,
                    "classID" => $kid,
                    "chapter" => $chapter
                );
                $resData = M("monitor")->where("userID = {$id} AND classID = {$kid} AND chapter = {$chapter}")->find();
                if ($resData == null) {
                    if (M("monitor")->add($arrAy)) {
                        $this->ajaxReturn(array("code" => 200));
                    }
                } else {
                    if (M("monitor")->where("id = {$resData['id']}")->save($arrAy)) {
                        $this->ajaxReturn(array("code" => 200));
                    }
                }
            }
        }
    }

    public function inStudy()
    {
        if (IS_AJAX) {
            $id = $_COOKIE['userID'];
            $kid = I("post.id");
            $res = M("user_join")->where("user_id = {$id} AND is_join = 1 AND kid = {$kid}")->select();
            //0代表未加入
            //1代表已加入
            if ($res == "") {
				$m = D("user_join");
				$arr = array(
					"kid"	=>	$kid,
					"is_join"	=>	"1",
					"user_id"	=>	$_COOKIE['userID']
				);
				if($m->add($arr)){
					$this->ajaxReturn("ok");
				}
            }else{
				$this->ajaxReturn("exist");
			}
        }
    }

    //收藏
    public function collect(){
        $userid = $_COOKIE['userID'];
        $classID = I("post.id");
		$zhangjieId = I("post.zhangjieId");
	
        $result = M("collect_class");
		
        if($result->where(["userID" => $userid , "classID" => $classID , 'zhangjieId' =>$zhangjieId])->count()){
           	$this->ajaxReturn("exist");
        }else{
        	$result->data(array('userID' => $userid, 'classID' => $classID , 'zhangjieId' =>$zhangjieId,'collect_time'=>time()))->add();
			
            $this->ajaxReturn("ok");
        }
    }
    
}