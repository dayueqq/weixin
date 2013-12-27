<?php
  header("Content-type:application/vnd.ms-excel");
  header("Content-Disposition:filename=数据导出.xls");
  $sql=mysql_connect('localhost','root','root');
  $db=mysql_select_db("weixin",$sql);
  mysql_query('set names utf8');
  
  $type=$_GET['type'];
  if($type=='book'){
	  echo "报名日期\t";
	  echo "车系\t";
	  echo "车型\t";
	  echo "姓名\t";
	  echo "联系方式\t";
	  echo "预约时间\t\n";
	  
	  $data=$_GET['data'];
	  $dataArr=explode(',',$data);
	  
	  $sql="select * from user_info where company_id='$_COOKIE[companyId]' and date>='$dataArr[2]' and date<='$dataArr[3]'"; 
	  if($dataArr[0]){
		  $sql.=" and series='$dataArr[0]'";
	  }
	  if($dataArr[1]){
		  $sql.=" and model='$dataArr[1]'";
	  }
	  if($dataArr[4]){
		  $sql.=" and willBuyTime='$dataArr[4]'";
	  }
	  
	  $result=mysql_query($sql);
	  $b_num=mysql_num_rows($result);
	  for($i=0;($arr=mysql_fetch_array($result));$i++){                           
		  echo $arr['date']."\t";      // 获得 id                       
		  echo $arr['series']."\t";   
		  echo $arr['model']."\t"; 
		  echo $arr['name']."\t"; 
		  echo $arr['telephone']."\t"; 
		  echo $arr['willBuyTime']."\t\n"; 
	  }
  }else if($type=='dri'){
	  echo "报名日期\t";
	  echo "车系\t";
	  echo "姓名\t";
	  echo "联系方式\t";
	  echo "预约日期\t\n";
	  
	  $data=$_GET['data'];
	  $dataArr=explode(',',$data);
	  
	  $sql="select * from user_drive_info where company_id='$_COOKIE[companyId]' and date>='$dataArr[2]' and date<='$dataArr[3]'"; 
	  if($dataArr[0]){
		  $sql.=" and series='$dataArr[0]'";
	  }
	  if($dataArr[1]){
		  $sql.=" and model='$dataArr[1]'";
	  }
	  
	  $result=mysql_query($sql);
	  $b_num=mysql_num_rows($result);
	  for($i=0;($arr=mysql_fetch_array($result));$i++){                           
		  echo $arr['date']."\t";      // 获得 id                     
		  echo $arr['series']."\t";   
		  echo $arr['name']."\t"; 
		  echo $arr['telephone']."\t"; 
		  echo $arr['bookDate']."\t\n"; 
	  }
	  
  }else if($type=='service'){
	  echo "报名日期\t";
	  echo "服务类型\t";
	  echo "车牌号\t";
	  echo "预约日期\t";
	  echo "预约时间\t";
	  echo "姓名\t";
	  echo "联系方式\t\n";
	  
	  $data=$_GET['data'];
	  $dataArr=explode(',',$data);
	  
	  $sql="select * from user_service where company_id='$_COOKIE[companyId]' and date>='$dataArr[2]' and date<='$dataArr[3]'"; 
	  if($dataArr[0]){
		  $sql.=" and bookDate='$dataArr[0]'";
	  }
	  if($dataArr[1]){
		  $sql.=" and type='预约$dataArr[1]'";
	  }
	  if($dataArr[4]=='已处理'){
		  $sql.=" and status='1'";
	  }else if($dataArr[4]=='未处理'){
		  $sql.=" and status='0'";
	  }
	  
	  $result=mysql_query($sql);
	  $b_num=mysql_num_rows($result);
	  for($i=0;($arr=mysql_fetch_array($result));$i++){                           
		  echo $arr['date']."\t";      // 获得 id                     
		  echo $arr['type']."\t";   
		  echo $arr['license']."\t"; 
		  echo $arr['bookDate']."\t"; 
		  echo $arr['bookTime']."\t"; 
		  echo $arr['name']."\t"; 
		  echo $arr['contact']."\t\n"; 
	  }
	  
  }else if($type=='groupBuy'){
	  echo "报名日期\t";
	  echo "车系\t";
	  echo "车型\t";
	  echo "姓名\t";
	  echo "联系方式\t";
	  echo "预约时间\t\n";
	  
	  $data=$_GET['data'];
	  $dataArr=explode(',',$data);
	  
	  $sql="select * from user_group where company_id='$_COOKIE[companyId]' and date>='$dataArr[2]' and date<='$dataArr[3]'"; 
	  if($dataArr[0]){
		  $sql.=" and series='$dataArr[0]'";
	  }
	  if($dataArr[1]){
		  $sql.=" and model='$dataArr[1]'";
	  }
	  if($dataArr[4]){
		  $sql.=" and willBuyTime='$dataArr[4]'";
	  }
	  
	  $result=mysql_query($sql);
	  $b_num=mysql_num_rows($result);
	  for($i=0;($arr=mysql_fetch_array($result));$i++){                           
		  echo $arr['date']."\t";      // 获得 id                       
		  echo $arr['series']."\t";   
		  echo $arr['model']."\t"; 
		  echo $arr['name']."\t"; 
		  echo $arr['telephone']."\t"; 
		  echo $arr['willBuyTime']."\t\n"; 
	  }
  }
  //echo $sql;
 
  
?>