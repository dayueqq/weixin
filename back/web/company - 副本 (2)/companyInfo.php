<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $companyId=$_COOKIE['companyId'];
  $tableName='company_info';
  $conArr=array('company_id');
  $conArrCont=array($companyId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');

  $smarty->assign('info',$info);
  $smarty->display($html_path.'companyInfo.html');
  mysql_close();
?>