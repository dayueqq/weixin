<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $carBrand=$_COOKIE['carBrand'];

  $tableName='car_group';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'',''); 
  if($info=='error'){
	  $smarty->assign('upGro',0); //让前端知道是否要有信息
  }else{
	  $smarty->assign('info',$info);
	  $smarty->assign('upGro',1); //让前端知道是否要有信息
  } 
  
  $smarty->display($html_path.'groupBuy.html');
  mysql_close();
?>