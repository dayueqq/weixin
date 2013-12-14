<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
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
	  //
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/back/web/temp/message/'.$_COOKIE['comId'].'/message.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($_POST['detail']){
		  if($_POST['name']){
			  $name=$_POST['name'];
		  }else{
			  $name='匿名';
		  }
		  $arr=array(uniqid(),$_COOKIE['comId'],date('Y-m-d'),$name,$_POST['phone'],$_POST['detail']);
		  $result=$sqlQuery->insert($tableName,$arr);
		  if($result){
			  echo "<script>alert('恭喜您留言成功!');location.href='message.php';</script>";
		  }else{
			  echo "<script>alert('对不住，服务器响应超时，请重新留言!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }
	  }
	  //end
  }else if($action=='upGro'){   //添加  团购  活动报名   #####################
      $tableName='user_group';
	  
	  $arr=array(uniqid(),$_GET['comId'],date('Y-m-d'),$_POST['name'],$_POST['custom'],$_POST['carModel'],$_POST['brand'],$_POST['carSerName'],$_POST['carIdName'],$_POST['willBuyTime']);
	  $result=$sqlQuery->insert($tableName,$arr);
	  
	  //生成xml 文件
	  $xmlFile='../temp/group/'.$_GET['comId'].'.xml';
	  
	  if(!file_exists($xmlFile)){  //创建  xml 文件
		  $tableName='car_type';
		  $conArr=array('father','level');
		  $conArrCont=array($_COOKIE['carId'],'2');
		  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'',$orderArr,'-1');
	
		  $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		  $xml .= "<article>\n";
	
		  foreach ($returnArr as $data) {
			 $xml .= create_item($data['car_id'], $data['name']);
		  }
	
		  $xml .= "</article>\n";
  
		  $fh = fopen($xmlFile, 'w')
			  or die("Error opening output file");
		  fwrite($fh, $xml);
		  fclose($fh);
	  }
	  //修改xml 文件
	  $doc=new DOMDocument();

	  $doc->load($xmlFile);
	  $books=$doc->getElementsByTagName('item');

	  foreach($books as $book){
		  if($book->getElementsByTagName('name')->item(0)->nodeValue==$_POST['carSerName']){
			  $book->getElementsByTagName('num')->item(0)->nodeValue++;
			  break;
		  }
	  }
	  $doc->save($xmlFile);
	  
	  //
	  if($result){
		  echo "<script>alert('恭喜您报名成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('对不住，服务器响应超时，请重新报名!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
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
  
  //  创建XML单项
  function create_item($car_id, $name){
	  $item = "<item>\n";
	  $item .= "<carid>" . $car_id . "</carid>\n";
	  $item .= "<name>" . $name . "</name>\n";
	  $item .= " <num>0</num>\n";
	  $item .= "</item>\n";
  
	  return $item;
  }
?>