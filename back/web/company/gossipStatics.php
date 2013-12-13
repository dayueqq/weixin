<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $comId=$_COOKIE['companyId'];
  $tableName='user_message';
  
  $jsonfile='../temp/message/'.$comId;
  createDir($jsonfile);
  
  $jsonfile.='/message.json';
  
  //if(!file_exists($jsonfile)){  //判断是否存在文件，存在则不再生成
  if(!file_exists($jsonfile)){ 
	  $conArr=array('company_id');
	  $conArrCont=array($comId);
	  $orderArr=array('message_id');
	  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'-1');
	  
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, "var mesJson=".json_encode($returnArr));
	  fclose($fh);
  }
  

  $smarty->assign('tempData',$jsonfile);
  $smarty->display($html_path.'gossipStatics.html');
  mysql_close();
  
  function createDir($aimUrl) {  //创建文件夹
	 $arr = explode('/', $aimUrl);
	 $aimDir='';
	 foreach ($arr as $str) {
	   $aimDir .= $str . '/';
	   if (!file_exists($aimDir)) {
		  mkdir($aimDir);
	   }
	 }
 }
?>