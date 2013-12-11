<?php
  ob_start(); //打开缓冲区
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();

  if(isset($_GET['comId'])){
      $comId=$_GET['comId'];
  }else if(isset($_COOKIE['comId'])){
	  $comId=$_COOKIE['comId'];
  }else{
	  $comId='1';
  }
  setCookie('comId',$comId);	

  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');

  setCookie('carId',$info['car_id']);  //设置代理哪个汽车品牌	
  setCookie('comName',$info['company_name']);  //设置代理哪个汽车品牌	
  
  $tableName='car_active';
  $orderArr=array('endTime');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'6');

  ob_end_flush();//输出全部内容到浏览器
  $smarty->assign('info',$info);
  $smarty->assign('actInfo',$returnArr[1]);
  $smarty->display($html_path.'homepage.html');
  mysql_close();
?>
  