<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  include '../common/SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $level=$_GET['level'];
  $tableName='car_type';
  
  if($level==1){
	  $arr=array('',$_POST['name'],1,'');
	  echo $sqlQuery->insert($tableName,$arr);
  }else if($level==2){
	  $arr=array('',$_POST['name'],2,trim($_POST['father']));
	  echo $sqlQuery->insert($tableName,$arr);
  }else if($level==3){
	  $arr=array('',$_POST['name'],3,trim($_POST['father']));
	  echo $sqlQuery->insert($tableName,$arr);
  }
  
  mysql_close();
?>