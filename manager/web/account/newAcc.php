<?php
  include_once('../globalpath.php');
  include $common_path.'SqlQuery.php';
  date_default_timezone_set("PRC"); 
  $getUrl=$_GET['date'];
  if($getUrl!=date('m-d')){  // 示例  http://localhost/weixin/manager/web/account/newAcc.php?date=01-23
	  echo "<script>alert('这是雷区，别乱进')</script>";
	  echo "<script>window.location.href='http://88auto.com.cn/weixin/user/web/user/1-homepage.html'</script>";
  }
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