<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  $comId=$_COOKIE['comId'];
  
  $tableName='car_group';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('info',$info);
  
  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $comInfo=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  $smarty->assign('comInfo',$comInfo);
  
  $carIdArr=explode('@',$_COOKIE['carId']);
  if(count($carIdArr)>1){  //双品牌
      $smarty->assign('double',1);
  }else{
	  $smarty->assign('double',0);
  }
  
  $smarty->assign('carId',$_COOKIE['carId']);
  $smarty->assign('comName',$_COOKIE['comName']);
  $smarty->assign('xmlFile','../temp/group/'.$_GET['comId'].'.xml');
  
  $tableName='car_active';
  $orderArr=array('endTime');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'6');
  $smarty->assign('actInfo',$returnArr[1]);
	  
  $smarty->display($html_path.'groupBuy.html');
  mysql_close();
?>