<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $companyId=$_COOKIE['companyId'];
  $tableName='user_service';
  

  $jsonfile='../temp/service/'.$_COOKIE['companyId'].date('H').'serData.json';

  
  //if(!file_exists($jsonfile)){  //判断是否存在文件，存在则不再生成
  if(1){ 
	  $conArr=array('company_id');
	  $conArrCont=array($companyId);
	  $orderArr=array('service_id');
	  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'-1');
	  
	  //print_r($returnArr);
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, "var dataJson=".json_encode($returnArr));
	  fclose($fh);
  }
  
  if(isset($_GET['data'])){
	  $smarty->assign('choice',$_GET['data']);  
  }else{
	  $smarty->assign('choice','0');  
  }
  $smarty->assign('tempData',$jsonfile);
  $smarty->display($html_path.'nameStatics3.html');
  mysql_close();
?>