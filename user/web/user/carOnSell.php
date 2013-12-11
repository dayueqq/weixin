<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $carId=$_GET['carId'];
  $tableName='allcar_info';
  $conArr=array('car_id');
  $conArrCont=array($carId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('info',$info);
  
  $comId=$_COOKIE['comId'];
  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $comInfo=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('comInfo',$comInfo);
  
  $tableName='car_sell';
  $conArr=array('company_id','car_id');
  $conArrCont=array($comId,$carId);
  $carInfo=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('carInfo',$carInfo);
  
  $smarty->assign('comName',$_COOKIE['comName']);
  $smarty->display($html_path.'carOnSell.html');
  mysql_close();
?>
  