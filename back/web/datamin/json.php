<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $jsonfile='brand.json';
  $tableName='car_type';

  $conArr=array('level');
  $conArrCont=array('1');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','-1');;

  //写入 json  文件中
  $fh = fopen($jsonfile, 'w')
	  or die("Error opening output file");
  fwrite($fh, "var brandJson=".json_encode($returnArr));
  fclose($fh);
  
  $jsonfile='series.json';
  $tableName='car_type';

  $conArr=array('level');
  $conArrCont=array('2');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','-1');;

  //写入 json  文件中
  $fh = fopen($jsonfile, 'w')
	  or die("Error opening output file");
  fwrite($fh, "var seriesJson=".json_encode($returnArr));
  fclose($fh);
  
  $jsonfile='model.json';
  $tableName='car_type';

  $conArr=array('level');
  $conArrCont=array('3');
  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','-1');;

  //写入 json  文件中
  $fh = fopen($jsonfile, 'w')
	  or die("Error opening output file");
  fwrite($fh, "var modelJson=".json_encode($returnArr));
  fclose($fh);
  
  mysql_close();
?>