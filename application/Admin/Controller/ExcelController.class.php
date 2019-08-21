<?php
namespace Admin\Controller;
use Think\Controller;
class ExcelController extends Controller {

	public function upload() {
		$year=$_POST['year'];
		if ($year!="") {
			
		
		date_default_timezone_set('PRC');
		function extension($n){
			return substr($n, strripos($n, '.')+1);
		}
		function isdate(){
			return md5(date('YmdHis').mt_rand(1000, 9999));
		}
		
		
			
			
		
		
	
		ini_set('memory_limit','1024M');		
		
		if ($_FILES['photo'][error]==0){
		
		
			$filename=$_FILES['photo'][name];
			$ext=exTension($filename);
			$filename=isdate().'.'.$ext;
			$info=move_uploaded_file($_FILES['photo']['tmp_name'],'public/upload/excel/'.$filename);
				
			if(!$info) {// 上传错误提示错误信息
				$this->success('上传错误！');
			}else{
			
			
			
			}
				
		}
			
		vendor("PHPExcel.PHPExcel");		
		$file_name='public/upload/excel/'.$filename	;	
		$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式	
			if ($extension == 'xlsx') {			
				$objReader =\PHPExcel_IOFactory::createReader('Excel2007');			
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');			
			} else if ($extension == 'xls'){			
				$objReader =\PHPExcel_IOFactory::createReader('Excel5');			
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');			
			}			
			$sheet =$objPHPExcel->getSheet(0);			
			$highestRow = $sheet->getHighestRow();//取得总行数			
			$highestColumn =$sheet->getHighestColumn(); //取得总列数			
			for ($i = 2; $i <= $highestRow; $i++) {	
				//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置
				
				
				$data['sheng'] = $objPHPExcel->getActiveSheet()->getCell("A". $i)->getValue();
				$data['shi'] =$objPHPExcel->getActiveSheet()->getCell("B" .$i)->getValue();
				$data['xian'] =$objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
				$data['zhen'] = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
				$data['cun'] =$objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
				$data['hbh'] =$objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();
				$data['rbh'] =$objPHPExcel->getActiveSheet()->getCell("G" .$i)->getValue();
				$data['name'] =$objPHPExcel->getActiveSheet()->getCell("H" .$i)->getValue();
				$data['sex'] = $objPHPExcel->getActiveSheet()->getCell("I". $i)->getValue();
				$data['zjhm'] =$objPHPExcel->getActiveSheet()->getCell("J" .$i)->getValue();
				$data['count'] =$objPHPExcel->getActiveSheet()->getCell("K" . $i)->getValue();
				$data['guanxi'] = $objPHPExcel->getActiveSheet()->getCell("L" . $i)->getValue();
				$data['minzu'] =$objPHPExcel->getActiveSheet()->getCell("M" . $i)->getValue();
				$data['xueli'] =$objPHPExcel->getActiveSheet()->getCell("N" . $i)->getValue();
				$data['school'] =$objPHPExcel->getActiveSheet()->getCell("O" . $i)->getValue();
				$data['jiankang'] =$objPHPExcel->getActiveSheet()->getCell("P" .$i)->getValue();
				$data['jineng'] =$objPHPExcel->getActiveSheet()->getCell("Q" .$i)->getValue();
				$data['wugong'] = $objPHPExcel->getActiveSheet()->getCell("R". $i)->getValue();
				$data['wgsj'] =$objPHPExcel->getActiveSheet()->getCell("S" .$i)->getValue();
				$data['nonghe'] =$objPHPExcel->getActiveSheet()->getCell("T" . $i)->getValue();
				$data['yanglao'] = $objPHPExcel->getActiveSheet()->getCell("U" . $i)->getValue();
				$data['zhigong'] =$objPHPExcel->getActiveSheet()->getCell("V" . $i)->getValue();
				$data['tuopin'] =$objPHPExcel->getActiveSheet()->getCell("W" .$i)->getValue();
				$data['pkhsx'] =$objPHPExcel->getActiveSheet()->getCell("X" .$i)->getValue();
				$data['yuanyin'] =$objPHPExcel->getActiveSheet()->getCell("Y" . $i)->getValue();
				$data['rjcsr'] =$objPHPExcel->getActiveSheet()->getCell("Z" .$i)->getValue();
				$data['phone'] =$objPHPExcel->getActiveSheet()->getCell("AA" .$i)->getValue();
				$data['yinhang'] = $objPHPExcel->getActiveSheet()->getCell("AB". $i)->getValue();
				$data['kahao'] =$objPHPExcel->getActiveSheet()->getCell("AC" .$i)->getValue();
				$data['dateandtime']=$year;
				
			
			
			M('people')->add($data);//看这里看这里,这个位置写数据库中的表名
			
			}
			
			$this->success('导入成功!');
			
			}else{
				$this->success("请先填写年度");
			}
		
		}
		 


		public function question() {		
			
			date_default_timezone_set('PRC');
			function extension($n){
				return substr($n, strripos($n, '.')+1);
			}
			function isdate(){
				return md5(date('YmdHis').mt_rand(1000, 9999));
			}

			ini_set('memory_limit','1024M');		

			$filename=$_FILES['photo'][name];
			$ext=exTension($filename);
			$filename=isdate().'.'.$ext;
			$info=move_uploaded_file($_FILES['photo']['tmp_name'],'public/upload/Excel/'.$filename);
				
			if(!$info) {// 上传错误提示错误信息
				$this->success('上传失败！');
			}else{
			
			}
		
				
				vendor("PHPExcel");		
				$file_name='public/upload/Excel/'.$filename	;	
				$extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));//判断导入表格后缀格式	
			if ($extension == 'xlsx') {	
						
				$objReader =\PHPExcel_IOFactory::createReader('Excel5');			
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');			
			} else if ($extension == 'xls'){
							
				$objReader =\PHPExcel_IOFactory::createReader('Excel5');			
				$objPHPExcel =$objReader->load($file_name, $encode = 'utf-8');			
			}			
			$sheet =$objPHPExcel->getSheet(0);			
			$highestRow = $sheet->getHighestRow();//取得总行数			
			$highestColumn =$sheet->getHighestColumn(); //取得总列数			
			for ($i = 1; $i <= $highestRow; $i++) {	
				//看这里看这里,前面小写的a是表中的字段名，后面的大写A是excel中位置

				$data['typeID'] =$objPHPExcel->getActiveSheet()->getCell("A" .$i)->getValue();
				$data['kcID'] =$objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
				$data['zjID'] = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
				$data['subject'] =$objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
				$data['choice'] =$objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
				$data['da_an'] =$objPHPExcel->getActiveSheet()->getCell("F" .$i)->getValue();
				$data['jie_xi'] =$objPHPExcel->getActiveSheet()->getCell("G" .$i)->getValue();
				$data['score'] = $objPHPExcel->getActiveSheet()->getCell("H". $i)->getValue();
				$data['SortID'] =$objPHPExcel->getActiveSheet()->getCell("I" .$i)->getValue();
				$data['qzmn'] =$objPHPExcel->getActiveSheet()->getCell("J" . $i)->getValue();
				$data['shi_juan'] = $objPHPExcel->getActiveSheet()->getCell("K" . $i)->getValue();
				
					
				$result=M('question')->add($data);//看这里看这里,这个位置写数据库中的表名
			
				}
			

				
				jump('导入成功!',__APP__."/QuestionList/index.html");
		
		
		}
	}
	
