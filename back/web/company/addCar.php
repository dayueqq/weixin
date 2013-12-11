<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
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
  
  $carId=$_COOKIE['carId'];
  $carJson='../../../common/temp/config/'.$carId.'carConfig.json';
  $carIdArr=explode('@',$carId);

  if(count($carIdArr)>1){  //双品牌
	  if(!file_exists($carJson)){
		  $tempI=0;
		  for($mm=0;$mm<count($carIdArr);$mm++){
			  $sql="select name from car_type where car_id='$carIdArr[$mm]' and level=1";
			  $result=mysql_query($sql);
			  $arrName=mysql_fetch_array($result);
			  
			  $sql="select * from allcar_info where brand='$arrName[name]'";
			  $result=mysql_query($sql);
			
			  for($i=0;($arr=mysql_fetch_array($result));$i++){   
				  for( $k=0 ; $k<9; $k++ ) {
					  $configInfo[$tempI][$k]=$arr[$k]; 
				  }  
				  $tempI++;
			  }
		  }
		  $fh = fopen($carJson, 'w')
			  or die("Error opening output file");
		  fwrite($fh, "var modJson=".json_encode($configInfo));
		  fclose($fh);
	  }
	  $smarty->assign('double',1);
  }else{
	  $smarty->assign('double',0);
  }
  
  $smarty->assign('carId',$carId);
  $smarty->assign('carJson',$carJson);
  
  $smarty->display($html_path.'addCar.html');
  mysql_close();
?>