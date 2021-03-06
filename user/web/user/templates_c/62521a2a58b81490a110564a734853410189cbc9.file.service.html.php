<?php /* Smarty version Smarty-3.0.6, created on 2014-02-21 08:46:26
         compiled from "./service.html" */ ?>
<?php /*%%SmartyHeaderCode:908553071262250b91-56115665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62521a2a58b81490a110564a734853410189cbc9' => 
    array (
      0 => './service.html',
      1 => 1392950817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '908553071262250b91-56115665',
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

<!--小时分钟时间选择器js及css-->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../../res/js/mobiscroll.custom-2.6.2.min.js"></script>
<script type="text/javascript" src="../../res/js/mobiscroll.scroller.ios7.js"></script>
<link href="../../res/css/mobiscroll.scroller.css" rel="stylesheet" type="text/css" />
<link href="../../res/css/mobiscroll.scroller.ios7.css" rel="stylesheet" type="text/css" />
</script>
</script>
<script type="text/javascript">
$(function(){
    $('#time').mobiscroll().time({
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
</script>
<!--小时分钟时间选择器js及css-->


<script type="text/javascript" src="../../res/js/service.js"></script>
<link rel="stylesheet" href="../../res/css/service.css">
<!--<script src="../../../common/temp/brand.json"></script>-->
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
function upForm(){
	 var name = document.getElementById("name").value;
	 var phone = document.getElementById("custom").value;
	 var date = document.getElementById("date").value;
	 if(name==''){
		alert("请填写姓名");
		return false;
	 }
	 if(phone==''){
		alert("请填写电话");
		return false;
	 }
	 if(date==''){
		alert("请填写预约日期");
		return false;
	 }

	 $('#carSerName').val($('#carSeries option:selected').text());
	 $('#carModName').val($('#carModel option:selected').text());
	 $('#theForm').submit();
}
  
  function show(obj){
	  if(obj=='1'){
		  $('#deFix').hide();
		  $('#deMain').show();
		  $('.rules .title').html('保养介绍');
	  }else{
		  $('#deMain').hide();
		  $('#deFix').show();
		  $('.rules .title').html('维修介绍');
      }
  }
</script>

</head>

<body>
	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center;">
		<p style="color:#fff; position:relative;">售后预约</p>
        <a href="<?php echo $_smarty_tpl->getVariable('comId')->value;?>
-homepage.html" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33" border="0"/></a>
    </div>
    <div style="width:100%; height:47px;"></div>
	<div class="carName">
    	<p>提供优质4S服务，微信报名畅享优惠</p>
    </div>
    <div class="rules">
    	<p class="title">保养介绍</p>
        <div class="dot-line">
        </div>
        <div class="describe" id="deMain">
             <?php echo $_smarty_tpl->getVariable('info')->value['maintain'];?>

        </div>
        <div class="describe" id="deFix" style="display:none">
             <?php echo $_smarty_tpl->getVariable('info')->value['fixed'];?>

        </div>
    </div>
    <div class="phone">
    	<img class="phone-pic" src="../../res/img/phone-icon.png">
        <a href="tel:<?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
" class="phone-num">询问客服： <?php echo $_smarty_tpl->getVariable('comInfo')->value['phone'];?>
</a>
    </div>
    
    <div class="signup">
    	<p class="ensure">请填写有效联系方式，我们承诺保密</p>
        <div class="dot-line">
        </div>
        <form class="signup-form" id="theForm" action="operation.php?action=addService" enctype="multipart/form-data" method="post">
     
		<input type="radio" name="service" checked="checked" class="maintain" value="预约保养" onclick="show(1)" />预约保养
		<input type="radio" name="service" class="repair" value="预约维修" onclick="show(2)"/>预约维修
        <input name="name" class="name" id="name" placeholder="请输入您的姓名 如：陈先生" onFocus="changeOutline0()"  ><br />
        <input name="custom" class="custom" id="custom" placeholder="请输入您的联系方式" onFocus="changeOutline1()" > <br /> 
        <input name="carNumber" class="carNumber" id="carNumber" placeholder="车牌号 如：粤A8888" onFocus="changeOutline2()"><br />
 		<select class="carModel" id="date" name="bookTime">
        </select>
        
        <input id="time" class="time" name="time" placeholder="请选择时间段">
        <input type="hidden" name="comId" value="<?php echo $_smarty_tpl->getVariable('comInfo')->value['company_id'];?>
">
        </form>
        <a href="javascript:void(0)" class="submit" onClick="upForm()">立即预约</a>
    </div>
	<div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
     <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;" ></iframe> 
    <!--动态计算并返回从今天开始至1个月之后的日期-->
    <script>
	window.onload = produceDate();
		function produceDate(){
           hashH = document.documentElement.scrollHeight; 
	       urlC = "http://gd.qq.com/zt2013/addga/index.htm"; 
	       document.getElementById("iframeC").src=urlC+"#"+hashH; 
			var item = document.getElementById("date");
			var time = new Date();
			var year = time.getYear()+1900;
			var month = time.getMonth()+1;
			var myday = new Date(year, month, 0).getDate(); 
			var i = time.getDate();
			var leftday = myday - i + 1;
			var temp = document.createElement("option");
			temp.innerHTML = "请选择预约日期";
			temp.value = "";
			item.appendChild(temp);
			if(month < 10)
				month = '0' + month; 
			for(i; i<=myday; i++)
			{
				
				var sb = document.createElement("option");
				if(i < 10)
				{
				var temp= '0'+i;
				sb.setAttribute("value",year+'-'+month+'-'+temp);
				sb.innerHTML=year+'-'+month+'-'+temp;
				}
				else
				{
				sb.setAttribute("value",year+'-'+month+'-'+i);
				sb.innerHTML=year+'-'+month+'-'+i;
				}			
				item.appendChild(sb);	
			}
			//处理到达12月后下一年的情况
			if(month == 12)
				{
					year = year ++;
					month= '0'+(month-11);
				}
			else
				{
					month++;
					if(month < 10)
					month = '0'+month;
				}
			for(var j = 1; j<=(30-leftday);j++)
			{
				var sb = document.createElement("option");
				if(j < 10)
				{
				var temp= '0'+j;
				sb.setAttribute("value",year+'-'+month+'-'+temp);
				sb.innerHTML=year+'-'+month+'-'+temp;
				}
				else
				{
				sb.setAttribute("value",year+'-'+month+'-'+j);
				sb.innerHTML=year+'-'+month+'-'+j;
				}			
				item.appendChild(sb);	
				
			}			
		}
</script>
<!--动态计算并返回从今天开始至1个月之后的日期-->
</body>
</html>
