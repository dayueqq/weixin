<?php
  include_once('../../globalpath.php');
  include $common_path.'SqlQuery.php';
  ini_set('max_execution_time', '100');
  
  $arr['car_id']=2902;
	  $url="http://www.autohome.com.cn/".$arr['car_id']."/options.html";
	  //$doc = file_get_contents($url);
	  //$doc=iconv('gbk','utf-8',$doc);
	  
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_HEADER, 0);
	  // 3. 执行并获取HTML文档内容
	  $output = curl_exec($ch);
	  $doc=$output;
	  //$doc=iconv('gbk','utf-8',$output);
	  curl_close($ch);
	
	
	  $doc=strip_tags($doc, '<script>'); 
	  $doc=DeleteHtml($doc);
	  
	
	 
	  //print_r($r);  
	  //echo $r[1][0];
	  print_r($doc);  
	  
  
function DeleteHtml($str){ 
	$str = trim($str); 
	$str = strip_tags($str,""); 
	$str = ereg_replace("\t","",$str); 
	$str = ereg_replace("\r\n","",$str); 
	$str = ereg_replace("\r","",$str); 
	$str = ereg_replace("\n","",$str); 
	$str = ereg_replace(" "," ",$str); 
	return trim($str); 
}
?>