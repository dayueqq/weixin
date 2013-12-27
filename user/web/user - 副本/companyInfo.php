<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['comId'];
  //如果用户从 get 方式进入，则覆盖之前的 cookie
  if(isset($_GET['comId'])){
	  $comId=$_GET['comId'];
	  if($comId!=$_COOKIE['comId']){
		  $tableName='company_info';
		  $conArr=array('company_id');
		  $conArrCont=array($comId);
		  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
		  setCookie('comId',$comId);	
		  setCookie('carId',$info['car_id']);  //设置代理哪个汽车品牌	
		  setCookie('comName',$info['company_name']);  //设置代理哪个汽车品牌	
	  }
  }
  
  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');

  $smarty->assign('info',$info);
  $smarty->display($html_path.'companyInfo.html');
  mysql_close();
?>