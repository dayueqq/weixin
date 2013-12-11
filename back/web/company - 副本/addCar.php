<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  if(isset($_GET['onId'])){
	  $tableName='car_sell';
	  $conArr=array('onsell_id');
	  $conArrCont=array($_GET['onId']);
	  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  $smarty->assign('info',$info);
	  $smarty->assign('addCar',1); //让前端知道是否要有信息
  }else{
	  $smarty->assign('addCar',0); //让前端知道是否要有信息
  }
  
  $smarty->assign('carBrand',$_COOKIE['carBrand']);
  $smarty->assign('carId',$_COOKIE['carId']);
  $smarty->assign('carJson','../../../common/temp/config/'.$_COOKIE['carId'].'carConfig.json');
  
  $smarty->display($html_path.'addCar.html');
  mysql_close();
?>