<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $carBrand=$_COOKIE['carBrand'];

  

  $tableName='car_drive';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'',''); 
  if($info=='error'){
	  $smarty->assign('upDri',0); //让前端知道是否要有信息
  }else{
	  $smarty->assign('info',$info);
	  $smarty->assign('upDri',1); //让前端知道是否要有信息
  } 
 
  $smarty->display($html_path.'addDrive.html');
  mysql_close();
?>