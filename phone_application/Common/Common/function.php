<?php

use Think\Page;
    //ÍøÕ¾ÐÅÏ¢
    function webInfo(){
        $webInfo=M("webinfo")->order("id desc")->find();
        return $webInfo;
    }
    function get_title(){
        $webInfo=M("webinfo")->order("id desc")->find();
        $title = $webInfo["title"];
        $TitleArray = explode("_", $title);
        $title = array_pop($TitleArray);
        return $title;
    }
    
    //×ó²àÀ¸Ä¿
    function left_menu($parentID){
        $result=M("lanmu")->where("id={$parentID}")->find();
        //µ±Ç°À¸Ä¿ÊÇ×ÓÀ¸Ä¿
        if ($result['parentID']>0) {            
            //ÉÏÒ»¼¶
            $lanmu1=M("lanmu")->where("id={$result['parentID']}")->find();
            //¶þ¼¶À¸Ä¿
            $lanmu2=M("lanmu")->where("parentID={$result['parentID']}")->select();
            if($lanmu1['parentID']>0){
                $lanmu1=M("lanmu")->where("id={$lanmu1['parentID']}")->find();
                $lanmu2=M("lanmu")->where("parentID={$lanmu1['parentID']}")->select();
            }
            
        }else{
            //¸úÀ¸Ä¿£¬²é¿´ÊÇ·ñÓÐ×ÓÀ¸Ä¿
            $result=M("lanmu")->where("parentID={$parentID}")->order("id asc")->select();
            if ($result>0) {
                $lanmu1=M("lanmu")->where("id={$parentID}")->find();
                $lanmu2=M("lanmu")->where("parentID={$parentID}")->select();
            }else {
                $lanmu1=M("lanmu")->where("id={$parentID}")->find();
                $lanmu2=M("lanmu")->where("parentID=0")->order("id asc")->select();
            }
        }
        return array(ParentLanmu=>$lanmu1,ChildrenLanmu=>$lanmu2);
    }
    function phone_menu($id){
        $result=M("lanmu")->where("id={$id}")->find();
        if ($result>0) {            
            $lanmu=M("lanmu")->where("parentID={$id}")->order("id desc")->select();
            if($lanmu<=0)
            {
                $lanmu=$result;
            }
        }
        return array($lanmu);
    }
    //µ±Ç°Î»ÖÃ
    function location($parentID){
        $locationNow=M("lanmu")->where("id={$parentID}")->find();
        $array = array();
        $locationAll=array_reverse(get_location($parentID));
        return array(LocationNow=>$locationNow,LocationAll=>$locationAll);
    }
    //µ±Ç°Î»ÖÃ±éÀú
    function get_location($parentID){
        static $array=array();
        $location=M("lanmu")->where("id={$parentID}")->find();
        // print_r($parentID);
        if($location>0)
        {
            array_push($array,$location);
            $parentID = $location['parentID'];
            if($parentID=="0")
            {
                return $array;
            }
            $location=get_location($parentID);
        }
        return $array;
    }
    //ÉÏÒ»ÆªÏÂÒ»Æª
    function LastNext($id, $parentID, $table, $LanguageNull){
                
        $lastType="Show";        
        $nextType="Show";
        $lastData = M("{$table}")->where("parentID={$parentID} and id>{$id}")->order("sortid desc")->limit("0,1")->find();       
        if($lastData<=0)
        {
            $lastData=array();
            $lastData['id']=$parentID;
            $lastData['title']=$LanguageNull;
            $lastType="List";
        }

        $nextData = M("$table")->where("parentID={$parentID} and id<{$id}")->order("sortid desc")->limit("0,1")->find();       
        if($nextData<=0)
        {
            $nextData=array();
            $nextData['id']=$parentID;
            $nextData['title']=$LanguageNull;
            $nextType="List";
        }

        return array(last=>$lastData,next=>$nextData,lastType=>$lastType,nextType=>$nextType);
    }
    //½ØÈ¡×Ö·û
    function msubstr($str, $start, $length,$charset="utf-8")
    {
        $str=preg_replace('!<.+?>|&nbsp;|(\\r\\n)|\\s!', ' ', $str);
        if(function_exists("mb_substr")){
            if(mb_strlen($str,"UTF8")>$length)
            {
                $result = mb_substr($str, $start, $length, $charset)."...";
            }
            else
            {
                $result = mb_substr($str, $start, $length, $charset);
            }
        }
        elseif(function_exists('iconv_substr')) {
            if(mb_strlen($str,"UTF8")>$length)
            {
                $result = iconv_substr($str, $start, $length, $charset)."...";
            }
            else
            {
                $result = iconv_substr($str, $start, $length, $charset);
            }
        }
        return $result;
    }

    function jump($content,$url){
        echo "<script>alert('{$content}');location.href='{$url}';</script>";
    }

    //·ÖÒ³
    function PageData($parentID,$CurrentPage,$paginalNum,$Where,$Order="SortID asc"){
        //»ñÈ¡À¸Ä¿
        $lanmu = M("lanmu")->where("id={$parentID}")->find();

        $controller = $lanmu['controller'];

        if($controller=="Danye")
        {
            $table='danye';
        }
        else if($controller=="NewList")
        {
            $table='news';
            $Order="SortID desc";
        }
        else if($controller=="PictureList")
        {
            $table='picture';
        }
        if($CurrentPage==null||$CurrentPage<=0)
        {
            $CurrentPage=1;
        }
        //Ò»¹²¶àÉÙÌõ
        $StripeNumber=M("$table")->where($Where)->count();
// print_r($StripeNumber);
        //Ò»¹²¶àÉÙÒ³
        $PageTotal=ceil($StripeNumber/$paginalNum);
        if($PageTotal==0)
        {
            $PageTotal=1;
        }
        $pageStr="";
        for ($i=1; $i <= $PageTotal; $i++) { 
            if($i==$CurrentPage)
            {   
                if($i==$PageTotal){
                    // print_r($parentID);
                    $pageStr.="<a href='{$lanmu['controller']}_{$parentID}_{$i}.html' class='on'>".$i."</a></li>";
                }else{
                    $pageStr.="<a href='{$lanmu['controller']}_{$parentID}_{$i}.html' class='on'>".$i."</a></li>&nbsp;";
                }
                
            }
            else
            {
                if($i==$PageTotal){
                    $pageStr.="<a href='{$lanmu['controller']}_{$parentID}_{$i}.html'>".$i."</a>";
                }else{
                    $pageStr.="<a href='{$lanmu['controller']}_{$parentID}_{$i}.html'>".$i."</a>&nbsp;";
                }
            }
        }

        $lastPage=$CurrentPage-1>0?$CurrentPage-1:1;
        $nextPage=$CurrentPage+1>$PageTotal?$PageTotal:$CurrentPage+1;
        // print_r($CurrentPage);
        //Ò³ÃæÏÔÊ¾Êý¾Ý
        $news=M("$table")->where($Where)->order($Order)->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();
// print_r($parentID);
        $pageData = array(CurrentPage=>$CurrentPage,lastPage=>$lastPage,paginalNum=>$paginalNum,nextPage=>$nextPage,StripeNumber=>$StripeNumber,PageTotal=>$PageTotal,news=>$news,pageStr=>$pageStr);
        return $pageData;
    }

     function PageDatacha($id,$CurrentPage,$paginalNum,$Where,$Order="SortID desc"){

        //»ñÈ¡À¸Ä¿
        if($CurrentPage==null||$CurrentPage<=0)
        {
            $CurrentPage=1;
        }
        //Ò»¹²¶àÉÙÌõ
        $StripeNumber=M("product")->where($Where)->count();

        //Ò»¹²¶àÉÙÒ³
        $PageTotal=ceil($StripeNumber/$paginalNum);
        if($PageTotal==0)
        {
            $PageTotal=1;
        }
        $pageStr="";
        for ($i=1; $i <= $PageTotal; $i++) { 
            if($i==$CurrentPage)
            {
                if($i==$PageTotal){
                    $pageStr.="<li class='am-active'><a href='ProductList_{$id}_{$i}.html'>".$i."</a></li>";
                }else{
                    $pageStr.="<li class='am-active'><a href='ProductList_{$id}_{$i}.html'>".$i."</a>&nbsp;</li>";
                }
                
            }
            else
            {
                if($i==$PageTotal){
                    $pageStr.="<li><a href='ProductList_{$id}_{$i}.html'>".$i."</a></li>";
                }else{
                    $pageStr.="<li><a href='ProductList_{$id}_{$i}.html'>".$i."</a>&nbsp;</li>";
                }
            }
        }

        $lastPage=$CurrentPage-1>0?$CurrentPage-1:1;
        $nextPage=$CurrentPage+1>$PageTotal?$PageTotal:$CurrentPage+1;
        // print_r($CurrentPage);
        //Ò³ÃæÏÔÊ¾Êý¾Ý
        $news=M("product")->where($Where)->order($Order)->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();       
        $userID=$_COOKIE['userID'];
        foreach ($news as $key => $val) {
            $find_collection=M('collection')->where("userID=$userID and productID={$val['id']}")->find();
            $find_addcar=M('shopping_cart')->where("userID=$userID and productID={$val['id']}")->find();
            $news[$key]['collection']=$find_collection['id'];
            $news[$key]['addcar']=$find_addcar['id'];
        }
        // print_r($news);
        $pageData = array(CurrentPage=>$CurrentPage,lastPage=>$lastPage,paginalNum=>$paginalNum,nextPage=>$nextPage,StripeNumber=>$StripeNumber,PageTotal=>$PageTotal,product=>$news,pageStr=>$pageStr);
        return $pageData;
    }

     function collectionPageData($CurrentPage,$paginalNum,$Where,$Order="SortID desc"){

        //»ñÈ¡À¸Ä¿
        if($CurrentPage==null||$CurrentPage<=0)
        {
            $CurrentPage=1;
        }
        //Ò»¹²¶àÉÙÌõ
        // $StripeNumber=M("collection")->where($Where)->count();
        $StripeNumber=M('collection')
            ->Field('collection.id,product.imageurl,product.title,product.original_price,product.comment_num,product.present_price')
            ->join('product on product.id=collection.productID')
            ->where($Where)
            ->order($Order)
            ->count();

        //Ò»¹²¶àÉÙÒ³
        $PageTotal=ceil($StripeNumber/$paginalNum);
        if($PageTotal==0)
        {
            $PageTotal=1;
        }
        $pageStr="";
        for ($i=1; $i <= $PageTotal; $i++) { 
            if($i==$CurrentPage)
            {
                if($i==$PageTotal){
                    $pageStr.="<li class='am-active'><a href='Geren_collection_{$i}.html'>".$i."</a></li>";
                }else{
                    $pageStr.="<li class='am-active'><a href='Geren_collection_{$i}.html'>".$i."</a>&nbsp;</li>";
                }
                
            }
            else
            {
                if($i==$PageTotal){
                    $pageStr.="<li><a href='Geren_collection_{$i}.html'>".$i."</a></li>";
                }else{
                    $pageStr.="<li><a href='Geren_collection_{$i}.html'>".$i."</a>&nbsp;</li>";
                }
            }
        }

        $lastPage=$CurrentPage-1>0?$CurrentPage-1:1;
        $nextPage=$CurrentPage+1>$PageTotal?$PageTotal:$CurrentPage+1;
        // print_r($CurrentPage);
        //Ò³ÃæÏÔÊ¾Êý¾Ý
        // $news=M("collection")->where($Where)->order($Order)->limit(($CurrentPage-1)*$paginalNum,$paginalNum)->select();
             
        $news=M('collection')
            ->Field('collection.id,collection.productID,product.imageurl,product.title,product.original_price,product.comment_num,product.present_price')
            ->join('product on product.id=collection.productID')
            ->where($Where)
            ->order($Order)
            ->limit(($CurrentPage-1)*$paginalNum,$paginalNum)
            ->select();
        $userID=$_COOKIE['userID'];     
        foreach ($news as $key => $val) {
            $find_addcar=M('shopping_cart')->where("userID=$userID and productID={$val['productID']}")->find();
            $news[$key]['addcar']=$find_addcar['id'];
        }
        
        // print_r($news);
        $pageData = array(CurrentPage=>$CurrentPage,lastPage=>$lastPage,paginalNum=>$paginalNum,nextPage=>$nextPage,StripeNumber=>$StripeNumber,PageTotal=>$PageTotal,collection=>$news,pageStr=>$pageStr);
        return $pageData;
    }


    //»ñÈ¡¸ÃÀ¸Ä¿¼°ËùÓÐ×ÓÀ¸Ä¿id
    function getAllChildrenID($id,$table=lanmu){
        $childrenID="";
        $lanmus=M("$table")->where("parentID={$id}")->select();
        if($lanmus>0)
        {
            foreach($lanmus as $lanmu){
                //echo $lanmu['id'];
                $childrenID.=$lanmu['id'];
                $childrenID.=",";
                $childrenID.=getAllChildrenID($lanmu['id']);
            }
        }
        
        return $childrenID;
    }

    function check_code($code, $id = ""){  
        $verify = new \Think\Verify();  
        return $verify->check($code, $id);  
    }

    /**
 * 导出到EXCEL 
 * @param type $expTitle
 * @param type $expCellName
 * @param type $expTableData
 */
    function exportExcel($expTitle, $expCellName, $expTableData) {
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle); //文件名称
        $fileName = $expTitle . date('_YmdHis'); //or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel");
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
     //  $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1'); //合并单元格
        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '1', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 2), $expTableData[$i][$expCellName[$j][0]]);
            }
        }
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls"); //attachment新窗口打印inline本窗口打印
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
 }

 
 function i_array_column($input, $columnKey, $indexKey=null){
    if(!function_exists('array_column')){ 
        $columnKeyIsNumber  = (is_numeric($columnKey))?true:false; 
        $indexKeyIsNull            = (is_null($indexKey))?true :false; 
        $indexKeyIsNumber     = (is_numeric($indexKey))?true:false; 
        $result                         = array(); 
        foreach((array)$input as $key=>$row){ 
            if($columnKeyIsNumber){ 
                $tmp= array_slice($row, $columnKey, 1); 
                $tmp= (is_array($tmp) && !empty($tmp))?current($tmp):null; 
            }else{ 
                $tmp= isset($row[$columnKey])?$row[$columnKey]:null; 
            } 
            if(!$indexKeyIsNull){ 
                if($indexKeyIsNumber){ 
                  $key = array_slice($row, $indexKey, 1); 
                  $key = (is_array($key) && !empty($key))?current($key):null; 
                  $key = is_null($key)?0:$key; 
                }else{ 
                  $key = isset($row[$indexKey])?$row[$indexKey]:0; 
                } 
            } 
            $result[$key] = $tmp; 
        } 
        return $result; 
    }else{
        return array_column($input, $columnKey, $indexKey);
    }
}
 
 
 
 