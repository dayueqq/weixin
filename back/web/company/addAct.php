<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  
  if(isset($_GET['actId'])){
	  $tableName='car_active';
	  $conArr=array('act_id');
	  $conArrCont=array($_GET['actId']);
	  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  $smarty->assign('info',$info);
	  $smarty->assign('upAct',1); //让前端知道是否要有信息
	  
	  $jsonfile='../temp/active/'.$_COOKIE['companyId'].'/'.$conArrCont[0].'actcar.json';
	  $smarty->assign('jsonfile',$jsonfile); //让前端知道是否要有信息
  }else{
	  $smarty->assign('upAct',0); //让前端知道是否要有信息
  }
  
  $carIdArr=explode('@',$_COOKIE['carId']);
  if(count($carIdArr)>1){  //双品牌
      $smarty->assign('double',1);
  }else{
	  $smarty->assign('double',0);
  }
  
  $smarty->assign('carBrand',$_COOKIE['carBrand']);
  $smarty->assign('carId',$_COOKIE['carId']);
  $smarty->display($html_path.'addAct.html');
  mysql_close();
?>