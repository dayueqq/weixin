<?php
  include_once('../../globalpath.php');
  include '../../../../common/SqlQuery.php';
  //include $common_path.'SqlQuery.php';
  
  $sqlQuery=new SqlQuery();
  
  $arr=$_POST['arr'];
  
  $sqlQuery->insertMore('allcar_info',$arr);