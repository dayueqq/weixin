<?php
  include $common_path.'comm.php';
  
  class SqlQuery{
	  function insert($tableName,$arr){
		  $sql="insert into $tableName values(";
		  for($i=0;$i<(count($arr)-1);$i++){
			  $sql=$sql."'$arr[$i]',";
		  }
		  $sql=$sql."'$arr[$i]')";
		  $result=mysql_query($sql);
		  return $result;
	  }
	  
	  
	  function select($tableName,$conArr,$conArrCont,$orderArr){
		  $sql="select * from $tableName ";
		  for($i=0;$i<count($conArr);$i++){
			  if($i==0){
				  $sql=$sql."where $conArr[$i]='$conArrCont[$i]' ";
			  }else{
				  $sql=$sql."and $conArr[$i]='$conArrCont[$i]' ";
			  }
		  }
		  for($i=0;$i<count($orderArr);$i++){
			  if($i==0){
				  $sql=$sql."order by $orderArr[$i] ";
			  }else{
				  $sql=$sql." ,$orderArr[$i]";
			  }
		  }
	  }
	  
	  function delete($tableName,$conArr,$conArrCont){
		  $sql="delete $tableName where";
		  for($i=0;$i<count($conArr);$i++){
			  if($i==0){
				  $sql=$sql." $conArr[$i]='$conArrCont[$i]' ";
			  }else{
				  $sql=$sql."and $conArr[$i]='$conArrCont[$i]' ";
			  }
		  }
		  $result=mysql_query($sql);
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
	  }
	  
  }
  
?>