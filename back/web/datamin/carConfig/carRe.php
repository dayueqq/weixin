<?php
  include_once('../../globalpath.php');
  include $common_path.'SqlQuery.php';
  
  $sql="desc allcar_info";
  $result=mysql_query($sql);
  $num = mysql_num_rows($result); 
	  
	  $sql="select * from allcar_info group by car_id";
	  $result=mysql_query($sql);
	
	  for($i=0;($arr=mysql_fetch_array($result));$i++){   
		  for( $k=0 ; $k<$num; $k++ ) {
			  $info[$i][$k]=$arr[$k]; 
		  }  
	  }
	  
	  $jsonfile='carConfig.json';
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, "var modJson=".json_encode($info));
	  fclose($fh);
  

  mysql_close();