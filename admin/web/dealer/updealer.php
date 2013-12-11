<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  
  $time=uniqid();
  $name=$_POST['name'];
  $city=$_POST['city'];
  $place=$_POST['place'];
  $contact=$_POST['contact'];
  $url=$_POST['url'];
  $arr=$_POST['gift'];
  $gift=array(0,0,0);
  
  for($i=0;$i<count($arr);$i++){
	  $gift[$arr[$i]]=1;
  }

  $sql="insert into dealer values('$time','$name','$city','$place','$contact','$url','$gift[0]','$gift[1]','$gift[2]')";
  
  $result=mysql_query($sql);
  if($result){
	  echo "<script>alert('经销商添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }else{
	  echo "<script>alert('经销商添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }
  mysql_close();
?>
