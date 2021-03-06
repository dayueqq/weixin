<?php /* Smarty version Smarty-3.0.6, created on 2014-02-21 09:19:44
         compiled from "./replace.html" */ ?>
<?php /*%%SmartyHeaderCode:3195653071a30644d12-84193697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a6c81fe1992fdd12048c626fc4941b513ece793' => 
    array (
      0 => './replace.html',
      1 => 1392974378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3195653071a30644d12-84193697',
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
<title><?php echo $_smarty_tpl->getVariable('comInfo')->value['company_name'];?>
</title>
<link rel="stylesheet" href="../../res/css/replace.css">
<link href="../../res/css/mobiscroll.scroller.css" rel="stylesheet" type="text/css" />
<link href="../../res/css/mobiscroll.scroller.ios7.css" rel="stylesheet" type="text/css" />
<link href="../../res/css/line/line.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center;z-index:999;">
		<p style="color:#fff; position:relative;">二手车置换</p>
        <a href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-homepage.html" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>
    </div>
    <div style="width:100%; height:47px;"></div>
	<div class="carName">
    	<p>建设中</p>
    </div>
    <div class="rules">
    	<p class="title">建设完善中</p>
        <div class="dot-line">
        </div>
        <div class="describe" id="deMain">   
        独立寒秋，湘江北去，橘子洲头；看万山红遍，层林尽染，漫江碧透，百舸争流；鹰击长空，鱼翔浅底，万类霜天竞自由；问苍茫大地：谁主沉浮？
 
        携来百侣曾游， 忆往昔，峥嵘岁月稠。 恰同学少年，风华正茂；书生意气，挥斥方遒。指点江山，激扬文字，粪土当年万户侯。曾记否，到中流击水，浪遏飞舟？  
        </div>
    </div>
    <div class="phone">
    	<img class="phone-pic" src="../../res/img/phone-icon.png">
        <a href="tel:<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
" class="phone-num">询问客服：<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
</a>
    </div>
    
    <div class="signup">
    	<p class="ensure">请填写详细置换信息，我们承诺保密</p>
        <div class="dot-line">
        </div>
        <form class="signup-form" id="theForm" action="operation.php?action=upReplace&comId=<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
" method="post" enctype="multipart/form-data">
        	<input name="carBrand" class="carBrand" id="carBrand" placeholder="车型品牌" onFocus="changeOutline0()"  ><br />
            <input name="carModel" class="carType" id="carModel" placeholder="型号" onFocus="changeOutline0()"  ><br />
            <div>
            	<p>变速箱：</p>
            	<input type="radio" class="BStype" name="iCheck" value="自动" checked>
				<label>自动</label>
                <div class="holder"></div>
                <input type="radio" class="BStype" value="手动" name="iCheck">
				<label>手动</label>
                <div class="holder"></div>
                <input type="radio" class="BStype" value="手自一体" name="iCheck">
				<label>手自一体</label>
                <div class="holder"></div>
            </div>
        	<input name="carType" class="carType" id="carType" placeholder="版本" onFocus="changeOutline0()"  ><br />
        	<input name="carDisplacement" class="carDisplacement" id="carDisplacement" placeholder="排量" onFocus="changeOutline1()" > <br />
            <input name="carMiles" class="carMiles" id="carMiles" placeholder="公里数" onFocus="changeOutline0()"  ><br />
            <input id="time" class="time" name="time" placeholder="购车时间"><br />
            <input name="name" class="name" id="name" placeholder="请输入您的姓名 如：陈先生" onFocus="changeOutline0()"  ><br />
        	<input name="custom" class="custom" id="custom" placeholder="请输入您的联系方式" onFocus="changeOutline1()" > <br />
        	<input type="hidden" name="comId" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
">
        </form>
        <a href="javascript:void(0)" class="submit" onClick="upForm();">立即提交</a>
    </div>
	<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
     <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe> 
<!--页面JS-->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../../res/js/mobiscroll.custom-2.6.2.min.js"></script>
<script type="text/javascript" src="../../res/js/mobiscroll.scroller.ios7.js"></script>
<script type="text/javascript" src="../../res/js/icheck.min.js"></script>
<script type="text/javascript" src="../../res/js/service.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  //for date picker
  $(function(){
    $('#time').mobiscroll().date({
        theme: 'ios7',
        lang: 'zh',
        display: 'bottom',
        mode: 'scroller',
    });    
    $('#show').click(function(){
        $('#time').mobiscroll('show'); 
        return false;
    });
    $('#clear').click(function () {
        $('#time').val('');
        return false;
    });
  });
  //for radio redesign
    $('input').each(function(){
    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line',
      radioClass: 'iradio_line',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });
});
</script>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
function upForm(){
	//alert("test");
	var carBrand = document.getElementById("carBrand").value;
	var carModel = document.getElementById("carModel").value;
	//var BStype = $('input[name="iCheck"]:checked').val();
	var carDisplacement = document.getElementById("carDisplacement").value;
	var carType = document.getElementById("carType").value;
	var carMiles = document.getElementById("carMiles").value;
	var buyTime = document.getElementById("time").value;
	var name = document.getElementById("name").value;
	var phone = document.getElementById("custom").value;
	if(carBrand==''){
		alert("请填写品牌");
		return false;
	}
	if(carModel==''){
		alert("请填写型号");
		return false;
	}
	if(carType==''){
		alert("请填写版本");
		return false;
	}
	if(carDisplacement==''){
		alert("请填写排量");
		return false;
	}
	if(carMiles==''){
		alert("请填写公里数");
		return false;
	}
	if(buyTime==''){
		alert("请选择购车时间");
		return false;
	}
	if(name==''){
		alert("请填写姓名");
		return false;
	}
	if(phone==''){
		alert("请填写联系方式");
		return false;
	}
	//$('#carSerName').val($('#carSeries option:selected').text());
	//$('#carIdName').val($('#carModel option:selected').text());
	//$('input[name="iCheck"]:checked').val()
	$('#theForm').submit();
}
</script>
</body>
</html>
