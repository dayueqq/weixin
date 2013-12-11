<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $carBrand=$_COOKIE['carBrand'];
  $carId=$_COOKIE['carId'];
  
  $tableName='car_active';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $orderArr=array('act_id');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'6');
  
  if($returnArr[2]<6){
	  $smarty->assign('actNew',1);   //让前端知道是否要有添加盒子
  }else{
	  $smarty->assign('actNew',0);
  }
  $smarty->assign('info',$returnArr[1]);
  $smarty->assign('carBrand',$carBrand);
  $smarty->assign('carId',$carId);
  $smarty->display($html_path.'Activity.html');
  mysql_close();
?>