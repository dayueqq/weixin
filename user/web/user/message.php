<?php
  ob_start(); //打开缓冲区
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  //如果用户从 get 方式进入，则覆盖之前的 cookie
  if(isset($_GET['comId'])){
	  $comId=$_GET['comId'];
	  $tableName='company_info';
	  $conArr=array('company_id');
	  $conArrCont=array($comId);
	  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  setCookie('comId',$comId);	
	  setCookie('carId',$info['car_id']);  //设置代理哪个汽车品牌
	  $carId=$info['car_id'];	
	  setCookie('comName',$info['company_name']);  //设置代理哪个汽车品牌	
	  $comName=$info['company_name']; 
  }else{
      $carId=$_COOKIE['carId'];
	  $comId=$_COOKIE['comId'];
	  $comName=$_COOKIE['comName'];
  }
  
  $jsonfile='../temp/message/'.$comId;
  createDir($jsonfile);
  
  $jsonfile.='/message.json';
  if(!file_exists($jsonfile)){  //判断是否存在文件，存在则不再生成
  //if(1){  //判断是否存在文件，存在则不再生成
	  $tableName='user_message';
	  $conArr=array('company_id');
	  $conArrCont=array($comId);
	  $orderArr=array('message_id');
	  $messageInfo=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'-1');
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, "var mesJson=".json_encode($messageInfo));
	  fclose($fh);
  }
  
  ob_end_flush();//输出全部内容到浏览器
  $smarty->assign('comName',$comName);
  $smarty->assign('jsonfile',$jsonfile);
  $smarty->assign('comId',$comId);
  $smarty->display($html_path.'message.html');
  mysql_close();
  
  function createDir($aimUrl) {  //创建文件夹
	 $arr = explode('/', $aimUrl);
	 $aimDir='';
	 foreach ($arr as $str) {
	   $aimDir .= $str . '/';
	   if (!file_exists($aimDir)) {
		  mkdir($aimDir);
	   }
	 }
 }
?>
  