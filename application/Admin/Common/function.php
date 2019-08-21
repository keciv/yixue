<?php
function getTypeByOption($fid=0,$num=0){
	//获取第一级分类
	$optionStr="";
	$typeArr=M('address')->where("parentid=$fid")->select();
	//产生缩进字符串 —
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;|—",$num);
	$num++;
	foreach($typeArr as $v){
		$optionStr.="<option value='{$v['id']}'>{$indentStr}{$v['title']}</option>";	
		//获取子级
		$sonStr=getTypeByOption($v['id'],$num);//getTypeByOption(2)
		$optionStr.=$sonStr;
	}
	return $optionStr;
}
function get_category_Option($fid=0,$num=0,$parentID){
	//获取第一级分类
	$optionStr="";
	$typeArr=M('product_sort')->where("parentID=$fid")->select();
	//产生缩进字符串 —
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;|—",$num);
	$num++;
	foreach($typeArr as $v){
		if($parentID==$v['id']){
			$optionStr.="<option value='{$v['id']}' selected>{$indentStr}{$v['sort_title']}</option>";	
		}else{
			$optionStr.="<option value='{$v['id']}'>{$indentStr}{$v['sort_title']}</option>";
		}
		//获取子级
		$sonStr=get_category_Option($v['id'],$num);//getTypeByOption(2)
		$optionStr.=$sonStr;
	}
	return $optionStr;
}

function getTypeByTr($fid=0,$num=0){
	$trStr="";
	$lanmus=M('address')->where("parentid=$fid")->select();
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$num);
	$num++;
	if(is_array($lanmus)){
		foreach($lanmus as $lanmu){
			$trStr.="<tr  class='text-c'>
						<td><input type='checkbox'value='{$lanmu['id']}' name='id'></td>
						<td>{$lanmu['id']}</td>
						<td width='60%' style='text-align: left;padding-left: 25%;'>{$indentStr}|—{$lanmu['title']}</td>
						<td onclick='sort("."{$lanmu['SortID']}".","."{$lanmu['id']}".");'>{$lanmu['SortID']}</td>
						<td><a href='".U('AddressAdd/Info/',array('id'=>$lanmu['id']))."'>修改</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onClick=("."article_del({$lanmu['id']})".")>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>";
			$sonStr=getTypeByTr($lanmu['id'],$num);
			$trStr.=$sonStr;
		}
	}
	return $trStr;
}

function getTypeByTr_lanmu($fid=0,$num=0){
	$trStr="";
	$lanmus=M('lanmu')->where("parentID=$fid")->select();
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$num);
	$num++;
	if(is_array($lanmus)){
		foreach($lanmus as $lanmu){
			$trStr.="<tr  class='text-c'>
						<td><input type='checkbox'value='' name=''></td>
						<td >{$lanmu['id']}</td>
						<td width='60%' style='text-align: left;padding-left: 25%;'>{$indentStr}|—{$lanmu['title']}</td>
						<td onclick='sort("."{$lanmu['SortID']}".","."{$lanmu['id']}".");'>{$lanmu['SortID']}</td>
						<td><a href='".U('LanmuAdd/Info/',array('id'=>$lanmu['id']))."'>修改</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onClick=("."article_del({$lanmu['id']})".")>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>";
			$sonStr=getTypeByTr_lanmu($lanmu['id'],$num);
			$trStr.=$sonStr;
		}
	}
	return $trStr;
}


function getTypeByTr_type($fid=0,$num=0){
	$trStr="";
	$types=M('special')->where("parentID=$fid")->select();
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$num);
	$num++;
	if(is_array($types)){
		foreach($types as $type){
			$trStr.="<tr  class='text-c'>
						<td><input type='checkbox'value='{$type['id']}' name='id'></td>
						<td >{$type['id']}</td>
						<td width='60%' style='text-align: left;padding-left: 25%;'>{$indentStr}|—{$type['type_name']}</td>
						<td onclick='sort("."{$type['SortID']}".","."{$type['id']}".");'>{$type['SortID']}</td>
						<td><a href='".U('SpecialAdd/Info/',array('id'=>$type['id']))."'>修改</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onClick=("."article_del({$type['id']})".")>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					</tr>";
			$sonStr=getTypeByTr_type($type['id'],$num);
			$trStr.=$sonStr;
		}
	}
	return $trStr;
}

function getTypeByTr_user(){
	$trStr="";
	$users=M('user')->select();
	if(is_array($users)){
		foreach($users as $user){
			$trStr.="<tr  class='text-c'>
						<td><input type='checkbox' value='{$user['id']}' name='id'></td>
						<td >{$user['id']}</td>
						<td width='150' style='text-align: center'>{$user['name']}</td>
						<td>{$user['password']}</td>
						<td >{$user['time']}</td>
						<td><a href='".U('UserAdd/Info/',array('id'=>$user['id']))."'>修改</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)' onClick=("."article_del({$user['id']})".")>删除</a>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>";
		}

	}
	return $trStr;
}



function getTypeByOption_lanmu($fid=0,$num=0){
	//获取第一级分类
	$optionStr="";
	$typeArr=M('lanmu')->where("parentID=$fid")->select();
	//产生缩进字符串 —
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;|—",$num);
	$num++;
	foreach($typeArr as $v){
		$optionStr.="<option value='{$v['id']}'>{$indentStr}{$v['title']}</option>";	
		//获取子级
		$sonStr=getTypeByOption_lanmu($v['id'],$num);//getTypeByOption(2)
		$optionStr.=$sonStr;
	}
	return $optionStr;
}

function category($fid=0,$num=0){
	$trStr="";
	$lanmus=M('product_sort')->where("parentID=$fid")->select();
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$num);
	$num++;
	if(is_array($lanmus)){
		foreach($lanmus as $lanmu){
			if($lanmu['icon']!=null){
				$trStr.="<tr class='text-c va-m'>
							<td><input type='checkbox' value='{$lanmu['id']}' name='id'></td>
							<td>{$lanmu['id']}</td>
							<td width='60%' style='text-align: left;padding-left: 25%;'>{$indentStr}|—{$lanmu['sort_title']}</td>
							<td><img src='http://localhost/New_admin/{$lanmu['icon']}'></td>
							<td onclick='sort("."{$lanmu['SortID']}".","."{$lanmu['id']}".");'>{$lanmu['SortID']}</td>
							<td><a style='text-decoration:none' class='ml-5' onClick='product_edit(\"产品编辑\",\"".U('ProductAdd/category_Info/',array('id'=>$lanmu['id']))."\")' href='javascript:;' title='编辑'><i class='Hui-iconfont'>&#xe6df;</i></a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='text-decoration:none' class='ml-5' href='javascript:void(0)'  title='删除' onClick=("."article_del({$lanmu['id']})".")><i class='Hui-iconfont'>&#xe6e2;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>";
			}else{
				$trStr.="<tr class='text-c va-m'>
							<td><input type='checkbox' value='{$lanmu['id']}' name='id'></td>
							<td>{$lanmu['id']}</td>
							<td width='60%' style='text-align: left;padding-left: 25%;'>{$indentStr}|—{$lanmu['sort_title']}</td>
							<td>暂无(一级分类独有)</td>
							<td onclick='sort("."{$lanmu['SortID']}".","."{$lanmu['id']}".");'>{$lanmu['SortID']}</td>
							<td><a style='text-decoration:none' class='ml-5' onClick='product_edit(\"产品编辑\",\"".U('ProductAdd/category_Info/',array('id'=>$lanmu['id']))."\")' href='javascript:;' title='编辑'><i class='Hui-iconfont'>&#xe6df;</i></a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style='text-decoration:none' class='ml-5' href='javascript:void(0)'  title='删除' onClick=("."article_del({$lanmu['id']})".")><i class='Hui-iconfont'>&#xe6e2;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						</tr>";		
			}			
			$sonStr=category($lanmu['id'],$num);
			$trStr.=$sonStr;
		}
	}
	return $trStr;
}


function getTypeByLi($fid=0,$num=0){
	//获取第一级分类
	$optionStr="";
	$type=M('lanmu');
	$typeArr=$type->where("parentid=$fid")
	->select();
	//产生缩进字符串 —
	$indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$num);
	$num++;
	foreach($typeArr as $v){
		$optionStr.="<ul>
						<li><a href='admin.php/Danye/index/id/{$v['id']}' data-title='图文列表' href='javascript:void(0)'>{$indentStr}{$v['title']}</a></li>
					 </ul>";
		//获取子级
		$sonStr=getTypeByLi("{$v['id']}",$num);//getTypeByOption(2)
		$optionStr.=$sonStr;
	}
	return $optionStr;
}
function getlanmuDanye($controller,$id=0){
	static $array=array();
	// $yiji=M("lanmu")->where("controller='{$controller}' and parentid='{$id}'")->order("id asc")->select();
	$yiji=M("lanmu")->where("controller='{$controller}' and parentid='{$id}'")->order("id asc")->select();
    foreach ($yiji as $yijiData) {
        $erji = M("lanmu")->where("controller='{$controller}' and parentid='{$yijiData['id']}'")->order("id asc")->select();
        if($erji>0)
        {
        	foreach ($erji as $erjiData)
        	{
        		array_push($array,$erjiData);
        		$lanmu = getlanmuList($erjiData['id'],$controller);
        	}
        }
        else
        {
        	array_push($array,$yijiData);
        }
    }
    return $array;
}
function getlanmuList($controller){
	static $array=array();
	$lanmu = M("lanmu")->where("controller='{$controller}' and parentID=0")->order("id asc")->select();
	if($lanmu!=null)
	{
		$array = $lanmu;
	}
	$lanmu=M("lanmu")->where("controller='{$controller}' and parentID!=0")->order("id asc")->select();
    foreach ($lanmu as $lanmuData) {
    	$yijilanmu = getlanmu($lanmuData['id']);
    	
    	array_push($array,$yijilanmu);
    }
     // print_r($array);
     // echo '<pre>';
    $array = array_unique($array, SORT_REGULAR);   

	$newArray = array();
    foreach ($array as $everyArray) {
    	$newArray[] = $everyArray['SortID'];
    }
    array_multisort($newArray,SORT_ASC,$array);
    // print_r($array);
    // echo '<pre>';
    return $array;
}
function getlanmu($id){
    $lanmu=M("lanmu")->where("id={$id}")->find();
    if($lanmu>0)
    {
        $parentID = $lanmu['parentID'];
        if($parentID=="0")
        {
            return $lanmu;
        }
        $lanmu=getlanmu($parentID);
    }
    return $lanmu;
}