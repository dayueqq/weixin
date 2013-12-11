<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  /*$sql="select * from car_type1 where level=1";
  $result=mysql_query($sql);
  
  $brand="var brandJson=[";
  for($i=0;($arr=mysql_fetch_array($result));$i++){      
	  $brand.="'_".$arr[0].','.$arr[1]."',";                 
  }
  //写入 json  文件中
  
  $jsonfile='brand.json';
  $fh = fopen($jsonfile, 'w')
	  or die("Error opening output file");
  fwrite($fh, $brand);
  fclose($fh);
  */
  
  
	/*$sql="select * from car_type1 where level=2";
	$result=mysql_query($sql);
	
	for($k=0;$k<188;$k++){
		$series[$k]=0;
	}
	$brand="var seriesJson=[";
	for($i=0;($arr=mysql_fetch_array($result));$i++){   
		if($series[$arr[3]]){   
			$series[$arr[3]].=",".$arr[0].','.$arr[1];          
		}else{
			$series[$arr[3]]=$arr[0].','.$arr[1]; 
		}
	}
  
	//写入 json  文件中
	print_r($series);
	$jsonfile='series.json';
	$fh = fopen($jsonfile, 'w')
		or die("Error opening output file");
	fwrite($fh, "var seriesJson=['".implode("','",$series)."']");
	fclose($fh);
*/  

  $sql="select * from car_type where level=3";
  $result=mysql_query($sql);
  
 
  $brand="var modelJson=[";
  for($i=0;($arr=mysql_fetch_array($result));$i++){   
      if($model[$arr[3]]){   
	      $model[$arr[3]].=",".$arr[0].','.$arr[1];          
	  }else{
		  $model[$arr[3]]=$arr[0].','.$arr[1]; 
	  }
  }
  $str='var mod=new Array();';
  $m=0;
  for($k=0;$k<count($model);$k++){
	  while(!$model[$m]){
		  $m++;
	  }
	  $str.='mod['.$m."]='".$model[$m]."';";
	  $m++;
  }
  //写入 json  文件中
  print_r($model);
  $jsonfile='model.json';
  $fh = fopen($jsonfile, 'w')
	  or die("Error opening output file");
  fwrite($fh, $str);
  fclose($fh);

  
  mysql_close();
?>