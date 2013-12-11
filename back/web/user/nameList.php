<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $tableName='car_type';
  $carId=$_COOKIE['carId']; 
  $conArr=array('level','father');
  $conArrCont=array('2',$carId);
  $carInfo=$sqlQuery->select($tableName,$conArr,$conArrCont,'','-1');
  $smarty->assign('carInfo',$carInfo);
  
  $tableName='user_info';
  $companyId=$_COOKIE['companyId'];
  $conArr=array('company_id');
  $conArrCont=array($companyId);
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','5');;

  $smarty->assign('pageshow',$returnArr[0]);  
  $smarty->assign('info',$returnArr[1]);
  $smarty->display($html_path.'nameList.html');
  mysql_close();
?>