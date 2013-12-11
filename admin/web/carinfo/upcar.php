<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  
  $time=uniqid();
  $active=$_POST['active'];
  $dealer=$_POST['dealer'];
  $dealername=$_POST['dealername'];
  $brand=$_POST['brand'];
  $file=$_POST['pic'];
  $design=$_POST['design'];
  $type=$_POST['type'];
  $price=$_POST['price'];
  $discount=$_POST['discount'];
  $amount=$_POST['amount'];
  
  $sql="select * from dealer where dealer_id='$dealer'";
  $result=mysql_query($sql);
  $arr=mysql_fetch_array($result);
  $gift[0]=$arr['gift1'];
  $gift[1]=$arr['gift2'];
  $gift[2]=$arr['gift3'];
  
  $format=f_postimg($_FILES[pic][name]);          
  $imgfile="../../../carplatform/image/".date('md');
  createDir($imgfile);        //创建图片文件夹
  $picpath=$imgfile.'/'.$time.'.'.$format;
  move_uploaded_file($_FILES[pic][tmp_name], $picpath);
  
  $sql="insert into car_info values('$time','$active','$dealer','$dealername','$brand','$picpath','$design','$type','$price','$discount','$amount','0','$gift[0]','$gift[1]','$gift[2]')";
  
  $result=mysql_query($sql);
  if($result){
	  echo "<script>alert('汽车信息添加成功!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }else{
	  echo "<script>alert('汽车信息添加失败!');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  }
  mysql_close();
  
   function createDir($aimUrl) {  //创建文件夹
       $aimDir = '';
       $arr = explode('/', $aimUrl);
       foreach ($arr as $str) {
         $aimDir .= $str . '/';
         if (!file_exists($aimDir)) {
            mkdir($aimDir);
         }
       }
   }
   
   function f_postimg($f_upfiles){            //获得图片的格式
	   $tmp_upfiles=explode('.',$f_upfiles);  // 因为文件一般为 xx\music.flv ,所以以 点号 做分割
	   $tmp_num=count($tmp_upfiles);
	   $format=$tmp_upfiles[$tmp_num-1];
	   return $format;
   }

?>
