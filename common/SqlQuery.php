<?php
  include 'comm.php';
  require_once 'util/page.class.php';
  
  class SqlQuery{
	  //只插入一条
	  function insert($tableName,$arr){
		  $sql="insert into $tableName values(";
		  for($i=0;$i<(count($arr)-1);$i++){
			  $sql=$sql."'$arr[$i]',";
		  }
		  $sql=$sql."'$arr[$i]')";
		  $result=mysql_query($sql);
		  return $result;
	  }
	  
	  //多条插入
	  function insertMore($tableName,$arr){
		  $sql="insert into $tableName values(";
		  for($i=0;$i<(count($arr)-1);$i++){
			  for($k=0;$k<(count($arr[$i])-1);$k++){
				  $sql=$sql."'".$arr[$i][$k]."',";
			  }
			  $sql=$sql."'".$arr[$i][$k]."'),(";
		  }
		  for($k=0;$k<(count($arr[$i])-1);$k++){
			  $sql=$sql."'".$arr[$i][$k]."',";
		  }
		  $sql=$sql."'".$arr[$i][$k]."')";//return $sql;
		  $result=mysql_query($sql);
		  return $result;
	  }
	  
	  function select($tableName,$conArr,$conArrCont,$otherCon,$orderArr,$gPageSize){
		  //获取列名
		  $sql="desc $tableName";
		  $result=mysql_query($sql);
		  $num = mysql_num_rows($result); 
		  for( $k=0 ; $k<$num; $k++ ) {
			  $type = mysql_fetch_array($result);
			  $columns[$k]=$type['Field'];
		  }
		  
		  //开始查询表
		  $sql="select * from $tableName ";
		  for($i=0;$i<count($conArr);$i++){
			  if($i==0){
				  if($conArr[0]!=''){
				      $sql=$sql."where $conArr[$i]='$conArrCont[$i]' ";
				  }
			  }else{
				  $sql=$sql."and $conArr[$i]='$conArrCont[$i]' ";
			  }
		  }
		  if($otherCon!=''){
			  $sql=$sql.$otherCon;
		  }
		  
		  for($i=0;$i<count($orderArr);$i++){
			  if($i==0){
				  if(isset($orderArr[0])){
					  $sql=$sql."order by $orderArr[$i] desc";
				  }
			  }else{
				  $sql=$sql." ,$orderArr[$i] desc";
			  }
		  }

		  //return $sql;
		  $result=mysql_query($sql);
		  
		  $info=array();
		  if($gPageSize>0){
			  $b_num=mysql_num_rows($result);
			  $fpage=new Page($b_num,$gPageSize, "");  //调用  page.class.php 中的 page 函数  ！！！！！！！！
			  if($b_num>0){
				  mysql_data_seek($result,$fpage->limit);
			  }
			  for($i=0;$i<$gPageSize&&($arr=mysql_fetch_array($result));$i++){      
				  for( $k=0 ; $k<$num; $k++ ) {
					  $info[$i][$columns[$k]]=$arr[$k]; 
				  }                     
			  }
			  $pageshow=$fpage->fpage(array(4,5,6));
	           //用于安排显示的顺序，因为page.class.php设置时为8个参数，使用的时候可以随便选择0——8 中的任意一个或多个数，见 1小时23分
              $returnArr[0]=$pageshow;
		  }else{
			  for($i=0;($arr=mysql_fetch_array($result));$i++){      
				  for( $k=0 ; $k<$num; $k++ ) {
					  $info[$i][$columns[$k]]=$arr[$k]; 
				  }                     
			  }
		  }
		  if($gPageSize>0){
			  if($b_num>0){
				  $returnArr[1]=$info;
				  $returnArr[2]=$b_num;  
			  }else{
				  $returnArr[1]='';
				  $returnArr[2]='';
			  }
			  return $returnArr;
		  }else{
		      return $info;
		  }
	  }
	  
	  //选择单条记录
	  function selectSingle($tableName,$conArr,$conArrCont,$otherCon,$orderArr){
		  //获取列名
		  $sql="desc $tableName";
		  $result=mysql_query($sql);
		  $num = mysql_num_rows($result); 
		  for( $k=0 ; $k<$num; $k++ ) {
			  $type = mysql_fetch_array($result);
			  $columns[$k]=$type['Field'];
		  }
  
          //开始查询表
		  $sql="select * from $tableName ";
		  for($i=0;$i<count($conArr);$i++){
			  if($i==0){
				  $sql=$sql."where $conArr[$i]='$conArrCont[$i]' ";
			  }else{
				  $sql=$sql."and $conArr[$i]='$conArrCont[$i]' ";
			  }
		  }
		  if($otherCon!=''){
			  $sql=$sql.$otherCon;
		  }
		  for($i=0;$i<count($orderArr);$i++){
			  if($i==0){
				  if(isset($orderArr[0])){
					  $sql=$sql."order by $orderArr[$i] desc";
				  }
			  }else{
				  $sql=$sql." ,$orderArr[$i] desc";
			  }
		  }
		  //return $sql;
		  
		  //开始返回获知的数组
		  $result=mysql_query($sql);
		  $r_num = mysql_num_rows($result); 
		  if($r_num>0){
			  $arr=mysql_fetch_array($result);
			  for( $k=0 ; $k<$num; $k++ ) {
				  $info[$columns[$k]]=$arr[$k];
			  }
			  return $info;
		  }else{
			  return 'error';
		  }
	  }
	  
	  function delete($tableName,$conArr,$conArrCont){
		  $sql="delete from $tableName where";
		  for($i=0;$i<count($conArr);$i++){
			  if($i==0){
				  $sql=$sql." $conArr[$i]='$conArrCont[$i]' ";
			  }else{
				  $sql=$sql."and $conArr[$i]='$conArrCont[$i]' ";
			  }
		  }
		  $result=mysql_query($sql);
		  return $result;
	  }
	  
	  
	  function update($tableName,$setArr,$setArrCont,$conArr,$conArrCont){
		  $sql="update $tableName set";
		  for($i=0;$i<count($setArr);$i++){
			  if($i==0){
				  $sql=$sql." $setArr[$i]='$setArrCont[$i]' ";
			  }else{
				  $sql=$sql.",$setArr[$i]='$setArrCont[$i]' ";
			  }
		  }
		  $sql=$sql."where $conArr='$conArrCont' ";
		  $result=mysql_query($sql);
		  return $result;
	  }
  }
  
?>