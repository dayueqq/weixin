<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $carBrand=$_COOKIE['carBrand'];
  $carId=$_COOKIE['carId'];
  
  $tableName='car_sell';
  $conArr=array('company_id');
  $conArrCont=array($_COOKIE['companyId']);
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','10');
  
  $smarty->assign('pageshow',$returnArr[0]);
  $smarty->assign('info',$returnArr[1]);
  $smarty->assign('carNum',$returnArr[2]);
  $smarty->assign('carId',$carId);
  $smarty->display($html_path.'carOnSell.html');
  mysql_close();
?>