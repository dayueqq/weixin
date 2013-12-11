<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include_once('../globalpath.php');
  //include '../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  $sqlQuery=new SqlQuery();
  
  $action=$_GET['action'];  //操作指令
  
  if($action=='upSign'){   //添加活动报名   #####################
      $tableName='user_info';
	  
	  $arr=array(uniqid(),$_GET['comId'],date('Y-m-d'),$_POST['name'],$_POST['custom'],$_POST['carModel'],$_POST['brand'],$_POST['carSerName'],$_POST['carIdName'],$_POST['actName'],$_POST['willBuyTime']);
	  $result=$sqlQuery->insert($tableName,$arr);
	  if($result){
		  echo "<script>alert('恭喜您报名成功!');location.href='activityList.php';</script>";
	  }else{
		  echo "<script>alert('对不住，服务器响应超时，请重新报名!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addShopCar'){   //添加购车报名   #####################
      $tableName='user_info';
	  
	  $arr=array(uniqid(),$_POST['comId'],date('Y-m-d'),$_POST['name'],$_POST['custom'],$_POST['carNameId'],$_POST['carBrand'],$_POST['carSeries'],$_POST['carName'],'',$_POST['willBuyTime']);
	  $result=$sqlQuery->insert($tableName,$arr);
	  if($result){
		  echo "<script>alert('恭喜您报名成功!');location.href='./carOnSellList.php';</script>";
	  }else{
		  echo "<script>alert('对不住，服务器响应超时，请重新报名!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addDriCar'){   //添加试驾报名   #####################
      $tableName='user_drive_info';
	  
	  $arr=array(uniqid(),$_POST['comId'],date('Y-m-d'),$_POST['name'],'',$_POST['custom'],$_POST['carModel'],$_POST['carBrand'],$_POST['carSerName'],$_POST['carModName'],$_POST['bookTime']);
	  $result=$sqlQuery->insert($tableName,$arr);
	  if($result){
		  echo "<script>alert('恭喜您报名成功!');location.href='./homepage.php';</script>";
	  }else{
		  echo "<script>alert('对不住，服务器响应超时，请重新报名!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addService'){   //添加服务报名   #####################
      $tableName='user_service';
	  
	  $arr=array(uniqid(),$_POST['comId'],date('Y-m-d'),$_POST['carNumber'],$_POST['name'],$_POST['custom'],$_POST['bookTime'],$_POST['time'],$_POST['service'],'0');
	  $result=$sqlQuery->insert($tableName,$arr);
	  if($result){
		  echo "<script>alert('恭喜您预约成功!');location.href='homepage.php';</script>";
	  }else{
		  echo "<script>alert('对不住，服务器响应超时，请重新预约!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addMessage'){   //添加留言信息   #####################
      $tableName='user_message';
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/message/'.$_COOKIE['comId'].'/message.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($_POST['detail']){
		  $arr=array(uniqid(),$_COOKIE['comId'],date('Y-m-d'),$_POST['name'],$_POST['phone'],$_POST['detail']);
		  $result=$sqlQuery->insert($tableName,$arr);print_r($arr);
		  if($result){
			  echo "<script>alert('恭喜您留言成功!');location.href='message.php';</script>";
		  }else{
			  echo "<script>alert('对不住，服务器响应超时，请重新留言!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }
	  }
	  //end
  }
  
  mysql_close();
  
  function f_post($f_upfiles){            //获得图片的格式
	 $tmp_upfiles=explode('.',$f_upfiles);  // 因为文件一般为 xx\music.flv ,所以以 点号 做分割
	 $tmp_num=count($tmp_upfiles);
	 $format=$tmp_upfiles[$tmp_num-1];
	 return $format;
  }
?>