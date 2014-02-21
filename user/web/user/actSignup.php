<?php
  ob_start(); //打开缓冲区
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  date_default_timezone_set('PRC');
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
  
  $tableName='car_active';
  $conArr=array('act_id');
  $conArrCont=array($_GET['actId']);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('info',$info);
  
  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $comInfo=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('comInfo',$comInfo);
  
  $carIdArr=explode('@',$carId);
  if(count($carIdArr)>1){  //双品牌
      $smarty->assign('double',1);
  }else{
	  $smarty->assign('double',0);
  }
  
  ob_end_flush();//输出全部内容到浏览器
  $smarty->assign('carId',$carId);
  $smarty->assign('comName',$comName);
  
  $jsonfile='../../../back/web/temp/active/'.$comId.'/'.$_GET['actId'].'actcar.json';
  $smarty->assign('jsonfile',$jsonfile); //让前端知道是否要有信息 
  $smarty->assign('comId',$comId);
  $smarty->display($html_path.'actSignup.html');
  mysql_close();
?>