<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $carBrand=$_COOKIE['carBrand'];
  $carId=$_COOKIE['carId'];
  
  $tableName='car_drive';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $orderArr=array('drive_id');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'5');
  
  if($returnArr[2]){
	  $smarty->assign('pageshow',$returnArr[0]);  
  }else{
	  $smarty->assign('pageshow','');  
  }
  
  $smarty->assign('info',$returnArr[1]);
  $smarty->assign('carBrand',$carBrand);
  $smarty->assign('carId',$carId);
  $smarty->display($html_path.'carDriveList.html');
  mysql_close();
?>