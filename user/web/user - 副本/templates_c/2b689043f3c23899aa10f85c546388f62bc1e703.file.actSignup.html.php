<?php /* Smarty version Smarty-3.0.6, created on 2013-12-19 16:00:21
         compiled from "./actSignup.html" */ ?>
<?php /*%%SmartyHeaderCode:3149252b3181538d6a5-28936381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b689043f3c23899aa10f85c546388f62bc1e703' => 
    array (
      0 => './actSignup.html',
      1 => 1386236585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3149252b3181538d6a5-28936381',
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
<script type="text/javascript" src="../../res/js/actSignup.js"></script>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('jsonfile')->value;?>
"></script>
<script src="../../../common/temp/brand.json"></script>
<link rel="stylesheet" href="../../res/css/actSignup.css">
<script language="javascript">
 window.onload=function(){
	 //修改父节点iframe高度
	hashH = document.documentElement.scrollHeight; 
	urlC = "http://gd.qq.com/zt2013/addga/index.htm"; 
	document.getElementById("iframeC").src=urlC+"#"+hashH; 
	 //更改任务栏
	var str='<option>请选择车系</option>';
	var res=seriesMin.split(',');

	for(var i=0;i<res.length;i=i+2){
		 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
    }
	$('#carSeries').html(str);
	
	//改变选项栏
    $('#carSeries').change(function(){
		var faval=parseInt($('#carSeries').val());
		var str='<option>请选择车型</option>';
		if(faval){
			var res=mod[faval].split(',');
			for(var i=0;i<res.length;i=i+2){
				 str+="<option value='"+res[i]+"'>"+res[i+1]+"</option>" ;
			}
		}
		$('#carModel').html(str);
    });
	
	
	 
 }

 function upForm(){
	 var name = document.getElementById("name").value;
	 var phone = document.getElementById("custom").value;
	 var carSeries = document.getElementById("carSeries").value;
	 var carModel = document.getElementById("carModel").value;
	 if(name==''){
		alert("请填写姓名");
		return false;
	 }
	 if(phone==''){
		alert("请填写电话");
		return false;
	 }
	 if(carSeries=='请选择车系'){
		alert("请选择车系");
		return false;
	 }
	 if(carModel=='请选择车型'){
		alert("请选择车型");
		return false;
	 }
	 $('#carSerName').val($('#carSeries option:selected').text());
	 $('#carIdName').val($('#carModel option:selected').text());
	 $('#theForm').submit();
 }
</script>
<script type="text/javascript">
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
</script>
</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center; z-index:77;">
		<p style="color:#fff; position:relative;">活动报名</p>
        <a href="activityList.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>
        <a href="homepage.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:85%; margin-top:8px;"><img src="../../res/img/home.png" width="33" height="33"/></a>		
    </div>
    <div style="width:100%; height:47px;"></div>
	<div class="actImg" style="position:relative;">
    	<img src="<?php echo $_smarty_tpl->getVariable('info')->value['path'];?>
">
        <div class="mengban">
           <p class="actName"><?php echo $_smarty_tpl->getVariable('info')->value['act_name'];?>
</p>
           <p class="actTime">
              活动时间：<?php if ($_smarty_tpl->getVariable('info')->value['startTime']==$_smarty_tpl->getVariable('info')->value['endTime']){?>
                            <?php echo $_smarty_tpl->getVariable('info')->value['startTime'];?>

                      <?php }else{ ?>
                            <?php echo $_smarty_tpl->getVariable('info')->value['startTime'];?>
 至 <?php echo $_smarty_tpl->getVariable('info')->value['endTime'];?>

                      <?php }?>
           </p>
        </div> 
    </div>
    <div class="rules">
    	<p class="title">活动介绍</p>
        <div class="dot-line">
        </div>
        <div class="describe">
        <?php echo $_smarty_tpl->getVariable('info')->value['actDescribe'];?>

        </div>
    </div>
 
 	<div class="phone">
     	<img class="phone-pic" src="../../res/img/phone-icon.png" width="37" height="37"/>
        <a href="tel:<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
" class="phone-num">询问客服： <?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
</a>
     </div>
    
    <div class="signup">
    	<p class="ensure">请填写有效的联系方式，我们承诺保密</p>
        <div class="dot-line">
        </div>
        <form id="theForm" class="signup-form" action="operation.php?action=upSign&comId=<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['car_brand'];?>
" name="brand">
        <select name="carSeries" class="carSeries" id="carSeries"  onFocus="changeOutline3()" >
            <option selected="1">请选择车系</option>
        </select>
            <input type="hidden" value="" name="carSerName" id="carSerName">
        <select name="carModel" class="carModel" id="carModel"  onFocus="changeOutline2()" >
            <option selected="1">请选择车型</option>
        </select>
        <select name="willBuyTime" class="willBuyTime" id="willBuyTime" onFocus="changeOutline3()">
        	<option selected="1">请选择时间</option>
            <option value="一星期内">一星期内</option>
            <option value="一个月内">一个月内</option>
            <option value="三个月内">三个月内</option>
            <option value="六个月内">六个月内</option>
            <option value="一年之内">一年之内</option>
        </select>
        <input name="name" class="name" id="name" placeholder="请输入您的姓名  如：陈先生" onFocus="changeOutline0()"  ><br />
        <input name="custom" class="custom" id="custom" placeholder="请输入您的联系方式" onFocus="changeOutline1()" > <br /> 
            <input type="hidden" id="carIdName" name="carIdName" />
            <input type="hidden" name="actName" value="<?php echo $_smarty_tpl->getVariable('info')->value['act_name'];?>
" />
        </form>
        <a href="javascript:void(0)" onClick="upForm()" class="submit">报名询问最低价</a>
    </div>
    
    <div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
    <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe>    
</body>
</html>
