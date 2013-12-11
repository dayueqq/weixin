<?php
  include_once('../globalpath.php');
  include $common_path.'comm.php';
  require_once $common_path.'util/page.class.php';
  
  $gPageSize=17;   //得到每页最大显示数目
  
  $sql="select * from car_info";
  $result=mysql_query($sql);
  $b_num=mysql_num_rows($result);
		  
  $fpage=new Page($b_num,$gPageSize, "");  //调用  page.class.php 中的 page 函数  ！！！！！！！！
  mysql_data_seek($result,$fpage->limit);
  for($i=0;$i<$gPageSize&&($arr=mysql_fetch_array($result));$i++){                           
	  $info[$i]['carid']=$arr['car_id'];       // 获得 id     
	  $info[$i]['active']=$arr['active'];                    
	  $info[$i]['dealerid']=$arr['dealer_id'];               
	  $info[$i]['dealername']=$arr['dealer_name'];                      
	  $info[$i]['brand']=$arr['brand'];
	  $info[$i]['carpic']=$arr['car_pic'];   
	  $info[$i]['design']=$arr['car_design'];     
	  $info[$i]['type']=$arr['car_type']; 
	  $info[$i]['price']=$arr['price'];                      
	  $info[$i]['discount']=$arr['discount'];
	  $info[$i]['amount']=$arr['amount']; 
	  $info[$i]['booked']=$arr['booked'];
	  $info[$i]['gift1']=$arr['gift1'];     
	  $info[$i]['gift2']=$arr['gift2'];   
	  $info[$i]['gift3']=$arr['gift3'];   
  }
  $smarty->assign('info',$info);
  $pageshow=$fpage->fpage(array(8,3,4,5,6,7,2));
	           //用于安排显示的顺序，因为page.class.php设置时为8个参数，使用的时候可以随便选择0——8 中的任意一个或多个数，见 1小时23分
  $smarty->assign('pageshow',$pageshow);  
  $smarty->display($html_path.'carinfo.html');
  mysql_close();
?>