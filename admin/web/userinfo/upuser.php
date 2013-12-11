<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  
  $time=uniqid();
  $name=$_POST['name'];
  $sex=$_POST['sex'];
  $tele=$_POST['tele'];
  $qq=$_POST['qq'];
  $code=substr(md5($tele+$time),3,11);
  
  $sql="insert into user_info values('$time','$name','$sex','$tele','$qq','','$code')";
  
  $result=mysql_query($sql);
  if($result){
	  echo "<script>alert('经销商添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }else{
	  echo "<script>alert('添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }
  mysql_close();
?>
