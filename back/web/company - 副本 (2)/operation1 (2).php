<?php
  include_once('../globalpath.php');
  //include '../../../common/SqlQuery.php';
  include $common_path.'SqlQuery.php';
  $sqlQuery=new SqlQuery();
  
  $action=$_GET['action'];  //操作指令
  
  if($action=='upComInfo'){   //更改公司信息   #####################
      $tableName='company_info';
	  
	  if($_FILES["uploadPic"]["size"]>0){  // 检查是否有上传图片
		  $file_name = $_FILES["uploadPic"]["name"];
		  $filepath = uniqid().'.'.f_post($file_name) ;
		  $path='../../image/company/'.$filepath;
		  $docpath='./file/'.$filepath;
		  if (!move_uploaded_file($_FILES["uploadPic"]["tmp_name"],$path )) {
			  echo "<script>alert('文件无法保存!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			  exit(0);
		  }else{
			  $setArr=array('company_name','company_info','pic','phone');
	          $setArrCont=array($_POST['actName'],$_POST['actDescribe'],$path,$_POST['customPhone']);
		  }
	  }else{
		  $setArr=array('company_name','company_info','phone');
	      $setArrCont=array($_POST['actName'],$_POST['actDescribe'],$_POST['customPhone']);
	  }
      
	  $conArr='company_id';
	  $conArrCont=$_COOKIE['companyId'];
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	  if($result){
		  echo "<script>alert('信息修改成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('信息修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='checkseries'){   //改变汽车下拉菜单，获取汽车车系  #####################
	  $tableName='car_type';
      $conArr=array('level','father');
      $conArrCont=array('3',$_POST['father']);
      $info=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','-1');
	  echo json_encode($info);
	  
	  //end
  }else if($action=='addCar'){   //添加在售汽车  #####################
	  $tableName='car_sell';
	  //先验证是否有相同车型的存在
	  $conArr=array('car_id','company_id');
      $conArrCont=array($_POST['carModel'],$_COOKIE['companyId']);
      $result=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
      
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/car/'.$_COOKIE['companyId'].'car.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  //如果没有存在，则添加
	  if($result=='error'){
		  $arr=array(uniqid(),$_POST['carModel'],$_COOKIE['companyId'],$_COOKIE['carBrand'],$_POST['carSerName'],$_POST['carIdName'],$_POST['guidePrice'],$_POST['carActPrice'],$_POST['picVal']);
		  $result=$sqlQuery->insert($tableName,$arr);
		  if($result){
			  echo "<script>alert('在售汽车添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }else{
			  echo $result;
			  echo "<script>alert('在售汽车添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }
	  }else{
		  echo "<script>alert('此车型已经添加!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }

	  //end
  }else if($action=='addUpCar'){   //修改在售汽车信息  #####################
	  $tableName='car_sell';
	  //先验证是否有相同车型的存在
	  $setArr=array('car_id','series','model','discount','pic');
	  $setArrCont=array($_POST['carModel'],$_POST['carSerName'],$_POST['carIdName'],$_POST['carActPrice'],$_POST['picVal']);
	  $conArr='onsell_id';
      $conArrCont=$_GET['onId'];
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/car/'.$_COOKIE['companyId'].'car.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('在售汽车信息修改成功!');location.href='carOnSell.php';</script>";
	  }else{
		  echo "<script>alert('在售汽车信息修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='delCarOnSell'){   //删除在售汽车  #####################
	  $tableName='car_sell';
	  //先验证是否有相同车型的存在
	  $conArr=array('onsell_id');
      $conArrCont=array($_GET['onId']);
      $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/car/'.$_COOKIE['companyId'].'car.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  //如果没有存在，则添加
	  if($result){
		  echo "<script>alert('在售汽车删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('在售汽车删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	 
	  //end
  }else if($action=='addAct'){   //添加优惠活动  #####################
	  $tableName='car_active';

      if($_FILES["uploadPic"]["size"]>0){
		  $file_name = $_FILES["uploadPic"]["name"];
		  $filepath = 'image/'.$_COOKIE['companyId'].'/act/';
		  $path='../../../common/'.$filepath;
		  createDir($path);
		  $filename=mktime().'.'.f_post($file_name) ;
		  $filepath.=$filename;
		  $path.=$filename;
		  
		  $docpath=$path;
		  if (!move_uploaded_file($_FILES["uploadPic"]["tmp_name"],$path )) {
			  echo "<script>alert('文件无法保存!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			  exit(0);
		  }
	  }else{
		  $docpath='';
	  }
	  
	  $unid=uniqid();
	  $arr=array($unid,$_COOKIE['companyId'],$_POST['actName'],$docpath,$_POST['actDescribe'],$_POST['startDate'],$_POST['endDate']);
	  $result=$sqlQuery->insert($tableName,$arr);
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/active/'.$_COOKIE['companyId'].'active.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  //删除活动车型
	  $tempfile='../temp/active/'.$_COOKIE['companyId'].'/';
	  $jsonfile=$tempfile.$unid.'actcar.json';
	  if(file_exists($jsonfile)){ //判断是否存在文件
		  unlink($jsonfile);
	  }
	  createDir($tempfile);
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, str_replace("\'","'",$_POST['tempSer']).str_replace("\'","'",$_POST['tempMod'])); 
	  fclose($fh);
	  
	  if($result){
		  echo "<script>alert('优惠活动添加成功!');location.href='Activity.php';</script>";
	  }else{
		  echo $result;
		  echo "<script>alert('优惠活动添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  //end
  }else if($action=='addUpAct'){   //修改优惠活动    #####################
	  $tableName='car_active';
	  
	  if($_FILES["uploadPic"]["size"]>0){
		  $tableName='car_active';
	      $conArr=array('act_id');
		  $conArrCont=array($_GET['actId']);
		  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
		  unlink($info['path']);  //将以前 的图片删除
		  
		  $file_name = $_FILES["uploadPic"]["name"];
		  $filepath = 'image/'.$_COOKIE['companyId'].'/act/';
		  $path='../../../common/'.$filepath;
		  createDir($path);
		  $filename=mktime().'.'.f_post($file_name) ;
		  $filepath.=$filename;
		  $path.=$filename;
		  
		  $docpath=$path;
		  if (!move_uploaded_file($_FILES["uploadPic"]["tmp_name"],$path )) {
			  echo "<script>alert('文件无法保存!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
			  exit(0);
		  }
		  $setArr=array('act_name','path','actDescribe','startTime','endTime');
	      $setArrCont=array($_POST['actName'],$docpath,$_POST['actDescribe'],$_POST['startDate'],$_POST['endDate']);
	  }else{
		  $setArr=array('act_name','actDescribe','startTime','endTime');
	      $setArrCont=array($_POST['actName'],$_POST['actDescribe'],$_POST['startDate'],$_POST['endDate']);
	  }	  
	  $conArr='act_id';
      $conArrCont=$_GET['actId'];
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/active/'.$_COOKIE['companyId'].'active.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  //删除活动车型
	  $tempfile='../temp/active/'.$_COOKIE['companyId'].'/';
	  $jsonfile=$tempfile.$conArrCont.'actcar.json';
	  if(file_exists($jsonfile)){ //判断是否存在文件
		  unlink($jsonfile);
	  }
	  createDir($tempfile);
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, str_replace("\'","'",$_POST['tempSer']).str_replace("\'","'",$_POST['tempMod'])); 
	  fclose($fh);
	  
	  if($result){
		  echo "<script>alert('优惠活动修改成功!');location.href='Activity.php';</script>";
	  }else{
		  echo "<script>alert('优惠活动修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='delAct'){   //删除优惠活动    #####################
	  $tableName='car_active';

	  $conArr=array('act_id');
	  $conArrCont=array($_GET['actId']);
	  $info=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  if(file_exists($info['path'])){   //将以前 的图片删除
		  unlink($info['path']);
	  }
	  
	  $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/active/'.$_COOKIE['companyId'].'active.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  //删除活动车型
	  $tempfile='../temp/active/'.$_COOKIE['companyId'].'/';
	  $jsonfile=$tempfile.$conArrCont[0].'actcar.json';
	  if(file_exists($jsonfile)){ //判断是否存在文件
		  unlink($jsonfile);
	  }
	  
	  if($result){
		  echo "<script>alert('优惠活动删除成功!');location.href='Activity.php';</script>";
	  }else{
		  echo "<script>alert('优惠活动删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  
	  //end
  }else if($action=='search'){
	  $tableName='user_info';
	  $companyId=$_COOKIE['companyId'];
	  $conArr=array_merge(array('company_id'),$_POST['conArr']);
	  $conArrCont=array_merge(array($companyId),$_POST['conArrCont']);
	  $returnArr=$sqlQuery->select($tableName,$conArr,$conArrCont,'','','5');
	  print_r($returnArr);
	  
	  //end
  }else if($action=='addDrive'){   //添加预约试驾汽车  #####################
	  $tableName='car_drive';
	  //先验证是否有相同车型的存在
	  $conArr=array('company_id');
      $conArrCont=array($_COOKIE['companyId']);
      $result=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
      
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/drive/'.$_COOKIE['companyId'].'drive.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  //如果没有存在，则添加
	  if($result=='error'){
		  $arr=array(uniqid(),$_COOKIE['companyId'],$_POST['actDescribe'],'');
		  $result=$sqlQuery->insert($tableName,$arr);
		  if($result){
			  echo "<script>alert('预约试驾活动添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }else{
			  echo "<script>alert('对不起，预约试驾活动添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }
	  }else{
		  echo "<script>alert('对不起，试驾活动已经存在!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addUpDri'){   //修改预约试驾汽车  #####################
	  $tableName='car_drive';
	  //先验证是否有相同车型的存在
	  $setArr=array('actDescribe','pic');
	  $setArrCont=array($_POST['actDescribe'],'');
	 
	  $conArr='drive_id';
      $conArrCont=$_GET['driId'];
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/drive/'.$_COOKIE['companyId'].'drive.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('预约试驾活动修改成功!');location.href='addDrive.php';</script>";
	  }else{
		  echo "<script>alert('对不起，预约试驾活动修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='delDri'){   //删除预约试驾汽车  #####################
	  $tableName='car_drive';

	  $conArr=array('drive_id');
      $conArrCont=array($_GET['driId']);
      $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  
	  //删除缓存
	  $docUnlink=$_SERVER ['DOCUMENT_ROOT'].'/weixin/user/web/temp/drive/'.$_COOKIE['companyId'].'drive.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  //如果没有存在，则添加
	  if($result){
		  echo "<script>alert('预约试驾删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('预约试驾删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='delShopUser'){   //删除购车报名信息    #####################
	  $tableName='user_info';

	  $conArr=array('user_id');
	  $conArrCont=array($_GET['id']);
 
	  $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  $docUnlink='../temp/book/'.$_COOKIE['companyId'].date('H').'bookData.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('购车报名信息删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('购车报名信息删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='delDriUser'){   //删除订车报名信息 book    #####################
	  $tableName='user_drive_info';

	  $conArr=array('user_id');
	  $conArrCont=array($_GET['id']);
 
	  $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  $docUnlink='../temp/drive/'.$_COOKIE['companyId'].date('H').'driData.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('试驾报名信息删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('试驾报名信息删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='deleSer'){   //删除维修服务报名信息  service    #####################
	  $tableName='user_service';

	  $conArr=array('service_id');
	  $conArrCont=array($_GET['id']);
 
	  $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  $docUnlink='../temp/service/'.$_COOKIE['companyId'].date('H').'serData.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('服务报名信息删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('服务报名信息删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
      
	  //end
  }else if($action=='dealSer'){   //维修服务报名信息 标记为已处理  service    #####################
	  $tableName='user_service';

	  $conArr='service_id';
	  $conArrCont=$_GET['id'];
	  $setArr=array('status');
	  $setArrCont=array('1');
	  
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	  
	  $docUnlink='../temp/service/'.$_COOKIE['companyId'].date('H').'serData.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('服务报名信息已标记成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('服务报名信息标记失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='delMess'){   //删除留言  message   #####################
	  $tableName='user_message';

	  $conArr=array('message_id');
	  $conArrCont=array($_GET['id']);
 
	  $result=$sqlQuery->delete($tableName,$conArr,$conArrCont);
	  
	  $docUnlink='../temp/message/'.$_COOKIE['companyId'].'/message.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  $docUnlink=$common_path.'../user/web/temp/message/'.$_COOKIE['companyId'].'/message.json';
	  if(file_exists($docUnlink)){ //判断是否存在文件
		  unlink($docUnlink);
	  }
	  
	  if($result){
		  echo "<script>alert('留言信息删除成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }else{
		  echo "<script>alert('留言信息删除失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
      
	  //end
  }else if($action=='addGroup'){   //添加团购报名  car_group  #####################
	  $tableName='car_group';
	  //先验证是否有相同车型的存在
	  $conArr=array('company_id');
      $conArrCont=array($_COOKIE['companyId']);
      $result=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  
	  //如果没有存在，则添加
	  if($result=='error'){
		  $arr=array(uniqid(),$_COOKIE['companyId'],$_POST['actDescribe'],$_POST['startDate'],$_POST['endDate']);
		  $result=$sqlQuery->insert($tableName,$arr);
		  if($result){
			  echo "<script>alert('团购活动添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }else{
			  echo "<script>alert('对不起，团购活动添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }
	  }else{
		  echo "<script>alert('对不起，团购活动已经存在!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addUpGroup'){   //修改团购报名  car_group   #####################
	  $tableName='car_group';
	  //先验证是否有相同车型的存在
	  $setArr=array('actDescribe','startDate','endDate');
	  $setArrCont=array($_POST['actDescribe'],$_POST['startDate'],$_POST['endDate']);
	 
	  $conArr='company_id';
      $conArrCont=$_COOKIE['companyId'];
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	 
	  if($result){
		  echo "<script>alert('团购活动修改成功!');location.href='addDrive.php';</script>";
	  }else{
		  echo "<script>alert('对不起，团购活动修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addService'){   //添加售后服务 car_service #####################
	  $tableName='car_service';
	  //先验证是否有相同车型的存在
	  $conArr=array('company_id');
      $conArrCont=array($_COOKIE['companyId']);
      $result=$sqlQuery->selectSingle($tableName,$conArr,$conArrCont,'','');
	  
	  //如果没有存在，则添加
	  if($result=='error'){
		  $arr=array(uniqid(),$_COOKIE['companyId'],$_POST['maintain_intro'],$_POST['repair_intro']);
		  $result=$sqlQuery->insert($tableName,$arr);
		  if($result){
			  echo "<script>alert('保养服务添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }else{
			  echo "<script>alert('对不起，保养服务添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
		  }
	  }else{
		  echo "<script>alert('对不起，保养服务已经存在!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	  }
	  
	  //end
  }else if($action=='addUpService'){   //修改售后服务 car_service #####################
	  $tableName='car_service';
	  //先验证是否有相同车型的存在
	  $setArr=array('maintain','fixed');
	  $setArrCont=array($_POST['maintain_intro'],$_POST['repair_intro']);
	 
	  $conArr='company_id';
      $conArrCont=$_COOKIE['companyId'];
	  $result=$sqlQuery->update($tableName,$setArr,$setArrCont,$conArr,$conArrCont);
	 
	  if($result){
		  echo "<script>alert('保养服务修改成功!');location.href='addService.php';</script>";
	  }else{
		  echo "<script>alert('对不起，保养服务修改失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
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
  
  function createDir($aimUrl) {  //创建文件夹
	 $arr = explode('/', $aimUrl);
	 $aimDir='';
	 foreach ($arr as $str) {
	   $aimDir .= $str . '/';
	   if (!file_exists($aimDir)) {
		  mkdir($aimDir);
	   }
	 }
 }
?>