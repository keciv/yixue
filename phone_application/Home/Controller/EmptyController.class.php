<?php

namespace Home\Controller;

use Think\Controller;

class EmptyController extends Controller{

	/*public function _empty(){

		header("HTTP/1.0 404 Not Found");

		$this->redirect('/404');

	}*/





	//空操作_empty()方法

    public function _empty(){

        header("HTTP/1.0 404 Not Found");



        //title

        $title = get_title();

        $this->assign("title",$title);

        


        $this -> display("Index:404");

    }

    

    public function index(){

        header("HTTP/1.0 404 Not Found");
        
        $webInfo = webInfo();
        $this->assign("webInfo",$webInfo);

        $this -> display("Index:404");

    }

}