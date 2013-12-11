<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $carId=$_COOKIE['carId'];
  $smarty->assign('carBrand',$_COOKIE['carBrand']);
  $smarty->assign('carId',$carId);
  
  $carIdArr=explode('@',$carId);

  if(count($carIdArr)>1){  //双品牌
      $smarty->assign('double',1);
  }else{
	  $smarty->assign('double',0);
  }
  $tableName='user_info';
  $companyId=$_COOKIE['companyId'];
  $conArr=array('company_id');
  $conArrCont=array($companyId);
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','5');
  
  $serInfo=array();
  $query="select series from user_drive_info where company_id='$companyId' group by series";
  $result=mysql_query($query);
  for($i=0;$arr=mysql_fetch_array($result);$i++){      
	  $serInfo[$i]=$arr['series'];  
  }
  $smarty->assign('serInfo',$serInfo);
  $smarty->assign('pageshow',$returnArr[0]);  
  $smarty->assign('info',$returnArr[1]);
  $smarty->display($html_path.'nameList.html');
  mysql_close();
?>