<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $tableName='car_service';
  $conArr=array('company_id');
  $conArrCont=array($comId);
  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
  if($info=='error'){
	  $smarty->assign('upSer',0); //让前端知道是否要有信息
  }else{
      $smarty->assign('info',$info);
      $smarty->assign('upSer',1); //让前端知道是否要有信息
  }


  $smarty->display($html_path.'addService.html');
  mysql_close();
?>