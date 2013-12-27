<?php /* Smarty version Smarty-3.0.6, created on 2013-12-25 14:04:59
         compiled from "./activityList.html" */ ?>
<?php /*%%SmartyHeaderCode:187052bae60b4af2b0-03324303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3f514bdbb180e9e016a1bb9437dd1e261fa6bb' => 
    array (
      0 => './activityList.html',
      1 => 1387980296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187052bae60b4af2b0-03324303',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="title" content="微信微店">
<meta name="apple-touch-fullscreen" content="YES">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<title><?php echo $_smarty_tpl->getVariable('comName')->value;?>
</title>
<script type="text/javascript" src="../../res/js/activityList.js"></script>
<script type="text/javascript" src="../../res/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('dataJson')->value;?>
"></script>
<link rel="stylesheet" href="../../res/css/activityList.css">
<script type="text/javascript">
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
	 
	 window.onload=function(){
		 var str='';
		 for(var i=0;i<dataJson.length;i++){
			 str+="<li><a href='actSignup.php?actId="+dataJson[i].act_id+"' class='actLink'><div class='act'>"+
    	              "<p class='title'>"+dataJson[i].act_name+"</p><div class='dot-line'></div>";
					  if(dataJson[i].startTime==dataJson[i].endTime){
                          str+="<p class='time'>"+dataJson[i].startTime+"</p>";
					  }else{
						  str+="<p class='time'>"+dataJson[i].startTime+" 至 "+dataJson[i].endTime+"</p>";
					  }
                      str+="<img class='actPic' src='"+dataJson[i].path+"'></div></a></li>";
		 }
		 $('#actList').html(str);
		hashH = document.documentElement.scrollHeight; 
		urlC = "http://gd.qq.com/zt2013/addga/index.htm"; 
		document.getElementById("iframeC").src=urlC+"#"+hashH; 

		
	 }
</script>
</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center;">
		<p style="color:#fff; position:relative;">优惠活动列表</p>
        <a href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-homepage.html" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>	
    </div>
    <div style="width:100%; height:47px;"></div>
	<ul id="actList">
    
   </ul>
   	<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
    
<iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe>    
</body>
</html>
