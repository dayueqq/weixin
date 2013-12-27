<?php /* Smarty version Smarty-3.0.6, created on 2013-12-20 10:14:45
         compiled from "./carOnSell.html" */ ?>
<?php /*%%SmartyHeaderCode:1279852b41895e06dc7-78039640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c67c503275459145ac203ea6cfd54bf652dffaf6' => 
    array (
      0 => './carOnSell.html',
      1 => 1386236532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1279852b41895e06dc7-78039640',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="title" content="微信微店">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no;"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<script type="text/javascript" src="../../res/js/jquery-1.8.2.min.js"></script>
<link rel="stylesheet" href="../../res/css/mqq_reset_sell.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../res/css/3gqq_index_sell.css" />
<title><?php echo $_smarty_tpl->getVariable('comName')->value;?>
</title>
<link rel="stylesheet" href="../../res/css/carOnSell.css">
<script src="../../res/js/carOnSell.js" type="text/javascript"></script>
<script language="javascript">
   function upForm(){
	   var name = document.getElementById("name").value;
	   var phone = document.getElementById("custom").value;
	   if(name==''){
		 alert("请填写姓名");
		 return false;
	   }
	   if(phone==''){
		 alert("请填写电话");
		 return false;
	   }
	   $('#theForm').submit();
   }
</script>
<script type="text/javascript">
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
</script>
  <script type="text/javascript"> 
  function sethash(){
    hashH = document.documentElement.scrollHeight; 
    urlC = "http://gd.qq.com/zt2013/addga/index.htm";
    document.getElementById("iframeC").src=urlC+"#"+hashH; 

   }
  window.onload=sethash;
</script>
</head>

<body class="loading">
    <div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center; z-index:777;">
		<p style="color:#fff; position:relative; font-size:16px; line-height:47px;"><?php echo $_smarty_tpl->getVariable('carInfo')->value['series'];?>
</p>
         <a href="carOnSellList.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>
        <a href="homepage.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:85%; margin-top:8px;"><img src="../../res/img/home.png" width="33" height="33"/></a>		
    </div>
    <div style="width:100%; height:47px;"></div>
<div class="main">
	<div class="carName">
    	<p><?php echo $_smarty_tpl->getVariable('carInfo')->value['model'];?>
</p>
    </div>
    
    <!--focus picture begin-->
	<div class="pro-switch">
		<div class="slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<div class="img"><img src="../../../<?php echo $_smarty_tpl->getVariable('info')->value['pic1'];?>
" height="205" alt="" /></div>
					</li>
					<li>
						<div class="img"><img src="../../../<?php echo $_smarty_tpl->getVariable('info')->value['pic2'];?>
"  height="205" alt="" /></div>
					</li>
					<li>
						<div class="img"><img src="../../../<?php echo $_smarty_tpl->getVariable('info')->value['pic3'];?>
" height="205" alt="" /></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!--focus picture end-->
    <div class="mengban">
    	<p class="mengbanT">微信报名价</p>
        <p class="mengbanP"><?php echo $_smarty_tpl->getVariable('carInfo')->value['price']-$_smarty_tpl->getVariable('carInfo')->value['discount'];?>
万</p>
        <a class="checkDetail" href="<?php echo $_smarty_tpl->getVariable('info')->value['configUrl'];?>
">查看配置</a>
     </div>
     <div class="phone">
     	<img class="phone-pic" src="../../res/img/phone-icon.png">
        <a href="tel:<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
" class="phone-num">询问客服：<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
</a>
     </div>
    <div class="signup">
    	<p class="ensure">请填写有效的联系方式，我们承诺保密</p>
        <div class="dot-line">
        </div>
        <form class="signup-form" id="theForm" action="operation.php?action=addShopCar" enctype="multipart/form-data" method="post">
        <input type="hidden" name="carBrand" value="<?php echo $_smarty_tpl->getVariable('info')->value['brand'];?>
">
        <input type="hidden" name="carSeries" value="<?php echo $_smarty_tpl->getVariable('info')->value['series'];?>
">
        <input type="hidden" name="carName" value="<?php echo $_smarty_tpl->getVariable('info')->value['model'];?>
">
        <input type="hidden" name="carNameId" value="<?php echo $_smarty_tpl->getVariable('info')->value['car_id'];?>
">
        <input type="hidden" name="comId" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
">
        <input name="name" class="name" id="name" placeholder="请输入您的姓名 如：陈先生" onFocus="changeOutline0()"  ><br />
        <input name="custom" class="custom" id="custom" placeholder="请输入您的联系方式" onFocus="changeOutline1()" > <br /> 		 <select name="willBuyTime" class="willBuyTime" id="willBuyTime" onFocus="changeOutline3()">
        	<option selected="1">预计购车时间</option>
            <option value="一星期内">一星期内</option>
            <option value="一个月内">一个月内</option>
            <option value="三个月内">三个月内</option>
            <option value="六个月内">六个月内</option>
            <option value="一年之内">一年之内</option>
        </select>
        </form>
        <a href="javascript:void(0)" onclick="upForm()" class="submit">立即报名获得微价</a>
    </div>
    
</div>
<!--main div end-->
 	<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
 <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe> 
<script defer src="../../res/js/slider.js"></script> 
<script type="text/javascript">
    $(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

</body>
</html>
