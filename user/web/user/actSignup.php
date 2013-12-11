<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  $comId=$_COOKIE['comId'];
  
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
  
  $carIdArr=explode('@',$_COOKIE['carId']);
  if(count($carIdArr)>1){  //双品牌
      $smarty->assign('double',1);
  }else{
	  $smarty->assign('double',0);
  }
  
  $smarty->assign('carId',$_COOKIE['carId']);
  $smarty->assign('comName',$_COOKIE['comName']);
  
  $jsonfile='../../../back/web/temp/active/'.$comId.'/'.$_GET['actId'].'actcar.json';
  $smarty->assign('jsonfile',$jsonfile); //让前端知道是否要有信息
	  
  $smarty->display($html_path.'actSignup.html');
  mysql_close();
?>