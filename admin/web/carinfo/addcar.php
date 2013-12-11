<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  
  $sql="select * from dealer";
  $result=mysql_query($sql);
  
  for($i=0;($arr=mysql_fetch_array($result));$i++){                           
	  $dealer[$i]['dealerid']=$arr['dealer_id'];       // 获得 id          
	  $dealer[$i]['name']=$arr['dealer'];                // 获得 成品路径               
  }
  $smarty->assign('dealer',$dealer);
  $smarty->display($html_path.'addcar.html');
  mysql_close();
?>