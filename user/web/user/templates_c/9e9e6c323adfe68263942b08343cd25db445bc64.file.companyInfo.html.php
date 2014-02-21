<?php /* Smarty version Smarty-3.0.6, created on 2014-02-21 08:39:27
         compiled from "./companyInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:28206530710bfadbf58-12801649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e9e6c323adfe68263942b08343cd25db445bc64' => 
    array (
      0 => './companyInfo.html',
      1 => 1387984194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28206530710bfadbf58-12801649',
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
<title><?php echo $_smarty_tpl->getVariable('info')->value['company_name'];?>
</title>
<script type="text/javascript" src="../../res/js/companyInfo.js"></script>
<link rel="stylesheet" href="../../res/css/companyInfo.css">
<script defer src="../../res/js/slider.js"></script> 
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?=v2.0&ak=4Uc3alsZytq4DAbRqGCmwvef"></script>

</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center;">
		<p style="color:#fff; position:relative;">经销商介绍</p>
        <a href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-homepage.html" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33"/></a>	
    </div>
    <div style="width:100%; height:47px;"></div>
	 <img class="bannerPic" id="bannerPic" src="" border="0"/>
     <div class="phone">
     	<img class="phone-pic" src="../../res/img/phone-icon.png" width="37" height="37"/>
        <a href="tel:<?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
" class="phone-num">询问客服： <?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
</a>
     </div>
     <div class="company">
     	<p class="company-name">公司简介</p>
        <div class="dot-line">
        </div>
        <div class="describe">
		<?php echo $_smarty_tpl->getVariable('info')->value['company_info'];?>

        </div>
        <div class="companyMap" id="companyMap">
        
        </div>
<script type="text/javascript">
// 百度地图API功能
var map = new BMap.Map("companyMap");            // 创建Map实例
map.centerAndZoom(new BMap.Point('<?php echo $_smarty_tpl->getVariable('info')->value['mapNor'];?>
','<?php echo $_smarty_tpl->getVariable('info')->value['mapWes'];?>
'), 20);  //初始化时，即可设置中心点和地图缩放级别。
 //修改父级页面
	
</script>
     </div>
	<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
  
    <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe> 
<script language="javascript">
     window.onload=function(){
	   var pic='<?php echo $_smarty_tpl->getVariable('info')->value['pic'];?>
';
	   $('#bannerPic').attr('src',pic.replace('../../','../../../back/'));
	   hashH = document.documentElement.scrollHeight; 
	   urlC = "http://gd.qq.com/zt2013/addga/index.htm"; 
	   document.getElementById("iframeC").src=urlC+"#"+hashH; 
       }
 	  
	 document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
</script>
</body>
</html>
