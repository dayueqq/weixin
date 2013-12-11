<?php
  include_once('../../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $sql="desc allcar_info";
  $result=mysql_query($sql);
  $num = mysql_num_rows($result); //知道有几行
	  
  $sql="select * from allcar_info where brand='A 奥迪'";
  $result=mysql_query($sql);

  for($i=0;($arr=mysql_fetch_array($result));$i++){      
	  for($k=0 ; $k<$num; $k++ ) {
		  $info[$i][$k]=$arr[$k]; 
	  }            
  }
  //写入 json  文件中
  $jsonfile="carConfig.json";
  $fh = fopen($jsonfile, 'w')
	  or die("Error opening output file");
  fwrite($fh, "var modJson=".json_encode($info));
  fclose($fh);
  
  