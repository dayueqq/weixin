<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $carBrand=$_COOKIE['carBrand'];
  $carId=$_COOKIE['carId'];

  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');

  $smarty->assign('info',$info);
  $smarty->assign('carId',$carId);
  $smarty->display($html_path.'mainbody.html');
  mysql_close();
?>