<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  include '../common/SqlQuery.php';
  
  if(!isset($_GET['level'])){
	  $query="select * from car_type where level='1'";
	  $result=mysql_query($query);
	  $num=mysql_num_rows($result);
	  
	  for($i=0;$i<$num;$i++){
		  $arr=mysql_fetch_array($result);                                  // 查询 获得数组
		  $array[$i]['id']=$arr['id'];
		  $array[$i]['name']=$arr['name'];         //查询 一级目录名称
		  $array[$i]['level']=$arr['level'];
		  $array[$i]['father']=$arr['father'];
	  }
	  
	  $smarty->assign('type',$array);
	  
	  mysql_close();
	
	  $smarty->display('cartype.html');
  }else{
	  $level=$_GET['level'];
	  $father=$_POST['father'];
	  
	  $query="select * from car_type where level='$level' and father='$father'";
	  $result=mysql_query($query);
	  $num=mysql_num_rows($result);
	  
	  $data=array();
	  for($i=0;$i<$num;$i++){
		  $arr=mysql_fetch_array($result);                                  // 查询 获得数组
		  $array[$i]['id']=$arr['id'];
		  $array[$i]['name']=$arr['name'];         //查询 一级目录名称
		  $array[$i]['level']=$arr['level'];
		  $array[$i]['father']=$arr['father'];
		  $data[$i]=implode('@@',$array[$i]);
	  }
	  echo implode('@/@',$data);
	  mysql_close();
  }
?>