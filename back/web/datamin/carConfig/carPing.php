<?php
  include_once('../../globalpath.php');
  include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $sql="select * from car_type where level=1";
  $resql=mysql_query($sql);
  for($mm=0;($faArr=mysql_fetch_array($resql));$mm++){
	  if($faArr['car_id']!=3||$faArr['car_id']!=15||$faArr['car_id']!=33||$faArr['car_id']!=36){
	  $sql="select * from car_type where level=2 and father='$faArr[car_id]'";
	
	  $result=mysql_query($sql);
	  for($i=0;($brr=mysql_fetch_array($result));$i++){      

		  $my_file = file_get_contents("./".$faArr['car_id'].'/'.$brr['car_id']."carConfig.json");
		  $str = json_decode($my_file,true);
		  
		  $arr=$str['0']['result']['paramtypeitems'][0];
		  //echo $arr[0]['paramitems'][1]['name']; 
		  
		  for($m=0; $m<count($arr['paramitems'][1]['valueitems']);$m++){
			  $conArr[$m]=array($arr['paramitems'][1]['valueitems'][$m]['specid'],$arr['paramitems'][0]['valueitems'][$m]['value'],$faArr['name'],$brr['name'],$arr['paramitems'][1]['valueitems'][$m]['value'],'','','','');
		  }
		  $sqlQuery->insertMore('allcar_info',$conArr);
	  }
	  }
  }
  mysql_close();
?>