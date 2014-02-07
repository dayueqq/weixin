<?php
  include_once('../globalpath.php');
  include $common_path.'SqlQuery.php';
  //include '../../../common/SqlQuery.php';
  /*try{
	 $pdo=new PDO("mysql:host=localhost;dbname=weixin","root","");
  }catch(PDOException $e){
	 echo $e->getMessage();
  }
  $stmt=$pdo->prepare("select * from dealer_info");
  $stmt->execute();
  
  $row=$stmt->fetch();
  print_r($row);
  */
  $smarty->display($html_path.'newAcc.html');
  mysql_close();
?>