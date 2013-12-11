<?php
  include_once('../../globalpath.php');
  include $common_path.'SqlQuery.php';
  ini_set('max_execution_time', '100000');
  
  $sql="select * from car_type where level=1";
  $resql=mysql_query($sql);
  for($mm=0;($faArr=mysql_fetch_array($resql));$mm++){
	  
  $sql="select * from car_type where level=2 and father='$faArr[car_id]'";
  $result=mysql_query($sql);
  for($i=0;($arr=mysql_fetch_array($result));$i++){      
	  
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
	  
	
	  $pa="{var config(.*)var option}";
	  preg_match_all($pa,$doc,$r); 
	  //print_r($r);  
	  //echo $r[1][0];
	  //print_r($doc);  
	  $jsonfile=$faArr['car_id'].'/'.$arr['car_id']."carConfig.json";
	  createDir($faArr['car_id']);
	  $fh = fopen($jsonfile, 'w')
		  or die("Error opening output file");
	  fwrite($fh, str_replace(';',']',str_replace('=','[',iconv('gb2312','utf-8',$r[1][0]))));
	  fclose($fh);
	  echo $i.' '.$url.' '.$jsonfile.'<br>';
  }
  }
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
function createDir($aimUrl) {  //创建文件夹
       $aimDir='';
       $arr = explode('/', $aimUrl);
       foreach ($arr as $str) {
         $aimDir .= $str . '/';
         if (!file_exists($aimDir)) {
            mkdir($aimDir);
         }
       }
   }
?>