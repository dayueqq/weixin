<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  
  $order=$_GET['order'];
  $id=$_GET['id'];
  
  if($order=='del'){
	  $sql="delete from car_info where car_id='$id'";
  }else if($order=='update'){
	  
  }
  
  $result=mysql_query($sql);
  if($result){
	  echo "<script>alert('汽车信息修改成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }else{
	  echo "<script>alert('汽车信息修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }
  mysql_close();