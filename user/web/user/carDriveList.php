<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';

  $sqlQuery=new SqlQuery();
  date_default_timezone_set('PRC');
  $comId=$_COOKIE['comId'];
  $jsonfile='../temp/drive/'.$comId.'drive.json';
  
  if(!file_exists($jsonfile)){  //判断是否存在文件，存在则不再生成
	  $tableName='car_drive';
	  $conArr=array('company_id');
	  $conArrCont=array($comId);
	  $orderArr=array('series');
	  $info=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'-1');
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, "var dataJson=".json_encode($info));
	  fclose($fh);
  }

  $smarty->assign('dataJson',$jsonfile);
  $smarty->assign('comName',$_COOKIE['comName']);
  $smarty->assign('comId',$comId);
  $smarty->display($html_path.'carDriveList.html');
  mysql_close();
?>
  